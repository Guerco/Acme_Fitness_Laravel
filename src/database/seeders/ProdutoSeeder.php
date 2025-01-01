<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $categorias = [
            'calcados' => 1,
            'suplementos' => 2,
            'eletronicos' => 3,
            'aparelhos' => 4,
            'equipamentos' => 5,
            'moda' => 6,
        ];

        $dataMinima = '2020-01-01';
        
        $produtos = [
            [
                'nome' => 'Tênis Amidas 3000',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Tênis de corrida de alta performance para maratonas.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['calcados'],
            ],
            [
                'nome' => 'Tênis Mike Air Jumper',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Tênis de basquete estiloso e confortável.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['calcados'],
            ],
            [
                'nome' => 'Chuteira Pumba Confort+',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Chuteira de campo com travas de aluminio.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['calcados'],
            ],
            [
                'nome' => 'Way proteina sabor baunilha',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Suplemento nutricional para complementação alimentar.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['suplementos'],
            ],
            [
                'nome' => 'Pulseira inteligente a+fit',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Pulseira eletrõnica para monitoramento de saúde e performance.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['eletronicos'],
            ],
            [
                'nome' => 'Esteira Rotativa MegaFit 667',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Esteira para caminhada e corrida.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['aparelhos'],
            ],
            [
                'nome' => 'Bicicleta Ergométrica Caloyo',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Bicicleta fixa para treinamento de pedalada.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['aparelhos'],
            ],
            [
                'nome' => 'Luva de Boxe Kangurooz',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Luva para proteção das mãos na prática de boxe.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['equipamentos'],
            ],
            [
                'nome' => 'Faixa de cabelo',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Acessório para segurar os cabelos na prática de esportes.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['equipamentos'],
            ],
            [
                'moda' => 'Shorts Asyx Confort Fresh',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Shorts confortável com tecnologia anti suor.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['moda'],
            ],
            [
                'moda' => 'Camisa do Vascão',
                'imagem_path' => $faker->url() . '.jpg',
                'descricao' => 'Camisa do Gigantesco da Colina.',
                'data_cadastro' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d'),
                'categoria_id' => $categorias['moda'],
            ],
        ];

        Produto::insert($produtos);
    }
}
