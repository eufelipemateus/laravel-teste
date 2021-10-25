<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_payments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("max_portion"); // max parcelas..
            $table->integer("pix_discount"); // porcentagem disconto
            $table->integer("billet_discount"); // porcentage disconto
            $table->double("min_portion_value"); // vlaor minimo parcela
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_payments');
    }
}
