{{-- Navbar --}}
<section class="navbar--section mb-4" id="navbar--section">
    <div class="container-fluid">
        <div class="row align-items-center" wire:ignore>



            {{-- logoCol --}}
            <div class="col-4 col-sm-3 col-md-2" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <div class="dropdown navbar--profile-dropdown text-center">


                    {{-- logoDropdown --}}
                    <button class="btn navbar--profile-button" type="button">
                        <img src="{{ asset('assets/img/Logo/doer.png') }}" width="73" height="41">
                    </button>

                </div>
            </div>
            {{-- endCol --}}








            {{-- ------------------------------------------- --}}








            {{-- navLinks --}}
            <div class="col-4 col-sm-6 col-md-8" data-aos="flip-up" data-aos-duration="800" data-aos-once="true">
                <hr />
            </div>
            {{-- end navLinks --}}








            {{-- ----------------------------------------------------------- --}}







            {{-- notificationCol --}}
            <div class="col-4 col-sm-3 col-md-2 text-center" data-aos="fade-left" data-aos-duration="800"
                data-aos-once="true">
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