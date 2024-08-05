<!DOCTYPE html>
<html lang="en">

    {{-- head --}}

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
        <link href="{{ asset('assets/css/stickers.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/simple-animate.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/checkout.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/builder.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/settings.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/editor.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/only-print.css') }}" rel="stylesheet">




        @yield('styles')





        {{-- JQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" data-navigate-once></script>




        {{-- bootstrap-icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">






        {{-- QuillCSS --}}
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />



        {{-- QuillJS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>









        {{-- head --}}
        @yield('head')



    </head>
    {{-- end head --}}






    {{-- ----------------------------------------------------- --}}








    {{-- body --}}
    <body class='d-none d-lg-block'>





        {{-- loader --}}
        <livewire:loaders.logo-loader />







        <div data-aos="fade" data-aos-duration="1000">





            {{-- navbar --}}


            {{-- 1: CLIENT APP --}}
            @if (env('APP_TYPE') == 'CLIENT' || env('APP_TYPE') == 'BOTH')



            <livewire:components.dashboard.navbar />




            {{-- 2: SERVER APP --}}
            @else



            <livewire:components.dashboard.control-navbar />



            @endif
            {{-- end if - CLIENT APP --}}






            {{-- ------------------------------ --}}
            {{-- ------------------------------ --}}




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
        <script src="{{ asset('assets/js/datatables.js') }}"></script>
        <script src="{{ asset('assets/js/init-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/modal/animatedModal.js') }}"></script>
        <script src="{{ asset('assets/js/print.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/bs-init.js') }}"></script>
        <script src="{{ asset('assets/js/reports/expand.js') }}"></script>
        <script src="{{ asset('assets/js/reports/print.js') }}"></script>
        <script src="{{ asset('assets/js/init.js') }}"></script>
        <script src="{{ asset('assets/js/switches.js') }}"></script>
        <script src="{{ asset('assets/js/range-input.js') }}"></script>
        <script src="{{ asset('assets/js/file-preview.js') }}"></script>
        <script src="{{ asset('assets/js/button-checkbox.js') }}"></script>
        <script src="{{ asset('assets/js/html2canvas.js') }}"></script>
        <script src="{{ asset('assets/js/preview-password.js') }}"></script>









        {{-- 1.1: sweetAlert 2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />







        {{-- 1.2: activateTab --}}
        <script src="{{ asset('assets/js/activate-tab.js') }}"></script>




        {{-- 1.3: reinitiate select extensions --}}
        <script src="{{ asset('assets/js/re-init-select.js') }}"></script>




        {{-- 1.4: reinitiate general extensions --}}
        <script src="{{ asset('assets/js/re-init-general.js') }}"></script>





        {{-- 1.5: builder extensions --}}
        <script src="{{ asset('assets/js/builder.js') }}"></script>



        {{-- 1.6: init actions (download / print) --}}
        <script src="{{ asset('assets/js/init-actions.js') }}"></script>





        {{-- 1.6: otherScripts --}}
        @yield('scripts')



    </body>

</html>
{{-- end html --}}