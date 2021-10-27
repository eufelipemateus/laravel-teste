<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BuyController extends Controller
{
    //

    public function show($id){

        $product = Product::findOrFail($id);

        $data['product'] = $product;
        return view('buy', $data);
    }
}
