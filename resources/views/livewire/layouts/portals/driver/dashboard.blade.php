<!DOCTYPE html>
<html lang="en">

    {{-- head --}}

    <head>

        {{-- meta --}}
        <meta charset="utf-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
        <title>Driver Portal - DOER.</title>

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
        <link href="{{ asset('assets/css/background.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/clients.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/file.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/globals.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
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
        <link href="{{ asset('assets/css/uploader.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/plans.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bundles.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/customers.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/kitchen.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/simple-animate.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/swiper.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/loader.css') }}?id=554" rel="stylesheet">



        {{-- :: special --}}
        <link href="{{ asset('assets/css/mobile-responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/portals/driver.css') }}" rel="stylesheet">






        @yield('styles')





        {{-- JQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" data-navigate-once></script>





    </head>
    {{-- end head --}}






    {{-- ----------------------------------------------------- --}}








    {{-- body --}}
    <body>






        {{-- loader --}}
        <livewire:loaders.logo-loader />








        {{-- -------------------------------------- --}}
        {{-- -------------------------------------- --}}




        {{-- mobile- side-menu --}}
        <livewire:driver-portal.components.side-menu />







        {{-- mobile - sub-menu --}}
        <livewire:driver-portal.components.sub-menu />






        {{-- -------------------------------------- --}}
        {{-- -------------------------------------- --}}








        <div data-aos="fade" data-aos-duration="1000" class='position-relative'>





            {{-- navbar --}}
            <livewire:components.portals.driver.navbar />




            {{-- content --}}
            {{ $slot }}





        </div>
        {{-- end animated-wrapper --}}








        {{-- modals --}}
        @yield('modals')





        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}






        {{-- :: scripts --}}
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" data-navigate-once></script>
        <script src="{{ asset('assets/js/aos.min.js') }}"></script>
        <script src="{{ asset('assets/js/modal/animatedModal.js') }}"></script>
        <script src="{{ asset('assets/js/print.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/bs-init.js') }}"></script>
        <script src="{{ asset('assets/js/init.js') }}?id=331"></script>
        <script src="{{ asset('assets/js/range-input.js') }}"></script>
        <script src="{{ asset('assets/js/file-preview.js') }}"></script>
        <script src="{{ asset('assets/js/button-checkbox.js') }}"></script>







        {{-- 1.1: sweetAlert 2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />








        {{-- 1.2: reinitiate select extensions --}}
        <script src="{{ asset('assets/js/re-init-select.js') }}"></script>



        {{-- 1.3: activateTab --}}
        <script src="{{ asset('assets/js/activate-tab.js') }}"></script>


        {{-- 1.4: reinitiate general extensions --}}
        <script src="{{ asset('assets/js/re-init-general.js') }}"></script>




        {{-- 1.5: customer.js --}}
        <script src="{{ asset('assets/js/portals/customer.js') }}"></script>





        {{-- 1.6: init actions (download / print) --}}
        <script src="{{ asset('assets/js/init-actions.js') }}"></script>





        {{-- 1.6: otherScripts --}}
        @yield('scripts')



    </body>

</html>
{{-- end html --}}