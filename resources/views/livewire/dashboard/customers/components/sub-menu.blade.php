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


            {{-- :: SAO --}}
            <a wire:navigate class="btn @if (Request::is('dashboard/customers-SOA')) active @endif" role="button"
                href="{{ route('dashboard.customersSOA') }}">SOA</a>




            {{-- :: Details --}}
            <a class="btn disabled @if (Request::is('dashboard/customers/details')) active @endif" role="button"
                href="javascript:void(0);">Details</a>
        </div>
    </div>


</div>
{{-- end subMenu --}}