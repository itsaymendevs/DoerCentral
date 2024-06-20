{{-- menu --}}
<div class="col-8 text-end">
    <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
        data-aos-once="true" wire:ignore.self>



        {{-- preparation --}}
        <a wire:navigate
            class="btn fs-13
         @if (Request::is('dashboard/kitchen/today/preparations', 'dashboard/kitchen/today/preparations/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayPreparations') }}">Preparations</a>





        {{-- quantity --}}
        <a wire:navigate class="btn fs-13
     @if (Request::is('dashboard/kitchen/today/quantity', 'dashboard/kitchen/today/quantity/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayQuantity') }}">Quantity</a>








        {{-- production --}}
        <a wire:navigate class="btn fs-13
        @if (Request::is('dashboard/kitchen/today/production', 'dashboard/kitchen/today/production/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayProduction') }}">Production</a>






        {{-- packing --}}
        <a wire:navigate
            class="btn fs-13 @if (Request::is('dashboard/kitchen/today/packing', 'dashboard/kitchen/today/packing/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayPacking') }}">Packing</a>









        {{-- checkout --}}

        {{-- :: permission - hasCheckoutTab --}}
        @if ($versionPermission->kitchenModuleHasCheckoutTab)



        <a wire:navigate
            class="btn fs-13 @if (Request::is('dashboard/kitchen/today/checkout', 'dashboard/kitchen/today/checkout/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayCheckout') }}">Checkout</a>



        @endif
        {{-- end if - permission --}}






        {{-- delivery --}}
        <a wire:navigate
            class="btn fs-13 @if (Request::is('dashboard/kitchen/today/delivery', 'dashboard/kitchen/today/delivery/*')) active @endif"
            role="button" href="{{ route('dashboard.kitchenTodayDelivery') }}">Delivery</a>





    </div>
</div>
{{-- end innerMenu --}}