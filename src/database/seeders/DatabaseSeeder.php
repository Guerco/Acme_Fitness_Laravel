<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CategoriaSeeder::class);
        // $this->call(ProdutoSeeder::class);
        // $this->call(VariacaoSeeder::class);
        // $this->call(ClienteSeeder::class);
        // $this->call(EnderecoSeeder::class);
        $this->call(VendaSeeder::class);
    }
}
