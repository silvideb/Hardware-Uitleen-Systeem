<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\loans>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'user_id' => \App\Models\User::factory(),
            'hardware_item_id' => \App\Models\Hardware_item::factory(),        
            'due_date' => $this->faker->date(),
            'start_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['active', 'returned', 'overdue']),
        ];
    }
}
