<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_cart_item_when_user_isnot_login()
    {
        $response = $this->get('/carts/get');
        if($response === null){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }

        // $response->assertStatus(200);
    }

    public function test_add_cart_item_when_user_isnot_login()
    {
        $response = $this->get('carts/add');
        $response->assertStatus(403);
    }
}
