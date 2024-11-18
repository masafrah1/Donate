<?php

namespace Database\Factories;

use App\Models\WarForm;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WarForm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identity_number' => fake()->word(),
            'identity_type' => fake()->word(),
            'full_name' => fake()->word(),
            'gender' => fake()->word(),
            'birth_of_date' => fake()->date(),
            'marital_status' => fake()->word(),
            'spouse_id_number' => fake()->word(),
            'spouse_id_type' => fake()->word(),
            'spouse_full_name' => fake()->word(),
            'phone_1' => fake()->phoneNumber(),
            'phone_2' => fake()->phoneNumber(),
            'residence_governorate' => fake()->word(),
            'residential_area' => fake()->word(),
            'street' => fake()->streetName(),
            'address' => fake()->address(),
            'family_members_count' => fake()->word(),
            'children_aged_6_18_count' => fake()->word(),
            'children_under_5_years' => fake()->word(),
            'number_of_school_students' => fake()->word(),
            'number_of_university_students' => fake()->word(),
            'number_of_infants' => fake()->word(),
            'number_of_people_with_disabilities' => fake()->word(),
            'number_of_people_with_chronic_diseases' => fake()->word(),
            'number_of_elderly_over_60' => fake()->word(),
            'number_of_pregnant_women' => fake()->word(),
            'number_of_breastfeeding_women' => fake()->word(),
            'number_of_injured_due_to_war' => fake()->word(),
            'care_for_non_family_members' => fake()->word(),
            'number_of_children_cared_for_not_in_family_under_18' => fake()->word(),
            'reason_for_caring_for_children' => fake()->word(),
            'lost_family_member_during_war' => fake()->word(),
            'relationship_to_family_members_lost_during_war' => fake()->word(),
            'urgent_basic_needs_for_family' => fake()->word(),
            'secondary_needs_for_family' => fake()->word(),
            'sources_of_family_income' => fake()->word(),
            'monthly_income_shekels' => fake()->word(),
            'unable_to_use_land_or_properties_due_to_war' => fake()->word(),
            'housing_ownership' => fake()->word(),
            'type_of_housing' => fake()->word(),
            'extent_of_housing_damage_due_to_war' => fake()->word(),
            'displaced_due_to_war_and_changed_housing_location' => fake()->word(),
            'displaced_governorate' => fake()->word(),
            'displaced_population_cluster' => fake()->word(),
            'displaced_street' => fake()->word(),
            'displaced_address' => fake()->word(),
            'displaced_place_of_displacement' => fake()->word(),
            'account_holder_name' => fake()->word(),
            'bank_name_branch' => fake()->word(),
            'account_holder_id_number' => fake()->word(),
            'account_number' => fake()->word(),
            'agree_to_share_data_for_assistance' => fake()->word(),
            'deleted_at' => fake()->dateTime(),
        ];
    }
}
