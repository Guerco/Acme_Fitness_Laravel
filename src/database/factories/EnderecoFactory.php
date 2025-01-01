<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $logradouro = $this->faker->streetName();
        
        $cidade = $this->faker->city();
        
        $bairro = $this->faker->city();
        
        $numero = $this->faker->numberBetween(10,999);

        $cep = $this->faker->regexify('/^\d{5}\-\d{3}$/');

        
        
        $tem_complemento = $this->faker->numberBetween(-5, 10) < 0;
        
        if ( $tem_complemento ) {
            $complemento = $this->faker->randomElement(
                [
                    'Bloco ' . $this->faker->randomLetter(),
                    'Rua ' . $this->faker->numberBetween(1, 10),
                    'Apto ' . $this->faker->regexify('[1-2]?[0-9][0-2][0-9]'),
                ]
            );
        }

        return [
            'logradouro' => $logradouro,
            'cidade' => $cidade,
            'bairro' => $bairro,
            'numero' => $numero,
            'cep' => $cep,
            'complemento' => $complemento ?? null,
        ];
        
    }
}
