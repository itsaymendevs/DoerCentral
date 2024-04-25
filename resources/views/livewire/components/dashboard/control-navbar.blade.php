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






                </div>
            </div>
            {{-- end navLinks --}}




            {{-- ----------------------------------------------------------- --}}





            {{-- notificationCol --}}
            <livewire:components.dashboard.control-navbar-notifications key='navbar-notifications-1' />


        </div>
    </div>
</section>
{{-- end Navbar --}}