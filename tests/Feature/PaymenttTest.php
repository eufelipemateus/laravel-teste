<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ProductPayment;

class PaymenttTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_new_payment()
    {
        $response = $this->get('/payment/new');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_payment()
    {
        $payment = ProductPayment::firstOrFail();
        $payment_id = $payment->id;
        $response = $this->get("/payment/$payment_id");
        $response->assertStatus(200);
    }
}
