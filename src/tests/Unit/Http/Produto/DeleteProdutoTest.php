<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Produto;


use Tests\TestCase;

class DeleteProdutoTest extends TestCase
{
    #[Group('http')]
    #[Group('produtos')]
    #[Group('delete')]
    public function test_delete_produtos_returns_a_successful_response(): void
    {
        $produto = Produto::query()->first();
        
        if ( ! $produto ) {
            $this->markTestSkipped('Não há produtos.');
        }
        
        $response = $this->delete("/api/produtos/{$produto->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
