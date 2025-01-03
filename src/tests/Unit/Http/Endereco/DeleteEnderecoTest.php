<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Endereco;


use Tests\TestCase;

class DeleteEnderecoTest extends TestCase
{
    #[Group('http')]
    #[Group('enderecos')]
    #[Group('delete')]
    public function test_delete_enderecos_returns_a_successful_response(): void
    {
        $endereco = Endereco::query()->first();
        
        if ( ! $endereco ) {
            $this->markTestSkipped('Não há enderecos.');
        }
        
        $response = $this->delete("/api/enderecos/{$endereco->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
