<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Endereco;


use Tests\TestCase;

class GetByIdEnderecoTest extends TestCase
{
    #[Group('http')]
    #[Group('enderecos')]
    #[Group('getId')]
    public function test_get_by_id_enderecos_returns_a_successful_response(): void
    {
        $endereco = Endereco::query()->first();
        
        if ( ! $endereco ) {
            $this->markTestSkipped('Não há enderecos.');
        }
        
        $response = $this->get("/api/enderecos/{$endereco->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
