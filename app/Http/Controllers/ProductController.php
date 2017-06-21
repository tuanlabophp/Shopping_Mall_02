<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTechnical;
use App\Models\Category;
use App\Models\Technical;
use App\Helpers\Helpers;
use Storage;
use Session;
use DB;

class ProductController extends Controller
{
    public function __construct(
        Product $product,
        ProductImage $productImage,
        ProductTechnical $productTechnical,
        Category $category,
        Technical $technical
    ) {
        $this->middleware('admin');
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTechnical = $productTechnical;
        $this->category = $category;
        $this->technical = $technical;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->with('productImages')->paginate(5);
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all()->toArray();
        $categories = Helpers::categoriesToArray($categories, 0, '');
        $categoriesArray = array();
        foreach ($categories as $value) {
            $categoriesArray[$value['id']] = $value['name'];
        }
        $technicals = $this->technical->all();
        return view('admin.product.add')->with(['categories' => $categoriesArray, 'technicals' => $technicals ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $input['name'] = $request->name;
            $input['category_id'] = $request->category_id;
            $input['price'] = $request->price;
            $input['description'] = $request->description;
            $input['sale_percent'] = $request->sale_percent;
            $input['display_size'] = $request->display_size;
            $input['profile'] = json_encode($request->only([
                'profile_os',
                'profile_cpu',
                'memory_ram',
                'memory_rom',
                'back_camera_resolution',
                'pin_capacity',
                'front_camera_resolution'
                ]));
            $input['profile_full'] = json_encode($request->except('_token'));
            $input['quantity'] = $request->quantity;
            $input['status'] = $request->status;
            $product = $this->product->create($input);
            $imageName = Helpers::importFile($request->image, config('setup.product_image_path'));
            if ($request->hasFile('image') && $product) {
                $image['product_id'] = $product->id;
                $image['path_origin'] = $imageName;
                $image['is_main'] = '1';
                $img = $this->productImage->create($image);
            }
            if ($request->hasFile('image_list') && $product) {
                foreach ($request->file('image_list') as $value) {
                    $image['product_id'] = $product->id;
                    $image['path_origin'] = Helpers::importFile($value, config('setup.product_image_path'));
                    $img = $this->productImage->create($image);
                }
            }
            DB::commit();
            $request->session()->flash('success', trans('view.add_product_success'));
        } catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('fail', trans('view.add_product_fail'));
        }
        
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->category->all()->toArray();
        $categories = Helpers::categoriesToArray($categories, 0, '');
        $categoriesArray = array();
        foreach ($categories as $value) {
            $categoriesArray[$value['id']] = $value['name'];
        }
        $productTechnical = array();
        if ($productTechnicals = $product->technicals) {
            foreach ($productTechnicals as $key => $value) {
                $productTechnical[$key] = $value->id;
            }
        }
        $technicals = $this->technical->all();
        $image = $product->productImages->where('is_main', 1)->first();
        $image_list = $product->productImages->where('is_main', '!=', 1);
        return view('admin.product.edit')->with(['product' => $product, 'categories' => $categoriesArray, 'technicals' => $technicals, 'productTechnical' => $productTechnical, 'image' => $image, 'image_list' => $image_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $input['name'] = $request->name;
            $input['category_id'] = $request->category_id;
            $input['price'] = $request->price;
            $input['description'] = $request->description;
            $input['sale_percent'] = $request->sale_percent;
            $input['display_size'] = $request->display_size;
            $input['quantity'] = $request->quantity;
            $input['status'] = $request->status;
            $input['profile'] = json_encode($request->only([
                'profile_os',
                'profile_cpu',
                'memory_ram',
                'memory_rom',
                'back_camera_resolution',
                'pin_capacity',
                'front_camera_resolution'
                ]));
            $input['profile_full'] = json_encode($request->except('_token'));
            $product->update($input);
            $product->technicals()->sync($request->technicals);
            if ($request->image) {
                $imageName = Helpers::importFile($request->image, config('setup.product_image_path'));
                if ($image = $product->productImages()->where('is_main', 1)->first()) {
                    Helpers::deleteFile($image['path_origin'], config('setup.product_image_path'));
                    $image->update(['path_origin' => $imageName]);
                } else {
                    $product->productImages()->create(['path_origin' => $imageName, 'is_main' => 1]);
                }
            }
            
            if ($request->hasFile('image_list')) {
                if ($image_list = $product->productImages->where('is_main', '!=', 1)) {
                    foreach ($image_list as $value) {
                        Helpers::deleteFile($value['path_origin'], config('setup.product_image_path'));
                    }
                    $this->productImage->where('is_main', '!=', 1)->where('product_id', $product->id)->delete();
                }
                foreach ($request->file('image_list') as $value) {
                    $image['product_id'] = $product->id;
                    $image['path_origin'] = Helpers::importFile($value, config('setup.product_image_path'));
                    $img = $this->productImage->create($image);
                }
            }
            DB::commit();
            $request->session()->flash('success', trans('view.update_product_success'));
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('fail', trans('view.update_product_fail'));
        }

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            foreach ($product->productImages as $value) {
                Helpers::deleteFile($value['path_origin'], config('setup.product_image_path'));
            }
            $product->productImages()->delete();
            $product->productTechnicals()->delete();
            $product->delete();
            DB::commit();
            session()->flash('success', trans('view.delete_product_success'));
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('fail', trans('view.delete_product_fail'));
        }
        return redirect('admin/product');
    }
}
