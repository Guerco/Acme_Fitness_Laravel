<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Cliente;

use Tests\TestCase;

class PutClienteTest extends TestCase
{
    #[Group('http')]
    #[Group('clientes')]
    #[Group('put')]
    public function test_put_clientes_returns_a_successful_response(): void
    {
        $cliente = Cliente::query()->first();
        
        if ( ! $cliente ) {
            $this->markTestSkipped('Não há clientes.');
        }
        
        $response = $this->putJson(
            "/api/clientes/{$cliente->id}" , 
            [
                'nome' => 'Cliente Alterado' ,
                'cpf' => '111.111.111-11' ,
                'data_nascimento' => '2010-10-10' ,
            ]
        );

        $response->assertStatus(200);
    }
}
