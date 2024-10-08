{{-- subMenu --}}
<div class="row align-items-end mb-submenu" wire:ignore>







    {{-- customersButton --}}
    <div class="col-3">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">
            <a class="btn submenu--group btn--scheme-2 d-flex align-items-center" role="button"
                href="{{ route('dashboard.brands') }}" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-arrow-up-left me-2">
                    <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                    </path>
                </svg>Brands
            </a>
        </div>
    </div>










    {{-- otherLinks --}}
    <div class="col-9 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">



            {{-- 1: details --}}
            <a class="btn fs-13 @if (Request::is('dashboard/brands/' . $brand->id)) active @endif " role="button"
                href="{{ route('dashboard.singleBrand', [$brand->id]) }}" wire:navigate>General Information</a>



            {{-- 2: setup --}}
            <a wire:navigate
                class="btn fs-13 @if (Request::is('dashboard/brands/' . $brand->id . '/setup')) active @endif"
                role="button" href="{{ route('dashboard.singleBrandSetup', [$brand->id]) }}">Setup</a>



            {{-- 3: license --}}
            <a wire:navigate
                class="btn fs-13 @if (Request::is('dashboard/brands/' . $brand->id . '/license')) active @endif"
                role="button" href="{{ route('dashboard.singleBrandLicense', [$brand->id]) }}">DOer License</a>




        </div>
    </div>
    {{-- end otherLinks --}}





</div>
{{-- end subMenu --}}