<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_it_returns_get_request()
    {
        $this->withoutExceptionHandling();
        $response = $this->getJson('/');

        $response->assertStatus(200)
         ->assertJsonStructure([
             '*' => [
                 'name',
                 'description',
                 'price',
                 'created_at',
                 'updated_at',
             ]
             ]);
            }
}
