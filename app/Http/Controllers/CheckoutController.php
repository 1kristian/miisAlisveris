<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CheckoutRequest;
use CartProvider;
use Auth;
use Session;
use App\UserAddress;

class CheckoutController extends Controller {

    /**
     * 
     * Check Basket count and Standart Share's
     *
     */
    public function __construct() {
        if (CartProvider::instance()->count() == 0) {
            return redirect('/')->send();
        }
        $categories = \App\Category::all()->toHierarchy();
        $currencies = \App\Currency::all();
        view()->share('categories', $categories);
        view()->share('currencies', $currencies);
    }
    /**
     * Display a listing of the Basket with User Addressws.
     *
     * @param  id  Auth::id()
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user_addresses = UserAddress::where('user_id', Auth::id())->get();


        return view('checkout.index', [
            'page_title' => 'Checkout',
            'user_addresses' => $user_addresses
        ]);
    }
    
    /**
     * Check a Form in Checkout Index.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkForm(CheckoutRequest $request) {

        $order = new \App\Order;
        $order->user_id = Auth::id();
        $order->payment_name = $request->payment_name;
        $order->payment_company = $request->payment_company;
        $order->payment_address = $request->payment_address;
        $order->payment_city = $request->payment_city;
        $order->payment_postcode = $request->payment_postcode;
        $order->payment_country = $request->payment_country;
        $order->payment_method = "0";
        $order->shipping_name = $request->shipping_name;
        $order->shipping_company = $request->shipping_company;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_postcode = $request->shipping_postcode;
        $order->shipping_country = $request->shipping_country;
        $order->shipping_method = "0";
        $order->comment = $request->comment;
        $order->total = "0";
        $order->status = "0";
        $order->ip = $request->ip();

        if ($order->save()) {


            foreach(CartProvider::instance()->content() as $product){
                $order_products = new \App\Order_Product;
                $order_products->user_id = Auth::id();
                $order_products->order_id = $order->id;
                $order_products->product_id = $product->id;
                $order_products->qty = $product->qty;
                $order_products->price = $product->price;
                $order_products->total = $product->subtotal;
                $order_products->save();
            }
            Session::put('order_id', $order->id);
            return redirect('checkout/step2');
        }
    }

    public function step2() {
        echo "Payment and Shipping";
        echo Session::get('order_id');

    }

}
