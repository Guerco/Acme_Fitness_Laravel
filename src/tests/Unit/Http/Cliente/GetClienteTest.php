<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class GetClienteTest extends TestCase
{
    #[Group('http')]
    #[Group('clientes')]
    #[Group('get')]
    public function test_get_clientes_returns_a_successful_response(): void
    {
        $response = $this->get('/api/clientes/');
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
