@extends('forms.form-layout')
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
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">استمارة الاحتياج للمتضررين من الحرب 2023-2024</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item active text-white">نموذج طلب مساعدة للاسر التي تضررت من الحرب 2023-2024 غزة /الضفة الغربية وزارة التنمية الاجتماعية الفلسطينية                        </li>
                        {{-- <li class="breadcrumb-item text-white"><a href="/">الرئيسة</a></li> --}}
                    </ol>
                </div>
            </div>

            <!-- Navbar & Hero End -->


    @if (session('toastr_error'))
        <script>
            toastr.error("{!! session('toastr_error') !!}");
        </script>
    @endif


    @include('forms.war-form')

@endsection
