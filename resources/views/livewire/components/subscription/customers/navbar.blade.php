{{-- Navbar --}}
<section class="navbar--section" id="navbar--section">
    <div class="container">
        <div class="row align-items-center" wire:ignore>



            {{-- logoCol --}}

            <div class="col-3 col-sm-2 col-lg-1" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <img class="of-contain w-100 h-100 scale--self-05"
                    src="{{ asset('assets/img/Logo/realmeal-white.png') }}" />
            </div>
            {{-- endCol --}}






            {{-- ------------------------------------------- --}}






            {{-- navLinks --}}
            <div class="col-9 col-sm-10 col-lg-11" data-aos="flip-up" data-aos-duration="800" data-aos-once="true">
                <div class="navbar--menu d-none d-lg-flex align-items-center justify-content-between">

                    {{-- Home --}}
                    <button class="btn navbar--menu-button" type="button">Home</button>


                    {{-- mealPlans --}}
                    <button class="btn navbar--menu-button active" type="button">Meal Plans</button>



                    {{-- learn more --}}
                    <button class="btn navbar--menu-button" type="button">Learn More</button>


                    {{-- Catering --}}
                    <button class="btn navbar--menu-button" type="button">Catering</button>

                    {{-- Blogs --}}
                    <button class="btn navbar--menu-button" type="button">Blogs</button>


                    {{-- lets talk --}}
                    <button class="btn navbar--menu-button" type="button">Let's Talk</button>



                </div>
            </div>
            {{-- end navLinks --}}




        </div>
    </div>
</section>
{{-- end Navbar --}}