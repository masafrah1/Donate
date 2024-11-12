<?php

namespace Database\Factories;

use App\Models\Leader;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leader::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donor_type' => fake()->word(),
            'first_name' => fake()->firstName(),
            'father_name' => fake()->word(),
            'grand_father_name' => fake()->word(),
            'family_name' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()
                ->unique()
                ->safeEmail(),
            'currency' => fake()->currencyCode(),
            'amount' => fake()->word(),
            'country' => fake()->country(),
            'number_orphans' => fake()->word(),
            'payment_method' => fake()->word(),
            'is_private' => fake()->word(),
            'deleted_at' => fake()->dateTime(),
            'company_name' => fake()->word(),
            'program_id' => \App\Models\Program::factory(),
        ];
    }
}
