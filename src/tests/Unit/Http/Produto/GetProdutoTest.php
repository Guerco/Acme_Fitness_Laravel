<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class GetProdutoTest extends TestCase
{
    #[Group('http')]
    #[Group('produtos')]
    #[Group('get')]
    public function test_get_produtos_returns_a_successful_response(): void
    {
        $response = $this->get('/api/produtos/');
 
        // $response->dump(); // Imprime as entidades retornadas
 
        $response->assertStatus(200);
    }
}
