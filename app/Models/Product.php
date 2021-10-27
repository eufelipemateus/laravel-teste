<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'types', 'description','price_anchor','price_promotional','product_payment_id'
    ];


    function product_payment(){
        return $this->belongsTo('App\Models\ProductPayment');
    }

    /**
     * Get the producs Portion value.
     *
     * @return number
     */
    public function getPortionValueAttribute(){
        return ($this->price_anchor/$this->product_payment->max_portion);
    }

    /**
     * Get the producs pixdiscoint.
     *
     * @return number
     */
    public function getPixDiscountAttribute(){
        return    ($this->price_anchor * (($this->product_payment->pix_discount / 100 )+1));
    }

    /**
     * Get the producs billet discount.
     *
     * @return number
     */
    public function getBilletDiscountAttribute(){
        return    ($this->price_anchor * (($this->product_payment->billet_discount / 100 )+1));
    }
}
