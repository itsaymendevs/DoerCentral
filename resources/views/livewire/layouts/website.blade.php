<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

    <head>


        {{-- meta --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>DOER</title>



        {{-- icons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('site.webmanifest')}}">
        <link rel="mask-icon" href="{{url('safari-pinned-tab.svg')}}" color="#000000">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="theme-color" content="#000000">






        {{-- headlinks --}}
        @yield('head')





        {{-- fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Arabic:wght@100..900&display=swap"
            rel="stylesheet">







        {{-- swiper --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


        {{-- styles --}}
        <link rel="stylesheet" href="{{url('assets/plugins/website/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/fonts/material-icons.min.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/animate.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/aos.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/builder.css')}}">

        <link rel="stylesheet" href="{{url('assets/plugins/website/css/variables.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/common.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/frame.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/scroll.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/nice-select2.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/general.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/landing.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/meal-cards.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/on-boarding.cs')}}s">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/swiper.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/plans.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/responsive.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/plans-checkout.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/services.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/scrollbar.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/website.css') }}">
        <link rel="stylesheet" href="{{url('assets/plugins/website/css/login.css') }}">





        {{-- picker --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css" />



        {{-- icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">




        {{-- extra --}}
        @yield('styles')








        {{-- jquery --}}
        <script src="{{url('assets/plugins/website/js/jquery.min.js')}}"></script>




    </head>
    {{-- endHead --}}








    {{-- ----------------------------------------- --}}
    {{-- ----------------------------------------- --}}






    {{-- body --}}
    <body>



        {{-- loader --}}
        <div id="loader--wrapper">
            <div class="loader"></div>
        </div>







        {{-- ------------------------------------- --}}
        {{-- ------------------------------------- --}}






        {{-- content --}}
        {{ $slot }}






        {{-- ------------------------------------- --}}
        {{-- ------------------------------------- --}}







        {{-- modals --}}
        @yield('modals')








        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- scripts --}}
        <script src="{{url('assets/plugins/website/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{url('assets/plugins/website/js/aos.min.js')}}"></script>
        <script src="{{url('assets/plugins/website/js/nice-select2.js')}}"></script>


        {{-- picker --}}
        <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>


        {{-- swiper --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{url('assets/plugins/website/js/init-swiper.js') }}"></script>
        <script src="{{url('assets/plugins/website/js/re-init-swiper.js') }}"></script>




        {{-- general --}}
        <script src="{{url('assets/plugins/website/js/bs-init.js') }}"></script>
        <script src="{{url('assets/plugins/website/js/file-preview.js') }}"></script>
        <script src="{{url('assets/plugins/website/js/re-init-general.js') }}"></script>


        <script src="{{url('assets/plugins/website/js/customise.j')}}s"></script>
        <script src="{{url('assets/plugins/website/js/init-nice-select.js')}}"></script>



        {{-- sweetAlert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />





        {{-- typed --}}
        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>


        @yield('scripts')





        <script>
            $(document).ready(function() {
                $("#loader--wrapper").delay(2000).fadeOut("slow");
            })
        </script>





    </body>
</html>
{{-- endHTML --}}