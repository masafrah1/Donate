<?php

namespace App\Http\Controllers;

use App\Models\WarForm;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.warform');
    }

    public function store(Request $request)
    {
        // Define custom validation messages in Arabic
        $messages = [
            'identity_number.required' => 'رقم الهوية مطلوب.',
            'identity_number.string' => 'رقم الهوية يجب أن يكون نصًا.',
            'identity_type.string' => 'نوع الهوية يجب أن يكون نصًا.',
            'full_name.string' => 'الاسم الكامل يجب أن يكون نصًا.',
            'gender.string' => 'الجنس يجب أن يكون نصًا.',
            'birth_of_date.date' => 'تاريخ الميلاد يجب أن يكون تاريخًا صالحًا.',
            'marital_status.string' => 'الحالة الاجتماعية يجب أن تكون نصًا.',
            'spouse_id_number.string' => 'رقم هوية الزوج يجب أن يكون نصًا.',
            'spouse_id_type.string' => 'نوع هوية الزوج يجب أن يكون نصًا.',
            'spouse_full_name.string' => 'الاسم الكامل للزوج يجب أن يكون نصًا.',
            'phone_1.string' => 'رقم الهاتف 1 يجب أن يكون نصًا.',
            'phone_2.string' => 'رقم الهاتف 2 يجب أن يكون نصًا.',
            'residence_governorate.string' => 'المحافظة يجب أن تكون نصًا.',
            'residential_area.string' => 'المنطقة السكنية يجب أن تكون نصًا.',
            'street.string' => 'الشارع يجب أن يكون نصًا.',
            'address.string' => 'العنوان يجب أن يكون نصًا.',
            'family_members_count.integer' => 'عدد أفراد العائلة يجب أن يكون عددًا صحيحًا.',
            'children_aged_6_18_count.integer' => 'عدد الأطفال من 6 إلى 18 سنة يجب أن يكون عددًا صحيحًا.',
            'children_under_5_years.integer' => 'عدد الأطفال تحت 5 سنوات يجب أن يكون عددًا صحيحًا.',
            'number_of_school_students.integer' => 'عدد الطلاب في المدارس يجب أن يكون عددًا صحيحًا.',
            'number_of_university_students.integer' => 'عدد الطلاب في الجامعات يجب أن يكون عددًا صحيحًا.',
            'number_of_infants.integer' => 'عدد الرضع يجب أن يكون عددًا صحيحًا.',
            'number_of_people_with_disabilities.integer' => 'عدد الأشخاص ذوي الإعاقة يجب أن يكون عددًا صحيحًا.',
            'number_of_people_with_chronic_diseases.integer' => 'عدد الأشخاص المصابين بأمراض مزمنة يجب أن يكون عددًا صحيحًا.',
            'number_of_elderly_over_60.integer' => 'عدد كبار السن فوق 60 سنة يجب أن يكون عددًا صحيحًا.',
            'number_of_pregnant_women.integer' => 'عدد النساء الحوامل يجب أن يكون عددًا صحيحًا.',
            'number_of_breastfeeding_women.integer' => 'عدد النساء المرضعات يجب أن يكون عددًا صحيحًا.',
            'number_of_injured_due_to_war.integer' => 'عدد المصابين بسبب الحرب يجب أن يكون عددًا صحيحًا.',
            'care_for_non_family_members.string' => 'رعاية أفراد غير الأسرة يجب أن يكون نصًا.',
            'reason_for_caring_for_children.string' => 'سبب رعاية الأطفال يجب أن يكون نصًا.',
            'number_of_children_cared_for_not_in_family_under_18.integer' => 'عدد الأطفال الذين يتم رعايتهم خارج الأسرة تحت 18 سنة يجب أن يكون عددًا صحيحًا.',
            'relationship_to_family_members_lost_during_war.string' => 'علاقة الأسرة المفقودة بسبب الحرب يجب أن تكون نصًا.',
            'lost_family_member_during_war.string' => 'الأسرة المفقودة بسبب الحرب يجب أن تكون نصًا.',
            'urgent_basic_needs_for_family.string' => 'الاحتياجات الأساسية العاجلة للأسرة يجب أن تكون نصًا.',
            'secondary_needs_for_family.string' => 'الاحتياجات الثانوية للأسرة يجب أن تكون نصًا.',
            'sources_of_family_income.string' => 'مصادر دخل الأسرة يجب أن تكون نصًا.',
            'unable_to_use_land_or_properties_due_to_war.string' => 'عدم القدرة على استخدام الأراضي أو الممتلكات بسبب الحرب يجب أن يكون نصًا.',
            'monthly_income_shekels.numeric' => 'الدخل الشهري (شيكل) يجب أن يكون عددًا.',
            'housing_ownership.string' => 'الملكية السكنية يجب أن تكون نصًا.',
            'type_of_housing.string' => 'نوع السكن يجب أن يكون نصًا.',
            'extent_of_housing_damage_due_to_war.string' => 'مدى الضرر في السكن بسبب الحرب يجب أن يكون نصًا.',
            'displaced_governorate.string' => 'المحافظة النازحة يجب أن تكون نصًا.',
            'displaced_due_to_war_and_changed_housing_location.string' => 'النازحون بسبب الحرب وتغيير مكان السكن يجب أن يكون نصًا.',
            'displaced_population_cluster.string' => 'تجمع السكان النازحين يجب أن يكون نصًا.',
            'displaced_street.string' => 'الشارع النازح منه يجب أن يكون نصًا.',
            'displaced_place_of_displacement.string' => 'مكان النزوح يجب أن يكون نصًا.',
            'displaced_address.string' => 'عنوان السكن النازح يجب أن يكون نصًا.',
            'account_holder_name.string' => 'اسم صاحب الحساب يجب أن يكون نصًا.',
            'bank_name_branch.string' => 'اسم البنك والفرع يجب أن يكون نصًا.',
            'account_holder_id_number.string' => 'رقم هوية صاحب الحساب يجب أن يكون نصًا.',
            'account_number.string' => 'رقم الحساب يجب أن يكون نصًا.',
            'agree_to_share_data_for_assistance.string' => 'موافقة على مشاركة البيانات للمساعدة يجب أن تكون نصًا.',
        ];

        // Validate the incoming data
        $request->validate([
            'identity_number' => 'nullable|string',
            'identity_type' => 'nullable|string',
            'full_name' => 'nullable|string',
            'gender' => 'nullable|string',
            'birth_of_date' => 'nullable|date',
            'marital_status' => 'nullable|string',
            'spouse_id_number' => 'nullable|string',
            'spouse_id_type' => 'nullable|string',
            'spouse_full_name' => 'nullable|string',
            'phone_1' => 'nullable|string',
            'phone_2' => 'nullable|string',
            'residence_governorate' => 'nullable|string',
            'residential_area' => 'nullable|string',
            'street' => 'nullable|string',
            'address' => 'nullable|string',
            'family_members_count' => 'nullable|integer',
            'children_aged_6_18_count' => 'nullable|integer',
            'children_under_5_years' => 'nullable|integer',
            'number_of_school_students' => 'nullable|integer',
            'number_of_university_students' => 'nullable|integer',
            'number_of_infants' => 'nullable|integer',
            'number_of_people_with_disabilities' => 'nullable|integer',
            'number_of_people_with_chronic_diseases' => 'nullable|integer',
            'number_of_elderly_over_60' => 'nullable|integer',
            'number_of_pregnant_women' => 'nullable|integer',
            'number_of_breastfeeding_women' => 'nullable|integer',
            'number_of_injured_due_to_war' => 'nullable|integer',
            'care_for_non_family_members' => 'nullable|string',
            'reason_for_caring_for_children' => 'nullable|string',
            'number_of_children_cared_for_not_in_family_under_18' => 'nullable|integer',
            'relationship_to_family_members_lost_during_war' => 'nullable|string',
            'lost_family_member_during_war' => 'nullable|string',
            'urgent_basic_needs_for_family' => 'nullable|string',
            'secondary_needs_for_family' => 'nullable|string',
            'sources_of_family_income' => 'nullable|string',
            'unable_to_use_land_or_properties_due_to_war' => 'nullable|string',
            'monthly_income_shekels' => 'nullable|numeric',
            'housing_ownership' => 'nullable|string',
            'type_of_housing' => 'nullable|string',
            'extent_of_housing_damage_due_to_war' => 'nullable|string',
            'displaced_governorate' => 'nullable|string',
            'displaced_due_to_war_and_changed_housing_location' => 'nullable|string',
            'displaced_population_cluster' => 'nullable|string',
            'displaced_street' => 'nullable|string',
            'displaced_place_of_displacement' => 'nullable|string',
            'displaced_address' => 'nullable|string',
            'account_holder_name' => 'nullable|string',
            'bank_name_branch' => 'nullable|string',
            'account_holder_id_number' => 'nullable|string',
            'account_number' => 'nullable|string',
            'agree_to_share_data_for_assistance' => 'nullable|string',
        ], $messages);

        // Create a new WarForm entry
        $data = new WarForm(); // WarForm model

        // Fill the model with validated data
        $data->identity_number = $request->input('identity_number');
        $data->identity_type = $request->input('identity_type');
        $data->full_name = $request->input('full_name');
        $data->gender = $request->input('gender');
        $data->birth_of_date = $request->input('birth_of_date');
        $data->marital_status = $request->input('marital_status');
        $data->spouse_id_number = $request->input('spouse_id_number');
        $data->spouse_id_type = $request->input('spouse_id_type');
        $data->spouse_full_name = $request->input('spouse_full_name');
        $data->phone_1 = $request->input('phone_1');
        $data->phone_2 = $request->input('phone_2');
        $data->residence_governorate = $request->input('residence_governorate');
        $data->residential_area = $request->input('residential_area');
        $data->street = $request->input('street');
        $data->address = $request->input('address');
        $data->family_members_count = $request->input('family_members_count');
        $data->children_aged_6_18_count = $request->input('children_aged_6_18_count');
        $data->children_under_5_years = $request->input('children_under_5_years');
        $data->number_of_school_students = $request->input('number_of_school_students');
        $data->number_of_university_students = $request->input('number_of_university_students');
        $data->number_of_infants = $request->input('number_of_infants');
        $data->number_of_people_with_disabilities = $request->input('number_of_people_with_disabilities');
        $data->number_of_people_with_chronic_diseases = $request->input('number_of_people_with_chronic_diseases');
        $data->number_of_elderly_over_60 = $request->input('number_of_elderly_over_60');
        $data->number_of_pregnant_women = $request->input('number_of_pregnant_women');
        $data->number_of_breastfeeding_women = $request->input('number_of_breastfeeding_women');
        $data->number_of_injured_due_to_war = $request->input('number_of_injured_due_to_war');
        $data->care_for_non_family_members = $request->input('care_for_non_family_members');
        $data->reason_for_caring_for_children = $request->input('reason_for_caring_for_children');
        $data->number_of_children_cared_for_not_in_family_under_18 = $request->input('number_of_children_cared_for_not_in_family_under_18');
        $data->relationship_to_family_members_lost_during_war = $request->input('relationship_to_family_members_lost_during_war');
        $data->lost_family_member_during_war = $request->input('lost_family_member_during_war');
        $data->urgent_basic_needs_for_family = $request->input('urgent_basic_needs_for_family');
        $data->secondary_needs_for_family = $request->input('secondary_needs_for_family');
        $data->sources_of_family_income = $request->input('sources_of_family_income');
        $data->unable_to_use_land_or_properties_due_to_war = $request->input('unable_to_use_land_or_properties_due_to_war');
        $data->monthly_income_shekels = $request->input('monthly_income_shekels');
        $data->housing_ownership = $request->input('housing_ownership');
        $data->type_of_housing = $request->input('type_of_housing');
        $data->extent_of_housing_damage_due_to_war = $request->input('extent_of_housing_damage_due_to_war');
        $data->displaced_governorate = $request->input('displaced_governorate');
        $data->displaced_due_to_war_and_changed_housing_location = $request->input('displaced_due_to_war_and_changed_housing_location');
        $data->displaced_population_cluster = $request->input('displaced_population_cluster');
        $data->displaced_street = $request->input('displaced_street');
        $data->displaced_place_of_displacement = $request->input('displaced_place_of_displacement');
        $data->displaced_address = $request->input('displaced_address');
        $data->account_holder_name = $request->input('account_holder_name');
        $data->bank_name_branch = $request->input('bank_name_branch');
        $data->account_holder_id_number = $request->input('account_holder_id_number');
        $data->account_number = $request->input('account_number');
        $data->agree_to_share_data_for_assistance = $request->input('agree_to_share_data_for_assistance');

        // Save the model
        $data->save();

        // Return a success response
        return response()->json([
            'message' => 'تم حفظ البيانات بنجاح.',
            'data' => $data
        ], 201);
    }
}