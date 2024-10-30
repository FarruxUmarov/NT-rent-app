<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ads>
 */
class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => User::factory()->create()->id,
            'status_id' => Status::factory()->create()->id,
            'branch_id' => Branch::factory()->create()->id,
            'address' => $this->faker->address(),
            'price' => $this->faker->numberBetween(35, 200),
            'rooms' => $this->faker->numberBetween(1, 4),
        ];
    }
}
