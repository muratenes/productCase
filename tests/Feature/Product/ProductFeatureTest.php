<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testProductsStructure(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'status',
                'products',
            ]
        ]);
    }
}
