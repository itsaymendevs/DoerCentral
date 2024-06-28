{{-- submenu --}}
<div class="row align-items-center mb-submenu">


    {{-- title --}}
    <div class="col-3">
        <h4 class="text-center mb-0 fw-bold">{{ $title }}</h4>
    </div>




    {{-- links --}}
    <div class="col-9 text-end">
        <div class="btn-group submenu--group smaller" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>






            {{-- items --}}
            <a wire:navigate
                class="btn
            @if (Request::is('dashboard/stock/items/containers') || Request::is('dashboard/stock/items/labels')) active @endif"
                role="button" href="{{ route('dashboard.stock.items.containers') }}">Items</a>






            {{-- vendors --}}
            <a wire:navigate class="btn
                 @if (Request::is('dashboard/stock/items/vendors')) active @endif" role="button"
                href="{{ route('dashboard.stock.items.vendors') }}">Vendors</a>





            {{-- purchases --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/purchases')) active @endif" role="button"
                href="{{ route('dashboard.inventory.purchases') }}">Purchases</a>






        </div>
    </div>
</div>
{{-- endRow --}}