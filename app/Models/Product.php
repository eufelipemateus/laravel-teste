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
}
