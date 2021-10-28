<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use Database\Factories\ProductFactory;

class ProductTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_model (){
        $product = Product::factory()->make();
        $this->assertNotNull($product, "A Criação do produto não passou no teste.");

        $this->assertObjectHasAttribute('max_portion',$product, "Parcela maxima não passou no teste");
        $this->assertObjectHasAttribute('billet_value',$product, "Valor do boleto não passou no teste");
        $this->assertObjectHasAttribute('pix_value',$product, "Valor do pix não passou no teste");
        $this->assertObjectHasAttribute('portion_value',$product, "Valor daparcela não passou no teste.");

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_new_product()
    {
        $response = $this->get('/product/new');
        $response->assertStatus(200, "Rota novo produto não pasou no teste.");
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_product()
    {
        $product = Product::firstOrFail();
        $product_id = $product->id;
        $response = $this->get("/product/$product_id");
        $response->assertStatus(200, "Rota exibir produto não passou no teste.");
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_list()
    {
        $response = $this->get('/products');
        $response->assertStatus(200, "Rota list de produtos não passou no teste.");
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_buy()
    {
        $product = Product::firstOrFail();
        $product_id = $product->id;
        $response = $this->get("/buy/$product_id");
        $response->assertStatus(200, "Rota exibi info do produto não passou no teste.");
    }
}
