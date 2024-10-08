<!DOCTYPE html>
<html lang="en">


    <head>

        {{-- meta --}}
        <meta charset="utf-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
        <title>DOER.</title>

        <meta name="description" content="Meal Plans Solution">
        <meta name="keywords" content="Meal Plans, Meal Plans in Dubai, DOER, DOER SOLUTION">
        <meta name="author" content="TRUTH. SOLUTIONS">



        {{-- icons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('site.webmanifest')}}">
        <link rel="mask-icon" href="{{url('safari-pinned-tab.svg')}}" color="#000000">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="theme-color" content="#000000">







        {{-- bootstrap - Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Arabic:wght@100..900&display=swap"
            rel="stylesheet">







        {{-- styles --}}
        <link href="{{ url('assets/css/aos.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/background.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/clients.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/file.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/globals.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/home.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/inventory.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/login.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/scrollbar.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/search.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet">




        {{-- JQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    {{-- endHead --}}







    {{-- ----------------------------------------------------- --}}





    {{-- body --}}

    <body>







        {{-- content --}}
        {{ $slot }}








        {{-- --------------------------------------------------------- --}}
        {{-- --------------------------------------------------------- --}}










        {{-- scripts --}}
        <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/aos.min.js') }}"></script>
        <script src="{{ url('assets/js/bs-init.js') }}"></script>
        <script src="{{ url('assets/js/switches.js') }}"></script>
        <script src="{{ url('assets/js/preview-password.js') }}"></script>




        {{-- swiper --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{ url('assets/js/init-swiper.js') }}"></script>


        {{-- 1: sweetAlert 2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />


        {{-- reinitiate packages --}}
        <script src="{{ url('assets/js/re-init.js') }}"></script>




    </body>

</html>
{{-- end html --}}