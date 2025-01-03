<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Categoria;


use Tests\TestCase;

class GetByIdCategoriaTest extends TestCase
{
    #[Group('http')]
    #[Group('categorias')]
    #[Group('getId')]
    public function test_get_by_id_categorias_returns_a_successful_response(): void
    {
        $categoria = Categoria::query()->first();
        
        if ( ! $categoria ) {
            $this->markTestSkipped('Não há categorias.');
        }
        
        $response = $this->get("/api/categorias/{$categoria->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
