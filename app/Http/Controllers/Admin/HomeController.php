<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Bican\Roles\Models\Role;

class HomeController extends Controller
{
    public function index(){
      return view('admin/home.index');
    }
}