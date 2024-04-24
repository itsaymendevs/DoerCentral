{{-- subMenuRow --}}
<div class="row align-items-end mb-submenu d-none d-md-block" wire:ignore.self>
    <div class="col-12 text-center">


        {{-- subMenu - md - xl --}}
        <div class="btn-group submenu--group mobile " role="group" data-aos="fade-down" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>



            {{-- home --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/home')) active @endif" role="button"
                href="{{ route('portals.customer.home') }}">Home</a>




            {{-- general --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/general')) active @endif" role="button"
                href="{{ route('portals.customer.general') }}">General</a>




            {{-- Menu --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/menu')) active @endif" role="button"
                href="{{ route('portals.customer.menu') }}">Menu</a>





            {{-- delivery --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/delivery')) active @endif" role="button"
                href="{{ route('portals.customer.delivery') }}">Delivery</a>





            {{-- history --}}
            <a class="btn fs-13 px-3
            @if (Request::is('portals/customer/history')) active @endif" role="button" href="#!">History</a>




            {{-- calendar --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/calendar')) active @endif" role="button"
                href="{{ route('portals.customer.calendar') }}">Calendar</a>






            {{-- address --}}
            <a class="btn fs-13 px-3
            @if (Request::is('portals/customer/address')) active @endif" role="button"
                href="{{ route('portals.customer.address') }}">Address</a>


        </div>




    </div>
</div>
{{-- endRow --}}