<!DOCTYPE html>
<html lang="en">


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
      <link href="{{ url('assets/css/home.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/inventory.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/login.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/scrollbar.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/search.css') }}" rel="stylesheet">
      <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet">



      {{-- :: customization --}}
      <link href="{{ url('assets/css/client-customization/' . strtolower(env('APP_CLIENT')) . '.css') }}"
         rel="stylesheet">





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