<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //tipos de dados que serão enviados parao banco
        return [
            'nome' => fake()->name(),
            'site' => 'http://www.' . $this->faker->domainName(),
            'uf' => $this->faker->stateAbbr(),
            'email' => fake()->email(),
            
        ];
    }
}
