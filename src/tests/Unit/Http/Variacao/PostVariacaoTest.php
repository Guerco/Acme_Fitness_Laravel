<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Produto;

use Tests\TestCase;

class PostVariacaoTest extends TestCase
{
    #[Group('http')]
    #[Group('variacoes')]
    #[Group('post')]
    public function test_post_variacoes_returns_a_successful_response(): void
    {
        $produto = Produto::query()->first();
        
        if ( ! $produto ) {
            $this->markTestSkipped('Não há produtos para variações.');
        } 

        $response = $this->postJson(
            '/api/variacoes/' , 
            [
                'preco' => 100.00 ,
                'estoque' => 10 ,
                'produto' => [
                    'id' => $produto->id
                ] ,
            ]
        );

        $response->assertStatus(201);
    }
}
