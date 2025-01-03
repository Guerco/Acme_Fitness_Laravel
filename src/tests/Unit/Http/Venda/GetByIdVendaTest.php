<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Venda;


use Tests\TestCase;

class GetByIdVendaTest extends TestCase
{
    #[Group('http')]
    #[Group('vendas')]
    #[Group('getId')]
    public function test_get_by_id_vendas_returns_a_successful_response(): void
    {
        $venda = Venda::query()->first();
        
        if ( ! $venda ) {
            $this->markTestSkipped('Não há vendas.');
        }
        
        $response = $this->get("/api/vendas/{$venda->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
