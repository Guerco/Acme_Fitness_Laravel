<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Cliente;


use Tests\TestCase;

class DeleteClienteTest extends TestCase
{
    #[Group('http')]
    #[Group('clientes')]
    #[Group('delete')]
    public function test_delete_clientes_returns_a_successful_response(): void
    {
        $cliente = Cliente::query()->first();
        
        if ( ! $cliente ) {
            $this->markTestSkipped('Não há clientes.');
        }
        
        $response = $this->delete("/api/clientes/{$cliente->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
