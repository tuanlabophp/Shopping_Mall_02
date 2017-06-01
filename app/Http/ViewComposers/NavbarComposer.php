<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Wishlist;
use App\Helpers\Helpers;
use Session;
use Auth;

class NavbarComposer extends Controller
{
    public function compose(View $view)
    {
        $wishList = null;
        $products = null;
        $total = null;
        if ($cart = session()->get('cart')) {
            $products = Product::wherein('id', array_keys(session()->get('cart')))->with('productImages')->get();
            $total = Helpers::totalCart($products, $cart);
        }
        if (Auth::check()) {
            $wishList = Wishlist::where('user_id', Auth::user()->id)->count();
        }
        $view->with(['productsCart' => $products, 'wishlists' => $wishList, 'total' => $total]);
    }
}
