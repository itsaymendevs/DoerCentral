<section id="content--section" class="content--section">
    <div class="container">










        {{-- :: SubMenu --}}
        <livewire:customer-portal.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- mainRow --}}
        <div class="row align-items-end pt-2 row mb-5">





            {{-- topCol --}}
            <div class="col-12">



                <div class="row align-items-start mb-5">


                    {{-- name - location --}}
                    <div class="col-12 col-md-8">


                        {{-- name --}}
                        <h5 class="fw-normal d-flex align-items-center mb-3">
                            Good Morning
                            <span class="text-gold fw-semibold ms-2" data-aos='zoom-out' data-aos-delay='200'
                                wire:ignore.self>{{ $customer->firstName }}</span>
                        </h5>


                        {{-- location --}}
                        <h6 class="fw-normal d-flex align-items-center ">
                            <img class="me-2" src="{{ asset('assets/img/App/pin.png') }}" style="width: 25px" />
                            {{ $customerAddress ? "{$customerAddress->city->name},
                            {$customerAddress->district->name}\n{$customerAddress->locationAddress}"
                            : 'No Deliveries Today!' }}
                        </h6>

                    </div>







                    {{-- todayDate --}}
                    <div class="col-12 col-md-4 d-none d-md-block text-center">
                        <h6 class="fw-semibold d-inline-flex align-items-center justify-content-end justify-content-md-center pb-1"
                            style="border-bottom: 1px solid var(--color-theme-secondary)">
                            {{ date('d / m / Y', strtotime($globalTodayDate)) }}
                        </h6>
                    </div>
                </div>













                {{-- ------------------------------------------------ --}}
                {{-- ------------------------------------------------ --}}







                {{-- totalMacros --}}
                <div class="row align-items-stretch mb-5" wire:ignore>


                    {{-- calories --}}
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="item--box d-flex flex-column justify-content-center h-100">


                            {{-- heading --}}
                            <h4 class="fw-semibold d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-chevron-compact-right fs-5 me-2"
                                    style="fill: var(--color-theme-secondary)">
                                    <path fill-rule="evenodd"
                                        d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z">
                                    </path>
                                </svg>Today's Calories Intake
                            </h4>


                            {{-- calories --}}
                            <p class="text-center fs-15 mb-0">
                                <span class="fs-2 fw-bold text-gold d-block">1200</span><span
                                    class="fs-6 d-block fw-semibold">Calories</span>
                            </p>
                        </div>
                    </div>






                    {{-- macros --}}
                    <div class="col-12 col-md-5 col-lg-6 col-xl-7 align-self-end mt-3 mt-md-0">
                        <div class="row align-items-end">



                            {{-- proteins --}}
                            <div class="col-4 col-sm-4 col-md-12 col-lg-4" data-aos='slide-left' data-aos-delay='100'
                                wire:ignore.self>
                                <div class="item--box mb-0 mb-sm-0 mb-md-3 mb-lg-0">
                                    <p class="text-center fs-15 mb-0">
                                        <span class="fs-2 fw-bold text-gold d-block">240</span><span
                                            class="fs-6 d-block fw-semibold">Protein</span>
                                    </p>
                                </div>
                            </div>



                            {{-- carbs --}}
                            <div class="col-4 col-sm-4 col-md-6 col-lg-4" data-aos='slide-left' data-aos-delay='200'
                                wire:ignore.self>
                                <div class="item--box">
                                    <p class="text-center fs-15 mb-0">
                                        <span class="fs-2 fw-bold text-gold d-block">700</span><span
                                            class="fs-6 d-block fw-semibold">Carb</span>
                                    </p>
                                </div>
                            </div>




                            {{-- fats --}}
                            <div class="col-4 col-sm-4 col-md-6 col-lg-4" data-aos='slide-left' data-aos-delay='300'
                                wire:ignore.self>
                                <div class="item--box">
                                    <p class="text-center fs-15 mb-0">
                                        <span class="fs-2 fw-bold text-gold d-block">80</span><span
                                            class="fs-6 d-block fw-semibold">Fat</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- endRow --}}










                {{-- ------------------------------------------------ --}}
                {{-- ------------------------------------------------ --}}








                {{-- banner --}}
                <div class="row align-items-start" data-aos='fade-up' data-aos-delay='100' wire:ignore>
                    <div class="col-12 mb-5">



                        {{-- swiper --}}
                        <div class="swiper general-swiper banner-swiper" style='aspect-ratio: 2 / 1;'>




                            {{-- extraWrapper --}}
                            <div class="swiper-wrapper">



                                {{-- loop - banners --}}


                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/extra/banners/banner-1.png') }}" alt="" loading='lazy'>
                                    <div class="swiper-lazy-preloader"></div>
                                </div>




                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/extra/banners/banner-2.png') }}" alt="" loading='lazy'>
                                    <div class="swiper-lazy-preloader"></div>
                                </div>




                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/extra/banners/banner-3.png') }}" alt="" loading='lazy'>
                                    <div class="swiper-lazy-preloader"></div>
                                </div>






                                {{-- end loop - banners --}}



                            </div>
                            {{-- endExtra --}}







                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                        {{-- endSwiper --}}


                    </div>
                </div>
                {{-- endbanner --}}








                {{-- ------------------------------------------------ --}}
                {{-- ------------------------------------------------ --}}










                {{-- today's meals --}}
                <div class="row align-items-start">



                    {{-- heading --}}
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-3 align-items-center">
                            <h4 class="fw-semibold d-flex align-items-center mb-0" data-aos='slide-down'
                                data-aos-delay='100' wire:ignore.self>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-chevron-compact-right fs-5 me-2"
                                    style="fill: var(--color-theme-secondary)">
                                    <path fill-rule="evenodd"
                                        d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z">
                                    </path>
                                </svg>Today's Menu
                            </h4>


                            {{-- menuLink --}}
                            <button class="btn btn--scheme btn--scheme-2 fs-13 px-4 scale--self-05 fw-semibold"
                                type="button">
                                Manage
                            </button>
                        </div>
                    </div>





                    {{-- carousel --}}
                    <div class="col-12 mb-5">




                        {{-- swiper --}}
                        <div class="swiper general-swiper meals-swiper"
                            style='aspect-ratio: 1 / 0.9; max-height: 340px;'>




                            {{-- extraWrapper --}}
                            <div class="swiper-wrapper">



                                {{-- loop - today meals --}}
                                @foreach ($todayMeals as $meal)


                                <div class="swiper-slide">


                                    {{-- name - type --}}
                                    <p class='swiper--caption for-meals position-relative '>
                                        <span class='truncate-text-1l'>{{ $meal->name }}</span>
                                        <span class='fs-10 text-theme-secondary d-block'>{{ $meal }}</span>
                                    </p>



                                    {{-- image --}}
                                    <img src="{{ asset('storage/menu/meals/' . ($meal->imageFile ?? $defaultPlate)) }}"
                                        alt="" loading='lazy'>
                                    <div class="swiper-lazy-preloader"></div>









                                    {{-- :: macros --}}
                                    <p class='swiper--caption for-meals macros position-relative'>


                                        {{-- calories --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold '>210
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>Cal</span>
                                        </span>



                                        {{-- proteins --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold'>210
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>P</span>
                                        </span>


                                        {{-- carbs --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold'>210
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>C</span>
                                        </span>


                                        {{-- carbs --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold'>210
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>F</span>
                                        </span>

                                    </p>
                                </div>

                                @endforeach
                                {{-- end loop - today meals --}}



                            </div>
                            {{-- endExtra --}}







                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                        {{-- endSwiper --}}




                    </div>
                </div>
                {{-- endRow --}}










                {{-- ------------------------------------------------ --}}
                {{-- ------------------------------------------------ --}}








                {{-- blogs --}}
                <div class="row align-items-start @if ($blogs->count() == 0) d-none @endif">



                    {{-- heading --}}
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-3 align-items-center" data-aos='slide-up'
                            data-aos-delay='100' wire:ignore.self>
                            <h4 class="fw-semibold d-flex align-items-center mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-chevron-compact-right fs-5 me-2"
                                    style="fill: var(--color-theme-secondary)">
                                    <path fill-rule="evenodd"
                                        d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z">
                                    </path>
                                </svg>Stay tuned with our blogs
                            </h4>
                        </div>
                    </div>


                    {{-- carousel --}}
                    <div class="col-12 mb-5">


                        {{-- swiper --}}
                        <div class="swiper general-swiper blogs-swiper" style='aspect-ratio: 2/1;'>




                            {{-- extraWrapper --}}
                            <div class="swiper-wrapper">



                                {{-- loop - today blogs --}}
                                @foreach ($blogs as $blog)

                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/extra/blogs/' . $blog->imageFile) }}" alt=""
                                        loading='lazy'>
                                    <div class="swiper-lazy-preloader"></div>
                                </div>

                                @endforeach
                                {{-- end loop - today blogs --}}



                            </div>
                            {{-- endExtra --}}







                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                        {{-- endSwiper --}}
                    </div>
                </div>
                {{-- endRow --}}











            </div>
        </div>
        {{-- endRow --}}



    </div>
    {{-- endContainer --}}




















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- 1: swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>







    {{-- initSwiper --}}
    <script>



    </script>













    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









</section>
{{-- endSection --}}