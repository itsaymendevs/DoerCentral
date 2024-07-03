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
            @if (Request::is('dashboard/stock/items/containers') || Request::is('dashboard/stock/items/labels') || Request::is('dashboard/stock/items/others')) active @endif"
                role="button" href="{{ route('dashboard.stock.items.containers') }}">Items</a>







            {{-- :: permission - hasStock --}}
            @if ($versionPermission->stockModuleHasStock || session('hasTechAccess'))




            {{-- vendors --}}
            <a wire:navigate class="btn
                 @if (Request::is('dashboard/stock/vendors')) active @endif" role="button"
                href="{{ route('dashboard.stock.vendors') }}">Vendors</a>





            {{-- purchases --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/stock/purchases')) active @endif" role="button"
                href="{{ route('dashboard.stock.purchases') }}">Purchases</a>






            {{-- stock --}}
            <a wire:navigate
                class="btn @if (Request::is('dashboard/stock/stock-containers') || Request::is('dashboard/stock/stock-labels') ||Request::is('dashboard/stock/stock-items')) active @endif"
                role="button" href="{{ route('dashboard.stock.stockContainers') }}">Stock</a>





            @endif
            {{-- end if - permission --}}






        </div>
    </div>
</div>
{{-- endRow --}}