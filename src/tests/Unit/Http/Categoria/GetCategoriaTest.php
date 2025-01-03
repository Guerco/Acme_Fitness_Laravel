<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class GetCategoriaTest extends TestCase
{
    #[Group('http')]
    #[Group('categorias')]
    #[Group('get')]
    public function test_get_categorias_returns_a_successful_response(): void
    {
        $response = $this->get('/api/categorias/');
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
