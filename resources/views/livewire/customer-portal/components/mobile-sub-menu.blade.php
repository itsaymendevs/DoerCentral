{{--subMenu - mobileApp --}}

<div class="mobile--menu d-md-none">


    {{-- 1: home --}}
    <a class="btn btn--scheme fs-13 " role="button" href="#!">
        <img src="{{asset('assets/img/App/home.png')}}" /></a>







    {{-- 2: journey --}}
    <a wire:navigate class="btn btn--scheme fs-13
    @if (Request::is('portals/customer/general')) active @endif" role="button"
        href="{{ route('portals.customer.general') }}">
        <img src="{{asset('assets/img/App/journey.png')}}" /></a>




    {{-- 3: menu --}}
    <a class="btn btn--scheme fs-13
    @if (Request::is('portals/customer/menu')) active @endif" role="button"
        href="{{ route('portals.customer.menu') }}">
        <img src="{{asset('assets/img/App/menu.png')}}" /></a>






    {{-- 4: extra --}}
    <a class="btn btn--scheme fs-13" role="button" href="#!">
        <img src="{{asset('assets/img/App/extra.png')}}" /></a>



</div>

{{-- endMenu --}}