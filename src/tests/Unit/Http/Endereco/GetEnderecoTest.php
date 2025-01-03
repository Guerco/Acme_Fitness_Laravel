<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class GetEnderecoTest extends TestCase
{
    #[Group('http')]
    #[Group('enderecos')]
    #[Group('get')]
    public function test_get_enderecos_returns_a_successful_response(): void
    {
        $response = $this->get('/api/enderecos/');
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
