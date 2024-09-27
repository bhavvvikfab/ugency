<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('layout.headlinks')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <!-- ======= Header ======= -->
    @include('layout.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layout.sidebar')
    <!-- End Sidebar-->

    <!-- ======= Main ======= -->
    @yield('body')
    <!-- End Main -->

    <!-- ======= Footer ======= -->
    @include('layout.footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('layout.appscript')

    <!-- Page level custom scripts -->
    @stack('scripts')
    <!-- End Page level custom scripts -->
</body>

</html>