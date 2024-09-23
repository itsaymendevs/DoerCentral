<div class="container position-relative">



    {{-- content --}}
    <div class="row justify-content-between align-items-center">


        {{-- navbar --}}
        <div class="col-lg-12 col-xl-12 col-xxl-12">
            <div class="d-flex justify-content-center login--menu mt-5 mt-lg-5 mb-5 mb-lg-4 pb-4 pb-lg-0" wire:ignore>


                {{-- 1: home --}}
                <a href="{{ route('website.home') }}" class="btn navmenu--links fw-400" data-aos="fade"
                    data-aos-duration="500" data-aos-delay="200" type="button">Home</a>



                {{-- 2: plans --}}
                <a href="{{ route('website.home') }}"
                    class="btn navmenu--links  fw-400 @if (Request::is('subscribe')) active @endif" data-aos="fade"
                    data-aos-duration="500" data-aos-delay="250" type="button">Plans</a>



                {{-- 3: contact --}}
                <a href="{{ route('website.contact') }}"
                    class="btn navmenu--links fw-400  @if (Request::is('contact-us')) active @endif" data-aos="fade"
                    data-aos-duration="500" data-aos-delay="300" type="button">Contact</a>


            </div>
        </div>





        {{-- ------------------------------------------------------- --}}
        {{-- ------------------------------------------------------- --}}




        {{-- mobileMenu --}}
        <div class="col-6 d-none">
            <div class="d-flex justify-content-end">
                <button class="btn fw-500 btn--link navmenu--mobile-menu navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarToggleExternalContent"
                    aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
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
