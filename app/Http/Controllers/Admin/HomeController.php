<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller {
 
    /**
     * Display Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin/home.index');
    }

}
