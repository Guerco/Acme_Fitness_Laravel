<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Venda;


use Tests\TestCase;

class DeleteVendaTest extends TestCase
{
    #[Group('http')]
    #[Group('vendas')]
    #[Group('delete')]
    public function test_delete_vendas_returns_a_successful_response(): void
    {
        $venda = Venda::query()->first();
        
        if ( ! $venda ) {
            $this->markTestSkipped('Não há vendas.');
        }
        
        $response = $this->delete("/api/vendas/{$venda->id}");
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
