<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords"
        content="@yield('keywords')" />
    <meta name="author" content="liveprojectacademy" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @stack('meta')


    <!-- fonts file -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- css file  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/extra.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/cookie-consent.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('front/assets/images/'. get_settings()->favicon)}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('front/assets/css/toastr.css')}}">



</head>

<body class="direction-ltr">
@include('front.layouts.partials.header')

<div class="maincontent">
    @yield('content')
</div>




@include('front.layouts.partials.footer')

<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}", 'Validation Error');
        @endforeach
    @endif

</script>
     @stack('scripts')

     <script>
        window.routes = {
            cartAdd: "{{ route('cart.add') }}",
        };
        window.csrfToken = "{{ csrf_token() }}";
    </script>

</body>

</html>
