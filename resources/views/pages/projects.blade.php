
@extends('front-layout.layout')
@section('title', 'أمل المستقبل')
@section('content')


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">

            <!-- Header Start -->
            <div class="container-fluid bg-breadcrumb">
                <!-- Background Image -->
                <img src="{{ asset('images/about.jpeg') }}" alt="Background" class="bg-breadcrumb-img">

                <!-- Gradient Overlay -->
                <div class="bg-breadcrumb-overlay"></div>

                <!-- Breadcrumb Content -->
                <div class="container text-center py-5 bg-breadcrumb-content" style="max-width: 900px;">
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"> برنامج أمل المستقبل</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item active text-white">برنامج أمل المستقبل</li>
                        <li class="breadcrumb-item text-white"><a href="/">الرئيسة</a></li>
                    </ol>
                </div>
            </div>

        <!-- Navbar & Hero End -->


        <!-- Abvout Start -->
        <div class="container-fluid about py-5 rtl">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">برنامج أمل المستقبل</h4>
                            <h1 class="display-5 mb-4">برنامج  "بناة المستقبل" يحتوي على عدد من المشاريع وهي: </h1>
                            <p class="mb-4 p-about-us" id="project-1">
                                1.	مشروع الكفالات المالية، بحيث تقدم كفالة مالية شهرية للأيتام من عمر يوم لغاية 18 عاما، بتكلفة سنوية تقدر 48.000.000
                            </p>
                            <p class="mb-4 p-about-us" id="project-2">
                                2.	مشروع بناء  تسعة مراكز إيوائية في قطاع غزة (شمال، وسط وجنوب) بتكلفة إجمالية $49,245,530
                                .يضمن تكاليف تشغيلية لمدة عام.
                            </p>
                            <p class="mb-4 p-about-us" id="project-3">
                                3.	مشروع دعم نفسي اجتماعي لحوالي 500.000 طفل يتيم من قطاع غزة بتكلفة إجمالية 10.000.000 $
                            </p>
                            <p class="mb-4 p-about-us" id="project-4">
                                4.	مشروع التعافي الطبي لحوالي 6,000 يتيم بحاجة إلى العلاج الطبي بتكلفة تقديرية إجمالية 10.000.000 $
                            </p>
                            <p class="mb-4 p-about-us" id="project-5">
                                5.	مشروع رعاية الأيتام من ذوي الإعاقة لحوالي 4000 يتيم من ذوي الإعاقة بحاجة إلى خدمات تأهيلية بتكلفة تقديرية 5.000.000 $
                            </p>
                            <p class="mb-4 p-about-us" id="project-6">
                                6.	مشروع توفير الرعاية البديلة للأطفال الأيتام لحوالي 10.000 يتيم ممن فقدوا والديهم في الحرب بتكلفة تقديرية 3.000.000 $
                            </p>

                        </div>
                    </div>

                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="{{ asset('images/project-1.jpeg') }}" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endsection
