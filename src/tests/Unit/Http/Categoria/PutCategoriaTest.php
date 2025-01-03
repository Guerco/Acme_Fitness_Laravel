<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Categoria;

use Tests\TestCase;

class PutCategoriaTest extends TestCase
{
    #[Group('http')]
    #[Group('categorias')]
    #[Group('put')]
    public function test_put_categorias_returns_a_successful_response(): void
    {
        $categoria = Categoria::query()->first();
        
        if ( ! $categoria ) {
            $this->markTestSkipped('Não há categorias.');
        }
        
        $response = $this->putJson(
            "/api/categorias/{$categoria->id}" , 
            [
                'nome' => 'Categoria Alterada'
            ]
        );

        $response->assertStatus(200);
    }
}
