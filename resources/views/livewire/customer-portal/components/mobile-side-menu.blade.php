{{-- 1: sidebar menu --}}
<div id="sidebar--menu"
    class="sidebar--menu d-flex align-items-center flex-column justify-content-center d-md-none invisible"
    style='width: 0px; opacity:0; transition:0.7s all ease-in-out;'>



    {{-- 1: closeButton --}}
    <button class="btn btn-danger btn--close sidebar--menu-close" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
            class="bi bi-plus-lg fs-2" style="transform: rotate(45deg)">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z">
            </path>
        </svg>
    </button>



    {{-- 2: delivery --}}
    <a wire:navigate class="btn btn--scheme" href="{{ route('portals.customer.delivery') }}">Delivery</a>


    {{-- 3: calendar --}}
    <a wire:navigate class="btn btn--scheme" href="{{ route('portals.customer.calendar') }}">Calendar</a>



    {{-- 4: address --}}
    <a class="btn btn--scheme" href="{{ route('portals.customer.address') }}">Manage Address</a>
</div>