        <!-- Abvout Start -->
        <div class="container-fluid about py-5">
            <div class="container py-5" id="donationSection">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="text-primary text-center rtl">تبرع</h2>
                            <p class="mb-4 rtl text-center">اكفل يتيماً، وكن جزءاً من مستقبل مشرق <a
                                    class="text-primary fw-bold" href="https://htmlcodex.com/contact-form">حمل الان</a>.
                            </p>
                            <form action="{{ route('donation.submit') }}" method="POST">
                                @csrf
                                <div class="row g-4 rtl">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="program" name="program" required>
                                                {{-- <option selected disabled>اختر البرنامج</option> --}}
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}">{{ $program->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="program">البرنامج <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-switch d-flex justify-content-start align-items-center">
                                            <label class="form-check-label mb-0" for="donor_type">هل المتبرع
                                                شركة؟</label>
                                            <input class="form-check-input ms-2" type="checkbox" id="donor_type"
                                                name="donor_type">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6 person-info">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="first_name"
                                                name="first_name" placeholder="الاسم الأول">
                                            <label for="first_name">الاسم الأول <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6 person-info">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="family_name"
                                                name="family_name" placeholder="اسم العائلة">
                                            <label for="family_name">اسم العائلة <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6 company-info" style="display: none;">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="company_name"
                                                name="company_name" placeholder="اسم الشركة">
                                            <label for="company_name">اسم الشركة <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" id="email"
                                                name="email" required placeholder="البريد الإلكتروني">
                                            <label for="email">البريد الإلكتروني <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control border-0" id="phone"
                                                name="phone" required placeholder="الهاتف/المحمول"
                                                pattern="^\+?\d{7,13}$"
                                                title="يرجى إدخال رقم هاتف يبدأ بـ + (اختياري) ويحتوي على 7 إلى 13 أرقام فقط">
                                            <label for="phone">الهاتف/المحمول <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="country" name="country" required>
                                                <option selected disabled>اختر البلد</option>
                                                @foreach ($countries as $code => $name)
                                                    <option value="{{ $code }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="country">البلد <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="currency" name="currency"
                                                required>
                                                <option value="JOD" selected>JOD</option>
                                                <option value="USD">USD</option>
                                                <option value="ILS">ILS</option>
                                                <option value="EUR">EUR</option>
                                            </select>
                                            <label for="currency">العملة <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control border-0 rtl" id="amount"
                                                name="amount" step="1" required placeholder="المبلغ"
                                                value="10" min="1">
                                            <label for="amount">المبلغ <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control border-0 rtl"
                                                id="number_orphans" name="number_orphans" required
                                                placeholder="عدد الأيتام" value="1" min="1">
                                            <label for="number_orphans">عدد الأيتام المستهدفين <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="payment_method" name="payment_method"
                                                required>
                                                <option value="Offline">Offline</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            <label for="payment_method">طريقة الدفع <span
                                                    class="text-danger">*</span></label>
                                        </div>


                                    </div>

                                    <div class="col-12">
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="is_private"
                                                name="is_private">
                                            <label class="form-check-label" for="is_private">أريد أن يكون تبرعي
                                                مجهولًا</label>
                                        </div>
                                    </div>

                                    <!-- زر الإرسال -->
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="col-8">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill w-100 py-3">تبرع</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="{{ asset('/images/donation.jpg') }}" class="img-fluid rounded w-100"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
