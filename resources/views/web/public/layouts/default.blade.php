<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilya Collection</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    @stack('styles')
    <link href="{{ asset('fontawesome-5/css/all.css') }}" rel="stylesheet">
</head>

<body class="dark:bg-slate-800">
    <!-- Navbar Section Start -->
    @include('web.public.partials.navbar')
    <!-- Navbar Section End -->

    <div id="main" class="space-y-8 mb-8">
        @yield('contents')
    </div>

    @include('web.public.partials.footer')
    <!-- Scripts -->
    @stack('scripts')
    <script src="{{ asset('js/flowbite.js') }}"></script>
</body>

</html>
