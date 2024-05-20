{{-- submenu --}}
<div class="row align-items-center mb-submenu">


    {{-- title --}}
    <div class="col-3">
        <h4 class="text-center mb-0 fw-bold">{{ $title }}</h4>
    </div>




    {{-- links --}}
    <div class="col-9 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>






            {{-- delivery --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/delivery')) active @endif" role="button"
                href="{{ route('dashboard.delivery') }}">Delivery</a>





            {{-- cities --}}
            <a wire:navigate class="btn
                 @if (Request::is('dashboard/delivery/cities')) active @endif" role="button"
                href="{{ route('dashboard.delivery.cities') }}">City Time &amp; Charges</a>









            {{-- :: permission - hasDrivers --}}
            @if ($versionPermission->deliveryModuleHasDrivers)




            {{-- vehicles --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/delivery/vehicles')) active @endif" role="button"
                href="{{ route('dashboard.delivery.vehicles') }}">Vehicles</a>






            {{-- zones --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/delivery/zones')) active @endif" role="button"
                href="{{ route('dashboard.delivery.zones') }}">Zones</a>








            {{-- drivers --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/delivery/drivers')) active @endif" role="button"
                href="{{ route('dashboard.delivery.drivers') }}">Drivers</a>





            @endif
            {{-- end if - permission --}}







        </div>
    </div>
</div>
{{-- endRow --}}