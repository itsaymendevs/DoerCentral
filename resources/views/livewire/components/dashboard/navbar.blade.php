{{-- Navbar --}}
<section class="navbar--section" id="navbar--section">
    <div class="container-fluid">
        <div class="row align-items-center" wire:ignore>



            {{-- logoCol --}}
            <div class="col-1" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <div class="dropdown navbar--profile-dropdown text-center " data-bs-toggle="tooltip" data-bss-tooltip=""
                    data-bs-placement="left" title="Click For Menu">


                    {{-- logoDropdown --}}
                    <button class="btn navbar--profile-button" data-bs-toggle="dropdown" type="button"
                        aria-expanded="false">
                        <img src="{{ asset('assets/img/Logo/doer.png') }}" width="73" height="41">
                    </button>



                    {{-- dropdown Menu --}}
                    <div class="dropdown-menu navbar--profile-menu">

                        {{-- 1: profile --}}
                        <a class="dropdown-item d-flex align-items-center justify-content-center d-none" href="#">
                            <svg class="bi bi-person me-2" style="font-size: 21px;" xmlns="http://www.w3.org/2000/svg"
                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                </path>
                            </svg>Profile
                        </a>



                        {{-- logout --}}
                        <a class="dropdown-item d-flex align-items-center justify-content-center "
                            href="{{ route('dashboard.login') }}">
                            <svg class="bi bi-door-open me-2" style="font-size: 21px;"
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"></path>
                                <path
                                    d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z">
                                </path>
                            </svg>Logout
                        </a>
                    </div>
                    {{-- endMenu --}}
                </div>
            </div>
            {{-- endCol --}}






            {{-- ------------------------------------------- --}}






            {{-- navLinks --}}
            <div class="col-10" data-aos="flip-up" data-aos-duration="800" data-aos-once="true">
                <div class="navbar--menu d-flex align-items-center justify-content-between">







                    {{-- delivery --}}
                    {{-- <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/delivery', 'dashboard/delivery/*')) active @endif"
                        href="{{ route('dashboard.delivery') }}" wire:navigate>Delivery</a> --}}





                    {{-- dashboard --}}
                    <button class="btn navbar--menu-button" type="button">Dashboard</button>





                    {{-- customers --}}
                    <a class="btn  navbar--menu-button
                    @if (Request::is('dashboard/customers', 'dashboard/customers/*', 'dashboard/customers-SOA')) active @endif"
                        href="{{ route('dashboard.customers') }}" wire:navigate>Customers</a>






                    {{-- menu --}}
                    <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/menu', 'dashboard/menu/*')) active @endif"
                        href="{{ route('dashboard.menuPlans') }}" wire:navigate>Menu</a>






                    {{-- kitchen --}}
                    <a wire:navigate href="{{ route('dashboard.kitchenTodayProduction') }}" class="btn navbar--menu-button
                        @if (Request::is('dashboard/kitchen', 'dashboard/kitchen/*')) active @endif"
                        type="button">Kitchen</a>



                    {{-- inventory --}}
                    <a class="btn  navbar--menu-button
                    @if (Request::is('dashboard/inventory', 'dashboard/inventory/*')) active @endif"
                        href="{{ route('dashboard.inventory') }}">Inventory</a>





                    {{-- sales & marketing --}}
                    <div class="btn-group navbar--split">
                        <button class="btn navbar--menu-button
                            @if (Request::is('dashboard/sales', 'dashboard/sales/*')) active @endif" type="button">
                            Sales &amp; Marketing</button>




                        {{-- splitButton --}}
                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-split
                            @if (Request::is('dashboard/promo', 'dashboard/promo/*')) active @endif"
                            data-bs-toggle="dropdown" aria-expanded="false" type="button"></button>


                        {{-- subMenu --}}
                        <div class="dropdown-menu dropdown-menu-end">

                            {{-- promo & rewards --}}
                            <a wire:navigate href="{{ route('dashboard.promos') }}" class="dropdown-item fw-semibold
                                @if (Request::is('dashboard/promo', 'dashboard/promo/*')) active @endif">Promo &amp;
                                Rewards</a>
                        </div>
                    </div>



                    {{-- extra --}}
                    <button class="btn navbar--menu-button" type="button">Extra</button>







                    {{-- settings --}}
                    <button class="btn navbar--menu-button px-2 rounded-1" type="button"
                        style="background-color: var(--color-solid-black); border:none;" data-bs-toggle="tooltip"
                        data-bss-tooltip="" data-bs-placement="bottom" title="Settings">
                        <svg class="bi bi-gear fs-4 rotateInfinite" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z">
                            </path>
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z">
                            </path>
                        </svg>
                    </button>


                </div>
            </div>
            {{-- end navLinks --}}




            {{-- ----------------------------------------------------------- --}}




            {{-- notificationCol --}}
            <div class="col-1 text-center" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <button class="btn btn--raw-icon navbar--notify scalebellmix--3" s="button">
                    <svg class="bi bi-bell" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z">
                        </path>
                    </svg>
                </button>
            </div>


        </div>
    </div>
</section>
{{-- end Navbar --}}