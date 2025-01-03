<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Produto;


use Tests\TestCase;

class GetByIdProdutoTest extends TestCase
{
    #[Group('http')]
    #[Group('produtos')]
    #[Group('getId')]
    public function test_get_by_id_produtos_returns_a_successful_response(): void
    {
        $produto = Produto::query()->first();
        
        if ( ! $produto ) {
            $this->markTestSkipped('Não há produtos.');
        }
        
        $response = $this->get("/api/produtos/{$produto->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
