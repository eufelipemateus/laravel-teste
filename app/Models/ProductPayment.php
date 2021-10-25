<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'max_portion', 'pix_discount','billet_discount','min_portion_value'
    ];


    /**
     * Get the prfoduct  associated with paymetn.
     */
    public function product()
    {
        return $this->hasOne('App\Models\ProductPayment');
    }

}
