<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Technical;

class ProductDetail extends Controller
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
        $product = $this->product
                        ->where('id', 16)
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
}
