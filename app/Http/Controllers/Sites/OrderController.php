<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Helpers\Helpers;
use Session;
use Auth;
use DB;

class OrderController extends Controller
{
    public function __construct(Product $product, Order $order, OrderDetail $orderDetail)
    {
        $this->product = $product;
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $order['user_id'] = Auth::user()->id;
            $order['name'] = $request->f_name . ' ' . $request->l_name;
            $order['email'] = $request->email;
            $order['address'] = $request->address;
            $order['phone'] = $request->phone;
            $order['payment'] = $request->payment;
            $order = $this->order->create($order);

            $cart = session()->get('cart');
            $products = $this->product->wherein('id', array_keys($cart))->get();
            foreach ($products as $product) {
                $orderDetail['product_id'] = $product['id'];
                $orderDetail['quantity'] = $cart[$product['id']];
                $orderDetail['price'] = Helpers::priceProduct($product, $cart);
                $order->orderDetails()->create($orderDetail);
            }
            DB::commit();
            session()->flush('cart');

            return view('sites.user.bill');
        } catch (Exception $e) {
            DB::rollback();

            return redirect('checkout');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
