<section id="content--section" class="content--section">
    <div class="container">





        {{-- submenu --}}
        <livewire:central.dashboard.brands.brands-details.components.submenu id='{{ $brand->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- outerRow --}}
        <form wire:submit='update' class="row align-items-end justify-content-between pt-3 row mb-5">









            {{-- 1: planOption --}}
            @if ($brand?->plan)

            <div class="col-12 col-lg-4 col-xl-4 mt-5 pt-4" data-aos="fade" data-aos-duration="1000"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--card client-version scale--self-05 mb-0">
                    <div class="row">



                        {{-- imageFile --}}
                        <div class="col-12 text-center position-relative">
                            <img class="client--card-logo of-contain"
                                src="{{ url('storage/plans/' . $brand->plan->imageFile) }}" />
                        </div>




                        {{-- col --}}
                        <div class="col-12">


                            {{-- name --}}
                            <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                $brand->plan->name }}</h6>





                            {{-- --------------------------------------------- --}}
                            {{-- --------------------------------------------- --}}





                            {{-- tooltips --}}
                            <div class="d-flex justify-content-around">



                                {{-- bundles --}}
                                <p class="text-center  fw-bold mb-0">
                                    <button
                                        class="btn btn--raw-icon d-inline-flex fs-16 align-items-center justify-content-center  w-auto"
                                        data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true' type="button"
                                        data-bs-placement="top"
                                        title="{{ implode(' &#8226; ', $brand->plan?->bundlesInArray()) }}">
                                        Bundles<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-list-nested fs-13 ms-1"
                                            style="fill: var(--bs-warning)">
                                            <path fill-rule="evenodd"
                                                d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                                            </path>
                                        </svg>
                                    </button>
                                </p>





                                {{-- ----------------------------------- --}}
                                {{-- ----------------------------------- --}}





                                {{-- price --}}
                                <p class="text-center  fw-bold mb-0">
                                    <button
                                        class="btn btn--raw-icon d-flex fs-16 align-items-center justify-content-center fw-bold"
                                        type="button">{{ number_format($brand?->price, 2) }}<small
                                            class="ms-1 fw-semibold text-gold fs-13">($)</small></button>
                                </p>


                            </div>
                            {{-- endTooltips --}}

                        </div>
                        {{-- endCol --}}

                    </div>
                </div>
            </div>

            @endif
            {{-- endCol --}}






            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}







            {{-- 2: features --}}
            @if ($brand?->features)

            <div class="col-12 col-lg-4 col-xl-4 mt-5 pt-4" data-aos="fade" data-aos-duration="1000"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--card client-version scale--self-05 mb-0">
                    <div class="row">



                        {{-- imageFile --}}
                        <div class="col-12 text-center position-relative">
                            <img class="client--card-logo of-contain" src="{{ url('storage/modules/default.png') }}" />
                        </div>




                        {{-- col --}}
                        <div class="col-12">


                            {{-- name --}}
                            <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">Customized Plan</h6>





                            {{-- --------------------------------------------- --}}
                            {{-- --------------------------------------------- --}}





                            {{-- tooltips --}}
                            <div class="d-flex justify-content-around">



                                {{-- features --}}
                                <p class="text-center  fw-bold mb-0">
                                    <button
                                        class="btn btn--raw-icon d-inline-flex fs-16 align-items-center justify-content-center  w-auto"
                                        data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true' type="button"
                                        data-bs-placement="bottom"
                                        title="{{ implode(' <br /> ', $brand?->featuresInArray()) }}">
                                        Features<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-list-nested fs-13 ms-1"
                                            style="fill: var(--bs-warning)">
                                            <path fill-rule="evenodd"
                                                d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                                            </path>
                                        </svg>
                                    </button>
                                </p>





                                {{-- ----------------------------------- --}}
                                {{-- ----------------------------------- --}}





                                {{-- price --}}
                                <p class="text-center  fw-bold mb-0">
                                    <button
                                        class="btn btn--raw-icon d-flex fs-16 align-items-center justify-content-center fw-bold"
                                        type="button">{{ number_format($brand?->price, 2) }}<small
                                            class="ms-1 fw-semibold text-gold fs-13">($)</small></button>
                                </p>


                            </div>
                            {{-- endTooltips --}}

                        </div>
                        {{-- endCol --}}

                    </div>
                </div>
            </div>

            @endif
            {{-- endCol --}}







            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}











            {{-- rightCol --}}
            <div class="col-12 col-lg-7 col-xl-7" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>



                {{-- overviewRow --}}
                <div class="row align-items-center">






                    {{-- PIN --}}
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 mb-0">PIN</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.PIN' />
                    </div>









                    {{-- licenseNumber --}}
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-25" />
                            <label class="form-label form--label px-3 mb-0">License Number</label>
                        </div>
                        <input type="text" step='0.01' class="form--input mb-4" wire:model='instance.licenseNumber' />
                    </div>






                    {{-- clientNumber --}}
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-25" />
                            <label class="form-label form--label px-3 mb-0">Client Number</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.serial' />
                    </div>










                    {{-- ----------------------------------------------- --}}
                    {{-- ----------------------------------------------- --}}
                    {{-- ----------------------------------------------- --}}






                    {{-- subscription --}}
                    <div class="col-6 mb-0">
                        <div class="overview--box shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal">Subscription</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d M, Y', strtotime($brand->created_at)) }}</p>
                        </div>
                    </div>




                    {{-- subscription - untilDate --}}
                    <div class="col-6 mb-0">
                        <div class="overview--box shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal">Until Date</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d M, Y', strtotime($brand->created_at .
                                '+30 days')) }}</p>
                        </div>
                    </div>




                </div>
            </div>
            {{-- endCol --}}











        </form>
    </div>
    {{-- endContainer --}}




</section>
{{-- endSection --}}
