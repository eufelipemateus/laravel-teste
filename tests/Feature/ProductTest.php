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
        $this->assertNotNull($product, "A Creiação do produto não passou no teste.");
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
}
