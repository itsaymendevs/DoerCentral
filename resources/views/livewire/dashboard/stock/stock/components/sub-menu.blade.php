{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">


    {{-- 1: containers --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/stock-containers')) active @endif"
        href="{{ route('dashboard.stock.stockContainers') }}" role="button">Containers</a>




    {{-- 2: labels --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/stock-labels')) active @endif"
        href="{{ route('dashboard.stock.stockLabels') }}" role="button">Labels</a>





    {{-- 3: items --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/stock/stock-items')) active @endif"
        href="{{ route('dashboard.stock.stockItems') }}" role="button">Items</a>




</div>
{{-- end div --}}