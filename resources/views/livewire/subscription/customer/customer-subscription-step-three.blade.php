<section id="content--section" class="content--section">
    <div class="container">
        <div class="row justify-content-center">








            {{-- mainContent --}}
            <div class="col-12 col-xl-9 ">


                {{-- heading --}}
                <h4 data-aos="fade" data-aos-duration="600" data-aos-delay="800" data-aos-once="true"
                    class="mb-4 fw-bold text-center" wire:ignore.self>Manage Your Preferences</h4>




                {{-- form --}}
                <form wire:submit='continue' class="row align-items-end mt-4 align-items-center mb-5">



                    {{-- col --}}
                    <div class="col-12 col-lg-6 align-self-end">


                        {{-- allergy --}}
                        <label class="form-label form--label">Allergy</label>
                        <div class="select--single-wrapper mb-4" wire:ignore>
                            <select class="form-select form--select" data-instance='instance.allergyLists' multiple>

                                @foreach ($allergyLists as $allergyList)
                                <option value="{{ $allergyList->id }}">{{ $allergyList->name }}</option>
                                @endforeach

                            </select>
                        </div>



                        {{-- exclude --}}
                        <label class="form-label form--label">Exclude</label>
                        <div class="select--single-wrapper mb-4" wire:ignore>
                            <select class="form-select form--select" data-instance='instance.excludeLists' multiple>

                                @foreach ($excludeLists as $excludeList)
                                <option value="{{ $excludeList->id }}">{{ $excludeList->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>





                    {{-- ------------------------ --}}
                    {{-- ------------------------ --}}







                    {{-- bag --}}
                    <div class="col-12 col-lg-6">

                        {{-- imageFile --}}
                        <img class="w-100 of-contain" src="{{ asset('storage/bags/' . $instance->bagImageFile) }}"
                            style="height: 150px;" width="332" height="160">


                        {{-- wrap --}}
                        <div class="mt-2 w-100 mx-auto d-flex justify-content-center">


                            {{-- loop - bags --}}
                            @foreach ($bags as $bag)

                            <div class="form-check itemType--radio me-3">


                                {{-- input --}}
                                <input id="formCheck-{{ $bag->id }}" class="form-check-input" type="radio"
                                    wire:model='instance.bag' name="bag" value='{{ $bag->name }}'
                                    wire:change='changeBag'>


                                {{-- label --}}
                                <label class="form-check-label ms-2" for="formCheck-{{ $bag->id }}">
                                    {{ $bag->name }}
                                </label>

                            </div>

                            @endforeach
                            {{-- end loop --}}


                        </div>
                    </div>
                    {{-- endCol --}}









                    {{-- ------------------------ --}}
                    {{-- ------------------------ --}}









                    {{-- bagTerms --}}
                    <div class="col-12 col-lg-6 mt-4 mb-5" data-aos="fade-up" data-aos-duration="600"
                        data-aos-delay="800" data-aos-once="true" wire:ignore.self>
                        <div class="item--box text-start">


                            {{-- subtitle --}}
                            <h5 class="fw-semibold d-flex align-items-center mb-3 text-theme-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-chevron-compact-right me-2 fs-13"
                                    style="fill: var(--color-theme-secondary);">
                                    <path fill-rule="evenodd"
                                        d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z">
                                    </path>
                                </svg>Bag Terms
                            </h5>



                            {{-- terms --}}
                            <p class="fs-15 mb-2 d-flex align-items-center">Exchange your bag with each daily meal
                            </p>
                            <p class="fs-15 mb-2">Receive your meals in a new bag daily</p>
                            <p class="fs-15 mb-2">We collect empty bags daily</p>
                            <p class="fs-15 mb-2">Refundable Deposit</p>


                        </div>
                    </div>
                    {{-- endCol --}}








                    {{-- submit --}}
                    <div class="col-12 col-lg-6 mb-5 text-center">
                        <button wire:loading.attr='disabled' wire:target='continue, changeBag'
                            class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-0 w-50 fw-semibold justify-content-center shrink--self"
                            style="border: 1px dashed var(--color-scheme-3);">Continue</button>
                    </div>
                </form>
                {{-- endForm --}}


            </div>
            {{-- end mainContent --}}
















            {{-- ----------------------------------------------- --}}
            {{-- ----------------------------------------------- --}}












            {{-- rightCol --}}
            <div class="col-12 col-sm-10 col-md-7 col-xl-3 text-center mt-zone-cards plans-column" data-aos="fade-left"
                data-aos-duration="600" data-aos-delay="800" data-aos-once="true" wire:ignore.self>




                {{-- planRow --}}
                <div class="overview--card client-version scale--self-05 mb-4">
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



                            {{-- :: averageCaloriesPerDay --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">
                                    Calories / Day
                                </p>
                                <p class="fs-13 mb-0 w-50 text-end">{{ $instance->totalBundleRangeCalories ?? '' }}</p>
                            </div>




                            {{-- :: planDays --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">Plan Days</p>
                                <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->planDays ?? '' }}</p>
                            </div>



                            {{-- :: pricePerDay --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-12 w-75 pe-3 mb-0">Price / Day</p>
                                <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->bundleRangePricePerDay ?? '' }}</p>
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

      }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}











</section>
{{-- endSection --}}