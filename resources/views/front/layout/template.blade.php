<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="CraftForge" />
        @stack('meta-seo')
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)--> 
        <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        @stack('css')
    </head>
    <body style="font-family: Roboto">
        <!-- Responsive navbar-->
        @include('front.layout.navbar')
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-4">
                    <h1 class="fw-bolder">Welcome to the World of Blogging!</h1>
                    <p class="lead mb-0"> Discover new insights with every read</p>
                </div>
            </div>
            @yield('content')
        </header>


        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; CraftForge {{ date('Y') }}</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front/js/scripts.js')}}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        @stack('js')
    </body>
</html>