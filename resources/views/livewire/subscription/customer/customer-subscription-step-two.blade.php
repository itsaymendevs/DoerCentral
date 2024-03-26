<section id="content--section" class="content--section">
    <div class="container">
        <div class="row justify-content-center">






            {{-- contentCol --}}
            <div class="col-12 col-lg-9 text-center">


                {{-- heading --}}
                <h4 data-aos="fade" data-aos-duration="600" data-aos-delay="800" data-aos-once="true"
                    class="mb-4 fw-bold position-relative" wire:ignore.self>
                    Customise Your Plan Details


                    {{-- :: backButton --}}
                    <a class="btn submenu--group btn--scheme-2 d-flex align-items-center subscription--back-button py-1 d-none d-md-block"
                        role="button" href="{{ route('subscription.customerStepOne') }}"><svg
                            class="bi bi-arrow-up-left me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                            </path>
                        </svg>Go Back</a>

                </h4>
                {{-- end Heading --}}




                {{-- contentRow --}}
                <div class="row row mt-4 align-items-center mb-5">
                    <div class="col-12">


                        {{-- 1: bundlesTab --}}
                        <div class="tabs--wrap">



                            {{-- navList --}}
                            <ul class="nav nav-tabs mb-0" role="tablist" data-aos="flip-up" data-aos-duration="600"
                                data-aos-delay="800" data-aos-once="true" wire:ignore.self>


                                {{-- loop - bundles (active) --}}
                                @foreach ($plan->bundles->where('isForWebsite', true) as $bundle)

                                <li class="nav-item" role="presentation" wire:ignore>
                                    <a class="nav-link" role="tab" data-bs-toggle="tab"
                                        href="#bundle-tab-{{ $bundle->id }}"
                                        wire:click='changeBundle({{ $bundle->id }})'>
                                        {{ $bundle->name }}
                                    </a>
                                </li>

                                @endforeach
                                {{-- end loop --}}


                            </ul>
                            {{-- end navList --}}





                            {{-- ------------------------------ --}}
                            {{-- ------------------------------ --}}





                            {{-- tabsContent --}}
                            <div class="tab-content">




                                {{-- loop - bundles (active) --}}
                                @foreach ($plan->bundles->where('isForWebsite', true) as $bundle)




                                {{-- 1: bundleTabContent --}}
                                <div class="tab-pane show fade no--card px-2" role="tabpanel"
                                    id="bundle-tab-{{ $bundle->id }}" wire:ignore.self>





                                    {{-- bundleInformation --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="overview--card client-version mb-3 py-2">
                                                <div class="row align-items-center scale--img">


                                                    {{-- cover --}}
                                                    <div class="col-12 col-md-4">
                                                        <img src="{{ asset('storage/menu/plans/bundles/' . $bundle->imageFile) }}"
                                                            class="w-100 of-contain" style="height: 160px" />
                                                    </div>


                                                    {{-- name - typesCount --}}
                                                    <div class="col-12 col-md-8">
                                                        <h3 class="text-center fw-bold mb-2 mt-3 mt-md-0">{{
                                                            $bundle->name
                                                            }}</h3>


                                                        <p class="text-center fw-semibold text-gold mb-0 px-3">
                                                            {{ implode(' • ', $bundle->typesInArray()) }}
                                                        </p>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-0">
                                                            <hr class="w-75 mx-auto mt-2 mb-2" />
                                                        </div>


                                                        {{-- caloriesPerDay --}}
                                                        <h6 class='fw-normal mb-0'>Pick Your Calories Per Day</h6>




                                                    </div>
                                                    {{-- endCol --}}




                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    {{-- endRow --}}








                                    {{-- -------------------------------------- --}}
                                    {{-- -------------------------------------- --}}
                                    {{-- ************* RangeTabs ************** --}}






                                    {{-- 2: rangeTabs --}}
                                    <div>




                                        {{-- 2.1: navLinks --}}
                                        <ul class="nav nav-tabs inner" role="tablist">


                                            {{-- loop - bundleRanges (active) --}}
                                            @foreach ($bundle->ranges as $bundleRange)



                                            {{-- checkRange --}}
                                            @if ($bundleRange->range->isForWebsite == true)


                                            <li class="nav-item" role="presentation" wire:ignore>
                                                <a class="nav-link" role="tab" data-bs-toggle="tab"
                                                    href="#bundle-tab-{{ $bundle->id }}-{{ $bundleRange->range->id }}"
                                                    wire:click='changeRange({{ $bundleRange->range->id }})'>
                                                    {{ $bundleRange->range->name }}
                                                </a>
                                            </li>


                                            @endif
                                            {{-- end if --}}



                                            @endforeach
                                            {{-- end loop --}}

                                        </ul>
                                        {{-- end navLinks --}}




                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}







                                        {{-- 2.2: tabContent --}}
                                        <div class="tab-content">



                                            {{-- loop - bundleRanges (active) --}}
                                            @foreach ($bundle->ranges as $bundleRange)



                                            {{-- checkRange --}}
                                            @if ($bundleRange->range->isForWebsite == true)





                                            <div class="tab-pane no--card px-2" role="tabpanel"
                                                id="bundle-tab-{{ $bundle->id }}-{{ $bundleRange->range->id }}"
                                                wire:ignore.self>



                                                {{-- form --}}
                                                <form wire:submit='continue' class='d-block w-100'>




                                                    {{-- midRow --}}
                                                    <div class="row align-items-end row pt-2 align-items-center mb-4">


                                                        {{-- bundleDays --}}
                                                        <div class="col-12 col-sm-4 mb-3 mb-sm-0" wire:ignore>
                                                            <label class="form-label form--label">Plan Days</label>
                                                            <div class="select--single-wrapper text-start">
                                                                <select
                                                                    class="form-select form--select planDays--select"
                                                                    data-instance='instance.planDays' required>
                                                                    <option value=""></option>

                                                                    @foreach ($bundle->days as $bundleDay)
                                                                    <option value="{{ $bundleDay->days }}">{{
                                                                        $bundleDay->days
                                                                        }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>



                                                        {{-- startDate --}}
                                                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                                                            <label class="form-label form--label">Start Date</label>
                                                            <input type="date" required
                                                                min="{{ date('Y-m-d', strtotime('+1 day +4 hours')) }}"
                                                                class="form--input mb-0"
                                                                wire:model='instance.startDate' />
                                                        </div>







                                                        {{-- totalCalories - totalPrice (calculated) --}}
                                                        <div
                                                            class="col-12 col-sm-4 text-center text-sm-end align-self-end mb-3 mb-sm-0">


                                                            {{-- ?? calories - HIDDEN --}}
                                                            <h5 data-bs-toggle="tooltip" data-bss-tooltip=""
                                                                class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-2 rounded-1 mb-0 py-1 me-2 d-none"
                                                                title="Total Calories">{{
                                                                $instance->totalBundleRangeCalories ??
                                                                0 }}<small
                                                                    class="fw-semibold text-theme-secondary fs-10 ms-1">(Calorie)
                                                                </small>
                                                            </h5>


                                                            {{-- :: price --}}
                                                            <h5 data-bs-toggle="tooltip" data-bss-tooltip=""
                                                                class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-2 rounded-1 mb-0 py-1"
                                                                title="Total Price">{{ $instance->totalBundleRangePrice
                                                                ?? 0
                                                                }}<small
                                                                    class="fw-semibold text-theme-secondary fs-10 ms-1">(AED)</small>
                                                            </h5>


                                                        </div>
                                                    </div>
                                                    {{-- end midRow --}}








                                                    {{-- ----------------------------- --}}
                                                    {{-- ----------------------------- --}}







                                                    {{-- bottomRow --}}
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="overview--card client-version mb-4">
                                                                <div class="row align-items-center">
                                                                    <div class="col-12">



                                                                        {{-- headers --}}
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-12">

                                                                                {{-- title --}}
                                                                                <p
                                                                                    class="text-center fs-14 fw-normal mb-0">
                                                                                    Pick based on your preference
                                                                                </p>


                                                                                {{-- types --}}
                                                                                <p
                                                                                    class="text-center fs-12 fw-normal text-gold mb-0">
                                                                                    {{ implode(' • ',
                                                                                    $bundle->typesInArray())
                                                                                    }}
                                                                                </p>


                                                                            </div>
                                                                        </div>
                                                                        {{-- bundleTypes --}}






                                                                        {{-- ----------------- --}}
                                                                        {{-- ----------------- --}}





                                                                        {{-- typesRow --}}
                                                                        <div class="row">



                                                                            {{-- :: hr --}}
                                                                            <div class="col-12">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-between mb-3">
                                                                                    <hr
                                                                                        class="w-75 mx-auto mt-2 mb-2" />
                                                                                </div>
                                                                            </div>





                                                                            {{-- loop - bundleTypes --}}
                                                                            @foreach ($bundle->types as $key =>
                                                                            $bundleType)

                                                                            <div class="col-6 col-sm-4">


                                                                                {{-- name --}}
                                                                                <label
                                                                                    class="form-label form--label justify-content-center fs-12">{{
                                                                                    $bundleType->mealType->name
                                                                                    }}</label>





                                                                                {{-- rangeInput --}}
                                                                                <div class="range--input-wrapper mb-4">


                                                                                    {{-- minusButton --}}
                                                                                    <button
                                                                                        class="btn btn--scheme px-2 range--button minus"
                                                                                        type="button" data-type="minus"
                                                                                        data-target="bundle-{{ $bundle->id }}-range-type-{{ $bundleType->mealType->id }}">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="1em" height="1em"
                                                                                            fill="currentColor"
                                                                                            viewBox="0 0 16 16"
                                                                                            class="bi bi-dash-circle">
                                                                                            <path
                                                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                                                            </path>
                                                                                            <path
                                                                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </button>





                                                                                    {{-- range - input --}}
                                                                                    <input type="number"
                                                                                        data-type='{{ $bundleType->mealType->id }}'
                                                                                        class="form--input range--input"
                                                                                        step="1" min="0"
                                                                                        data-input="bundle-{{ $bundle->id }}-range-type-{{ $bundleType->mealType->id }}"
                                                                                        wire:model='instance.bundleTypes.{{ $bundleType->mealType->id }}' />






                                                                                    {{-- :: plusButton --}}
                                                                                    <button
                                                                                        class="btn btn--scheme px-2 range--button plus"
                                                                                        type="button" data-type="plus"
                                                                                        data-target="bundle-{{ $bundle->id }}-range-type-{{ $bundleType->mealType->id }}">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="1em" height="1em"
                                                                                            fill="currentColor"
                                                                                            viewBox="0 0 16 16"
                                                                                            class="bi bi-plus-circle">
                                                                                            <path
                                                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                                                            </path>
                                                                                            <path
                                                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </button>
                                                                                </div>
                                                                            </div>


                                                                            @endforeach
                                                                            {{-- end loop - bundleTypes --}}







                                                                            {{-- submitButton --}}
                                                                            <div class="col-12">
                                                                                <button
                                                                                    class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-0 w-50 fw-semibold justify-content-center shrink--self"
                                                                                    style="border: 1px dashed var(--color-scheme-3);">
                                                                                    Continue
                                                                                </button>
                                                                            </div>
                                                                            {{-- endCol --}}




                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- endRow --}}


                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- endRow --}}





                                                </form>
                                                {{-- endForm --}}

                                            </div>
                                            {{-- endTab --}}





                                            @endif
                                            {{-- end if --}}





                                            @endforeach
                                            {{-- end loop - bundleRanges --}}




                                        </div>
                                    </div>
                                </div>
                                {{-- endTab --}}

                                @endforeach
                                {{-- end loop - bundles --}}



                            </div>
                            {{-- end tabContent --}}

                        </div>
                        {{-- end bundlesTab --}}


                    </div>
                </div>
                {{-- end mainContentRow --}}




            </div>















            {{-- ----------------------------------------------- --}}
            {{-- ----------------------------------------------- --}}








            {{-- rightCol --}}
            <div class="col-12 col-sm-10 col-md-7 col-xl-3 text-center mt-zone-cards plans-column" data-aos="fade-left"
                data-aos-duration="600" data-aos-delay="800" data-aos-once="true" wire:ignore.self>



                {{-- planRow --}}
                <div class="overview--card client-version scale--self-05 mb-4 position-relative">


                    {{-- :: backButton --}}
                    <a class="btn submenu--group btn--scheme-2 d-flex align-items-center subscription--back-button py-1 d-md-none"
                        role="button" href="{{ route('subscription.customerStepOne') }}"><svg
                            class="bi bi-arrow-up-left me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                            </path>
                        </svg>Back</a>






                    {{-- mainRow --}}
                    <div class="row">


                        {{-- cover --}}
                        <div class="col-12 text-center position-relative">
                            <img class="client--card-logo of-cover"
                                src="{{ asset('storage/menu/plans/' . $plan->imageFile) }}" />
                        </div>


                        {{-- content --}}
                        <div class="col-12">
                            <h5 class="text-center fw-bold mt-3 mb-2">{{ $plan->name }}</h5>
                            <p class="text-center fs-12 fw-semibold text-gold mb-2">
                                Starting From {{ $plan->startingPrice }}<small
                                    class="ms-1 fw-semibold text-gold fs-10">(AED)</small>/ Day
                            </p>
                            <p class="text-center fs-12 mb-2">{{ $plan->longDesc }}</p>
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


                            {{-- 1: averageCaloriesPerDay --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">
                                    Calories / Day
                                </p>
                                <p class="fs-13 mb-0 w-50 text-end">{{ $instance->totalBundleRangeCalories
                                    ??
                                    '' }}</p>
                            </div>



                            {{-- 2: planDays --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">Plan Days</p>
                                <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->planDays ?? '' }}</p>
                            </div>



                            {{-- 3: pricePerDay --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">Price / Day</p>
                                <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->bundleRangePricePerDay ?? ''
                                    }}</p>
                            </div>



                            {{-- 4: plan - meals --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-50 pe-3 mb-0">Plan Details</p>
                                <p class="fs-13 mb-0 w-50 text-end">
                                    {{ $instance->bundleTypesInArray ?? '' }}
                                </p>
                            </div>





                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}



                            {{-- 5: planPrice --}}
                            <div class="d-flex align-items-center justify-content-between pt-3"
                                style="border-top: 1px dashed var(--bg-golden-dark)">
                                <p class="fs-12 w-50 pe-3 mb-0">Plan Price</p>
                                <p class="mb-0 w-50 text-end fw-bold">{{ $instance->totalBundleRangePrice?? ''}}
                                    <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                                </p>
                            </div>


                        </div>
                    </div>
                </div>
                {{-- end invoiceRow --}}



            </div>
            {{-- end rightCol --}}










        </div>
    </div>
    {{-- endContainer --}}















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);
         @this.updateOverview();


      }); //end function
    </script>









    {{-- range --}}
    <script>
        $('div').on('change', '.range--input', function(event) {


            // 1.1: getMealType - changeBundleType
            mealTypeId = $(this).attr('data-type');


            @this.changeBundleType(event.target.value, mealTypeId);


        }); // end function



    </script>


    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</section>
{{-- endSection --}}