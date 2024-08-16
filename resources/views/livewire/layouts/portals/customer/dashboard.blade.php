<!DOCTYPE html>
<html lang="en">

   {{-- head --}}

   <head>

      {{-- meta --}}
      <meta charset="utf-8">
      <meta name="viewport"
         content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
      <title>Customer Portal</title>

      <meta name="description" content="Meal Plans Solution">
      <meta name="keywords" content="Meal Plans, Meal Plans in Dubai, DOER, DOER SOLUTION">
      <meta name="author" content="TRUTH. SOLUTIONS">



      {{-- icons --}}
      <link rel="apple-touch-icon" sizes="180x180" href="{{url('favicon/apple-touch-icon.png')}}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicon/favicon-32x32.png')}}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicon/favicon-16x16.png')}}">
      <link rel="mask-icon" href="{{url('favicon/safari-pinned-tab.svg')}}" color="#00a155">
      <link rel="manifest" href="{{url('favicon/site.webmanifest')}}">
      <meta name="msapplication-TileColor" content="#00aba9">
      <meta name="theme-color" content="#ffffff">






      {{-- bootstrap - Fonts --}}
      <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Arabic:400,500,600,700,800&amp;display=swap"
         rel="stylesheet">
      <link
         href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap"
         rel="stylesheet">






      {{-- styles --}}
      <link href="{{ url('assets/css/aos.min.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/background.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/clients.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/file.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/globals.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/home.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/inventory.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/login.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/modal/animate.min.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/modal/normalize.min.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/navbar.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/print.min.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/reports.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/scrollbar.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/search.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/select2-custom.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/select2-schemes.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/select2.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/uploader.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/plans.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/bundles.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/customers.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/kitchen.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/simple-animate.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/swiper.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/loader.css') }}?id=554" rel="stylesheet">



      {{-- :: special --}}
      <link href="{{ url('assets/css/mobile-responsive.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/portals/customer.css') }}" rel="stylesheet">




      {{-- :: customization --}}
      <link href="{{ url('assets/css/client-customization/' . strtolower(env('APP_CLIENT')) . '.css') }}"
         rel="stylesheet">









      {{-- :: swiper --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />





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
      <livewire:loaders.regular-loader />








      {{-- -------------------------------------- --}}
      {{-- -------------------------------------- --}}











      {{-- mobile- sub-menu --}}
      <livewire:customer-portal.components.mobile-sub-menu key='submenu' />



      {{-- mobile- side-menu --}}
      <livewire:customer-portal.components.mobile-side-menu key='sidemenu' />





      {{-- -------------------------------------- --}}
      {{-- -------------------------------------- --}}








      <div data-aos="fade" data-aos-duration="1000" class='position-relative'>





         {{-- navbar --}}
         <livewire:components.portals.customer.navbar />




         {{-- content --}}
         {{ $slot }}





      </div>
      {{-- end animated-wrapper --}}








      {{-- modals --}}
      @yield('modals')





      {{-- -------------------------------------------- --}}
      {{-- -------------------------------------------- --}}






      {{-- :: scripts --}}
      <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}" data-navigate-once></script>
      <script src="{{ url('assets/js/aos.min.js') }}"></script>
      <script src="{{ url('assets/js/modal/animatedModal.js') }}"></script>
      <script src="{{ url('assets/js/print.min.js') }}"></script>
      <script src="{{ url('assets/js/select2.min.js') }}"></script>
      <script src="{{ url('assets/js/bs-init.js') }}"></script>
      <script src="{{ url('assets/js/init.js') }}?id=331"></script>
      <script src="{{ url('assets/js/init-swiper.js') }}"></script>
      <script src="{{ url('assets/js/switches.js') }}"></script>
      <script src="{{ url('assets/js/range-input.js') }}"></script>
      <script src="{{ url('assets/js/file-preview.js') }}"></script>
      <script src="{{ url('assets/js/button-checkbox.js') }}"></script>







      {{-- 1.1: sweetAlert 2 --}}
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <x-livewire-alert::scripts />








      {{-- 1.2: reinitiate select extensions --}}
      <script src="{{ url('assets/js/re-init-select.js') }}"></script>



      {{-- 1.3: activateTab --}}
      <script src="{{ url('assets/js/activate-tab.js') }}"></script>


      {{-- 1.4: reinitiate general extensions --}}
      <script src="{{ url('assets/js/re-init-general.js') }}"></script>




      {{-- 1.5: customer.js --}}
      <script src="{{ url('assets/js/portals/customer.js') }}"></script>




      {{-- 1.6: otherScripts --}}
      @yield('scripts')



   </body>

</html>
{{-- end html --}}