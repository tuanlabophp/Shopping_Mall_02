<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Technical;
use App\Models\Wishlist;
use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Technical $technical,
        Wishlist $wishlist
    ) {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->technical = $technical;
        $this->wishlist = $wishlist;
    }

    public function index()
    {
        // return 1%2;
        $products['featured'] = $this->product
            ->feature()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1)->select(['id', 'product_id', 'path_origin', 'is_main']);
            }])->get();
        $products['new'] = $this->product
            ->productNew()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1)->select(['id', 'product_id', 'path_origin', 'is_main']);
            }, 'categories'])->orderBy('price', 'desc')->get();
        $products['sale'] = $this->product
            ->topSale()
            ->with(['productImages' => function ($query) {
                $query->select(['id', 'product_id', 'path_origin', 'is_main'])->where('is_main', 1);
            }])->orderBy('sale_percent', 'desc')->get();
            // return 1;
        // dd($products);
        $technicals = $this->technical->all();
        $wishlists = [];
        if (Auth::check()) {
            $wishlists =  $this->wishlist->where('user_id', Auth::user()->id)->get(['product_id'])->toArray();
            foreach ($wishlists as $key => $wishlist) {
                $wishlists[$key ] = $wishlist['product_id'];
            }
        }

        return view('sites.home.index')
                    ->with([
                        'products' => $products,
                        'wishlists' => $wishlists,
                        'technicals' => $technicals
                    ]);
    }

    public function search(Request $request)
    {
        if ($category = $request->category) {
            $products = $this->category
                ->where('parent_id', $category)
                ->orwhere('id', $category)
                ->get()
                ->map(function ($subCategory) {
                    $subCategory->products = $this->product
                        ->where('category_id', $subCategory->id)
                        ->get()->map(function ($image) {
                            $image->imageProduct = $this->productImage
                                ->where('product_id', $image->id)
                                ->where('is_main', 1)->first();
                            return $image;
                        });
                    return $subCategory;
                });

            return view('sites._components.subCategory')->with('products', $products);
        } elseif ($price = $request->price) {
            $products;
            switch ($price) {
                case '<1':
                    $products =  $this->product
                        ->where('price', '<', 1000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '1-5':
                    $products =  $this->product
                        ->where('price', '>', 1000000)
                        ->where('price', '<', 5000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '5-10':
                    $products =  $this->product
                        ->where('price', '>', 5000000)
                        ->where('price', '<', 10000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '>10':
                    $products =  $this->product
                        ->where('price', '>', 10000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;
            }

            return view('sites._components.search')->with('products', $products);
        } elseif ($technical = $request->technical) {
            $products = $this->technical->find($technical)->products()->get();

            return view('sites._components.search')->with('products', $products);
        } elseif ($name = $request->name) {
            $products = $this->product->where('name', 'like', '%' . $name . '%')->paginate(12);
             $products->withPath("/search?name=$request->name");

            return view('sites.search.index')->with('products', $products);
        } elseif ($size = $request->size) {
            $products;
            switch ($size) {
                case '<4':
                    $products =  $this->product
                        ->where('price', '<', 4)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '4-5.5':
                    $products =  $this->product
                        ->where('display_size', '=>', 4)
                        ->where('display_size', '<=', 5.5)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '>5.5':
                    $products =  $this->product
                        ->where('display_size', '>', 5.5)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;
            }

            return view('sites._components.search')->with('products', $products);
        }
    }

    public function compare(Request $request)
    {
        $compare = session()->get('compare');
        if ($request->show) {
            $products = $this->product->wherein('id', $compare)->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }, 'technicals'])->get();

            return view('sites._components.compare_page')->with('products', $products);
        }
        if (count($compare) < 3) {
            $compare[$request->product] = $request->product;
            session()->put('compare', $compare);
        } else {
            session()->flash('limit', trans('sites.limit-3-product'));
        }
        $products = $this->product->find($compare);

        return view('sites._components.compare')->with('products', $products);
    }

    public function deleteCompare(Request $request)
    {
        $compare = session()->get('compare');
        unset($compare[$request->product]);
        session()->forget('limit');
        if (empty($compare)) {
            session()->forget('compare');

            return 0;
        } else {
            session()->put('compare', $compare);
        }
        $products = $this->product->find($compare);

        return view('sites._components.compare')->with('products', $products);
    }
}
