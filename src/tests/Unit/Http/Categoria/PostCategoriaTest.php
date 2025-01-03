<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class PostCategoriaTest extends TestCase
{
    #[Group('http')]
    #[Group('categorias')]
    #[Group('post')]
    public function test_post_categorias_returns_a_successful_response(): void
    {
        $response = $this->postJson(
            '/api/categorias/' , 
            [
                'nome' => 'Categoria Test'
            ]
        );

        $response->assertStatus(201);
    }
}
