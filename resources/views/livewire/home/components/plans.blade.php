<section id="services--section" class='mb-0'>
    <div class="container" data-aos="fade" data-aos-duration="500" data-aos-delay="200" wire:ignore.self>
        <div class="row">


            <div class="col-12">




                {{-- tabs --}}
                <div class="services--tab mb-4 position-relative" wire:ignore.self>


                    {{-- 2: tabLinks --}}
                    <ul class="nav nav-tabs justify-content-center justify-content-sm-end mb-5" role="tablist"
                        data-aos="fade" data-aos-duration="500" data-aos-delay="200" wire:ignore>


                        {{-- 2.1: plans --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active fs-sm-15 fw-600" role="tab" data-bs-toggle="tab"
                                href="#our-plans--tab" wire:click="toggleSummary(false)">Plans</a>
                        </li>



                        {{-- 2.2: customise --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fs-sm-15 fw-600" role="tab" data-bs-toggle="tab"
                                href="#custom-plans--tab" wire:click="toggleSummary(true)">Build
                                Your Own</a>
                        </li>









                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}








                        {{-- yearly - monthly --}}
                        <div class="text-center pricing--checkbox-wrapper">
                            <div class="pricing--checkbox">

                                {{-- 1: monthly --}}
                                <label class="form-label label-left inactive" for="pricing--checkbox">Monthly</label>


                                {{-- checkbox --}}
                                <div class="form-check form-switch form--checkbox-with-label for-switch mx-3">
                                    <input class="form-check-input me-0" type="checkbox" id="pricing--checkbox"
                                        wire:model.live='isYearly'>
                                </div>


                                {{-- 2: yearly --}}
                                <label class="form-label label-right d-flex align-items-center justify-content-center"
                                    for="pricing--checkbox">
                                    <span>Yearly</span>
                                    <i class='bi bi-info-circle ms-2 cursor--pointer'
                                        style="border-bottom: 1px solid var(--color-info-icon-hover);"
                                        data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="right"
                                        title="50% OFF + Free Consultation"></i>
                                </label>
                            </div>
                        </div>





                    </ul>
                    {{-- endList --}}








                    {{-- --------------------------------------------- --}}
                    {{-- --------------------------------------------- --}}
                    {{-- --------------------------------------------- --}}







                    {{-- tabContent --}}
                    <div class="tab-content">


                        {{-- 1: plansTab --}}
                        <div class="tab-pane fade show active" role="tabpanel" id="our-plans--tab" wire:ignore.self>
                            <div class="row">



                                {{-- sideHeading --}}
                                <div class="col-2 col-md-1 d-flex justify-content-center" data-aos="fade"
                                    data-aos-duration="500" data-aos-delay="500" wire:ignore.self>
                                    <h2
                                        class="fs-1 text-end fw-semibold fs-sm-22 text--vertical mx-0 mb-0 services--side-heading">
                                        Pick Your Solution</h2>
                                </div>




                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}




                                {{-- content --}}
                                <div class="col-10 col-md-11" data-aos="fade-up" data-aos-duration="500"
                                    data-aos-delay="200" wire:ignore.self>




                                    {{-- swiper --}}
                                    <div class="swiper plans--swiper-1 with--pagination">
                                        <div class="swiper-wrapper">


                                            {{-- loop - plans --}}
                                            @foreach ($plans ?? [] as $plan)

                                            <div class="swiper-slide" key='single-plan-{{ $plan->id }}'>
                                                <div class="meal-plan--card service--card">



                                                    {{-- imageFile --}}
                                                    <img class="service--image"
                                                        src="{{ url('storage/plans/' . $plan?->imageFile) }}">


                                                    {{-- wrapper --}}
                                                    <div class="d-flex flex-column">


                                                        {{-- name --}}
                                                        <h5 class="fw-bold mb-1 fs-sm-16">{{ $plan?->name }}</h5>


                                                        {{-- description --}}
                                                        <p class="service--subtitle mb-2 fst-italic
                                                        fs-sm-14 fs-15 truncate--3l h-72">{{$plan?->desc}}</p>






                                                        {{-- ------------------------------- --}}
                                                        {{-- ------------------------------- --}}
                                                        {{-- ------------------------------- --}}






                                                        {{-- bottom --}}
                                                        <div class="d-block">

                                                            {{-- price --}}
                                                            <h3 class="fw-bold mt-2 mb-2 ls--price">



                                                                {{-- 1: yearly --}}
                                                                @if ($isYearly)


                                                                <span
                                                                    class="currency--span sm me-1 fw-700 fs-sm-12">$</span>{{
                                                                number_format($plan?->price * 12, 1) }}<span
                                                                    class="fs-15 ms-1 text--per fw-600 fst-italic">/
                                                                    year</span>


                                                                {{-- 2: monthly --}}
                                                                @else


                                                                <span
                                                                    class="currency--span sm me-1 fw-700 fs-sm-12">$</span>{{
                                                                number_format($plan?->price, 1) }}<span
                                                                    class="fs-15 ms-1 text--per fw-600 fst-italic">/
                                                                    month</span>



                                                                @endif
                                                                {{-- end if --}}
                                                            </h3>


                                                            {{-- select --}}
                                                            <button wire:click="confirmPlan('{{ $plan->id }}')"
                                                                type='button' class="btn button--continue mb-3"
                                                                role="button" wire:loading.attr='disabled'>Choose
                                                                this plan</button>
                                                        </div>
                                                        {{-- endBottom --}}





                                                        {{-- ---------------------------- --}}
                                                        {{-- ---------------------------- --}}
                                                        {{-- ---------------------------- --}}




                                                        {{-- bundlesWrapper --}}
                                                        @if ($plan->bundles)




                                                        {{-- subheading --}}
                                                        <div class='fw-500 fs-15 key-features--title mt-4'>
                                                            <h6>Essentials</h6>
                                                            <hr>
                                                        </div>




                                                        {{-- wrapper --}}
                                                        <div class='key-features--wrapper'>


                                                            {{-- loop - planBundles --}}
                                                            @foreach ($plan?->bundles?->sortBy('bundleId')?->take(6) ??
                                                            [] as $planBundle)


                                                            <div class="service--checkbox-wrapper"
                                                                key='plan-bundle-{{ $plan?->id }}-{{ $planBundle->id }}'>
                                                                <div class="form-check form--checkbox-with-label mb-0"
                                                                    style="pointer-events: none !important;">

                                                                    {{-- input --}}
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="plan-bundle-checkbox-{{ $plan?->id }}-{{ $planBundle->id }}"
                                                                        checked="">

                                                                    {{-- label --}}
                                                                    <label class="form-check-label  no-events"
                                                                        for="plan-bundle-checkbox-{{ $plan?->id }}-{{ $planBundle->id }}">{{
                                                                        $planBundle->bundle?->name }}</label>
                                                                </div>
                                                            </div>


                                                            @endforeach
                                                            {{-- end loop --}}


                                                        </div>
                                                        {{-- endWrapper --}}







                                                        {{-- -------------------------------- --}}
                                                        {{-- -------------------------------- --}}






                                                        {{-- viewFeatures --}}
                                                        @if ($plan?->bundles?->sortBy('bundleId')->count() > 6)

                                                        <div class="d-flex justify-content-center mt-3 mb-1">
                                                            <button type="button" class="btn  btn--features"
                                                                data-bs-toggle='modal'
                                                                data-bs-target='#plan--features-modal'
                                                                wire:click="viewFeatures('{{ $plan->id }}')">See
                                                                Features</button>
                                                        </div>


                                                        {{-- else --}}
                                                        @else

                                                        <div class="d-flex justify-content-center mt-3 mb-1">
                                                            <button type="button"
                                                                class="btn btn--features invisible disabled">See
                                                                Features</button>
                                                        </div>


                                                        @endif
                                                        {{-- end if --}}




                                                        @endif
                                                        {{-- endWrapper --}}



                                                    </div>
                                                </div>
                                            </div>


                                            @endforeach
                                            {{-- end loop --}}




                                        </div>
                                        {{-- endSwiperWrapper --}}






                                        {{-- ---------------------------------------- --}}
                                        {{-- ---------------------------------------- --}}




                                        {{-- pagination --}}
                                        <div class="swiper-pagination"></div>






                                        {{-- ---------------------------------------- --}}
                                        {{-- ---------------------------------------- --}}




                                        <div class="col-12 d-flex justify-content-center swiper--arrows mt-4 pb-4">

                                            <button class="btn btn--link meal--card-arrows plans--swiper-previous me-3"
                                                type="button">
                                                <i class='bi bi-chevron-left'></i>
                                            </button>

                                            <button class="btn btn--link meal--card-arrows plans--swiper-next"
                                                type="button">
                                                <i class='bi bi-chevron-right'></i>
                                            </button>
                                        </div>




                                        {{-- ---------------------------------------- --}}
                                        {{-- ---------------------------------------- --}}




                                        {{-- autoplay --}}
                                        <div class="autoplay-progress colored d-none">
                                            <svg viewBox="0 0 45 45">
                                                <circle cx="23" cy="23" r="18"></circle>
                                            </svg>
                                            <span></span>
                                        </div>




                                    </div>
                                    {{-- endSwiper --}}



                                </div>
                                {{-- endContent --}}


                            </div>
                        </div>
                        {{-- end plansTab --}}









                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}











                        {{-- 2: customiseTab --}}
                        <div class="tab-pane fade" role="tabpanel" id="custom-plans--tab" wire:ignore>
                            <div class="row">


                                {{-- heading --}}
                                <div class="col-2 col-md-1 d-flex justify-content-center" data-aos="fade"
                                    data-aos-duration="500" data-aos-delay="500" wire:ignore.self>
                                    <h2
                                        class="fs-1 text-end fw-semibold fs-sm-22 text--vertical mx-0 mb-0 services--side-heading">
                                        Customise Your Own</h2>
                                </div>




                                {{-- ---------------------------------------- --}}
                                {{-- ---------------------------------------- --}}
                                {{-- ---------------------------------------- --}}





                                {{-- content --}}
                                <div class="col-10 col-md-11" wire:ignore>





                                    {{-- swiper --}}
                                    <div class="swiper bundles--swiper-1 with--pagination">
                                        <div class="swiper-wrapper">


                                            {{-- loop - modules --}}
                                            @foreach ($modules ?? [] as $module)

                                            <div class="swiper-slide" key='single-module-{{ $module->id }}'>
                                                <div class="meal-plan--card service--card">


                                                    {{-- cover --}}
                                                    <img class="service--image"
                                                        src="{{ url('storage/modules/default.png') }}">


                                                    {{-- features --}}
                                                    <livewire:home.components.plans.components.plans-customise-module
                                                        key="single-module-features-{{ $module->id }}"
                                                        id='{{ $module->id }}' parent='swiper'>


                                                </div>
                                            </div>

                                            @endforeach
                                            {{-- end loop --}}



                                        </div>
                                        {{-- endSwiperWrapper --}}







                                        {{-- ---------------------------------------- --}}
                                        {{-- ---------------------------------------- --}}






                                        {{-- pagination --}}
                                        <div class="swiper-pagination bunldes"></div>





                                        {{-- ---------------------------------------- --}}
                                        {{-- ---------------------------------------- --}}





                                        <div class="col-12 d-flex justify-content-center swiper--arrows mt-4">
                                            <button
                                                class="btn btn--link meal--card-arrows bundles--swiper-previous bundles--swiper-previous me-3"
                                                type="button">
                                                <i class='bi bi-chevron-left'></i>
                                            </button>

                                            <button
                                                class="btn btn--link meal--card-arrows bundles--swiper-next bundles--swiper-next"
                                                type="button">
                                                <i class='bi bi-chevron-right'></i>
                                            </button>
                                        </div>




                                        {{-- ---------------------------------------- --}}
                                        {{-- ---------------------------------------- --}}




                                        {{-- autoplay --}}
                                        <div class="autoplay-progress bundles colored d-none">
                                            <svg viewBox="0 0 45 45">
                                                <circle cx="23" cy="23" r="18"></circle>
                                            </svg>
                                            <span></span>
                                        </div>




                                    </div>
                                    {{-- endSwiper --}}







                                </div>
                            </div>
                        </div>


                    </div>
                    {{-- endContent --}}

                </div>
                {{-- endTabs --}}

            </div>
        </div>
    </div>
    {{-- endContainer --}}







    {{-- ---------------------------------------------------- --}}
    {{-- ---------------------------------------------------- --}}
    {{-- ---------------------------------------------------- --}}





    {{-- summaryForCustomise --}}
    @if ($showSummary)

    <div id="summary--floating" class="summary--floating py-3">
        <div class="container">



            {{-- row --}}
            <div class="row align-items-end">
                <div class="col-12">


                    {{-- 1: summaryLine --}}
                    <div class="summary--line flex-column flex-md-row mb-0 align-items-end">
                        <div class="d-flex flex-column justify-content-end service--checkout-left-wrapper w-100">


                            {{-- top--}}
                            <div class="d-flex align-items-end">


                                {{-- totalHeaing --}}
                                <h6
                                    class="fs-4 mb-0 text-uppercase ls--price fw-semibold fs-sm-17 d-inline-flex align-items-center">
                                    Total<i class='bi bi-arrow-right-short mx-1'></i>
                                </h6>





                                {{-- totalPrice --}}
                                <h6 class="fs-4 ls--price fw-700 mb-0 fs-sm-17">
                                    {{ number_format($moduleTotalPrices ?? 0, 2) }}</h6>

                                <span class="currency--span sm ms-1 fs-12 fw-500 fs-sm-11">$</span>
                            </div>
                            {{-- endTop --}}





                            {{-- --------------------------------------- --}}
                            {{-- --------------------------------------- --}}




                            {{-- features --}}
                            <div class='d-flex align-items-end summary--features mt-1 flex-wrap truncate--2l'>

                                {{-- loop - moduleFeatures --}}
                                @foreach ($moduleTotalFeatures ?? [] as $moduleTotalFeature)

                                <span>{{ $moduleTotalFeature }}</span>

                                @endforeach
                                {{-- end loop --}}

                            </div>


                        </div>
                        {{-- endWrapper --}}





                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}




                        {{-- submitButton --}}
                        <button class="btn button--continue fs-sm-15 rounded-2 mx-auto mt-3 mt-md-0 mx-md-0 mw--200"
                            role="button" wire:click="confirmCustomizedPlan" wire:loading.attr='disabled'>Get my
                            plan</button>
                    </div>
                    {{-- endLine --}}



                </div>
            </div>
            {{-- endRow --}}



        </div>
    </div>

    @endif
    {{-- endSummary --}}





</section>
{{-- endSection --}}