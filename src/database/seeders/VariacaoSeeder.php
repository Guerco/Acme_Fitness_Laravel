<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Variacao;

class VariacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        
        $produtos = [
            'tenis_amidas' => 1,
            'tenis_mike' => 2,
            'chuteira_pumba' => 3,
            'way' => 4,
            'pulseira' => 5,
            'esteira' => 6,
            'bicicleta' => 7,
            'luva' => 8,
            'faixa' => 9,
            'short' => 10,
            'vasco' => 11,
        ];

        $variacoes = [
            [
                'tamanho' => '40',
                'peso' => null,
                'cor' => 'azul',
                'preco' => '359.99',
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['tenis_amidas'],
            ],
            [
                'tamanho' => '43',
                'peso' => null,
                'cor' => 'vermelho',
                'preco' => '319.99',
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['tenis_amidas'],
            ],
            [
                'tamanho' => '44',
                'peso' => null,
                'cor' => 'azul',
                'preco' => '359.99',
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['tenis_amidas'],
            ],
            [
                'tamanho' => '42',
                'peso' => null,
                'cor' => 'vermelho',
                'preco' => 799.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['tenis_mike'],
            ],
            [
                'tamanho' => '44',
                'peso' => null,
                'cor' => 'azul',
                'preco' => 759.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['tenis_mike'],
            ],
            [
                'tamanho' => '40',
                'peso' =>  null,
                'cor' => 'verde neon',
                'preco' => 200.00,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['chuteira_pumba'],
            ],
            [
                'tamanho' => null,
                'peso' => '1kg',
                'cor' => null,
                'preco' => 105.80,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['way'],
            ],
            [
                'tamanho' => 'unico',
                'peso' => null,
                'cor' => 'preta',
                'preco' => 349.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['pulseira'],
            ],
            [
                'tamanho' => 'unico',
                'peso' => null,
                'cor' => 'azul',
                'preco' => 349.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['pulseira'],
            ],
            [
                'tamanho' => 'unico',
                'peso' => null,
                'cor' => 'cinza',
                'preco' => 349.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['pulseira'],
            ],
            [
                'tamanho' => '1,50x0,70x1,20m',
                'peso' => '80kg',
                'cor' => null,
                'preco' => 2499.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['esteira'],
            ],
            [
                'tamanho' => '1,20mx0,60mx1,20m',
                'peso' => '30kg',
                'cor' => null,
                'preco' => 899.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['bicicleta'],
            ],
            [
                'tamanho' => 'unico',
                'peso' => null,
                'cor' => 'vermelha',
                'preco' => 99.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['luva'],
            ],
            [
                'tamanho' => 'unico',
                'peso' => null,
                'cor' => 'preta',
                'preco' => 87.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['luva'],
            ],
            [
                'tamanho' => 'unico',
                'peso' => null,
                'cor' => 'branca',
                'preco' => 35.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['faixa'],
            ],
            [
                'tamanho' => '40',
                'peso' => null,
                'cor' => 'rosa',
                'preco' => 49.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['short'],
            ],
            [
                'tamanho' => '40',
                'peso' => null,
                'cor' => 'branco',
                'preco' => 49.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['short'],
            ],
            [
                'tamanho' => 'M',
                'peso' => null,
                'cor' => 'Preta',
                'preco' => 249.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['vasco'],
            ],
            [
                'tamanho' => 'GG',
                'peso' => null,
                'cor' => 'Preta',
                'preco' => 279.99,
                'estoque' => $faker->numberBetween(20,50),
                'produto_id' => $produtos['vasco'],
            ],
        ];

        Variacao::insert($variacoes);
    }
}
