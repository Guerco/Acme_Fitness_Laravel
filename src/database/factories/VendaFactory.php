<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Cliente;
use \App\Models\Endereco;
use \App\Models\Variacao;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venda>
 */
class VendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $valor_frete = 10.00;
        
        $forma_pagamentp = $this->faker->randomElement(['PIX', 'Boleto', 'Cartão (1x)']);


        $cliente_id = Cliente::query()
                        ->inRandomOrder()
                        ->value('id');
        
        $endereco_id = Endereco::query()
                        ->inRandomOrder()
                        ->value('id');
        
        return [
            'valor_frete' => $valor_frete,
            'forma_pagamento' => $forma_pagamentp,
            'cliente_id'=> $cliente_id,
            'endereco_Id'=> $endereco_id,
        ];
    }

    public function configure() {
        return $this->afterMaking(
            function ( $venda ) {
                $total_variacoes = $this->faker->numberBetween(1, 3);

                $valor_total = 0;

                $variacoes = [];
                
                for ($i = 0; $i < $total_variacoes; $i++) {
                    $variacao = Variacao::inRandomOrder()->first();
                    $quantidade = $this->faker->numberBetween(1, 3);

                    $valor_total += ($variacao->preco * $quantidade);

                    $variacoes [] = [
                        'variacao_id' => $variacao->id,
                        'quantidade' => $quantidade,
                    ];
                }

                $desconto = $this->faker->randomFloat(1, 0, 0.5) * $valor_total; // Desconto no valor total
                $venda->descontos = $desconto;

                $venda->valor_total = $valor_total + $venda->valor_frete - $desconto;
                $venda->save();

                foreach( $variacoes as $v ) {
                    $venda->variacoes()->attach(
                        $v['variacao_id'],
                        [
                            'quantidade' => $v['quantidade']
                        ],
                    );
                }
            }

        );
    }
}
