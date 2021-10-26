<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPayment;

class PaymentController extends Controller
{
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
	public function update($id,Request $request){
		$payment = ProductPayment::findOrFail($id);

		$this->validate($request, [
			'name' => 'required|string',
            'max_portion'=> 'required|number|max:36',
            'pix_discount'=> 'required|number|min:0|max:100',
            'billet_discount'=>'required|number|min:0|max:100',
            'min_portion_value'=>'required|number'
		]);

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
		$data['list'] = IPTVCdn::all();
		return view("list_payment",$data);
	}
}
