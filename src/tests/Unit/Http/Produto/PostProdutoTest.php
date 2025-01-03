<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Categoria;

use Tests\TestCase;

class PostProdutoTest extends TestCase
{
    #[Group('http')]
    #[Group('produtos')]
    #[Group('post')]
    public function test_post_produtos_returns_a_successful_response(): void
    {
        $categoria = Categoria::query()->first();
        
        if ( ! $categoria ) {
            $this->markTestSkipped('Não há categorias para produtos.');
        } 

        $response = $this->postJson(
            '/api/produtos/' , 
            [
                'nome' => 'Produto Test' ,
                'data_cadastro' => '2000-01-01' ,
                'categoria' => [
                    'id' => $categoria->id
                ] ,
            ]
        );

        $response->assertStatus(201);
    }
}
