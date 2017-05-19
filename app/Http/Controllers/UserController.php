<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;
use App\Models\User;
use Session;
use DB;
use Crypt;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->middleware('admin');
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->paginate(10);
        return view('admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->user;
        return view('admin.user.add', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->user;
        try {
            $user->fill($request->all());
            if ($request->input('password')) {
                $password = $request->input('password');
                $hashPassword = bcrypt($password);
                $user->password = $hashPassword;
            }
            if ($request->hasFile('avatar')) {
                $avatarName = Helpers::importFile($request->input('avatar'), config('setup.user_avatar'));
                $user->avatar = $avatarName;
            }

            if ($user->save()) {
                $request->session()->flash('success', trans('view.add_user_success'));
            } else {
                $request->session()->flash('fail', trans('view.add_user_fail'));
            }
        } catch (Exception $e) {
            $request->session()->flash('fail', trans('view.add_user_fail'));
        }
        return redirect('admin/user');
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
        $user = $this->user->find($id);
        if ($user) {
            return view('admin.user.edit', ['user' => $user]);
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
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->find($id);
        try {
            $user->fill($request->all());
            $user->password = Crypt::decrypt($user->password);

            if ($request->hasFile('avatar')) {
                $avatarName = Helpers::importFile($request->input('avatar'), config('setup.user_avatar'));
                $user->avatar = $avatarName;
            }
            if ($user->save()) {
                $request->session()->flash('success', trans('view.add_user_success'));
            } else {
                $request->session()->flash('fail', trans('view.add_user_fail'));
            }
        } catch (Exception $e) {
            $request->session()->flash('fail', trans('view.add_user_fail'));
        }
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        try {
            foreach ($user as $value) {
                Helpers::deleteFile($value['avtar'], config('setup.user_avatar'));
            }
            $user->delete();
            session()->flash('success', trans('admin.delete_user_success'));
        } catch (Exception $e) {
            session()->flash('fail', trans('admin.delete_user_fail'));
        }
        return redirect('admin/user');
    }
}
