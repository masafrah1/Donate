<?php

namespace App\Http\Controllers;

use Validator;
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
        $data = $request->all();
        // Define validation rules for all fields
        $rules = [
            'identity_number' => 'required|string|max:255',
            'identity_type' => 'required|string|max:255',
            // 'full_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'birth_of_date' => 'required|date',
            'marital_status' => 'required|string|max:255',
            'phone_1' => 'required|string|max:15',
            'phone_2' => 'nullable|string|max:15',
            'residence_governorate' => 'required|string|max:255',
            'residential_area' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'family_members_count' => 'required|integer|min:0',
            'children_aged_6_18_count' => 'required|integer|min:0',
            'children_under_5_years' => 'required|integer|min:0',
            'number_of_school_students' => 'required|integer|min:0',
            'number_of_university_students' => 'required|integer|min:0',
            'number_of_infants' => 'required|integer|min:0',
            'number_of_people_with_disabilities' => 'required|integer|min:0',
            'number_of_people_with_chronic_diseases' => 'required|integer|min:0',
            'number_of_elderly_over_60' => 'required|integer|min:0',
            'number_of_pregnant_women' => 'required|integer|min:0',
            'number_of_breastfeeding_women' => 'required|integer|min:0',
            'number_of_injured_due_to_war' => 'required|integer|min:0',
            'care_for_non_family_members' => 'required|string',
            // 'relationship_to_family_members_lost_during_war' => 'required|array',
            'lost_family_member_during_war' => 'nullable|string|max:255',
            'urgent_basic_needs_for_family' => 'required|array',
            'secondary_needs_for_family' => 'nullable|array',
            'sources_of_family_income' => 'nullable|array',
            'unable_to_use_land_or_properties_due_to_war' => 'nullable|string|max:255',
            'monthly_income_shekels' => 'nullable|integer|min:0',
            'housing_ownership' => 'required|string|max:255',
            'type_of_housing' => 'required|string|max:255',
            'extent_of_housing_damage_due_to_war' => 'required|string|max:255',
            // 'displaced_governorate' => 'required|string|max:255',
            'displaced_due_to_war_and_changed_housing_location' => 'required|string',
            'account_holder_name' => 'nullable|string|max:255',
            'bank_name_branch' => 'nullable|string|max:255',
            'account_holder_id_number' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'agree_to_share_data_for_assistance' => 'required|string',
        ];

        // Conditional fields
        if ($request->input('marital_status') == 'متزوج') {
            $rules['spouse_id_number'] = 'required|string|max:255';
            $rules['spouse_id_type'] = 'required|string|max:255';
            $rules['spouse_full_name'] = 'required|string|max:255';
        }
        else
        {
            $data['spouse_id_number'] = '';
            $data['spouse_id_type'] = '';
            $data['spouse_full_name'] = '';
        }

        if ($request->input('care_for_non_family_members') == 'نعم') {
            $rules['reason_for_caring_for_children'] = 'nullable|string|max:255';
            $rules['number_of_children_cared_for_not_in_family_under_18'] = 'required|integer|min:0';
        }
        else
        {
            $data['reason_for_caring_for_children'] = '';
            $data['number_of_children_cared_for_not_in_family_under_18'] = 0;
        }

        if ($request->input('lost_family_member_during_war') == 'نعم') {
            $rules['relationship_to_family_members_lost_during_war'] = 'required|array';
        }
        else
        {
            $data['relationship_to_family_members_lost_during_war'] = '';
        }
