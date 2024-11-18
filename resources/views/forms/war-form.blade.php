<!-- Abvout Start -->
<div class="container-fluid about py-5">
    <div class="container py-5" id="donationSection">
        <div class="row g-5 align-items-center">
            <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                    <h5 class="text-primary text-center rtl"> البيانات الاساسية للشخص المستهدف</h5>
                    <p class="mb-4 text-center rtl">
                        <a class="fw-bold rtl mb-4" style="color: red;" href="">* يشير إلى السؤال
                            المطلوب</a>
                    </p>
                    <form action="{{ route('warForm.submit') }}" method="POST">
                        @csrf
                        <div class="row g-4 rtl">
                            <!-- Identity Number -->

                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="identity_number"
                                        name="identity_number" value="{{ old('identity_number') }}"
                                        placeholder="رقم الهوية" required autofocus>
                                    <label for="identity_number">رقم الهوية <span class="text-danger">*</span></label>
                                    @error('identity_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Identity Type -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="identity_type" name="identity_type"
                                        required>
                                        <option>اختار</option>
                                        @foreach (['فلسطينية', 'اردنية', 'اسرائيلية', 'مصرية', 'تصريح اقامة', 'وثيقة أخرى'] as $type)
                                            <option value="{{ $type }}"
                                                {{ old('identity_type') == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="identity_type">نوع الهوية <span class="text-danger">*</span></label>
                                    @error('identity_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="full_name" name="full_name"
                                        value="{{ old('full_name') }}" placeholder="الاسم الرباعي" required>
                                    <label for="full_name">الاسم الرباعي <span class="text-danger">*</span></label>
                                    @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="gender" name="gender" required>
                                        <option>اختار</option>
                                        <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>
                                            ذكر</option>
                                        <option value="انثى" {{ old('gender') == 'انثى' ? 'selected' : '' }}>
                                            انثى</option>
                                    </select>
                                    <label for="gender">الجنس <span class="text-danger">*</span></label>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Birth Date -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control border-0 rtl" id="birth_of_date"
                                        name="birth_of_date" value="{{ old('birth_of_date') }}" required>
                                    <label for="birth_of_date">تاريخ الميلاد <span class="text-danger">*</span></label>
                                    @error('birth_of_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Marital Status -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="marital_status" name="marital_status"
                                        required>
                                        <option>اختار</option>
                                        <option value="متزوج"
                                            {{ old('marital_status') == 'متزوج' ? 'selected' : '' }}>متزوج
                                        </option>
                                        <option value="لم يتزوج ابدا"
                                            {{ old('marital_status') == 'لم يتزوج ابدا' ? 'selected' : '' }}>لم
                                            يتزوج ابدا

                                        </option>
                                        <option value="مطلق" {{ old('marital_status') == 'مطلق' ? 'selected' : '' }}>
                                            مطلق
                                        </option>
                                        <option value="مهجور"
                                            {{ old('marital_status') == 'مهجور' ? 'selected' : '' }}>مهجور
                                        </option>
                                        <option value="منفصل"
                                            {{ old('marital_status') == 'منفصل' ? 'selected' : '' }}>منفصل
                                        </option>
                                        <option value="ارمل" {{ old('marital_status') == 'ارمل' ? 'selected' : '' }}>
                                            ارمل
                                        </option>
                                        <option value="عقد لاول مرة ولم يتم الدخول"
                                            {{ old('marital_status') == 'عقد لاول مرة ولم يتم الدخول' ? 'selected' : '' }}>
                                            عقد لاول مرة ولم يتم الدخول
                                        </option>
                                    </select>
                                    <label for="marital_status">الحالة الاجتماعية <span
                                            class="text-danger">*</span></label>
                                    @error('marital_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">بيانات الزوج /ة</h5>
                            <!-- Spouse ID Number -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="spouse_id_number"
                                        name="spouse_id_number" value="{{ old('spouse_id_number') }}"
                                        placeholder="رقم هوية الزوج/ ة">
                                    <label for="spouse_id_number"> رقم هوية الزوج/ ة</label>
                                    @error('spouse_id_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Spouse ID Type -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="spouse_id_type" name="spouse_id_type">
                                        <option>اختار</option>
                                        <option value="فلسطينية"
                                            {{ old('spouse_id_type') == 'فلسطينية' ? 'selected' : '' }}>
                                            فلسطينية</option>
                                        <option value="اردنية"
                                            {{ old('spouse_id_type') == 'اردنية' ? 'selected' : '' }}>اردنية
                                        </option>
                                        <option value="اسرائيلية"
                                            {{ old('spouse_id_type') == 'اسرائيلية' ? 'selected' : '' }}>
                                            اسرائيلية</option>
                                        <option value="مصرية"
                                            {{ old('spouse_id_type') == 'مصرية' ? 'selected' : '' }}>مصرية
                                        </option>
                                        <option value="تصريح اقامة"
                                            {{ old('spouse_id_type') == 'تصريح اقامة' ? 'selected' : '' }}>
                                            تصريح اقامة</option>
                                        <option value="وثيقة أخرى"
                                            {{ old('spouse_id_type') == 'وثيقة أخرى' ? 'selected' : '' }}>وثيقة
                                            أخرى</option>
                                    </select>
                                    <label for="spouse_id_type"> نوع هوية الزوج/ ة
                                    </label>
                                    @error('spouse_id_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Spouse Full Name -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="spouse_full_name"
                                        name="spouse_full_name" value="{{ old('spouse_full_name') }}"
                                        placeholder="الاسم الرباعي للزوج/ ة" required>
                                    <label for="spouse_full_name">الاسم الرباعي للزوج/ ة<span
                                            class="text-danger">*</span></label>
                                    @error('spouse_full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <h5 class="text-primary text-center rtl">معلومات الاتصال</h5>
                            <!-- Phone Number -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control border-0" id="phone_1"
                                        name="phone_1" value="{{ old('phone_1') }}" placeholder="رقم الجوال 1"
                                        required pattern="^\+?\d{7,13}$">
                                    <label for="phone_1">رقم الجوال 1 <span class="text-danger">*</span></label>
                                    @error('phone_1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone 2 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control border-0" id="phone_2"
                                        name="phone_2" value="{{ old('phone_2') }}" placeholder="رقم الجوال 2"
                                        required pattern="^\+?\d{7,13}$">
                                    <label for="phone_2">رقم الجوال 2<span class="text-danger">*</span></label>
                                    @error('phone_2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Residence Governorate -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="residence_governorate"
                                        name="residence_governorate">
                                        <option>اختار</option>
                                        <option value="غزة"
                                            {{ old('residence_governorate') == 'غزة' ? 'selected' : '' }}>غزة
                                        </option>
                                        <option value="شمال غزة"
                                            {{ old('residence_governorate') == 'شمال غزة' ? 'selected' : '' }}>
                                            شمال غزة</option>
                                        <option value="دير البلح"
                                            {{ old('residence_governorate') == 'دير البلح' ? 'selected' : '' }}>
                                            دير البلح</option>
                                        <option value="خانيونس"
                                            {{ old('residence_governorate') == 'خانيونس' ? 'selected' : '' }}>
                                            خانيونس</option>
                                        <option value="رفح"
                                            {{ old('residence_governorate') == 'رفح' ? 'selected' : '' }}>رفح
                                        </option>
                                        <option value="الخليل"
                                            {{ old('residence_governorate') == 'الخليل' ? 'selected' : '' }}>
                                            الخليل</option>
                                        <option value="بيت لحم"
                                            {{ old('residence_governorate') == 'بيت لحم' ? 'selected' : '' }}>
                                            بيت لحم</option>
                                        <option value="نابلس"
                                            {{ old('residence_governorate') == 'نابلس' ? 'selected' : '' }}>
                                            نابلس</option>
                                        <option value="جنين"
                                            {{ old('residence_governorate') == 'جنين' ? 'selected' : '' }}>جنين
                                        </option>
                                        <option value="طولكرم"
                                            {{ old('residence_governorate') == 'طولكرم' ? 'selected' : '' }}>
                                            طولكرم</option>
                                        <option value="اريحا"
                                            {{ old('residence_governorate') == 'اريحا' ? 'selected' : '' }}>
                                            اريحا</option>
                                        <option value="رام الله"
                                            {{ old('residence_governorate') == 'رام الله' ? 'selected' : '' }}>
                                            رام الله</option>
                                        <option value="قلقيلية"
                                            {{ old('residence_governorate') == 'قلقيلية' ? 'selected' : '' }}>
                                            قلقيلية</option>
                                        <option value="سلفيت"
                                            {{ old('residence_governorate') == 'سلفيت' ? 'selected' : '' }}>
                                            سلفيت</option>
                                        <option value="القدس"
                                            {{ old('residence_governorate') == 'القدس' ? 'selected' : '' }}>
                                            القدس</option>
                                        <option value="يطا"
                                            {{ old('residence_governorate') == 'يطا' ? 'selected' : '' }}>يطا
                                        </option>
                                        <option value="طوباس"
                                            {{ old('residence_governorate') == 'طوباس' ? 'selected' : '' }}>
                                            طوباس</option>
                                    </select>
                                    <label for="residence_governorate">محافظة السكن</label>
                                    @error('residence_governorate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Residential Area -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="residential_area"
                                        name="residential_area" value="{{ old('residential_area') }}"
                                        placeholder="التجمع السكاني" required>
                                    <label for="residential_area">التجمع السكاني<span
                                            class="text-danger">*</span></label>
                                    @error('residential_area')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Street -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="street"
                                        name="street" value="{{ old('street') }}" placeholder="الشارع" required>
                                    <label for="street">الشارع <span class="text-danger">*</span></label>
                                    @error('street')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="address"
                                        name="address" value="{{ old('address') }}" placeholder="العنوان">
                                    <label for="address">العنوان</label>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">التكوين الاسري: هل يوجد من بين افراد
                                الاسرة الفئات التالية :(ادخل صفر اذا لا يوجد )</h5>

                            <!-- Family Members Count -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="family_members_count"
                                        name="family_members_count" required>
                                        @foreach (range(0, 40) as $count)
                                            <option value="{{ $count }}"
                                                {{ old('family_members_count') == $count ? 'selected' : '' }}>
                                                {{ $count }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="family_members_count">عدد أفراد الأسرة <span
                                            class="text-danger">*</span></label>
                                    @error('family_members_count')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Number of Children Aged 6-18 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="children_aged_6_18_count"
                                        name="children_aged_6_18_count">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('children_aged_6_18_count') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="children_aged_6_18_count">عدد الاطفال بين 6-18 سنة (ادخل صفر
                                        اذا لا يوجد )</label>
                                    @error('children_aged_6_18_count')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Children Under 5 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="children_under_5_years"
                                        name="children_under_5_years">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('children_under_5_years') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="children_under_5_years">عدد الاطفال تحت 5 سنوات (ادخل صفر اذا
                                        لا يوجد ) </label>
                                    @error('children_under_5_years')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of School Students -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_school_students"
                                        name="number_of_school_students">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_school_students') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_school_students">عدد طلاب المدارس (ادخل صفر اذا لا
                                        يوجد )</label>
                                    @error('number_of_school_students')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of University Students -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_university_students"
                                        name="number_of_university_students">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_university_students') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_university_students">عدد طلاب الجامعات (ادخل صفر اذا
                                        لا يوجد )</label>
                                    @error('number_of_university_students')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Infants -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_infants"
                                        name="number_of_infants">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_infants') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_infants">عدد الاطفال الرضع (ادخل صفر اذا لا يوجد )
                                    </label>
                                    @error('number_of_infants')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of People with Disabilities -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_people_with_disabilities"
                                        name="number_of_people_with_disabilities">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_people_with_disabilities') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_people_with_disabilities">عدد الاشخاص ذوي الاعاقة
                                        (ادخل صفر اذا لا يوجد )</label>
                                    @error('number_of_people_with_disabilities')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of People with Chronic Diseases -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_people_with_chronic_diseases"
                                        name="number_of_people_with_chronic_diseases">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_people_with_chronic_diseases') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_people_with_chronic_diseases">عدد المصابين بالامراض
                                        المزمنة (ادخل صفر اذا لا يوجد ) </label>
                                    @error('number_of_people_with_chronic_diseases')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Elderly Over 60 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_elderly_over_60"
                                        name="number_of_elderly_over_60">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_elderly_over_60') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_elderly_over_60">عدد المسنين فوق 60 سنة (ادخل صفر اذا
                                        لا يوجد )</label>
                                    @error('number_of_elderly_over_60')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Pregnant Women -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_pregnant_women"
                                        name="number_of_pregnant_women">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_pregnant_women') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_pregnant_women">عدد النساء الحوامل (ادخل صفر اذا لا
                                        يوجد )</label>
                                    @error('number_of_pregnant_women')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Breastfeeding Women -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_breastfeeding_women"
                                        name="number_of_breastfeeding_women">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_breastfeeding_women') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_breastfeeding_women">عدد النساء المرضعات (ادخل صفر
                                        اذا لا يوجد )</label>
                                    @error('number_of_breastfeeding_women')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Injured Due to War -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="number_of_injured_due_to_war"
                                        name="number_of_injured_due_to_war">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_injured_due_to_war') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_injured_due_to_war">عدد الجرحى بسبب الحرب (ادخل صفر
                                        اذا لا يوجد )</label>
                                    @error('number_of_injured_due_to_war')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Care for Non-Family Members -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="care_for_non_family_members"
                                        name="care_for_non_family_members">
                                        <option>اختار</option>
                                        <option value="نعم"
                                            {{ old('care_for_non_family_members') == 'نعم' ? 'selected' : '' }}>
                                            نعم</option>
                                        <option value="لا"
                                            {{ old('care_for_non_family_members') == 'لا' ? 'selected' : '' }}>
                                            لا</option>
                                    </select>
                                    <label for="care_for_non_family_members">هل تقوم برعاية أفراد ليسوا من ضمن
                                        افراد الاسرة</label>
                                    @error('care_for_non_family_members')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">رعاية اطفال ليسو من ضمن العائلة</h5>

                            <!-- Number of Children Cared for Not in Family Under 18 -->
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select border-0"
                                        id="number_of_children_cared_for_not_in_family_under_18"
                                        name="number_of_children_cared_for_not_in_family_under_18">
                                        @foreach (range(0, 20) as $number)
                                            <option value="{{ $number }}"
                                                {{ old('number_of_children_cared_for_not_in_family_under_18') == $number ? 'selected' : '' }}>
                                                {{ $number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="number_of_children_cared_for_not_in_family_under_18">عدد
                                        الاطفال الذين يتم رعايتهم وليسو من ضمن افراد الاسرة تحت سن 18 سنة :
                                        (ادخل صفر اذا لا يوجد )</label>
                                    @error('number_of_children_cared_for_not_in_family_under_18')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Reason for Caring for Children -->
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="reason_for_caring_for_children"
                                        name="reason_for_caring_for_children">
                                        <option>اختار</option>
                                        <option value="وفاة احد الوالدين او كلاهما"
                                            {{ old('reason_for_caring_for_children') == 'وفاة احد الوالدين او كلاهما' ? 'selected' : '' }}>
                                            وفاة احد الوالدين او كلاهما</option>
                                        <option value="وفاة كامل العائلة"
                                            {{ old('reason_for_caring_for_children') == 'وفاة كامل العائلة' ? 'selected' : '' }}>
                                            وفاة كامل العائلة</option>
                                        <option value="مجهولين"
                                            {{ old('reason_for_caring_for_children') == 'مجهولين' ? 'selected' : '' }}>
                                            مجهولين</option>
                                        <option value="فقدان الاتصال بالوالدين او احداهما"
                                            {{ old('reason_for_caring_for_children') == 'فقدان الاتصال بالوالدين او احداهما' ? 'selected' : '' }}>
                                            فقدان الاتصال بالوالدين او احداهما</option>
                                        <option value="الاهل خارج القطاع حاليا"
                                            {{ old('reason_for_caring_for_children') == 'الاهل خارج القطاع حاليا' ? 'selected' : '' }}>
                                            الاهل خارج القطاع حاليا</option>
                                        <option value="أخرى"
                                            {{ old('reason_for_caring_for_children') == 'أخرى' ? 'selected' : '' }}>
                                            أخرى</option>
                                    </select>
                                    <label for="reason_for_caring_for_children">:سبب رعاية الاطفال</label>
                                    @error('reason_for_caring_for_children')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">خلال هذه الحرب هل فقدت احد افراد عائلتك
                            </h5>
                            <!-- Lost Family Member During War -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="lost_family_member_during_war"
                                        name="lost_family_member_during_war">
                                        <option>اختار</option>
                                        <option value="نعم"
                                            {{ old('lost_family_member_during_war') == 'نعم' ? 'selected' : '' }}>
                                            نعم</option>
                                        <option value="لا"
                                            {{ old('lost_family_member_during_war') == 'لا' ? 'selected' : '' }}>
                                            لا</option>
                                    </select>
                                    <label for="lost_family_member_during_war">:خلال هذه الحرب هل فقدت احد
                                        افراد عائلتك</label>
                                    @error('lost_family_member_during_war')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">صلة القرابة</h5>
                            <!-- Relationship to Family Members Lost During War -->
                            <div class="col-lg-12 col-xl-6 rtl">
                                <div class="form-group rtl">
                                    <!-- Label placed outside for better structure -->
                                    <label for="relationship_to_family_members_lost_during_war" class="form-label">
                                        خلال هذه الحرب، هل فقدت أحد أفراد عائلتك؟ (تستطيع اختيار أكثر من خيار)
                                    </label>
                                    
                                    <!-- Multi-select dropdown with Select2 -->
                                    <select class="form-select select2-multiple text-end" id="relationship_to_family_members_lost_during_war"
                                            name="relationship_to_family_members_lost_during_war[]" multiple>
                                        <option value="الاب" {{ in_array('الاب', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>الاب</option>
                                        <option value="الام" {{ in_array('الام', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>الام</option>
                                        <option value="الاب والام" {{ in_array('الاب والام', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>الاب والام</option>
                                        <option value="أخ" {{ in_array('أخ', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>أخ</option>
                                        <option value="اخت" {{ in_array('اخت', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>اخت</option>
                                        <option value="ابن" {{ in_array('ابن', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>ابن</option>
                                        <option value="ابنة" {{ in_array('ابنة', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>ابنة</option>
                                        <option value="اقرباء اخرون" {{ in_array('اقرباء اخرون', old('relationship_to_family_members_lost_during_war', [])) ? 'selected' : '' }}>اقرباء اخرون</option>
                                    </select>
                                    
                                    @error('relationship_to_family_members_lost_during_war')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            



                            <h5 class="text-primary text-center rtl">احتياجات الاسرة</h5>
                            <!-- Urgent Basic Needs for Family -->
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="urgent_basic_needs_for_family"
                                        name="urgent_basic_needs_for_family[]">
                                        <option>اختار</option>
                                        <option value="المساعدات المالية"
                                            {{ in_array('المساعدات المالية', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            المساعدات المالية</option>
                                        <option value="الرعاية الصحية -العلاج"
                                            {{ in_array('الرعاية الصحية -العلاج', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            الرعاية الصحية - العلاج</option>
                                        <option value="المسكن -المأوى"
                                            {{ in_array('المسكن -المأوى', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            المسكن - المأوى</option>
                                        <option value="الملابس"
                                            {{ in_array('الملابس', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            الملابس</option>
                                        <option value="اغطية / فرشات ومخدات"
                                            {{ in_array('اغطية / فرشات ومخدات', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            اغطية / فرشات ومخدات</option>
                                        <option value="حليب الاطفال"
                                            {{ in_array('حليب الاطفال', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            حليب الاطفال</option>
                                        <option value="الماء"
                                            {{ in_array('الماء', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            الماء</option>
                                        <option value="مستلزمات صحية (فوط)"
                                            {{ in_array('مستلزمات صحية (فوط)', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            مستلزمات صحية (فوط)</option>
                                        <option value="الغذاء"
                                            {{ in_array('الغذاء', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            الغذاء</option>
                                        <option value="غاز للطهي"
                                            {{ in_array('غاز للطهي', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            غاز للطهي</option>
                                        <option value="اجار منزل"
                                            {{ in_array('اجار منزل', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            اجار منزل</option>
                                        <option value="اقساط جامعية"
                                            {{ in_array('اقساط جامعية', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            اقساط جامعية</option>
                                        <option value="اقساط مدارس"
                                            {{ in_array('اقساط مدارس', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            اقساط مدارس</option>
                                        <option value="أخرى"
                                            {{ in_array('أخرى', old('urgent_basic_needs_for_family', [])) ? 'selected' : '' }}>
                                            أخرى</option>
                                    </select>
                                    <label for="urgent_basic_needs_for_family">حدد/ي ما هي اهم احتياجاتك
                                        الاساسية ذات الاولوية التي تحتاجها الاسرة بشكل عاجل ( تستطيع اختيار اكثر
                                        من خيار)</label>
                                    @error('urgent_basic_needs_for_family')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Secondary Needs for Family -->
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="secondary_needs_for_family"
                                        name="secondary_needs_for_family[]">
                                        <option>اختار</option>
                                        <option value="المساعدات القانونية"
                                            {{ in_array('المساعدات القانونية', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            المساعدات القانونية</option>
                                        <option value="المساعدات النفسية"
                                            {{ in_array('المساعدات النفسية', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            المساعدات النفسية</option>
                                        <option value="مصدر تدفئة"
                                            {{ in_array('مصدر تدفئة', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            مصدر تدفئة</option>
                                        <option value="وقود"
                                            {{ in_array('وقود', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            وقود</option>
                                        <option value="مطاعيم الاطفال"
                                            {{ in_array('مطاعيم الاطفال', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            مطاعيم الاطفال</option>
                                        <option value="حزم اتصال مجانية وانترنت"
                                            {{ in_array('حزم اتصال مجانية وانترنت', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            حزم اتصال مجانية وانترنت</option>
                                        <option value="أخرى"
                                            {{ in_array('أخرى', old('secondary_needs_for_family', [])) ? 'selected' : '' }}>
                                            أخرى</option>
                                    </select>
                                    <label for="secondary_needs_for_family">حدد/ي ما هي اهم احتياجاتك الثانوية
                                        التي تحتاجها الاسرة ( تستطيع اختيار اكثر من خيار)</label>
                                    @error('secondary_needs_for_family')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sources of Family Income -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="sources_of_family_income"
                                        name="sources_of_family_income[]">
                                        <option>اختار</option>
                                        <option value="أجور ورواتب من القطاع الحكومي"
                                            {{ in_array('أجور ورواتب من القطاع الحكومي', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            أجور ورواتب من القطاع الحكومي</option>
                                        <option value="أجور ورواتب من القطاع الخاص"
                                            {{ in_array('أجور ورواتب من القطاع الخاص', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            أجور ورواتب من القطاع الخاص</option>
                                        <option value="أجور ورواتب من العمل داخل اراضي 48"
                                            {{ in_array('أجور ورواتب من العمل داخل اراضي 48', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            أجور ورواتب من العمل داخل اراضي 48</option>
                                        <option value="مشاريع للاسرة غير زراعية"
                                            {{ in_array('مشاريع للاسرة غير زراعية', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            مشاريع للاسرة غير زراعية</option>
                                        <option value="الزراعة وتربية الحيوانات"
                                            {{ in_array('الزراعة وتربية الحيوانات', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            الزراعة وتربية الحيوانات</option>
                                        <option value="مساعدات اجتماعية"
                                            {{ in_array('مساعدات اجتماعية', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            مساعدات اجتماعية</option>
                                        <option value="تحويلات من الخارج"
                                            {{ in_array('تحويلات من الخارج', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            تحويلات من الخارج</option>
                                        <option value="أخرى"
                                            {{ in_array('أخرى', old('sources_of_family_income', [])) ? 'selected' : '' }}>
                                            أخرى</option>
                                    </select>
                                    <label for="sources_of_family_income">مصادر دخل الاسرة ( تستطيع اختيار اكثر
                                        من خيار)</label>
                                    @error('sources_of_family_income')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Monthly Income in Shekels -->
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control border-0" id="monthly_income_shekels"
                                        name="monthly_income_shekels" value="{{ old('monthly_income_shekels') }}"
                                        placeholder="الدخل الشهري (شيكل)" step="1">
                                    <label for="monthly_income_shekels">الدخل الشهري (شيكل)</label>
                                    @error('monthly_income_shekels')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Unable to Use Land or Properties Due to War -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0"
                                        id="unable_to_use_land_or_properties_due_to_war"
                                        name="unable_to_use_land_or_properties_due_to_war">
                                        <option>اختار</option>
                                        <option value="نعم"
                                            {{ old('unable_to_use_land_or_properties_due_to_war') == 'نعم' ? 'selected' : '' }}>
                                            نعم</option>
                                        <option value="لا"
                                            {{ old('unable_to_use_land_or_properties_due_to_war') == 'لا' ? 'selected' : '' }}>
                                            لا</option>
                                    </select>
                                    <label for="unable_to_use_land_or_properties_due_to_war">هل عانت الاسرة من
                                        عدم القدرة على استخدام اراضي زراعية أو عقارات :للاسرة بسبب الحرب</label>
                                    @error('unable_to_use_land_or_properties_due_to_war')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">بيانات المسكن</h5>
                            <!-- Housing Ownership -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="housing_ownership"
                                        name="housing_ownership">
                                        <option>اختار</option>
                                        <option value="ملك"
                                            {{ old('housing_ownership') == 'ملك' ? 'selected' : '' }}>ملك
                                        </option>
                                        <option value="مستأجر غير مفروش"
                                            {{ old('housing_ownership') == 'مستأجر غير مفروش' ? 'selected' : '' }}>
                                            مستأجر غير مفروش</option>
                                        <option value="مستأجر مفروش"
                                            {{ old('housing_ownership') == 'مستأجر مفروش' ? 'selected' : '' }}>
                                            مستأجر مفروش</option>
                                        <option value="دون مقابل"
                                            {{ old('housing_ownership') == 'دون مقابل' ? 'selected' : '' }}>
                                            دون مقابل</option>
                                        <option value="مقابل عمل"
                                            {{ old('housing_ownership') == 'مقابل عمل' ? 'selected' : '' }}>
                                            مقابل عمل</option>
                                        <option value="غير ذلك"
                                            {{ old('housing_ownership') == 'غير ذلك' ? 'selected' : '' }}>غير
                                            ذلك</option>
                                    </select>
                                    <label for="housing_ownership">:حيازة المسكن</label>
                                    @error('housing_ownership')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Type of Housing -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="type_of_housing" name="type_of_housing">
                                        <option value="فيلا"
                                            {{ old('type_of_housing') == 'فيلا' ? 'selected' : '' }}>فيلا
                                        </option>
                                        <option value="دار"
                                            {{ old('type_of_housing') == 'دار' ? 'selected' : '' }}>دار
                                        </option>
                                        <option value="شقة"
                                            {{ old('type_of_housing') == 'شقة' ? 'selected' : '' }}>شقة
                                        </option>
                                        <option value="غرفة مستقلة"
                                            {{ old('type_of_housing') == 'غرفة مستقلة' ? 'selected' : '' }}>
                                            غرفة مستقلة</option>
                                        <option value="خيمة"
                                            {{ old('type_of_housing') == 'خيمة' ? 'selected' : '' }}>خيمة
                                        </option>
                                        <option value="براكية"
                                            {{ old('type_of_housing') == 'براكية' ? 'selected' : '' }}>براكية
                                        </option>
                                        <option value="ملجأ / دار مسنين"
                                            {{ old('type_of_housing') == 'ملجأ / دار مسنين' ? 'selected' : '' }}>
                                            ملجأ / دار مسنين</option>
                                        <option value="غير ذلك"
                                            {{ old('type_of_housing') == 'غير ذلك' ? 'selected' : '' }}>غير
                                            ذلك</option>
                                    </select>
                                    <label for="type_of_housing">:نوع المسكن</label>
                                    @error('type_of_housing')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Extent of Housing Damage Due to War -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="extent_of_housing_damage_due_to_war"
                                        name="extent_of_housing_damage_due_to_war">
                                        <option>اختار</option>
                                        <option value="ضرر كلي"
                                            {{ old('extent_of_housing_damage_due_to_war') == 'ضرر كلي' ? 'selected' : '' }}>
                                            ضرر كلي</option>
                                        <option value="ضرر جزئي يصلح للسكن"
                                            {{ old('extent_of_housing_damage_due_to_war') == 'ضرر جزئي يصلح للسكن' ? 'selected' : '' }}>
                                            ضرر جزئي يصلح للسكن</option>
                                        <option value="ضرر جزئي لا يصلح للسكن"
                                            {{ old('extent_of_housing_damage_due_to_war') == 'ضرر جزئي لا يصلح للسكن' ? 'selected' : '' }}>
                                            ضرر جزئي لا يصلح للسكن</option>
                                        <option value="لم يتضرر"
                                            {{ old('extent_of_housing_damage_due_to_war') == 'لم يتضرر' ? 'selected' : '' }}>
                                            لم يتضرر</option>
                                    </select>
                                    <label for="extent_of_housing_damage_due_to_war">:حجم الضرر للمسكن نتيجة
                                        الحرب</label>
                                    @error('extent_of_housing_damage_due_to_war')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Displaced Due to War and Changed Housing Location -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0"
                                        id="displaced_due_to_war_and_changed_housing_location"
                                        name="displaced_due_to_war_and_changed_housing_location">
                                        <option>اختار</option>
                                        <option value="نعم"
                                            {{ old('displaced_due_to_war_and_changed_housing_location') == 'نعم' ? 'selected' : '' }}>
                                            نعم</option>
                                        <option value="لا"
                                            {{ old('displaced_due_to_war_and_changed_housing_location') == 'لا' ? 'selected' : '' }}>
                                            لا</option>
                                    </select>
                                    <label for="displaced_due_to_war_and_changed_housing_location">: هل تم
                                        النزوح من المنزل بسبب الحرب وتم تغيير موقع المسكن </label>
                                    @error('displaced_due_to_war_and_changed_housing_location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">اسئلة للاسر التي نزحت من منازلها خلال
                                الحرب/ بيانات موقع السكن الجديد بعد النزوح</h5>
                            <!-- Displaced Governorate -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="displaced_governorate"
                                        name="displaced_governorate">
                                        <option>اختار</option>
                                        <option value="غزة"
                                            {{ old('displaced_governorate') == 'غزة' ? 'selected' : '' }}>غزة
                                        </option>
                                        <option value="شمال غزة"
                                            {{ old('displaced_governorate') == 'شمال غزة' ? 'selected' : '' }}>
                                            شمال غزة</option>
                                        <option value="دير البلح"
                                            {{ old('displaced_governorate') == 'دير البلح' ? 'selected' : '' }}>
                                            دير البلح</option>
                                        <option value="خانيونس"
                                            {{ old('displaced_governorate') == 'خانيونس' ? 'selected' : '' }}>
                                            خانيونس</option>
                                        <option value="رفح"
                                            {{ old('displaced_governorate') == 'رفح' ? 'selected' : '' }}>رفح
                                        </option>
                                        <option value="الخليل"
                                            {{ old('displaced_governorate') == 'الخليل' ? 'selected' : '' }}>
                                            الخليل</option>
                                        <option value="بيت لحم"
                                            {{ old('displaced_governorate') == 'بيت لحم' ? 'selected' : '' }}>
                                            بيت لحم</option>
                                        <option value="نابلس"
                                            {{ old('displaced_governorate') == 'نابلس' ? 'selected' : '' }}>
                                            نابلس</option>
                                        <option value="جنين"
                                            {{ old('displaced_governorate') == 'جنين' ? 'selected' : '' }}>
                                            جنين</option>
                                        <option value="طولكرم"
                                            {{ old('displaced_governorate') == 'طولكرم' ? 'selected' : '' }}>
                                            طولكرم</option>
                                        <option value="اريحا"
                                            {{ old('displaced_governorate') == 'اريحا' ? 'selected' : '' }}>
                                            اريحا</option>
                                        <option value="رام الله"
                                            {{ old('displaced_governorate') == 'رام الله' ? 'selected' : '' }}>
                                            رام الله</option>
                                        <option value="قلقيلية"
                                            {{ old('displaced_governorate') == 'قلقيلية' ? 'selected' : '' }}>
                                            قلقيلية</option>
                                        <option value="سلفيت"
                                            {{ old('displaced_governorate') == 'سلفيت' ? 'selected' : '' }}>
                                            سلفيت</option>
                                        <option value="القدس"
                                            {{ old('displaced_governorate') == 'القدس' ? 'selected' : '' }}>
                                            القدس</option>
                                        <option value="يطا"
                                            {{ old('displaced_governorate') == 'يطا' ? 'selected' : '' }}>يطا
                                        </option>
                                        <option value="طوباس"
                                            {{ old('displaced_governorate') == 'طوباس' ? 'selected' : '' }}>
                                            طوباس</option>
                                    </select>
                                    <label for="displaced_governorate">المحافظة</label>
                                    @error('displaced_governorate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Displaced Population Cluster -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0"
                                        id="displaced_population_cluster" name="displaced_population_cluster"
                                        value="{{ old('displaced_population_cluster') }}"
                                        placeholder="التجمع السكاني">
                                    <label for="displaced_population_cluster">:التجمع السكاني</label>
                                    @error('displaced_population_cluster')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Displaced Street -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="displaced_street"
                                        name="displaced_street" value="{{ old('displaced_street') }}"
                                        placeholder="الشارع">
                                    <label for="displaced_street">الشارع</label>
                                    @error('displaced_street')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Displaced Address -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="displaced_address"
                                        name="displaced_address" value="{{ old('displaced_address') }}"
                                        placeholder="العنوان">
                                    <label for="displaced_address">العنوان</label>
                                    @error('displaced_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Displaced Place of Displacement -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="displaced_place_of_displacement"
                                        name="displaced_place_of_displacement">
                                        <option>اختار</option>
                                        <option value="مدارس الاونروا"
                                            {{ old('displaced_place_of_displacement') == 'مدارس الاونروا' ? 'selected' : '' }}>
                                            مدارس الاونروا</option>
                                        <option value="مدارس حكومية"
                                            {{ old('displaced_place_of_displacement') == 'مدارس حكومية' ? 'selected' : '' }}>
                                            مدارس حكومية</option>
                                        <option value="منزل للاقارب بمقابل"
                                            {{ old('displaced_place_of_displacement') == 'منزل للاقارب بمقابل' ? 'selected' : '' }}>
                                            منزل للاقارب بمقابل</option>
                                        <option value="منزل اقارب بدون مقابل"
                                            {{ old('displaced_place_of_displacement') == 'منزل اقارب بدون مقابل' ? 'selected' : '' }}>
                                            منزل اقارب بدون مقابل</option>
                                        <option value="منزل اخر للعائلة"
                                            {{ old('displaced_place_of_displacement') == 'منزل اخر للعائلة' ? 'selected' : '' }}>
                                            منزل اخر للعائلة</option>
                                        <option value="منزل مستأجر"
                                            {{ old('displaced_place_of_displacement') == 'منزل مستأجر' ? 'selected' : '' }}>
                                            منزل مستأجر</option>
                                        <option value="مستشفيات"
                                            {{ old('displaced_place_of_displacement') == 'مستشفيات' ? 'selected' : '' }}>
                                            مستشفيات</option>
                                        <option value="خيمة"
                                            {{ old('displaced_place_of_displacement') == 'خيمة' ? 'selected' : '' }}>
                                            خيمة</option>
                                        <option value="كنيسة"
                                            {{ old('displaced_place_of_displacement') == 'كنيسة' ? 'selected' : '' }}>
                                            كنيسة</option>
                                        <option value="قاعات"
                                            {{ old('displaced_place_of_displacement') == 'قاعات' ? 'selected' : '' }}>
                                            قاعات</option>
                                        <option value="مراكز ايوائية"
                                            {{ old('displaced_place_of_displacement') == 'مراكز ايوائية' ? 'selected' : '' }}>
                                            مراكز ايوائية</option>
                                        <option value="اخرى"
                                            {{ old('displaced_place_of_displacement') == 'اخرى' ? 'selected' : '' }}>
                                            اخرى</option>
                                    </select>
                                    <label for="displaced_place_of_displacement">مكان النزوح</label>
                                    @error('displaced_place_of_displacement')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-primary text-center rtl">البيانات البنكية ان وجدت لرب الاسرة او احد
                                افرادها</h5>

                            <!-- Account Holder Name -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="account_holder_name"
                                        name="account_holder_name" value="{{ old('account_holder_name') }}"
                                        placeholder=" اسم صاحب الحساب البنكي">
                                    <label for="account_holder_name"> اسم صاحب الحساب البنكي</label>
                                    @error('account_holder_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Bank Name and Branch -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="bank_name_branch"
                                        name="bank_name_branch" value="{{ old('bank_name_branch') }}"
                                        placeholder=": اسم البنك/ الفرع">
                                    <label for="bank_name_branch">: اسم البنك/ الفرع</label>
                                    @error('bank_name_branch')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Account Holder ID Number -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="account_holder_id_number"
                                        name="account_holder_id_number"
                                        value="{{ old('account_holder_id_number') }}"
                                        placeholder="رقم هوية صاحب الحساب">
                                    <label for="account_holder_id_number">رقم هوية صاحب الحساب</label>
                                    @error('account_holder_id_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Account Number -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="account_number"
                                        name="account_number" value="{{ old('account_number') }}"
                                        placeholder="رقم الحساب">
                                    <label for="account_number">رقم الحساب</label>
                                    @error('account_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Agree to Share Data for Assistance -->
                            <!-- Agree to Share Data -->
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select border-0" id="agree_to_share_data_for_assistance"
                                        name="agree_to_share_data_for_assistance">
                                        <option>اختار</option>
                                        <option value="نعم"
                                            {{ old('agree_to_share_data_for_assistance') == 'نعم' ? 'selected' : '' }}>
                                            نعم</option>
                                        <option value="لا"
                                            {{ old('agree_to_share_data_for_assistance') == 'لا' ? 'selected' : '' }}>
                                            لا</option>
                                    </select>
                                    <label for="agree_to_share_data_for_assistance">هل توافق عل نشر البيانات
                                        المدخلة مع الجهات ذوي الاختصاص لغايات تقديم المساعدات؟</label>
                                    @error('agree_to_share_data_for_assistance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <!-- More fields would follow in a similar structure -->



                            <!-- Submit Button -->
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-8">
                                    <button type="submit"
                                        class="btn btn-primary rounded-pill w-100 py-3">إرسال</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
