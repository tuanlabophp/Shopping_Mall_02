<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::where('parent_id', null)->with(['subCategories'])->get();
        view()->share('categories', $categories);
        $products['featured'] = Product::feature()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }])->take(5)->get();
        $products['new'] = Product::neww()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }])->take(5)->get();
        $products['sale'] = Product::topSale()
            ->with(['productImages' => function ($query) {
                $query->where('is_main', 1);
            }])->orderBy('sale_percent', 'desc')->take(5)->get();
        view()->share('topFiveProduct', $products);   
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
