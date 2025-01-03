<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class PostEnderecoTest extends TestCase
{
    #[Group('http')]
    #[Group('enderecos')]
    #[Group('post')]
    public function test_post_enderecos_returns_a_successful_response(): void
    {
        $response = $this->postJson(
            '/api/enderecos/' , 
            [
                'logradouro' => 'Logradouro Test' ,
                'cidade' => 'Cidade Test' ,
                'bairro' => 'Bairro Test' ,
                'numero' => '50' ,
                'cep' => '00000-000' ,
            ]
        );

        $response->assertStatus(201);
    }
}
