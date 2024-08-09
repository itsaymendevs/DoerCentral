<!doctype html>
<html lang="en-US">


    {{-- head --}}
    <head>


        {{-- meta --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


        {{-- icons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#000000">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="theme-color" content="#000000">





        {{-- fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        {!! $fontLinks !!}




        {{-- fonts - fallback --}}
        @if (empty($fontLinks))

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <link
            href="https://fonts.googleapis.com/css2?family=Courgette&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        @endif
        {{-- end if --}}









        {{-- styles --}}
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/variables.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/vendors/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/fonts/font-awesome/css/font-awesome.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/vendors/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/vendors/splitting.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/vendors/swiper.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/vendors/animate.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/main.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/plans.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/scrollbar.css')}}" />
        <link rel="stylesheet" href="{{url('assets/plugins/subscription/css/only-plans.css')}}" />





        {{-- scripts --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>







        {{-- head --}}
        @yield('head')





        {{-- styles --}}
        @yield('styles')







    </head>
    {{-- endHead --}}









    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}










    {{-- body --}}
    <body class="home page">
        <div class="container-page">




            {{-- preloader --}}
            <livewire:website.plans.components.plans-preloader />






            {{-- navbar --}}
            <livewire:website.plans.components.plans-navbar />







            {{-- content --}}
            {{ $slot }}








            {{-- cursor --}}
            <livewire:website.plans.components.plans-cursor />







        </div>
        {{-- endContainer --}}










        {{-- modals --}}
        @yield('modals')






        {{-- ------------------------------------------------ --}}
        {{-- ------------------------------------------------ --}}








        {{-- scripts --}}
        <script src="{{url('assets/plugins/subscription/js/bootstrap.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/swiper.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/splitting.min.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/TweenMax.min.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/pixi.min.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/jarallax.min.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/magnific-popup.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/imagesloaded.pkgd.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/isotope.pkgd.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/jquery.scrolla.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/skrollr.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/main-slider.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/full-slider.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/half-slider.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/ex-slider.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/hero-started.js')}}"></script>
        <script src="{{url('assets/plugins/subscription/js/common.js')}}"></script>





        {{-- sweetAlert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />




        @yield('scripts')



    </body>
</html>