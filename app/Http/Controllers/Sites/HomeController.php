<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Technical;

class HomeController extends Controller
{
    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Technical $technical
    ) {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->technical = $technical;
    }

    public function index()
    {
        $categoriesParent = $this->category->where('parent_id', null)->get();
        $categories = $this->category->where('parent_id', '!=', null)->get();
        $products['featured'] = $this->product
            ->feature()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }])->get();
        $products['new'] = $this->product
            ->new()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }])->orderBy('price', 'desc')->get();
        $products['sale'] = $this->product
            ->topSale()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }])->orderBy('sale_percent', 'desc')->get();
        $technicals = $this->technical->all();

        return view('sites.home.index')
            ->with(['categoriesParent' => $categoriesParent,
                'categories' => $categories,
                'products' => $products,
                'technicals' => $technicals ]);
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
                        ->where('price', '<=', 1000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '1-5':
                    $products =  $this->product
                        ->where('price', '=>', 1000000)
                        ->where('price', '<=', 5000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '5-10':
                    $products =  $this->product
                        ->where('price', '=>', 5000000)
                        ->where('price', '<=', 10000000)
                        ->with(['productImages' => function ($query) {
                            $query->where('is_main', 1);
                        }])->get();
                    break;

                case '>10':
                    $products =  $this->product
                        ->where('price', '=>', 10000000)
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
            return $this->product->where('name', 'like', '%' . $name . '%')->get();
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
