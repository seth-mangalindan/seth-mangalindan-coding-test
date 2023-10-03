<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Http\Controllers\Api\ProductController;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use RefreshDatabase;
    /**\
        * @test
        */
    public function test_it_returns_all_data()
    {
       
        //A productController::index() needs only to return to view data

        $request = [
            'name' => 'example',
            'description' => 'exampleDesc',
            'price' => 14
        ];
        //arrange

        //act
        $response = $this->get('/');

        //assert

        $response
        ->assertStatus(200)
        ->assertViewIs('')
        ->assertSee([
            'name' => 'example',
            'description' => 'exampleDesc',
            'price' => 14
        ]);
    }
}
