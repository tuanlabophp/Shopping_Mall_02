<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;

class wishListController extends Controller
{
    public function __construct(User $user, Product $product, Wishlist $wishList)
    {
        $this->user = $user;
        $this->product = $product;
        $this->wishList = $wishList;
    }
    public function index()
    {
        $wishList = $this->wishList
                        ->where('user_id', Auth::user()->id)
                        ->with(['products.productImages'
                                => function ($query) {
                                    $query->where('is_main', 1);
                                }])->get();

        return view('sites.user.wishlist')->with('wishList', $wishList);
    }

    public function addwishList(Request $request)
    {
        if (Auth::user()) {
            if (!$this->wishList->where('product_id', $request->product)->where('user_id', Auth::user()->id)->first()) {
                $this->wishList->create(['product_id' => $request->product, 'user_id' => Auth::user()->id]);
            }
            $count = $this->wishList->where('user_id', Auth::user()->id)->count();

            return [$count, trans('sites.delete_wishlist')];
        } else {
            return [null, trans('sites.need_login')];
        }
    }

    public function deletewishList(Request $request)
    {
        if (Auth::user()) {
            if ($this->wishList->where('product_id', $request->product)->where('user_id', Auth::user()->id)->first()) {
                $this->wishList->where('product_id', $request->product)->where('user_id', Auth::user()->id)->delete();
            }
            if ($request->page) {
                $wishList = $this->wishList
                            ->where('user_id', Auth::user()->id)
                            ->with(['products.productImages'
                                => function ($query) {
                                    $query->where('is_main', 1);
                                }])->get();

                return view('sites._components.wishlist')->with('wishList', $wishList);
            }
            $count = $this->wishList->where('user_id', Auth::user()->id)->count();

            return [$count, trans('sites.add_to_wishlist')];
        } else {
            return [null, trans('sites.need_login')];
        }
    }
}
