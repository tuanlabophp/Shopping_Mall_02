<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Session;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // try {
        //     if (Schema::hasTable('categories', 'products')) {
        //         $categories = Category::where('parent_id', null)->with(['subCategories'])->get();
        //         view()->share('categories', $categories);
        //         $products['featured'] = Product::feature()
        //             ->with(['productImages' => function ($query) {
        //                 $query->where('is_main', 1);
        //             }])->take(5)->get();
        //         $products['new'] = Product::productNew()
        //             ->with(['productImages' => function ($query) {
        //                 $query->where('is_main', 1);
        //             }])->take(5)->get();
        //         $products['sale'] = Product::topSale()
        //             ->with(['productImages' => function ($query) {
        //                 $query->where('is_main', 1);
        //             }])->orderBy('sale_percent', 'desc')->take(5)->get();



        //         view()->share('topFiveProduct', $products);
        //     } else {
        //         throw new Exception("Cannot find your DB connection... ");
        //     }
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }
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
