<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['Credito', 'Debito']);

        return [
            'balance' => $this->faker->randomFloat(2, 0, 10000),
            'category' => ($type == 'Credito') ? $this->faker->randomElement(['Salario', 'Mesada', 'Bônus', 'Emprestimo', 'Investimento', 'Outros']) : $this->faker->randomElement(['Comida', 'Itens diarios', 'Roupas', 'Entretenimento', 'Saude', 'Educação', 'Luz,Agua e Gas', 'Transporte', 'Comunicação', 'Outros']),
            'description' => $this->faker->sentence,
            'dt_cad' => $this->faker->date,
            'type' => $type,
            'id_user' => function () {
                return User::factory()->create()->id;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}