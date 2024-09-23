{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">


    {{-- 1: brands --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('central/dashboard/tech/brands')) active @endif"
        href="{{ route('central.dashboard.tech.brands') }}" role="button">Brands</a>



</div>
{{-- end div --}}
