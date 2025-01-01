<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nome' => 'Calçados',
                'descricao' => 'Tênis e sapatos esportivos e para realização de exercícios.'
            ],
            [
                'nome' => 'Suplementos',
                'descricao' => 'Produtos de suplementação nutricional e potencialização de performance.'
            ],
            [
                'nome' => 'Eletrônicos',
                'descricao' => 'Dispositivos tecnológicos para rotina e monitoramento de performance.'
            ],
            [
                'nome' => 'Aparelhos de treinamento',
                'descricao' => 'Equipamentos  para realização de exercícios.'
            ],
            [
                'nome' => 'Equipamentos',
                'descricao' => 'Equipamentos para auxiliar suas atividades.'
            ],
            [
                'nome' => 'Moda',
                'descricao' => 'Vestuário para treinamento e dia-a-dia.'
            ]
        ];

        Categoria::insert( $categorias );
        
    }
}
