<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eJobs - Job Portal Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    @yield('styles')
</head>

<body>
<div class="bg-white p-0">
    <div class="App">

        @include('frontend.layouts.nav')

        @yield('content');

        @include('frontend.layouts.footer')

        <a href="/" class="btn btn-sm btn-default btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}">
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

<script>

    function activeHeaderCarousel() {
        $(".header-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1500,
            items: 1,
            dots: true,
            loop: true,
            nav: true,
            navText: [
                '<i class="bi bi-chevron-left"></i>',
                '<i class="bi bi-chevron-right"></i>'
            ]
        });
    }
</script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
    $(".select2-input").select2({
        placeholder: "Select",
        allowClear: true
    });
</script>

@yield('scripts')

{!! Toastr::message() !!}
</body>
</html>
