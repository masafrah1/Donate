<!DOCTYPE html>

<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}" />
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>@yield('title', 'Donation Page')</title>
    <link rel="stylesheet" href="{{ asset('css/style-old.css') }}">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



</head>

<body>

    <!-- Header -->
    @include('forms.header') <!-- Include the header -->
    <!-- Main Content -->
    <main>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
    <!-- Footer -->
    @include('front-layout.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const donorTypeCheckbox = document.getElementById('donor_type');
            const personInfoFields = document.querySelectorAll('.person-info');
            const companyInfoField = document.querySelector('.company-info');

            function toggleFields() {
                if (donorTypeCheckbox.checked) {
                    personInfoFields.forEach(field => field.style.display = 'none');
                    companyInfoField.style.display = 'block';
                    document.getElementById('first_name').removeAttribute('required');
                    document.getElementById('family_name').removeAttribute('required');
                    document.getElementById('company_name').setAttribute('required', 'required');
                } else {
                    personInfoFields.forEach(field => field.style.display = 'block');
                    companyInfoField.style.display = 'none';
                    document.getElementById('first_name').setAttribute('required', 'required');
                    document.getElementById('family_name').setAttribute('required', 'required');
                    document.getElementById('company_name').removeAttribute('required');
                }
            }

            donorTypeCheckbox.addEventListener('change', toggleFields);
            toggleFields(); // تأكد من استدعاء الدالة عند تحميل الصفحة
        });
    </script>

    <script>
        $(document).ready(function() {
            console.log('jQuery version:', $.fn.jquery);
            console.log('Select2 exists:', typeof $.fn.select2);

            // Initialize Select2 on all elements with the class 'select2-multiple'
            $('.select2-multiple').select2({
                placeholder: "حدد الخيارات", // Placeholder text in Arabic
                allowClear: true // Enable clear functionality
            });
        });
    </script>
</body>

</html>
