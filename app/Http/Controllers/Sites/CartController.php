<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Session;
use App\Helpers\Helpers;

class CartController extends Controller
{
    public function __construct(
        Product $product,
        ProductImage $productImage
    ) {
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function index()
    {
        if ($cart = session()->get('cart')) {
            $products = $this->product->whereIn('id', array_keys(session()->get('cart')))->with('productImages')->get();
            $total = Helpers::totalCart($products, $cart);
            // return $total;
            return view('sites.user.cart')->with(['products' => $products, 'total' => $total]);
        }
        
        return view('sites.user.cart');
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart');
        if ($request->product) {
            if ($request->quantity) {
                $cart[$request->product] = $request->quantity;
                session()->put('cart', $cart);

                return redirect('cart');
            } else {
                $cart[$request->product] = 1;
            }
            
            session()->put('cart', $cart);
        }
        $products = $this->product->wherein('id', array_keys($cart))->with('productImages')->get();
        $total = Helpers::totalCart($products, $cart);
        
        return view('sites._components.sub_cart')->with(['productsCart' => $products, 'total' => $total]);
    }

    public function deleteCart(Request $request)
    {
        $cart = session()->get('cart');
        if ($request->product) {
            unset($cart[$request->product]);
            session()->put('cart', $cart);
        }
        if (empty($cart) && $request->mainCart == 1) {
            return trans('sites.cart_empry');
        } elseif (empty($cart)) {
            return view('sites._components.sub_cart');
        }
        $products = $this->product->wherein('id', array_keys($cart))->with('productImages')->get();
        $total = Helpers::totalCart($products, $cart);
        if ($request->mainCart == 1) {
            return view('sites._components.cart')->with(['products' => $products, 'total' => $total]);
        }
        return view('sites._components.sub_cart')->with(['productsCart' => $products, 'total' => $total]);
    }

    public function updateCart(Request $request)
    {

        $cart = session()->get('cart');
        $cart[$request->product] = $request->qty;
        session()->put('cart', $cart);
        $products = $this->product->wherein('id', array_keys($cart))->with('productImages')->get();
        $total = Helpers::totalCart($products, $cart);

        return view('sites._components.cart')->with(['products' => $products, 'total' => $total]);
    }

    public function checkout()
    {
        if ($cart = session()->get('cart')) {
            $products = $this->product->wherein('id', array_keys($cart))->with('productImages')->get();
            $total = Helpers::totalCart($products, $cart);

            return view('sites.user.checkout')->with(['products' => $products, 'total' => $total]);
        }

        return view('sites.user.checkout');
    }
}
