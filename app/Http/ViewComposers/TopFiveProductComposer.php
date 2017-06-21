<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Product;

class TopFiveProductComposer
{
    public function compose(View $view)
    {
        $products['featured'] = Product::feature()
                    ->with(['productImages' => function ($query) {
                        $query->where('is_main', 1);
                    }])->take(5)->get();
        $products['new'] = Product::productNew()
                    ->with(['productImages' => function ($query) {
                        $query->where('is_main', 1);
                    }])->take(5)->get();
        $products['sale'] = Product::topSale()
                    ->with(['productImages' => function ($query) {
                        $query->where('is_main', 1);
                    }])->orderBy('sale_percent', 'desc')->take(5)->get();
        $view->with(['topFiveProduct' => $products]);
    }
}
