<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class HomeController extends Controller
{
  /**
   * Check user role
   * @param int Auth::id();
   * @return \Illuminate\Http\Response
   */
    public function __construct()
    {
      $user = User::find(Auth::id());
       if ($user->is('admin') == false) {
         return redirect('home/dashboard');
       }
    }

    public function index(){
      return view('admin/home.index');
    }
}
