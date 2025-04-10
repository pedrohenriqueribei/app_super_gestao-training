<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = SiteContato::class;

    public function definition(): array
    {
        return [
            //
            'nome' => $this->faker->name,
            'telefone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'motivo_contato' => $this->faker->randomElement([1, 2, 3]),
            'mensagem' => $this->faker->sentence

        ];
    }
}
