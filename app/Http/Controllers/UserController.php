<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admin.user.add', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = uniqueString($request->input('cate_name')) . "." . $file->extension();
            $path = $file->storeAs('images', $fileName);
            $model->feature_image = "/" . $path;
        }

        DB::beginTransaction();
        try {
            if ($user->save()) {
                DB::commit();
                return trans('message.success_create_user');
            }
        } catch (Exception $e) {
            DB::rollback();
            return trans('message.failure');
        }
        return redirect()->route('admin.user');
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
        $user = User::find($id);
        if ($user) {
            return view('admin.user.add', ['user' => $user]);
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = uniqueString($request->input('f_name')) . "." . $file->extension();
            $path = $file->storeAs('images', $fileName);
            $model->feature_image = "/" . $path;
        }

        DB::beginTransaction();
        try {
            if ($user->save()) {
                DB::commit();
                $message = trans('message.success_create_user');
            }
        } catch (Exception $e) {
            DB::rollback();
            $message = trans('message.failure');
        }
        return redirect()->route('admin.user')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        try {
            $user->delete();
            $message = trans('message.success_destroy_user');
        } catch (Exception $e) {
            $message = trans('message.failure');
        }
        return response()->with($message);
    }
}
