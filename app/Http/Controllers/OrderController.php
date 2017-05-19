<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\OrderRequest;
use App\Models\Order;
use App\Models\Shipper;
use App\Models\Deliver;
use App\Models\User;
use App\Helpers\Helpers;
use Storage;
use Session;
use DB;

class OrderController extends Controller
{
    public function __construct(
        Order $order,
        Shipper $shipper,
        Deliver $deliver
    ) {
        $this->middleware('admin');
        $this->order = $order;
        $this->shipper = $shipper;
        $this->deliver = $deliver;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->order->paginate(5);
        return view('admin.order.index', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = $this->order;
        $shipper = $this->shipper->all();
        $deliver = $this->deliver->all();
        return view('admin.order.add', [
                'order' => $order,
                'shipper' => $shipper,
                'deliver' => $deliver,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = $this->order;
        try {
            $order->fill($request->all());
            if ($order->save()) {
                $request->session()->flash('success', trans('view.add_order_success'));
            } else {
                $request->session()->flash('fail', trans('view.add_order_fail'));
            }
        } catch (Exception $e) {
            $request->session()->flash('fail', trans('view.add_order_fail'));
        }
        return redirect('admin/order');
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
        $order = $this->order->find($id);
        if ($order) {
            return view('admin.order.edit', ['order' => $order]);
        }
        return trans('message.not_found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = $this->order->find($id);

        try {
            $order->fill($request->all());
            if ($order->save()) {
                $request->session()->flash('success', trans('view.add_order_success'));
            } else {
                $request->session()->flash('fail', trans('view.add_order_fail'));
            }
        } catch (Exception $e) {
            $request->session()->flash('fail', trans('view.add_order_fail'));
        }
        return redirect('admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->order->find($id);
        try {
            $order->delete();
            session()->flash('success', trans('admin.delete_order_success'));
        } catch (Exception $e) {
            session()->flash('fail', trans('admin.delete_order_fail'));
        }
        return redirect('admin/order');
    }
}
