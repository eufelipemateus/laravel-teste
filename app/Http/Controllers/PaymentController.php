<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPayment;
use App\Http\Requests\Payment;

class PaymentController extends Controller
{
    /**
     * Show new payment page.
     *
     * @return view -> payment
     */
	public function new(){
		return view("payment");
	}

    /**
     * Save new data from new payment in database.
     *
     * @return redirect -> list_product
     */
    public function create(Payment $request){

		$data = $request->all();
		ProductPayment::create($data);

		return redirect()->route('list_payment');
	}

    /**
     * Show page from payment with id.
     *
     * @param $id - payment id
     * @return view -> products_payments
     */
    public function show($id){
        $data["productPayment"] = ProductPayment::findOrFail($id);
		return view("payment",$data);

    }

    /**
     * Save new data from new pyment in database.
     *
     * @param id from pyment
     * @return redirect -> list_payent
     */
	public function update($id,Payment $request){
		$payment = ProductPayment::findOrFail($id);

		$data = $request->all();
		$payment->update($data);

		return redirect()->route('list_payment');
	}

    /**
     * Delete payment form database.
     *
     * @param id from payment
     * @return redirect -> list_payment
     */
    public function delete($id,Request $request){
		$payment =ProductPayment::findOrFail($id);
		$payment->delete();
		return redirect()->route('list_payment');
	}

    /**
     * Return a pyment List from database.
     *
     * @return view -> list_payment
     */
    public function list(){
		$data['list'] = ProductPayment::all();
		return view("payment_list",$data);
	}
}
