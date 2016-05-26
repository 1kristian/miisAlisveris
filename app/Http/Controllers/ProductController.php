<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ProductController extends Controller {

    public function __construct() {

      $categories = \App\Category::all()->toHierarchy();
      $currencies = \App\Currency::all();
      view()->share('categories', $categories);
      view()->share('currencies', $currencies);
    }

    public function index($slug) {

        $products = \App\Product::all();
        $product = \App\Product::where('slug', $slug)->first();
        if (!$product) {
            \Flash::error('We have no products with this name.');
            return redirect()->back();
        }
        return view('product.index', [
            'products' => $products,
            'page_title' => $product->name,
            'product' => $product
        ]);
    }

}
