{{-- bundleSubmenu --}}
<div class="row mb-submenu" wire:ignore>


    {{-- plans --}}
    <div class="col-4">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">
            <a wire:navigate class="btn submenu--group btn--scheme-2 d-flex align-items-center" role="button"
                href="{{ route('dashboard.menuPlans') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-up-left me-2">
                    <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                    </path>
                </svg>Plans
            </a>
        </div>
    </div>





    {{-- co-currentLinks --}}
    <div class="col-8 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">


            {{-- :: bundles --}}
            <a wire:navigate class="btn @if (Request::is('dashboard/menu/plans/' . $id . '/bundles')) active @endif"
                role="button" href="{{ route('dashboard.menuPlanBundles', [$id]) }}">Bundles</a>


            {{-- intakeSizes --}}
            <a wire:navigate
                class="btn @if (Request::is('dashboard/menu/plans/' . $id . '/intake-sizes')) active @endif"
                role="button" href="{{ route('dashboard.menuPlanIntakeSizes', [$id]) }}">Intake Sizes</a>


            {{-- bundleCalendars --}}
            <a wire:navigate class="btn @if (Request::is('dashboard/menu/plans/' . $id . '/calendars')) active @endif"
                role="button" href="{{ route('dashboard.menuPlanCalendars', [$id]) }}">Calendars</a>

        </div>
    </div>




</div>
{{-- endSubmenu --}}