<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Variacao;

use Tests\TestCase;

class PutVariacaoTest extends TestCase
{
    #[Group('http')]
    #[Group('variacaos')]
    #[Group('put')]
    public function test_put_variacoes_returns_a_successful_response(): void
    {
        $variacao = Variacao::query()->first();
        
        if ( ! $variacao ) {
            $this->markTestSkipped('Não há variacoes.');
        }
        
        $response = $this->putJson(
            "/api/variacoes/{$variacao->id}" , 
            [
                'preco' => 300.00 ,
                'estoque' => 20 ,
            ]
        );

        $response->assertStatus(200);
    }
}
