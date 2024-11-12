<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\OfflineAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfflineAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OfflineAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank_name' => fake()->word(),
            'swift_code' => fake()->word(),
            'iban' => fake()->word(),
            'beneficiary' => fake()->word(),
            'deleted_at' => fake()->dateTime(),
            'program_id' => \App\Models\Program::factory(),
        ];
    }
}
