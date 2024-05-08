{{-- subMenu --}}
<div class="row mb-submenu" wire:ignore>



    {{-- customersButton --}}
    <div class="col-4">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>


            <a class="btn submenu--group btn--scheme-2 d-flex align-items-center disabled" role="button"
                href="{{ route('dashboard.home') }}" wire:navigate>Overview</a>
        </div>
    </div>






    {{-- shortLinks --}}
    <div class="col-8 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>


            {{-- 1: Plans --}}
            <a wire:navigate class="btn" role="button" href="{{ route('dashboard.menuPlans') }}">Plans</a>



            {{-- 2: builder --}}
            <a class="btn" role="button" href="{{ route('dashboard.menuPlans') }}">Builder</a>





        </div>
    </div>


</div>
{{-- end subMenu --}}