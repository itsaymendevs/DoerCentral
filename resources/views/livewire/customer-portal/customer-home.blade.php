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



                <div class="row align-items-start mb-4">


                    {{-- name - location --}}
                    <div class="col-12 col-md-8">


                        {{-- name --}}
                        <h5 class="fw-normal d-flex align-items-center mb-3">
                            Welcome Back
                            <span class="fw-semibold ms-2 text-orange" data-aos='zoom-out' data-aos-delay='200'
                                wire:ignore.self>{{
                                $customer->firstName }}!</span>
                        </h5>


                        {{-- location --}}
                        <h6 class="fw-normal d-flex align-items-center">
                            <img class="me-2" src="{{ asset('assets/img/App/pin.png') }}" style="width: 16px" />

                            {{-- :: hasDelivery --}}
                            @if ($customerAddress)

                            {{ "$customerAddress->city->name, $customerAddress->district->name" }}

                            @else

                            {{ "No Scheduled Delivery For Today" }}

                            @endif
                            {{-- end if --}}



                        </h6>



                    </div>







                    {{-- todayDate --}}
                    <div class="col-12 col-md-4 d-none d-md-block text-center">
                        <h6 class="fw-semibold d-inline-flex align-items-center justify-content-end justify-content-md-center pb-1"
                            style="border-bottom: 1px solid var(--color-theme-secondary)">
                            {{ date('d / m / Y', strtotime($globalCurrentDate)) }}
                        </h6>
                    </div>
                </div>

















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








                {{-- totalMacros --}}
                <div class="row align-items-stretch mb-5" wire:ignore>

                    {{-- heading --}}
                    <div class="col-12">
                        <h4 class="fw-semibold d-flex align-items-center justify-content-center mb-3">Today's Macros
                        </h4>
                    </div>







                    {{-- macros --}}
                    <div class="col-12 col-md-12 align-self-end mt-3 mt-md-0 ">
                        <div class="row align-items-end justify-content-center">



                            {{-- calories --}}
                            <div class="col-auto col-sm-auto px-1" data-aos='slide-left' data-aos-delay='100'
                                wire:ignore.self>
                                <div class="item--box macros for--calories">
                                    <p class="text-center fs-15 mb-0">
                                        <span class="fs-5 fw-bold  d-block">{{ $totalCalories }}</span><span
                                            class="fs-12 d-block fw-bold mt-3">Cals</span>
                                    </p>
                                </div>
                            </div>





                            {{-- carbs --}}
                            <div class="col-auto col-sm-auto px-1" data-aos='slide-left' data-aos-delay='200'
                                wire:ignore.self>
                                <div class="item--box macros for--carbs">
                                    <p class="text-center fs-15 mb-0">
                                        <span class="fs-5 fw-bold  d-block">{{ $totalCarbs }}</span>
                                        <span class="fs-12 d-block fw-bold  mt-3">Carbs</span>
                                    </p>
                                </div>
                            </div>





                            {{-- proteins --}}
                            <div class="col-auto col-sm-auto px-1" data-aos='slide-left' data-aos-delay='300'
                                wire:ignore.self>
                                <div class="item--box macros for--proteins">
                                    <p class="text-center  mb-0">
                                        <span class="fs-5 fw-bold  d-block">{{ $totalProteins }}</span><span
                                            class="fs-12 d-block fw-bold mt-3">Proteins</span>
                                    </p>
                                </div>
                            </div>






                            {{-- fats --}}
                            <div class="col-auto col-sm-auto px-1" data-aos='slide-left' data-aos-delay='400'
                                wire:ignore.self>
                                <div class="item--box macros for--fats">
                                    <p class="text-center fs-15 mb-0">
                                        <span class="fs-5 fw-bold  d-block">{{ $totalFats }}</span><span
                                            class="fs-12 d-block fw-bold  mt-3">Fat</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- endRow --}}










                {{-- ------------------------------------------------ --}}
                {{-- ------------------------------------------------ --}}














                {{-- today's meals --}}
                <div class="row align-items-start">



                    {{-- heading --}}
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-3 align-items-center">
                            <h4 class="fw-semibold d-flex align-items-center mb-0" data-aos='slide-down'
                                data-aos-delay='100' wire:ignore.self>Today's Menu</h4>


                            {{-- menuLink --}}
                            <a class="btn btn--scheme btn--scheme-2 fs-13 px-4 scale--self-05 fw-semibold"
                                href="{{ route('portals.customer.menu') }}">
                                Manage
                            </a>
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
                                @foreach ($scheduleMeals ?? [] as $scheduleMeal)


                                <div class="swiper-slide">


                                    {{-- name - type --}}
                                    <p class='swiper--caption for-meals position-relative '>
                                        <span class='truncate-text-1l'>{{ $scheduleMeal?->meal?->name }}</span>
                                        <span class='fs-10 text-theme-secondary d-block'>{{
                                            $scheduleMeal->mealType->name }}</span>
                                    </p>



                                    {{-- image --}}
                                    <img src="{{ asset('storage/menu/meals/' . ($scheduleMeal?->meal?->imageFile ?? $defaultPlate)) }}"
                                        alt="" loading='lazy'>
                                    <div class="swiper-lazy-preloader"></div>









                                    {{-- :: macros --}}
                                    <p class='swiper--caption for-meals macros position-relative'>


                                        {{-- calories --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold '>{{
                                            $scheduleMeal?->mealSize()?->afterCookCalories }}
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>Cal</span>
                                        </span>



                                        {{-- proteins --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold'>{{
                                            $scheduleMeal?->mealSize()?->afterCookProteins }}
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>P</span>
                                        </span>


                                        {{-- carbs --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold'>{{
                                            $scheduleMeal?->mealSize()?->afterCookCarbs }}
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>C</span>
                                        </span>


                                        {{-- fats --}}
                                        <span class='d-flex flex-column align-items-center fw-semibold'>{{
                                            $scheduleMeal?->mealSize()?->afterCookFats }}
                                            <span
                                                class='d-block fs-10 fw-bold text-uppercase text-theme-secondary'>F</span>
                                        </span>

                                    </p>
                                </div>

                                @endforeach
                                {{-- end loop - today meals --}}







                                {{-- fallback --}}



                                @if (empty($scheduleMeals))


                                {{-- fallback --}}
                                <div class="swiper-slide">

                                    <img src="{{ asset('assets/img/App/fallback.png') }}" alt="" loading='lazy'
                                        style="height: 260px;">
                                    <div class="swiper-lazy-preloader"></div>

                                </div>



                                {{-- fallback --}}
                                <div class="swiper-slide">

                                    <img src="{{ asset('assets/img/App/fallback.png') }}" alt="" loading='lazy'
                                        style="height: 260px;">
                                    <div class="swiper-lazy-preloader"></div>

                                </div>



                                {{-- fallback --}}
                                <div class="swiper-slide">

                                    <img src="{{ asset('assets/img/App/fallback.png') }}" alt="" loading='lazy'
                                        style="height: 260px;">
                                    <div class="swiper-lazy-preloader"></div>

                                </div>



                                @endif
                                {{-- end if - fallback --}}



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