{{-- Navbar --}}
<section class="navbar--section mb-4" id="navbar--section">
    <div class="container-fluid">
        <div class="row align-items-center" wire:ignore>



            {{-- logoCol --}}
            <div class="col-4 col-sm-3 col-md-2" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <div class="dropdown navbar--profile-dropdown text-center">


                    {{-- logoDropdown --}}
                    <button class="btn navbar--profile-button" type="button">
                        <img src="{{ asset('assets/img/Clients/' . $globalProfile->imageFile) }}" width="73"
                            height="41">
                    </button>

                </div>
            </div>
            {{-- endCol --}}








            {{-- ------------------------------------------- --}}








            {{-- navLinks --}}
            <div class="col-8 col-sm-9 col-md-8" data-aos="flip-up" data-aos-duration="800" data-aos-once="true">
                <hr class='navbar--hr' />
            </div>
            {{-- end navLinks --}}








            {{-- ----------------------------------------------------------- --}}









        </div>
    </div>
</section>
{{-- end Navbar --}}