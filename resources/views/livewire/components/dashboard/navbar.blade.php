{{-- Navbar --}}
<section class="navbar--section" id="navbar--section">
    <div class="container-fluid">
        <div class="row align-items-center" wire:ignore>



            {{-- logoCol --}}
            <div class="col-1" data-aos="fade-right" data-aos-duration="800" data-aos-once="true" style="z-index: 10">



                {{-- dropMenu --}}
                <div class="dropdown navbar--profile-dropdown text-center ">


                    {{-- logoDropdown --}}
                    <button class="btn navbar--profile-button" data-bs-toggle="dropdown" type="button"
                        aria-expanded="false">
                        <img src="{{ asset('assets/img/Logo/doer.png') }}" width="73" height="41">
                    </button>



                    {{-- dropdown Menu --}}
                    <div class="dropdown-menu navbar--profile-menu">


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







                    {{-- dashboard --}}
                    <a href="{{ route('dashboard.home') }}" class="btn navbar--menu-button
                        @if (Request::is('dashboard')) active @endif">Dashboard</a>








                    {{-- customers --}}

                    {{-- :: rolePermission - customers --}}

                    @if ($user->checkPermission('Customers'))


                    <a class="btn  navbar--menu-button
                    @if (Request::is('dashboard/customers', 'dashboard/customers/*', 'dashboard/customers/SOA')) active @endif"
                        href="{{ route('dashboard.customers') }}" wire:navigate>Customers</a>



                    @endif
                    {{-- end if - rolePermission --}}










                    {{-- menu --}}

                    {{-- :: rolePermission - menu --}}

                    @if ($user->checkPermission('Menu'))


                    <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/menu', 'dashboard/menu/*')) active @endif"
                        href="{{ route('dashboard.menuPlans') }}" wire:navigate>Menu</a>



                    @endif
                    {{-- end if - rolePermission --}}










                    {{-- kitchen --}}

                    {{-- :: rolePermission - kitchen --}}

                    @if ($user->checkPermission('Kitchen'))


                    <a wire:navigate href="{{ route('dashboard.kitchenTodayProduction') }}" class="btn navbar--menu-button
                        @if (Request::is('dashboard/kitchen', 'dashboard/kitchen/*')) active @endif"
                        type="button">Kitchen</a>


                    @endif
                    {{-- end if - rolePermission --}}









                    {{-- inventory --}}

                    {{-- :: rolePermission - inventory --}}

                    @if ($user->checkPermission('Inventory'))


                    <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/inventory', 'dashboard/inventory/*')) active @endif"
                        href="{{ route('dashboard.inventory') }}">Inventory</a>


                    @endif
                    {{-- end if - rolePermission --}}










                    {{-- delivery --}}

                    {{-- :: rolePermission - delivery --}}

                    @if ($user->checkPermission('Delivery'))


                    <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/delivery', 'dashboard/delivery/*')) active @endif"
                        href="{{ route('dashboard.delivery') }}" wire:navigate>Delivery</a>




                    @endif
                    {{-- end if - rolePermission --}}











                    {{-- sales & marketing --}}

                    {{-- :: rolePermission - sales --}}

                    @if ($user->checkPermission('Sales'))



                    <div class="btn-group navbar--split">
                        <button class="btn navbar--menu-button
                        @if ($versionPermission->isProcessing) no-events @endif
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



                    @endif
                    {{-- end if - rolePermission --}}












                    {{-- extra --}}


                    {{-- :: rolePermission - Extra --}}

                    @if ($user->checkPermission('Extra'))






                    {{-- :: permission - hasExtraModule --}}
                    @if ($versionPermission->extraModuleHasModule)




                    <div class="btn-group navbar--split">
                        <button class="btn navbar--menu-button
                        @if (Request::is('dashboard/extra', 'dashboard/extra/*')) active @endif"
                            type="button">Extra</button>




                        {{-- splitButton --}}
                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-split
                            @if (Request::is('dashboard/extra', 'dashboard/extra/*')) active @endif"
                            data-bs-toggle="dropdown" aria-expanded="false" type="button"></button>




                        {{-- subMenu --}}
                        <div class="dropdown-menu dropdown-menu-end">



                            {{-- management --}}



                            {{-- :: permission - hasManagement --}}
                            @if ($versionPermission->extraModuleHasManagement)




                            <a wire:navigate href="{{ route('dashboard.management.users') }}"
                                class="dropdown-item fw-semibold
                               @if (Request::is('dashboard/extra/management', 'dashboard/extra/management/*')) active @endif">Management</a>



                            @endif
                            {{-- end if - permission --}}










                            {{-- app & website --}}

                            {{-- :: permission - hasWebsite --}}
                            @if ($versionPermission->extraModuleHasWebsite)



                            <a wire:navigate href="{{ route('dashboard.blogs') }}"
                                class="dropdown-item fw-semibold
                                @if (Request::is('dashboard/extra/blogs', 'dashboard/extra/blogs/*')) active @endif">App
                                &amp; Website</a>


                            @endif
                            {{-- end if - permission --}}




                        </div>




                    </div>

                    @endif
                    {{-- end if - permission --}}





                    @endif
                    {{-- end if - rolePermission --}}


                    {{-- endExtra --}}











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
            <livewire:components.dashboard.navbar-notifications key='navbar-notifications-1' />

        </div>
    </div>
</section>
{{-- end Navbar --}}