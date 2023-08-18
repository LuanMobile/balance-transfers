<?php

namespace Database\Factories;

use App\Models\Saldos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Saldos>
 */
class SaldosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $table = 'saldos';
    protected $model = Saldos::class;
    
    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'currency' => 'BRL',
        ];
    }
}
