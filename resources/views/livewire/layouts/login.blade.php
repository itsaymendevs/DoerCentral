<!DOCTYPE html>
<html lang="en">


    <head>

        {{-- meta --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>DOER.</title>

        <meta name="description" content="Meal Plans Solution">
        <meta name="keywords" content="Meal Plans, Meal Plans in Dubai, DOER, DOER SOLUTION">
        <meta name="author" content="TRUTH. SOLUTIONS">



        {{-- icons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#000000">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="theme-color" content="#000000">




        {{-- bootstrap - Fonts --}}
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Arabic:400,500,600,700,800&amp;display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap"
            rel="stylesheet">



        {{-- styles --}}
        <link href="{{ asset('assets/css/aos.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/swiper.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/dropzone.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/background.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/clients.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/file.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/globals.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/inventory.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/modal/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/modal/normalize.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/print.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/reports.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/search.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/select2-custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/select2-schemes.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">




        {{-- JQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    {{-- endHead --}}







    {{-- ----------------------------------------------------- --}}





    {{-- body --}}

    <body class="animated-bg">







        {{-- content --}}
        {{ $slot }}








        {{-- --------------------------------------------------------- --}}
        {{-- --------------------------------------------------------- --}}







        {{-- scripts --}}
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/aos.min.js') }}"></script>
        <script src="{{ asset('assets/js/bs-init.js') }}"></script>
        <script src="{{ asset('assets/js/datatables.js') }}"></script>
        <script src="{{ asset('assets/js/init-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/init.js') }}"></script>
        <script src="{{ asset('assets/js/modal/animatedModal.js') }}"></script>
        <script src="{{ asset('assets/js/print.min.js') }}"></script>
        <script src="{{ asset('assets/js/reports/expand.js') }}"></script>
        <script src="{{ asset('assets/js/reports/print.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/switches.js') }}"></script>




        {{-- swiper --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{ asset('assets/js/init-swiper.js') }}"></script>


        {{-- 1: sweetAlert 2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />


        {{-- reinitiate packages --}}
        <script src="{{ asset('assets/js/re-init.js') }}"></script>




    </body>

</html>
{{-- end html --}}