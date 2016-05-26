<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use CartProvider;

class CartController extends Controller {

    public function __construct() {
        if (CartProvider::instance()->count() == 0) {
            return redirect('/')->send();
        }
        $categories = \App\Category::all()->toHierarchy();
        $currencies = \App\Currency::all();
        view()->share('categories', $categories);
        view()->share('currencies', $currencies);

    }

    public function index() {
        if (CartProvider::instance()->count() === 0) {
            return redirect('/');
        }
        return view('cart.index', [
            'page_title' => 'Cart View',
        ]);
    }

    public function add(Request $request) {
        $productID = $request->input('productID');
        $qty = $request->input('qty');
        $product_info = \App\Product::find($productID);
        if (!$qty) {
            \Flash::error('Error: Product Qty not filled.');
            return redirect()->back();
        }
        if (!$product_info) {
            \Flash::error('Error: We have not this Product.');
            return redirect()->back();
        }

        if (CartProvider::instance()->add($product_info->id, $product_info->name, $qty, $product_info->price)) {
            \Flash::success('Product added to Cart.');
            return redirect()->back();
        } else {
            \Flash::error('Error: Product cannot added to Cart.');
            return redirect()->back();
        }
    }

    public function update(Request $request) {
        $rowID = $request->input('rowID');
        $qty = $request->input('qty');
        if (CartProvider::instance()->update($rowID, $qty)) {
            \Flash::success('Cart Updated.');
            return redirect()->back();
        } else {
            \Flash::error('Error: Cart not updated.');
            return redirect()->back();
        }
    }

    public function remove($rowID) {
        if (CartProvider::instance()->remove($rowID)) {
            \Flash::success('Product deleted.');
            return redirect()->back();
        } else {
            \Flash::error('Error: Product not deleted.');
            return redirect()->back();
        }
    }

}
