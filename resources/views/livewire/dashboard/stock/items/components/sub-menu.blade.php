{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">


    {{-- 1: containers --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/items/containers')) active @endif"
        href="{{ route('dashboard.stock.items.containers') }}" role="button">Containers</a>




    {{-- 2: labels --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/items/labels')) active @endif"
        href="{{ route('dashboard.stock.items.labels') }}" role="button">Labels</a>





    {{-- 3: others --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/items/others')) active @endif"
        href="{{ route('dashboard.stock.items.others') }}" role="button">Others</a>




</div>
{{-- end div --}}