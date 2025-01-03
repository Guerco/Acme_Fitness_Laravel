<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Endereco;

use Tests\TestCase;

class PutEnderecoTest extends TestCase
{
    #[Group('http')]
    #[Group('enderecos')]
    #[Group('put')]
    public function test_put_enderecos_returns_a_successful_response(): void
    {
        $endereco = Endereco::query()->first();
        
        if ( ! $endereco ) {
            $this->markTestSkipped('Não há enderecos.');
        }
        
        $response = $this->putJson(
            "/api/enderecos/{$endereco->id}" , 
            [
                'logradouro' => 'Logradouro Alterado' ,
                'cidade' => 'Cidade Alterada' ,
                'bairro' => 'Bairro Alterado' ,
                'numero' => '10' ,
                'cep' => '11111-111' ,
            ]
        );

        $response->assertStatus(200);
    }
}
