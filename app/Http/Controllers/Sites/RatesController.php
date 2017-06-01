<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sites\CommentRequest;
use App\Models\Rate;

class RatesController extends Controller
{
    public function __construct(Rate $rate)
    {
        $this->rate = $rate;
    }
    /**
     * Store a new comment resource.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $attributes['content'] = $request->input('content');
        $attributes['user_id'] = $request->user()->id;
        $attributes['product_id'] = $request->input('product_id');
        $attributes['point'] = $request->input('score');

        $rate = new Rate($attributes);
        try {
            $rate->save();
            session()->flash('success', trans('sites.create_rate_success'));
        } catch (\Exception $e) {
            session()->flash('fail', trans('sites.create_rate_fail'));
        }
    
        return redirect('product');
    }
}
