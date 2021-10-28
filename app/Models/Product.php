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
        if(isset($this->product_payment->max_portion)){
            $portion = ($this->price_anchor / $this->product_payment->max_portion);
            if($portion>$this->product_payment->min_portion_value){
                return $portion;
            }else{
                return $this->product_payment->min_portion_value;
            }
        }else{
            return 0;
        }
    }

    /**
     * Get the producs pixdiscoint.
     *
     * @return number
     */
    public function getPixValueAttribute(){
        return (isset($this->product_payment->pix_discount))?  ($this->price_anchor * ((100 - $this->product_payment->pix_discount) / 100 )) : $this->price_anchor;
    }

    /**
     * Get the producs billet discount.
     *
     * @return number
     */
    public function getBilletValueAttribute(){
        return (isset($this->product_payment->billet_discount))?  ($this->price_anchor * ((100 - $this->product_payment->billet_discount) / 100 )) : $this->price_anchor;
    }

    /**
     * Get the producs max_portion.
     *
     * @return number
     */
    public function getMaxPortionAttribute(){
        if(isset($this->product_payment->min_portion_value)){
            if($this->portion_value >  $this->product_payment->min_portion_value){
                return $this->portion_value;
            }else{
                return intval($this->price_anchor/ $this->product_payment->min_portion_value) ;
            }
        }else{
            return 0;
        }
    }

}
