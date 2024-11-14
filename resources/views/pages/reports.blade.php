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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">التقارير</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item active text-white">التقارير</li>
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
                            <h3 class="text-primary text-center">التقارير</h3>
                            <h3 class="display-5 mb-4 text-center">تقرير تبرعات برنامج أمل المستقبل</h3>
                            <div class="counter">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="employees">
                                                <p class="counter-count">{{ $leadersCount ?? 0 }} </p>
                                                <p class="employee-p">عدد المتبرعين</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="customer">
                                                <p class="counter-count"><strong>{{ $donationAmount ?? 0 }}</strong></p>
                                                <p class="customer-p">المبلغ الإجمالي</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="design">
                                                <p class="counter-count">25000</p>
                                                <p class="design-p">عدد الأيتام في حرب غزة الأخيرة</p>
                                            </div>
                                        </div>
{{--
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="order">
                                                <p class="counter-count">652</p>
                                                <p class="order-p">عدد أيتام فلسطين</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="{{ asset('images/report-1.jpeg') }}" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endsection


<!-- jQuery and Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.counter-count').each(function() {
            var $this = $(this);
            var targetValue = parseInt($this.text());

            $this.prop('Counter', 0).animate({
                Counter: targetValue
            }, {
                duration: 6000, // Adjust as needed
                easing: 'swing',
                step: function(now) {
                    if (now >= 1000) {
                        $this.text((now / 1000).toFixed(1) + 'K');
                    } else {
                        $this.text(Math.ceil(now));
                    }
                }
            });
        });
    });
</script>
