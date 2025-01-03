<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Variacao;


use Tests\TestCase;

class GetByIdVariacaoTest extends TestCase
{
    #[Group('http')]
    #[Group('variacoes')]
    #[Group('getId')]
    public function test_get_by_id_variacoes_returns_a_successful_response(): void
    {
        $variacao = Variacao::query()->first();
        
        if ( ! $variacao ) {
            $this->markTestSkipped('Não há variacoes.');
        }
        
        $response = $this->get("/api/variacoes/{$variacao->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
