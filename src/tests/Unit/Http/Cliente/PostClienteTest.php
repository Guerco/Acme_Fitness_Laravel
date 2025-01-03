<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class PostClienteTest extends TestCase
{
    #[Group('http')]
    #[Group('clientes')]
    #[Group('post')]
    public function test_post_clientes_returns_a_successful_response(): void
    {
        $response = $this->postJson(
            '/api/clientes/' , 
            [
                'nome' => 'Cliente Test' ,
                'cpf' => '000.000.000-00' ,
                'data_nascimento' => '2000-01-01' ,
            ]
        );

        $response->assertStatus(201);
    }
}
