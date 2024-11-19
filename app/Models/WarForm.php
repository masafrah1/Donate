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
        'identity_number', //required
        'identity_type', //required
        'full_name', //required
        'gender', //required
        'birth_of_date',    //required
        'marital_status', //required
        'spouse_id_number', //required
        'spouse_id_type', //required
        'spouse_full_name', //required
        'phone_1',  //required
        'phone_2',
        'residence_governorate', //required
        'residential_area', //required
        'street',
        'address',
        'family_members_count', //required
        'children_aged_6_18_count', //required
        'children_under_5_years', //required
        'number_of_school_students', //required
        'number_of_university_students', //required
        'number_of_infants', //required
        'number_of_people_with_disabilities', //required
        'number_of_people_with_chronic_diseases', //required
        'number_of_elderly_over_60', //required
        'number_of_pregnant_women', //required
        'number_of_breastfeeding_women', //required
        'number_of_injured_due_to_war', //required
        'care_for_non_family_members', //required
        'reason_for_caring_for_children',
        'number_of_children_cared_for_not_in_family_under_18', //required
        'relationship_to_family_members_lost_during_war', //required, array
        'lost_family_member_during_war',
        'urgent_basic_needs_for_family', //required, array
        'secondary_needs_for_family', //array
        'sources_of_family_income', //array
        'unable_to_use_land_or_properties_due_to_war',
        'monthly_income_shekels',
        'housing_ownership', //required
        'type_of_housing', //required
        'extent_of_housing_damage_due_to_war', //required
        'displaced_governorate', //required
        'displaced_due_to_war_and_changed_housing_location', //required
        'displaced_population_cluster',
        'displaced_street',
        'displaced_place_of_displacement', //required
        'displaced_address',
        'account_holder_name',
        'bank_name_branch',
        'account_holder_id_number',
        'account_number',
        'agree_to_share_data_for_assistance', //required
    ];
}