//care_for_non_family_members
        

        if ($request->input('displaced_due_to_war_and_changed_housing_location') == 'نعم') {
            $rules['displaced_governorate'] = 'required|string|max:255';
            $rules['displaced_population_cluster'] = 'nullable|string|max:255';
            $rules['displaced_street'] = 'nullable|string|max:255';
            $rules['displaced_place_of_displacement'] = 'required|string|max:255';
            $rules['displaced_address'] = 'nullable|string|max:255';
        } else
        {
            $data['displaced_governorate'] = '';
            $data['displaced_population_cluster'] = '';
            $data['displaced_street'] = '';
            $data['displaced_place_of_displacement'] = '';
            $data['displaced_address'] = '';
        }
        // Arabic validation messages
        $messages = [
            'required' => 'الحقل :attribute مطلوب.',
            'string' => 'الحقل :attribute يجب أن يكون نصًا.',
            'date' => 'الحقل :attribute يجب أن يكون تاريخًا صالحًا.',
            'max' => 'الحقل :attribute لا يمكن أن يزيد عن :max حرف.',
            'boolean' => 'الحقل :attribute يجب أن يكون صحيحًا أو خطأ.',
            'integer' => 'الحقل :attribute يجب أن يكون عددًا صحيحًا.',
            'array' => 'الحقل :attribute يجب أن يكون مصفوفة.',
            'min' => 'الحقل :attribute يجب أن يكون على الأقل :min.',
        ];

        // Arabic field names
        $attributes = [
            'identity_number' => 'رقم الهوية',
            'identity_type' => 'نوع الهوية',
            'full_name' => 'الاسم الكامل',
            'gender' => 'الجنس',
            'birth_of_date' => 'تاريخ الميلاد',
            'marital_status' => 'الحالة الاجتماعية',
            'spouse_id_number' => 'رقم هوية الزوج/الزوجة',
            'spouse_id_type' => 'نوع هوية الزوج/الزوجة',
            'spouse_full_name' => 'اسم الزوج/الزوجة',
            'phone_1' => 'رقم الهاتف الأول',
            'phone_2' => 'رقم الهاتف الثاني',
            'residence_governorate' => 'المحافظة السكنية',
            'residential_area' => 'المنطقة السكنية',
            'street' => 'الشارع',
            'address' => 'العنوان',
            'family_members_count' => 'عدد أفراد الأسرة',
            'children_aged_6_18_count' => 'عدد الأطفال بين 6 و 18 عامًا',
            'children_under_5_years' => 'عدد الأطفال دون 5 سنوات',
            'number_of_school_students' => 'عدد طلاب المدارس',
            'number_of_university_students' => 'عدد طلاب الجامعات',
            'number_of_infants' => 'عدد الرضع',
            'number_of_people_with_disabilities' => 'عدد ذوي الإعاقة',
            'number_of_people_with_chronic_diseases' => 'عدد المصابين بأمراض مزمنة',
            'number_of_elderly_over_60' => 'عدد المسنين فوق 60 عامًا',
            'number_of_pregnant_women' => 'عدد النساء الحوامل',
            'number_of_breastfeeding_women' => 'عدد النساء المرضعات',
            'number_of_injured_due_to_war' => 'عدد المصابين بسبب الحرب',
            'care_for_non_family_members' => 'رعاية أفراد خارج العائلة',
            'reason_for_caring_for_children' => 'سبب رعاية الأطفال',
            'number_of_children_cared_for_not_in_family_under_18' => 'عدد الأطفال غير الأسرة دون 18 سنة',
            'relationship_to_family_members_lost_during_war' => 'علاقة بأفراد الأسرة المفقودين خلال الحرب',
            'lost_family_member_during_war' => 'فقدان أفراد من الأسرة خلال الحرب',
            'urgent_basic_needs_for_family' => 'الاحتياجات الأساسية العاجلة للعائلة',
            'secondary_needs_for_family' => 'الاحتياجات الثانوية للعائلة',
            'sources_of_family_income' => 'مصادر دخل الأسرة',
            'unable_to_use_land_or_properties_due_to_war' => 'عدم القدرة على استخدام الأراضي بسبب الحرب',
            'monthly_income_shekels' => 'الدخل الشهري بالشيكل',
            'housing_ownership' => 'ملكية السكن',
            'type_of_housing' => 'نوع السكن',
            'extent_of_housing_damage_due_to_war' => 'حجم الأضرار بالسكن بسبب الحرب',
            // 'displaced_governorate' => 'المحافظة المهجرة',
            'displaced_due_to_war_and_changed_housing_location' => 'التهجير بسبب الحرب وتغيير موقع السكن',
            'displaced_population_cluster' => 'التجمع السكني المهجر',
            'displaced_street' => 'شارع التهجير',
            'displaced_place_of_displacement' => 'مكان التهجير',
            'displaced_address' => 'عنوان التهجير',
            'account_holder_name' => 'اسم صاحب الحساب',
            'bank_name_branch' => 'اسم البنك/الفرع',
            'account_holder_id_number' => 'رقم هوية صاحب الحساب',
            'account_number' => 'رقم الحساب',
            'agree_to_share_data_for_assistance' => 'الموافقة على مشاركة البيانات للمساعدة',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        // dd($validator->errors());
        if ($validator->fails()) {
            // Get all error messages and join them into one string
            $errorMessages = implode('<br>', array: $validator->errors()->all());
            flash()
                ->option('position', 'top-center')
                ->translate(['language' => 'ar'])
                ->option('timeout', 20000)->error($errorMessages, [], "خطأ!");
            return back()->withInput();
        }


        // Convert array fields to comma-separated strings
        foreach (['relationship_to_family_members_lost_during_war', 'urgent_basic_needs_for_family', 'secondary_needs_for_family', 'sources_of_family_income'] as $field) {
            if ($request->has($field)) {
                $data[$field] = implode(',', $request->input($field));
            }
        }

        
        if($data['spouse_id_type'] == 'اختار') {
            $data['spouse_id_type'] = '';
        }
        WarForm::create($data);

        flash()
        ->option('position', 'top-center')
        ->translate(['language' => 'ar'])
        ->option('timeout', 20000)->success("تم حفظ البيانات بنجاح", [], "رائع!");

        return back();
    }
}
