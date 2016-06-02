<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use App\User;

class PasswordController extends Controller
{
    
    /**
     * Show the form for editing the User Password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $user = User::find($id);
      return view('admin/password.edit')
                      ->with('user', $user);
    }
    
    /**
     * Update the User Password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordRequest $request, $id){

        $user = User::find($id);
        $user->password = bcrypt($request->password);
         if ($user->save()) {
            \Session::flash('flash_message_success', 'User Password updated.');
            return redirect()->back();
        } else {
            \Session::flash('flash_message_error', 'User Password not updated');
            return redirect()->back();
        }

    }
    
}