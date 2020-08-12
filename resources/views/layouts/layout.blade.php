<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
    @include('includes.head')
</head>
<body>
    <!-- Navigation -->
    @include('includes.navigation')
    <!-- Header -->
    @yield('header')
    <!-- Content -->
    @yield('content')
    <!-- Footer -->
    @include('includes.footer')
    <!-- Scripts -->
    @include('includes.scripts')
</body>
</html>
