<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Categoria;


use Tests\TestCase;

class DeleteCategoriaTest extends TestCase
{
    #[Group('http')]
    #[Group('categorias')]
    #[Group('delete')]
    public function test_delete_categorias_returns_a_successful_response(): void
    {
        $categoria = Categoria::query()->first();
        
        if ( ! $categoria ) {
            $this->markTestSkipped('Não há categorias.');
        }
        
        $response = $this->delete("/api/categorias/{$categoria->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
