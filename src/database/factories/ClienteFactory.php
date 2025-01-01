<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->name();

        $cpf = $this->faker->cpf();
        
        $data_nascimento = $this->faker->dateTimeBetween('-50 years','now')->format('Y-m-d');

        return [
            'nome' => $nome,
            'cpf' => $cpf,
            'data_nascimento' => $data_nascimento,
        ];
    }
}
