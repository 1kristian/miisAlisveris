<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\User;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = User::all();
        return view('admin/user.index')
                        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin/user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->save()) {
            \Session::flash('flash_message_success', 'User added.');
            return redirect()->back();
        } else {
            \Session::flash('flash_message_error', 'User not added');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('admin/user.edit')
                        ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->save()) {
            \Session::flash('flash_message_success', 'User updated');
            return redirect()->back();
        } else {
            \Session::flash('flash_message_error', 'User not updated');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::destroy($id);
        if ($user) {
            \Session::flash('admin_flash_message_success', 'User deleted.');
            return redirect()->back();
        } else {
            \Session::flash('admin_flash_message_error', 'User not deleted.');
            return redirect()->back();
        }
    }

}
