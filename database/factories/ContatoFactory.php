<?php

namespace Database\Factories;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contato>
 */
class ContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->tollFreePhoneNumber(),
            'email' => fake()->email(),
            'motivo_contato' => fake()->numberBetween(1,3),
            'mensagem' => fake()->text(200),
        ];
    }
}
