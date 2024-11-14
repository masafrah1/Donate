@extends('front-layout.layout')
@section('title', 'أمل المستقبل')
@section('content')


@include('front-layout.carousel')

    {{-- <div id="donationSection" class="container">
        <!-- Thank You Message -->
        <div class="thank-you-message">
            شكراً على تبرعك
        </div>

        <!-- Bank Transfer Information Box -->
        @foreach($offlineAccounts as $account)
        <div class="donation-box text-center">
            <h5>للتبرع عن طريق الحوالات البنكية</h5>
            <p class="bank-info">
                <span>Bank:</span> {{ $account->bank_name }}<br>
                <span>Beneficiary Name:</span> {{ $account->beneficiary }}<br>
                <span>Swift Code:</span> {{ $account->swift_code }}<br>
                <span>IBAN:</span> {{ $account->iban }}
            </p>
        </div>
        @endforeach

        <!-- Contact Information -->
       <div class="contact-info text-center">
            <p>للمزيد من المعلومات:</p>
            <p>
                البريد الالكتروني: <a href="mailto:rmteam@taawon.org">rmteam@taawon.org</a><br>
                رام الله: +97022415130 | عمان: +962791586181 | لبنان: +96171823337
            </p>
        </div>
    </div> --}}

            <!-- Offer Start -->
            <div class="container-fluid offer-section pb-5 pt-5">
                <div class="container pb-5">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h4 class="text-primary">أمل المستقبل</h4>
                        <h1 class="display-5 mb-4">ساهم في التبرع عبر الحوالة البنكية بسهولة وأمان.</h1>
                        <p class="mb-0 rtl">التبرع من خلال الحوالة البنكية هو وسيلة سهلة وآمنة لدعم القضايا الخيرية. يتم ذلك عن طريق تحويل المبلغ المطلوب من حسابك البنكي إلى حساب المؤسسة الخيرية المعنية. يمكن إجراء الحوالة عبر تطبيقات البنك أو من خلال زيارة الفرع، مما يسهل عملية التبرع دون الحاجة للقاء شخصي.
                        </p>
                    </div>
                    @foreach($offlineAccounts as $account)
                    <div class="row g-5 align-items-center d-flext justify-content-center pt-4 rtl">
                        <div class="col-xl-8 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="nav nav-pills bg-light rounded p-5">
                                <a class="accordion-link p-4 active mb-4" data-bs-toggle="pill" href="#collapseOne">
                                    <h6 class="mb-0">اسم البنك: {{ $account->bank_name  }}</h6>
                                </a>
                                <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseTwo">
                                    <h6 class="mb-0">اسم المستفيد: {{ $account->beneficiary }}</h6>
                                </a>
                                <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseThree">
                                    <h6 class="mb-0">سويفت كود البنك: {{ $account->swift_code }}</h6>
                                </a>
                                <a class="accordion-link p-4 mb-0" data-bs-toggle="pill" href="#collapseFour">
                                    <h6 class="mb-0">رقم الحساب المصرفي الدولي(IBAN): {{ $account->iban }}</h6>
                                </a>
                            </div>

                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <!-- Offer End -->
    @endsection

