<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title> @yield('title')| {{ get_site_name() }}.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="keywords" content="veltrix,veltrix laravel,admin template,new admin panel,laravel 10">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ favicon_face_logo() }}">

    @include('layouts.head-css')
</head>
@yield('body')

<!-- Start content -->
@yield('content')
<!-- content -->

@include('layouts.vendor-scripts')

</body>

</html>
