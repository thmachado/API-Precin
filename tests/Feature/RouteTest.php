<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_token(){
        $response = $this->get("/token");

        $response->assertStatus(200);
    }

    public function test_index(){
        $response = $this->get("/products");

        $response->assertStatus(200);
    }

    public function test_store(){
        $response = $this->post("/products", [
            "name" => "Test product",
            "category" => "Test category",
            "price" => 300,
            "discount" => 300,
            "image" => "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png",
            "url" => "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png"
        ]);

        $response->assertStatus(200);
    }

    public function test_show(){
        $response = $this->get("/products/1");

        $response->assertStatus(200);
    }

    public function test_update(){
        $response = $this->put("/products/1", [
            "price" => 300,
            "discount" => 800
        ]);

        $response->assertStatus(200);
    }

    // public function test_delete(){
    //     $response = $this->delete("/products/1");

    //     $response->assertStatus(200);
    // }
}