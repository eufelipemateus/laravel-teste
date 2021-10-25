<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\ProductPayment;

class ProductPayments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductPayment::create([
            'name'=>"Trabalhos acadêmicos",
            'max_portion'=>3,
            'pix_discount'=>0,
            'billet_discount'=>0,
            'min_portion_value'=>50
        ]);

        ProductPayment::create([
            'name'=>"Cursos",
            'max_portion'=>12,
            'pix_discount'=>15,
            'billet_discount'=>5,
            'min_portion_value'=>50
        ]);
    }
}
