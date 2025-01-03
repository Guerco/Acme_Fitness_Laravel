<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Produto;

use Tests\TestCase;

class PutProdutoTest extends TestCase
{
    #[Group('http')]
    #[Group('produtos')]
    #[Group('put')]
    public function test_put_produtos_returns_a_successful_response(): void
    {
        $produto = Produto::query()->first();
        
        if ( ! $produto ) {
            $this->markTestSkipped('Não há produtos.');
        }
        
        $response = $this->putJson(
            "/api/produtos/{$produto->id}" , 
            [
                'nome' => 'Produto Alterado' ,
                'data_cadastro' => '2010-10-10' ,
            ]
        );

        $response->assertStatus(200);
    }
}
