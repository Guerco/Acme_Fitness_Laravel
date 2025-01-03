<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Variacao;

use Tests\TestCase;

class PostVendaTest extends TestCase
{
    #[Group('http')]
    #[Group('vendas')]
    #[Group('post')]
    public function test_post_vendas_returns_a_successful_response(): void
    {
        $cliente = Cliente::query()->first();
        $endereco = Endereco::query()->first();
        $variacao = Variacao::query()->first();

        if ( ! $variacao ) {
            $this->markTestSkipped('Não há variações para venda.');
        } 
        if ( ! $cliente ) {
            $cliente = Cliente::factory()->create();
        }
        if ( ! $endereco ) {
            $endereco= Endereco::factory()->create();
        } 

        $response = $this->postJson(
            '/api/vendas/' , 
            [
                'forma_pagamento' => 'PIX' ,
                'cliente' => [
                    'id' => $cliente->id
                ] ,
                'endereco' => [
                    'id' => $endereco->id
                ] ,
                'variacoes' => [
                    [
                        'variacao' => [
                            'id' => $variacao->id
                        ] ,
                        'quantidade' => 1
                    ]
                ]
            ]
        );

        $response->assertStatus(201);
    }
}
