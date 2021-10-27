<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BuyController extends Controller
{
    //

    public function show($id, $payment){

        $product = Product::findOrFail($id);

        $data['max_portion'] = (isset($product->payment->max_portion))? $product->payment->max_portion : 36;
        $data['payment'] = $payment;
        $data['product'] = $product;
        return view('buy', $data);
    }
}
