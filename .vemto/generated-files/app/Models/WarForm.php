<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WarForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        'identity_number',
        'identity_type',
        'full_name',
        'gender',
        'birth_of_date',
        'marital_status',
        'spouse_id_number',
        'spouse_id_type',
        'spouse_full_name',
        'phone_1',
        'phone_2',
        'residence_governorate',
        'residential_area',
        'street',
        'address',
        'family_members_count',
        'children_aged_6_18_count',
        'children_under_5_years',
        'number_of_school_students',
        'number_of_university_students',
        'number_of_infants',
        'number_of_people_with_disabilities',
        'number_of_people_with_chronic_diseases',
        'number_of_elderly_over_60',
        'number_of_pregnant_women',
        'number_of_breastfeeding_women',
        'number_of_injured_due_to_war',
        'care_for_non_family_members',
        'reason_for_caring_for_children',
        'number_of_children_cared_for_not_in_family_under_18',
        'relationship_to_family_members_lost_during_war',
        'lost_family_member_during_war',
        'urgent_basic_needs_for_family',
        'secondary_needs_for_family',
        'sources_of_family_income',
        'unable_to_use_land_or_properties_due_to_war',
        'monthly_income_shekels',
        'housing_ownership',
        'type_of_housing',
        'extent_of_housing_damage_due_to_war',
        'displaced_governorate',
        'displaced_due_to_war_and_changed_housing_location',
        'displaced_population_cluster',
        'displaced_street',
        'displaced_place_of_displacement',
        'displaced_address',
        'account_holder_name',
        'bank_name_branch',
        'account_holder_id_number',
        'account_number',
        'agree_to_share_data_for_assistance',
    ];
}
