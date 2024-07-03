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






            {{-- ingredients --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/ingredients')) active @endif" role="button"
                href="{{ route('dashboard.inventory.ingredients') }}">Ingredients</a>








            {{-- :: permission - hasStock --}}
            @if ($versionPermission->inventoryModuleHasStock || session('hasTechAccess'))





            {{-- suppliers --}}
            <a wire:navigate class="btn
                 @if (Request::is('dashboard/inventory/suppliers')) active @endif" role="button"
                href="{{ route('dashboard.inventory.suppliers') }}">Suppliers</a>




            {{-- purchases --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/purchases')) active @endif" role="button"
                href="{{ route('dashboard.inventory.purchases') }}">Purchases</a>







            {{-- purchaseOrder --}}


            {{-- :: permission - hasPurchaseOrders --}}
            @if ($versionPermission->inventoryModuleHasComparisons || session('hasTechAccess'))


            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/purchase-orders')) active @endif" role="button"
                href="{{ route('dashboard.inventory.purchaseOrders') }}">P.O</a>


            @endif
            {{-- end if --}}








            {{-- comparisons --}}


            {{-- :: permission - hasComparisons --}}
            @if ($versionPermission->inventoryModuleHasComparisons || session('hasTechAccess'))


            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/comparisons')) active @endif" role="button"
                href="{{ route('dashboard.inventory.comparisons') }}">Comparison</a>


            @endif
            {{-- end if --}}











            {{-- stock --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/stock')) active @endif" role="button"
                href="{{ route('dashboard.inventory.stock') }}">Stock</a>





            @endif
            {{-- end if - permission --}}










            {{-- configurations --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/configurations')) active @endif" role="button"
                href="{{ route('dashboard.inventory.configurations') }}">Config</a>









            {{-- settings --}}



            {{-- :: permission - hasAdminView --}}
            @if ($versionPermission->hasAdminView || session('hasTechAccess'))


            <a wire:navigate class="btn
            @if (Request::is('dashboard/inventory/settings', 'dashboard/inventory/settings/*')) active @endif"
                role="button" href="{{ route('dashboard.inventory.settings') }}">Settings</a>



            @endif
            {{-- end if - permission --}}






        </div>
    </div>
</div>
{{-- endRow --}}