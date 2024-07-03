{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">





    {{-- :: permission - hasContainers --}}
    @if ($versionPermission->kitchenModuleHasContainersTab || session('hasTechAccess'))



    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/items/containers')) active @endif"
        href="{{ route('dashboard.stock.items.containers') }}" role="button">Containers</a>


    @endif
    {{-- end if - permission --}}






    {{-- :: permission - hasLabel --}}
    @if ($versionPermission->kitchenModuleHasLabelsTab || session('hasTechAccess'))


    {{-- 2: labels --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/items/labels')) active @endif"
        href="{{ route('dashboard.stock.items.labels') }}" role="button">Labels</a>



    @endif
    {{-- end if - permission --}}








    {{-- :: permission - hasItem --}}
    @if ($versionPermission->kitchenModuleHasItemsTab || session('hasTechAccess'))


    {{-- 3: others --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/items/others')) active @endif"
        href="{{ route('dashboard.stock.items.others') }}" role="button">Others</a>



    @endif
    {{-- end if - permission --}}



</div>
{{-- end div --}}