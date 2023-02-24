<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Catalog</title>
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

<body>
    <!-- Navbar Section Start -->
    @include('web.backoffice.partials.header')
    <!-- Navbar Section End -->

    @include('web.backoffice.partials.sidebar')

    <div id="main" class="pt-20 lg:relative lg:w-full lg:pl-[256px]">
        @yield('contents')
    </div>

    <section id="backdrop" class="fixed hidden top-0 bottom-0 right-0 left-0 bg-white bg-opacity-10"
        style="backdrop-filter: blur(5px);">
    </section>
    <!-- Scripts -->
    @stack('scripts')
    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
</body>

</html>
