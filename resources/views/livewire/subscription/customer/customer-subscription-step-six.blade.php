<section id="content--section" class="content--section">
    <div class="container">
        <div class="row justify-content-center">




            {{-- leftCol --}}
            <div class="col-12 col-xl-12 text-center">


                {{-- heading --}}
                <h3 data-aos="fade" data-aos-duration="600" data-aos-delay="800" data-aos-once="true"
                    class="mb-5 fw-semibold pb-lg-4" wire:ignore>
                    Thanks for choosing Doer<br />Enjoy your meals!

                    {{-- icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-stars ms-2" style="fill: var(--bs-yellow)">
                        <path
                            d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z">
                        </path>
                    </svg>
                </h3>
            </div>
            {{-- endColumn --}}












            {{-- ----------------------------------------------- --}}
            {{-- ----------------------------------------------- --}}












            {{-- rightCol --}}
            <div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-5 col-xxl-4 text-center" data-aos="fade-left"
                data-aos-duration="600" data-aos-delay="800" data-aos-once="true" wire:ignore.self>



                {{-- planRow --}}
                <div class="overview--card client-version scale--self-05 mb-3 mb-3 mt-zone-cards plans-column">

                    <div class="row">

                        {{-- cover --}}
                        <div class="col-12 text-center position-relative">
                            <img class="client--card-logo of-cover"
                                src="{{ asset('storage/menu/plans/' . $plan->imageFile) }}" />
                        </div>


                        {{-- content --}}
                        <div class="col-12">
                            <h4 class="text-center fw-bold mt-3 mb-1">{{ $plan->name }}</h4>
                        </div>
                    </div>
                </div>
                {{-- end planRow --}}






                {{-- -------------------- --}}
                {{-- -------------------- --}}






                {{-- invoiceRow --}}
                <div class="text-start overview--card client-version mb-5 w-100 flex-row subscription--side-invoice">
                    <div class="row w-100">
                        <div class="col-12">

                            {{-- heading --}}
                            <h6 class="fw-semibold mb-3 text-gold text-center">Summary</h6>



                            {{-- :: averageCaloriesPerDay --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">
                                    Calories / Day
                                </p>
                                <p class="fs-13 mb-0 w-50 text-end">{{ $instance->totalBundleRangeCalories ?? '' }}
                                </p>
                            </div>




                            {{-- :: planDays --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">Plan Days</p>
                                <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->planDays ?? '' }}</p>
                            </div>



                            {{-- :: pricePerDay --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">Price / Day</p>
                                <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->bundleRangePricePerDay ?? '' }}
                                </p>
                            </div>



                            {{-- :: plan - meals --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-50 pe-3 mb-0">Plan Details</p>
                                <p class="fs-13 mb-0 w-50 text-end">
                                    {{ $instance->bundleTypesInArray ?? '' }}
                                </p>
                            </div>






                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}




                            {{-- :: planPrice --}}
                            <div class="d-flex align-items-center justify-content-between pt-3"
                                style="border-top: 1px dashed var(--bg-golden-dark)">
                                <p class="fs-12 w-50 pe-3 mb-0">Plan Price</p>
                                <p class="mb-0 w-50 text-end fw-bold">{{ $instance->totalBundleRangePrice ?? ''}}
                                    <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                                </p>
                            </div>




                            {{-- :: bag --}}
                            <div class="d-flex align-items-center justify-content-between pt-2">
                                <p class="fs-12 w-50 pe-3 mb-0">{{ $instance->bag }}</p>
                                <p class="mb-0 w-50 text-end fw-bold">{{ $instance->bagPrice }}
                                    <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                                </p>
                            </div>


                            {{-- :: Coupon --}}
                            <div class="d-flex align-items-center justify-content-between pt-2">
                                <p class="fs-12 w-50 pe-3 mb-0">Coupon</p>
                                <p class="mb-0 w-50 text-end fw-bold">{{ $instance->promoCodeDiscountPrice ?? '0' }}
                                    <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                                </p>
                            </div>




                            {{-- :: totalCheckoutPrice --}}
                            <div class="d-flex align-items-center justify-content-between pt-2">
                                <p class="w-50 pe-2 mb-0 fs-14 fw-semibold">Total Checkout</p>
                                <p class="mb-0 w-50 text-end fw-bold fs-4">{{ $instance->totalCheckoutPrice ?? '0' }}
                                    <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                                </p>
                            </div>



                        </div>
                    </div>
                </div>
                {{-- end invoiceRow --}}








                {{-- :: returnButton --}}
                <a href="{{ route('subscription.customerStepOne') }}"
                    class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-4  fw-semibold justify-content-center shrink--self w-75"
                    style="border: 1px dashed var(--color-scheme-3)">
                    Continue
                </a>




            </div>
            {{-- end rightCol --}}






        </div>
    </div>
</section>
{{-- endSection --}}