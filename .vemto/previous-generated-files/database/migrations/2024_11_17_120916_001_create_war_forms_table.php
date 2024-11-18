<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_forms', function (Blueprint $table) {
            $table->id();
            $table->string('identity_number');
            $table->string('identity_type');
            $table->string('full_name');
            $table->string('gender');
            $table->date('birth_of_date');
            $table->string('marital_status');
            $table->string('spouse_id_number')->nullable();
            $table->string('spouse_id_type')->nullable();
            $table->string('spouse_full_name')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('residence_governorate')->nullable();
            $table->string('residential_area')->nullable();
            $table->string('street')->nullable();
            $table->string('address')->nullable();
            $table->integer('family_members_count')->nullable();
            $table
                ->integer('children_aged_6_18_count')
                ->default(0)
                ->nullable();
            $table
                ->integer('children_under_5_years')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_school_students')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_university_students')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_infants')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_people_with_disabilities')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_people_with_chronic_diseases')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_elderly_over_60')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_pregnant_women')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_breastfeeding_women')
                ->default(0)
                ->nullable();
            $table
                ->integer('number_of_injured_due_to_war')
                ->default(0)
                ->nullable();
            $table
                ->string('care_for_non_family_members')
                ->default('0')
                ->nullable();
            $table
                ->integer('number_of_children_cared_for_not_in_family_under_18')
                ->default(0)
                ->nullable();
            $table->string('reason_for_caring_for_children')->nullable();
            $table->string('lost_family_member_during_war')->nullable();
            $table
                ->string('relationship_to_family_members_lost_during_war')
                ->nullable();
            $table->string('urgent_basic_needs_for_family')->nullable();
            $table->string('secondary_needs_for_family')->nullable();
            $table->string('sources_of_family_income')->nullable();
            $table->decimal('monthly_income_shekels')->nullable();
            $table
                ->string('unable_to_use_land_or_properties_due_to_war')
                ->nullable();
            $table->string('housing_ownership')->nullable();
            $table->string('type_of_housing')->nullable();
            $table->string('extent_of_housing_damage_due_to_war')->nullable();
            $table
                ->string('displaced_due_to_war_and_changed_housing_location')
                ->nullable();
            $table->string('displaced_governorate')->nullable();
            $table->string('displaced_population_cluster')->nullable();
            $table->string('displaced_street')->nullable();
            $table->string('displaced_address')->nullable();
            $table->string('displaced_place_of_displacement')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('bank_name_branch')->nullable();
            $table->string('account_holder_id_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('agree_to_share_data_for_assistance')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('war_forms');
    }
};
