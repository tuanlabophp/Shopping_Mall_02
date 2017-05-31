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
            ->where('id', 16)
            ->with(['productImages', 'technicals'])
            ->get();

        return view('sites.product.index')->with('product', $product);
    }

    public function pageProduct($id)
    {
        $category = $this->category->where('id', $id)->orwhere('parent_id', $id)->with('products.productImages')->get();
        // return $category;
        return view('sites.product.page')->with('category', $category);
    }
}
