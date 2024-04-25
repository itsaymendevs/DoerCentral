{{-- subMenu --}}
<div class="row mb-submenu" wire:ignore>



    {{-- customersButton --}}
    <div class="col-4">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>


            <a class="btn @if (Request::is('dashboard/customers')) active @endif submenu--group btn--scheme-2 d-flex align-items-center"
                role="button" href="{{ route('dashboard.customers') }}" wire:navigate>Overview</a>
        </div>
    </div>






    {{-- SAO - Details --}}
    <div class="col-8 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>


            {{-- 1: SAO --}}
            <a wire:navigate class="btn @if (Request::is('dashboard/customers/SOA')) active @endif" role="button"
                href="{{ route('dashboard.customers.SOA') }}">SOA</a>





            {{-- 2: Details --}}



            {{-- :: permission - processing --}}
            @if (!$versionPermission->isProcessing)

            <a class="btn @if (Request::is('dashboard/customers/details')) active @endif" role="button"
                href="#!">Details</a>

            @endif
            {{-- end if - permission --}}












            {{-- 3: Settings --}}

            {{-- :: permission - hasAdminView --}}
            @if ($versionPermission->hasAdminView)


            <a wire:navigate class="btn @if (Request::is('dashboard/customers/settings')) active @endif" role="button"
                href="{{ route('dashboard.customers.settings') }}">Settings</a>



            @endif
            {{-- end if - permission --}}




        </div>
    </div>


</div>
{{-- end subMenu --}}