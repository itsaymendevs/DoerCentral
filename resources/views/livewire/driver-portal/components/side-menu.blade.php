{{-- 1: sidebar menu --}}
<div id="sidebar--menu"
    class="sidebar--menu d-flex align-items-center flex-column justify-content-center d-md-none invisible"
    style='height: 0vh; opacity:0; transition:0.7s all ease-in-out;'>



    {{-- 1: closeButton --}}
    <button class="btn btn-danger btn--close sidebar--menu-close" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
            class="bi bi-plus-lg fs-2" style="transform: rotate(45deg)">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z">
            </path>
        </svg>
    </button>



    {{-- 2: home --}}
    <a class="btn btn--scheme" href="{{ route('portals.driver.home') }}">Home</a>


    {{-- 3: profile --}}
    <a class="btn btn--scheme" href="{{ route('portals.driver.profile') }}">Profile</a>




    {{-- 4: logout --}}
    <a class="btn btn--scheme" href="{{ route('portals.driver.login') }}"
        style="border-bottom-color: var(--bs-danger) !important;">Logout</a>


</div>