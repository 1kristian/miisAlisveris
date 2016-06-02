<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use CartProvider;

class HomeController extends Controller {

    /**
     * 
     * Standart Share's
     *
     */
    public function __construct() {
        $categories = \App\Category::all()->toHierarchy();
        $currencies = \App\Currency::all();
        view()->share('categories', $categories);
        view()->share('currencies', $currencies);
    }
    
    /**
     * Display a Home with Products
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    
    public function index() {
        $products = \App\Product::all();

        return view('home.index', [
            'products' => $products,
            'page_title' => 'Homepage',
        ]);
    }

}
