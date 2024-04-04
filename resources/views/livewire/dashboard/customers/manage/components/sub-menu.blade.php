{{-- subMenu --}}
<div class="row align-items-end mb-submenu" wire:ignore>



    {{-- customersButton --}}
    <div class="col-3">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">
            <a class="btn submenu--group btn--scheme-2 d-flex align-items-center" role="button"
                href="{{ route('dashboard.customers') }}" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-arrow-up-left me-2">
                    <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                    </path>
                </svg>Customers
            </a>
        </div>
    </div>










    {{-- otherLinks --}}
    <div class="col-9 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true">

            {{-- 1: general --}}
            <a class="btn fs-13 @if (Request::is('dashboard/customers/' . $id)) active @endif " role="button"
                href="{{ route('dashboard.singleCustomer', [$id]) }}" wire:navigate>General</a>



            {{-- 2: menu --}}
            <a class="btn fs-13 @if (Request::is('dashboard/customers/' . $id . '/menu')) active @endif" role="button"
                href="{{ route('dashboard.singleCustomerMenu', [$id]) }}" wire:navigate>Menu</a>



            <a class="btn fs-13 @if (Request::is('dashboard/customers/' . $id . '/deliveries')) active @endif"
                role="button" href="{{ route('dashboard.singleCustomerDeliveries', [$id]) }}" wire:navigate>Delivery</a>




            {{-- 4: history --}}
            <a class="btn fs-13 @if (Request::is('dashboard/customers/' . $id . '/history')) active @endif"
                role="button" href="javascript:void(0);">History</a>



            {{-- 5: calendar --}}
            <a class="btn fs-13 @if (Request::is('dashboard/customers/' . $id . '/calendar')) active @endif"
                role="button" href="javascript:void(0);">Calendar</a>



            {{-- 6: address --}}
            <a class="btn fs-13 @if (Request::is('dashboard/customers/' . $id . '/addresses')) active @endif"
                role="button" href="{{ route('dashboard.singleCustomerAddresses', [$id]) }}">Address</a>
        </div>
    </div>
    {{-- end otherLinks --}}





</div>
{{-- end subMenu --}}