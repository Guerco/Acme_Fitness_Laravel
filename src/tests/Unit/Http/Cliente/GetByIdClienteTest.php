<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Cliente;


use Tests\TestCase;

class GetByIdClienteTest extends TestCase
{
    #[Group('http')]
    #[Group('clientes')]
    #[Group('getId')]
    public function test_get_by_id_clientes_returns_a_successful_response(): void
    {
        $cliente = Cliente::query()->first();
        
        if ( ! $cliente ) {
            $this->markTestSkipped('Não há clientes.');
        }
        
        $response = $this->get("/api/clientes/{$cliente->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
