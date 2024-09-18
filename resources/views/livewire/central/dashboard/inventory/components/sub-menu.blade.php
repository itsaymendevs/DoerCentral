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
            <a class="btn
            @if (Request::is('central/dashboard/inventory/ingredients')) active @endif" role="button"
                href="{{ route('central.dashboard.inventory.ingredients') }}">Ingredients</a>








            {{-- settings --}}
            <a class="btn
            @if (Request::is('central/dashboard/inventory/settings', 'central/dashboard/inventory/settings/*')) active @endif"
                role="button" href="{{ route('central.dashboard.inventory.settings') }}">Settings</a>




        </div>
    </div>
</div>
{{-- endRow --}}