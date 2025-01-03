<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class GetVendaTest extends TestCase
{
    #[Group('http')]
    #[Group('vendas')]
    #[Group('get')]
    public function test_get_vendas_returns_a_successful_response(): void
    {
        $response = $this->get('/api/vendas/');
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
