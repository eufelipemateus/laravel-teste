<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPayment;
use App\Models\Product;
use App\Http\Requests\Product as ProductRequest;

class ProductController extends Controller
{

    /**
     * Show new product page.
     *
     * @return view -> product
     */
	public function new(){
        $data['productPayments'] = ProductPayment::all();
		return view("product", $data);
	}

    /**
     * Save new data from new product in database.
     *
     * @return redirect -> list_product
     */
    public function create(ProductRequest $request){

		$data = $request->all();
		Product::create($data);

		return redirect()->route('list_product');
	}

    /**
     * Show page from product with id.
     *
     * @param $id - product id
     * @return view -> product
     */
	public function show($id){
		$data["product"] = Product::findOrFail($id);
        $data['productPayments'] = ProductPayment::all();
		return view("product",$data);
	}

    /**
     * Save stroe data from nproduct in database.
     *
     * @param id from product
     * @return redirect -> list_product
     */
	public function update($id,ProductRequest $request){
		$product = Product::findOrFail($id);


		$data = $request->all();
		$product->update($data);

		return redirect()->route('list_product');
	}

    /**
     * Delete product form database.
     *
     * @param id from product
     * @return redirect -> list_product
     */
    public function delete($id,Request $request){
		$product = Product::findOrFail($id);
		$product->delete();
		return redirect()->route('list_product');
	}

    /**
     * Return a product List from database.
     *
     * @return view ->  list_product
     */
    public function list(){
		$data['list'] = Product::all();
		return view("product_list",$data);
	}

}
