<section data-aos="fade-down" data-aos-duration="500" id="navmenu--section" class="navmenu px-lg-3" wire:ignore.self>
    <div class="container-fluid position-relative">




        {{-- content --}}
        <div class="row justify-content-between align-items-center">


            {{-- logo --}}
            <div class="col-6 col-lg-4 col-xl-5">
                <img class="of--contain navmenu--logo" src="{{ url('assets/plugins/website/img/logo/doer.png') }}">
            </div>



            {{-- ----------------------------------------------------- --}}
            {{-- ----------------------------------------------------- --}}




            {{-- navbar --}}
            <div class="col-lg-6 col-xl-4 col-xxl-4 d-none d-lg-block">
                <div class="d-flex justify-content-between" wire:ignore>


                    {{-- 1: home --}}
                    <button class="btn navmenu--links fw-400 btn--link" data-aos="fade" data-aos-duration="500"
                        data-aos-delay="200" type="button">Home</button>



                    {{-- 2: about --}}
                    <button class="btn navmenu--links fw-400 btn--link" data-aos="fade" data-aos-duration="500"
                        data-aos-delay="250" type="button">About Us</button>



                    {{-- 3: projects --}}
                    <button class="btn navmenu--links fw-400 btn--link" data-aos="fade" data-aos-duration="500"
                        data-aos-delay="300" type="button">Our Projects</button>




                    {{-- 4: login --}}
                    <button class="btn navmenu--links fw-500 btn--link navmenu--login" data-aos="fade"
                        style="width: 130px; max-width: 130px;" data-aos-duration="500" data-aos-delay="350"
                        type="button">Get in
                        Touch</button>


                </div>
            </div>





            {{-- ------------------------------------------------------- --}}
            {{-- ------------------------------------------------------- --}}




            {{-- mobileMenu --}}
            <div class="col-6 d-lg-none">
                <div class="d-flex justify-content-end">
                    <button class="btn fw-500 btn--link navmenu--mobile-menu navbar-toggler" type="button"
                        data-toggle="collapse" data-target="#navbarToggleExternalContent"
                        aria-controls="navbarToggleExternalContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-list-nested">
                            <path fill-rule="evenodd"
                                d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>





        </div>
    </div>
</section>
{{-- endSection --}}