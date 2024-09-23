<!doctype html>
<html lang="en-US">


    {{-- head --}}
    <head>


        {{-- meta --}}
        <meta charset="utf-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1, user-scalable=no">




        {{-- icons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('site.webmanifest')}}">
        <link rel="mask-icon" href="{{url('safari-pinned-tab.svg')}}" color="#000000">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="theme-color" content="#000000">





        {{-- fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Arabic:wght@100..900&display=swap"
            rel="stylesheet">








        {{-- styles --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/variables.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/variables-customization.css')}}">

        <link rel="stylesheet" href="{{url('assets/plugins/leads/bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/select2.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/scrollbar.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/vendors/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/vendors/splitting.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/vendors/swiper.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/vendors/animate.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/main.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/air-datepicker.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/globals.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/plans.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/single-plan.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/select-custom.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/invoice.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/custom-swal.css')}}" />


        {{-- animation --}}





        {{-- extra --}}
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/extras.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/leads/css/leads.css')}}" />





        {{-- scripts --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>





        {{-- head --}}
        @yield('head')



    </head>
    {{-- endHead --}}









    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}










    {{-- body --}}
    <body class="home page">
        <div class="container-page">




            {{-- preloader --}}
            <livewire:leads.components.leads-preloader />




            {{-- -------------------------------------------------------- --}}
            {{-- -------------------------------------------------------- --}}




            {{-- content --}}
            {{ $slot }}





            {{-- -------------------------------------------------------- --}}
            {{-- -------------------------------------------------------- --}}



            {{-- cursor --}}
            <livewire:leads.components.leads-cursor />






        </div>
        {{-- endContainer --}}













        {{-- ------------------------------------------------ --}}
        {{-- ------------------------------------------------ --}}








        {{-- scripts --}}
        <script src="{{url('assets/plugins/leads/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/select2.min.js') }}"></script>
        <script src="{{url('assets/plugins/leads/js/swiper.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/splitting.min.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/TweenMax.min.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/pixi.min.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/jarallax.min.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/magnific-popup.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/imagesloaded.pkgd.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/isotope.pkgd.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/jquery.scrolla.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/skrollr.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/main-slider.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/full-slider.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/half-slider.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/ex-slider.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/hero-started.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/common.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/init-select.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/init-general.js')}}"></script>
        <script src="{{url('assets/plugins/leads/js/bubbles--bg.js')}}"></script>



        {{-- sweetAlert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />


        @yield('scripts')



    </body>
</html>
{{-- endHTML --}}
