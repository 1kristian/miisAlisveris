<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\CreateAddressRequest;
use App\UserAddress;
use Auth;

class ProfileController extends Controller {

    public function __construct() {
        if (!Auth::check()) {
            return redirect('login');
        }
        $categories = \App\Category::all()->toHierarchy();
        $currencies = \App\Currency::all();
        view()->share('categories', $categories);
        view()->share('currencies', $currencies);
    }

    public function index() {

        $user_addresses = UserAddress::where('user_id', Auth::id())->get();

        return view('auth.profile.index', [
            'page_title' => 'Profile',
            'user' => Auth::user(),
            'user_addresses' => $user_addresses
        ]);
    }

    public function newAddress() {
        return view('auth.profile.newaddress', [
            'page_title' => 'Create New Address',
        ]);
    }



    public function createAddress(CreateAddressRequest $request) {

        $useraddress = new UserAddress;
        $useraddress->user_id = Auth::id();
        $useraddress->name = $request->name;
        $useraddress->company = $request->company;
        $useraddress->address = $request->address;
        $useraddress->city = $request->city;
        $useraddress->postcode = $request->postcode;
        $useraddress->country = $request->country;
        $useraddress->status = $request->status;


        if ($useraddress->save()) {
            \Session::flash('flash_message_success', 'Address created.');
            return redirect('profile');
        } else {
            \Session::flash('flash_message_error', 'Address not created.');
            return redirect('profile');
        }
    }

    public function showAddress($id) {
        $useraddress = UserAddress::where('user_address_id', $id)->first();
        if (!$useraddress) {
            \Session::flash('flash_message_error', 'You have not this Address.');
            return redirect()->back();
        }
        return view('auth.profile.showaddress', [
            'page_title' => $useraddress->user_address_id,
            'address' => $useraddress
        ]);
    }

    public function updateAddress(UpdateAddressRequest $request) {
        $useraddress = UserAddress::where('user_address_id', $request->user_address_id)
                ->where('user_id', Auth::id())
                ->update([
            'user_id'   => Auth::id(),
            'name'      => $request->name,
            'company'   => $request->company,
            'address'   => $request->address,
            'city'      => $request->city,
            'postcode'  => $request->postcode,
            'country'   => $request->country,
            'status'    => $request->status,
        ]);

        if ($useraddress) {
            \Session::flash('flash_message_success', 'Address updated.');
            return redirect()->back();
        } else {
            \Session::flash('flash_message_error', 'Address not updated.');
            return redirect()->back();
        }
    }

    public function deleteAddress($id) {

        $deletedAdress = UserAddress::where('user_address_id', $id)
                                 ->where('user_id', Auth::id())
                                ->delete();

        if ($deletedAdress) {
            \Session::flash('flash_message_success', 'Address deleted.');
            return redirect()->back();
        } else {
            \Session::flash('flash_message_error', 'Address not deleted.');
            return redirect()->back();
        }
    }

}
