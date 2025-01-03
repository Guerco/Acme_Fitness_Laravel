<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Variacao;


use Tests\TestCase;

class DeleteVariacaoTest extends TestCase
{
    #[Group('http')]
    #[Group('variacoes')]
    #[Group('delete')]
    public function test_delete_variacoes_returns_a_successful_response(): void
    {
        $variacao = Variacao::query()->first();
        
        if ( ! $variacao ) {
            $this->markTestSkipped('Não há variacoes.');
        }
        
        $response = $this->delete("/api/variacoes/{$variacao->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
