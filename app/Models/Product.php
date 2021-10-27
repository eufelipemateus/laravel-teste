<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private $default_max_portion = 36;

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
        return ($this->price_anchor/$this->max_portion);
    }

    /**
     * Get the producs pixdiscoint.
     *
     * @return number
     */
    public function getPixValueAttribute(){
        return (isset($this->product_payment->pix_discount))?  ($this->price_anchor * (($this->product_payment->pix_discount / 100 )+1)) : $this->price_anchor;
    }

    /**
     * Get the producs billet discount.
     *
     * @return number
     */
    public function getBilletValueAttribute(){
        return  (isset($this->product_payment->billet_discount))? ($this->price_anchor * (($this->product_payment->billet_discount / 100 )+1)) :  $this->price_anchor;
    }

    /**
     * Get the producs max_portion.
     *
     * @return number
     */
    public function getMaxPortionAttribute(){
        return   (isset($this->product_payment->max_portion))? $this->product_payment->max_portion : $this->default_max_portion;
    }

}
