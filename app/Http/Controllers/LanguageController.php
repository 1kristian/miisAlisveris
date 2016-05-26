<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;
use Config;

class LanguageController extends Controller {

    public function changeLocale(Request $request) {

        if (array_key_exists($request->locale, Config::get('languages'))) {
            $changed = Session::set('locale', $request->locale);
            \Flash::success('Language changed.');
            return redirect()->back();
        }else{
            \Flash::success('Language not changed.');
            return redirect()->back();   
        }
    }

}
