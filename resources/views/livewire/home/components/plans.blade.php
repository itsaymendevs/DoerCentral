<section data-aos="fade" data-aos-duration="500" data-aos-delay="200" id="services--section">
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">



                {{-- tabs --}}
                <div class="services--tab mb-4">


                    {{-- 2: tabLinks --}}
                    <ul class="nav nav-tabs justify-content-center justify-content-sm-end" role="tablist"
                        data-aos="fade" data-aos-duration="500" data-aos-delay="200">


                        {{-- 2.1: plans --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active fs-sm-15" role="tab" data-bs-toggle="tab"
                                href="#our-plans--tab">Plans</a>
                        </li>



                        {{-- 2.2: customise --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link no-events-loading fs-sm-15" role="tab" data-bs-toggle="tab"
                                href="#custom-plans--tab">Build Your Own</a>
                        </li>
                    </ul>



                    {{-- --------------------------------------------- --}}
                    {{-- --------------------------------------------- --}}
                    {{-- --------------------------------------------- --}}







                    {{-- tabContent --}}
                    <div class="tab-content">


                        {{-- 1: plansTab --}}
                        <div class="tab-pane fade show active" role="tabpanel" id="our-plans--tab">
                            <div class="row">



                                {{-- sideHeading --}}
                                <div class="col-2 col-md-1 d-flex justify-content-center" data-aos="fade"
                                    data-aos-duration="500" data-aos-delay="500">
                                    <h2
                                        class="fs-1 text-end fw-semibold fs-sm-22 text--vertical mx-0 mb-0 services--side-heading">
                                        Pick Your Solution</h2>
                                </div>




                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}




                                {{-- content --}}
                                <div class="col-10 col-md-11">
                                    <div class="row justify-content-center">



                                        {{-- loop - plans --}}
                                        @foreach ($plans ?? [] as $plan)

                                        <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-4 mb-4" data-aos="fade-up"
                                            data-aos-duration="500" data-aos-delay="200" wire:ignore.self
                                            key='single-plan-{{ $plan->id }}'>
                                            <div class="meal-plan--card service--card">



                                                {{-- imageFile --}}
                                                <img class="service--image"
                                                    src="{{ url('storage/plans/' . $plan?->imageFile) }}">


                                                {{-- wrapper --}}
                                                <div class="d-flex flex-column">


                                                    {{-- name --}}
                                                    <h5 class="fw-semibold mb-1 fs-sm-16">{{ $plan?->name }}</h5>


                                                    {{-- description --}}
                                                    <p class="service--subtitle mb-2 fs-sm-14 fs-16">{{ $plan?->desc }}
                                                    </p>





                                                    {{-- ---------------------------- --}}
                                                    {{-- ---------------------------- --}}
                                                    {{-- ---------------------------- --}}




                                                    {{-- bundlesWrapper --}}
                                                    <div>


                                                        {{-- loop - planBundles --}}
                                                        @foreach ($plan?->bundles?->sortBy('bundleId') ?? []
                                                        as $planBundle)


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





                                                    {{-- ------------------------------- --}}
                                                    {{-- ------------------------------- --}}
                                                    {{-- ------------------------------- --}}






                                                    {{-- bottom --}}
                                                    <div class="d-block">

                                                        {{-- price --}}
                                                        <h3 class="text-center fw-bold mt-2 mb-2 ls--price">
                                                            <span class="currency--span sm
                                                                me-1 fw-700 fs-sm-12">$</span>{{
                                                            number_format($plan?->price, 1) }}<span
                                                                class="fs-15 ms-1 text-secondary fw-600">/ month</span>
                                                        </h3>


                                                        {{-- select --}}
                                                        <a class="btn button--continue mb-3" role="button"
                                                            href="javascript:void(0);">Choose this plan</a>
                                                    </div>
                                                    {{-- endBottom --}}




                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                        {{-- end loop --}}




                                    </div>
                                </div>
                                {{-- endContent --}}


                            </div>
                        </div>
                        {{-- end plansTab --}}







                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}







                        {{-- 2: customiseTab --}}
                        <div class="tab-pane fade" role="tabpanel" id="custom-plans--tab">
                            <div class="row">
                                <div class="col-2 col-md-1 d-flex justify-content-center" data-aos="fade"
                                    data-aos-duration="500" data-aos-delay="500">
                                    <h2
                                        class="fs-1 text-end fw-semibold fs-sm-22 text--vertical mx-0 mb-0 services--side-heading">
                                        Customise Your Own</h2>
                                </div>
                                <div class="col-10 col-md-11">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-4 mb-4" data-aos="fade-up"
                                            data-aos-duration="500" data-aos-delay="200">
                                            <div class="meal-plan--card service--card"><img class="service--image"
                                                    src="assets/img/plans/International-Meal-Plan-01-1.webp">
                                                <div class="d-flex flex-column">
                                                    <h5 class="fw-semibold mb-2 fs-sm-16">Dashboard</h5>
                                                    <div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input inactive" type="checkbox"
                                                                    id="formCheck-11" checked=""><label
                                                                    class="form-check-label inactive"
                                                                    for="formCheck-11">Dashboard Analytics</label>
                                                            </div>
                                                        </div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input inactive" type="checkbox"
                                                                    id="formCheck-13" checked=""><label
                                                                    class="form-check-label inactive"
                                                                    for="formCheck-13">Hide Plans &amp; Bundles</label>
                                                            </div>
                                                        </div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input inactive" type="checkbox"
                                                                    id="formCheck-14" checked=""><label
                                                                    class="form-check-label" for="formCheck-14">Stock
                                                                    Management</label>
                                                            </div>
                                                        </div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck-15"><label class="form-check-label"
                                                                    for="formCheck-15">Labels Management</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-block">
                                                        <h3 class="text-center fw-bold mt-2 mb-2 ls--price"><span
                                                                class="currency--span sm me-1 fw-700 fs-sm-12">$</span>90<span
                                                                class="fs-15 ms-1 text-secondary fw-600">/ module</span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-4 mb-4" data-aos="fade-up"
                                            data-aos-duration="500" data-aos-delay="250">
                                            <div class="meal-plan--card service--card"><img class="service--image"
                                                    src="assets/img/plans/arabic-meal-plan-03.webp">
                                                <div class="d-flex flex-column">
                                                    <h5 class="fw-semibold mb-2 fs-sm-16">Menu</h5>
                                                    <div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input inactive" type="checkbox"
                                                                    id="formCheck-17" checked=""><label
                                                                    class="form-check-label inactive"
                                                                    for="formCheck-17">Dashboard Analytics</label>
                                                            </div>
                                                        </div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input inactive" type="checkbox"
                                                                    id="formCheck-18" checked=""><label
                                                                    class="form-check-label inactive"
                                                                    for="formCheck-18">Hide Plans &amp; Bundles</label>
                                                            </div>
                                                        </div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck-19"><label class="form-check-label"
                                                                    for="formCheck-19">Stock Management</label>
                                                            </div>
                                                        </div>
                                                        <div class="service--checkbox-wrapper">
                                                            <div
                                                                class="form-check form--checkbox-with-label mb-0 w-100">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck-20"><label class="form-check-label"
                                                                    for="formCheck-20">Labels Management</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-block">
                                                        <h3 class="text-center fw-bold mt-2 mb-2 ls--price"><span
                                                                class="currency--span sm me-1 fw-700 fs-sm-12">$</span>100<span
                                                                class="fs-15 ms-1 text-secondary fw-600">/ module</span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <div id="summary--floating" class="summary--floating py-3">
        <div class="container">



            {{-- row --}}
            <div class="row align-items-end">
                <div class="col-12">


                    {{-- 1: summaryLine --}}
                    <div class="summary--line mb-0">
                        <div class="d-flex align-items-end w-50">


                            {{-- totalHeaing --}}
                            <h6
                                class="fs-4 mb-0 text-uppercase ls--price fw-semibold fs-sm-17 d-inline-flex align-items-center">
                                Total<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right-short mx-1">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z">
                                    </path>
                                </svg>
                            </h6>


                            {{-- totalPrice --}}
                            <h6 class="fs-4 ls--price fw-700 mb-0 fs-sm-17">2,100.00</h6>
                            <span class="currency--span sm ms-1 fs-12 fw-500 fs-sm-11">AED</span>

                        </div>




                        {{-- submitButton --}}
                        <a class="btn button--continue fs-sm-15 rounded-2 mw--sm-110 mw--200" role="button"
                            href="plans-checkout.html">Get my plan</a>
                    </div>
                    {{-- endLine --}}



                </div>
            </div>
            {{-- endRow --}}



        </div>
    </div>
    {{-- endSummary --}}





</section>
{{-- endSection --}}