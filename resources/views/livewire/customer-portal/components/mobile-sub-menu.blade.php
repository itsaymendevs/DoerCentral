{{--subMenu - mobileApp --}}

<div class="mobile--menu d-md-none">


   {{-- 1: home --}}
   <a class="btn btn--scheme fs-13
    @if (Request::is('portals/customer/home')) active @endif" role="button"
      href="{{ route('portals.customer.home') }}">
      <img src="{{url('assets/img/App/home.png')}}" /></a>







   {{-- 2: journey --}}
   <a class="btn btn--scheme fs-13
    @if (Request::is('portals/customer/general')) active @endif" role="button"
      href="{{ route('portals.customer.general') }}">
      <img src="{{url('assets/img/App/journey.png')}}" /></a>




   {{-- 3: menu --}}
   <a class="btn btn--scheme fs-13
    @if (Request::is('portals/customer/menu')) active @endif" role="button"
      href="{{ route('portals.customer.menu') }}">
      <img src="{{url('assets/img/App/menu.png')}}" /></a>






   {{-- 4: extra --}}
   <button class="btn btn--scheme fs-13 sidebar--menu-toggler" role="button" href="#!">
      <img src="{{url('assets/img/App/extra.png')}}" /></button>





</div>

{{-- endMenu --}}