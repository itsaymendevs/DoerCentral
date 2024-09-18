{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">


    {{-- 1: plans --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('central/dashboard/manage-plans')) active @endif"
        href="{{ route('central.dashboard.manage-plans.plans') }}" role="button">Plans</a>








    {{-- 2: bundles --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('central/dashboard/manage-plans/bundles')) active @endif"
        href="{{ route('central.dashboard.manage-plans.bundles') }}" role="button">Bunldes</a>








    {{-- 3: features --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('central/dashboard/manage-plans/features')) active @endif"
        href="{{ route('central.dashboard.manage-plans.features') }}" role="button">Features</a>




</div>
{{-- end div --}}