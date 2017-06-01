<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Technical;

class ProductController extends Controller
{
    public function __construct(
        Product $product,
        ProductImage $productImage,
        Technical $technical,
        Category $category
    ) {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->technical = $technical;
        $this->category = $category;
    }

    public function index($id)
    {
        $product = $this->product
                        ->where('id', $id)
                        ->with(['productImages',
                                'technicals',
                                'comments' => function ($query) {
                                                $query->orderBy('created_at', 'desc');
                                },
                                'rates' => function ($query) {
                                            $query->orderBy('created_at', 'desc');
                                }])->first();

        return view('sites.product.index')->with('product', $product);
    }

    public function pageProduct($id)
    {
        $categories = $this->category->where('id', $id)->orwhere('parent_id', $id)->get(['id'])->toArray();
        foreach ($categories as $key => $value) {
            $categories[$key] = $value['id'];
        }
        $category = $this->category->where('id', $id)->first();
        $products = $this->product
                        ->whereIn('category_id', $categories)
                        ->with('productImages')
                        ->paginate(12);

        return view('sites.product.page')->with(['category' => $category, 'products' => $products]);
    }
}
