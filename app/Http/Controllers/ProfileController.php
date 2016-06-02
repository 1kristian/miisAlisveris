<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\CreateAddressRequest;
use App\UserAddress;
use Auth;

class ProfileController extends Controller {

    /**
     * 
     * Check Auth::check() and Standart Share's
     *
     */
    public function __construct() {
        if (!Auth::check()) {
            return redirect('login')->send();
        }
        $categories = \App\Category::all()->toHierarchy();
        $currencies = \App\Currency::all();
        view()->share('categories', $categories);
        view()->share('currencies', $currencies);
    }
    
    /**
     * Display a Home with User Addresses
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user_addresses = UserAddress::where('user_id', Auth::id())->get();

        return view('auth.profile.index', [
            'page_title' => 'Profile',
            'user' => Auth::user(),
            'user_addresses' => $user_addresses
        ]);
    }
    
    /**
     * Show the form for creating a new User Address.
     *
     * @return \Illuminate\Http\Response
     */
    public function newAddress() {
        return view('auth.profile.newaddress', [
            'page_title' => 'Create New Address',
        ]);
    }


    /**
     * Store a newly created User Address in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
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
            \Flash::success('Address created.');
            return redirect('profile');
        } else {
            \Flash::error('Address not created.');
            return redirect('profile');
        }
    }
    
    /**
     * Display the specified User Address.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAddress($id) {
        $useraddress = UserAddress::where('user_address_id', $id)->first();
        if (!$useraddress) {
            \Flash::error('You have not this address.');
            return redirect()->back();
        }
        return view('auth.profile.showaddress', [
            'page_title' => $useraddress->user_address_id,
            'address' => $useraddress
        ]);
    }

    /**
     * Update the User Address in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
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
            \Flash::success('Address updated.');
            return redirect()->back();
        } else {
            \Flash::error('Address not updated.');
            return redirect()->back();
        }
    }
    /**
     * Remove the specified User Address from storage.
     *
     * @param  int  $id
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function deleteAddress($id) {

        $deletedAdress = UserAddress::where('user_address_id', $id)
                                 ->where('user_id', Auth::id())
                                ->delete();

        if ($deletedAdress) {
            \Flash::success('Address deleted.');
            return redirect()->back();
        } else {
            \Flash::error('Address not deleted.');
            return redirect()->back();
        }
    }

}
