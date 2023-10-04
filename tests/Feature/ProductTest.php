<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_it_returns_an_index_of_products()
    {
        $request = [
            'name' => 'John',
            'description' => 'Doe',
            'price' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('products')->insert($request);
        
        $response = $this->getJson('/');

        $response->assertStatus(200)
        ->assertSee($request);
    }
    public function test_it_stores_product()
    {
        $request = [
            'name' => 'John',
            'description' => 'Doe',
            'price' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $response = $this->postJson('/api/products/create', $request);

        $response->assertStatus(201);
        $this->assertDatabaseCount('products', 1);
    }

    public function test_it_updates_product()
    {
        $request = [
            'id' => 1,
            'name' => 'John',
            'description' => 'Doe',
            'price' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $update = [
            'name' => 'Sally',
            'description' => 'Doe',
            'price' => 11,
        ];

        DB::table('products')->insert($request);

        $response = $this->putJson("/api/products/update/{$request['id']}", $update);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', $update);
    }

    public function test_it_destroy_a_product()
    {
        $request = [
            'id' => 1,
            'name' => 'John',
            'description' => 'Doe',
            'price' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('products')->insert($request);

        $response = $this->deleteJson("/api/products/delete/{$request['id']}");

        $response->assertStatus(204);
        $this->assertDatabaseCount('products', 0);
    }
}
