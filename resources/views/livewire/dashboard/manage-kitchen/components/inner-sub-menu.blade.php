{{-- menu --}}
<div class="col-8 text-end">
    <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
        data-aos-once="true" wire:ignore.self>


        {{-- production --}}
        <a wire:navigate class="btn fs-13
        @if (Request::is('dashboard/kitchen/today/production', 'dashboard/kitchen/today/production/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayProduction') }}">Production</a>




        {{-- packing --}}
        @if (!$versionPermission->isProcessing)
        <a wire:navigate
            class="btn fs-13 @if (Request::is('dashboard/kitchen/today/packing', 'dashboard/kitchen/today/packing/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayPacking') }}">Packing</a>
        @endif






        {{-- delivery --}}
        @if (!$versionPermission->isProcessing)
        <a wire:navigate
            class="btn fs-13 @if (Request::is('dashboard/kitchen/today/delivery', 'dashboard/kitchen/today/delivery/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayDelivery') }}">Delivery</a>
        @endif




    </div>
</div>
{{-- end innerMenu --}}