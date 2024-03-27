{{-- subMenuRow --}}
<div class="row align-items-end mb-submenu" wire:ignore>
    <div class="col-12 text-center">


        {{-- subMenu --}}
        <div class="btn-group submenu--group mobile" role="group" data-aos="fade-down" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">



            {{-- overview --}}
            <a class="btn fs-13 px-3
            @if (Request::is('portals/customer/overview')) active @endif" role="button"
                href="javascript:void(0);">Overview</a>




            {{-- general --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/general')) active @endif" role="button"
                href="{{ route('portals.customer.general') }}">General</a>




            {{-- Menu --}}
            <a class="btn fs-13 px-3
            @if (Request::is('portals/customer/menu')) active @endif" role="button" href="javascript:void(0);">Menu</a>





            {{-- delivery --}}
            <a wire:navigate class="btn fs-13 px-3
            @if (Request::is('portals/customer/delivery')) active @endif" role="button"
                href="{{ route('portals.customer.delivery') }}">Delivery</a>





            {{-- history --}}
            <a class="btn fs-13 px-3
            @if (Request::is('portals/customer/history')) active @endif" role="button"
                href="javascript:void(0);">History</a>






            {{-- address --}}
            <a class="btn fs-13 px-3
            @if (Request::is('portals/customer/address')) active @endif" role="button"
                href="{{ route('portals.customer.address') }}">Address</a>


        </div>
    </div>
</div>
{{-- endRow --}}