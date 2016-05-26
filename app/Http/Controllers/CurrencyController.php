<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Currency;

class CurrencyController extends Controller {

    public function update($currencyID) {

        $currency_info = \App\Currency::find($currencyID);
        if ($currency_info) {
            Currency::setCurrency($currency_info->code);
            \Flash::success('Currency updated.');
            return redirect()->back();
        } else {
            \Flash::error('Currency not updated.');
            return redirect()->back();
        }
    }

}
