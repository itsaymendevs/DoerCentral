<div class="modal  fade modal--shadow" role="dialog" tabindex="-1" id="label-print" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Preview Labels</h5>
                    <button class="btn btn--raw-icon w-auto" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}



                {{-- :: print --}}
                <div class="d-block text-center">

                    <button
                        class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-4 fs-13 justify-content-center fw-semibold mb-2 print--btn"
                        data-print='#label--paper' type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                            </path>
                        </svg>Print
                    </button>


                </div>
                {{-- endWrapepr --}}









                {{-- ---------------------------------- --}}
                {{-- ---------------------------------- --}}






                {{-- row --}}
                <form class="px-0 d-flex  justify-content-center pb-3">




                    {{-- paper --}}
                    <div class="d-inline-block text-center" id='label--paper'>





                        {{-- loop - meals --}}
                        @foreach ($scheduleMeals ?? [] as $scheduleMeal)





                        {{-- :: mealLabel --}}
                        <div class="d-inline-flex justify-content-around align-items-center text-start"
                            key='printable-schedule-meal-{{ $scheduleMeal->id }}'>
                            <div class="sticker--label-layout sticky--div mb-2 px-0 py-0">




                                {{-- sticker - label --}}
                                <div class="sticker--label mx-auto position-relative" style="width: {{ $label->width ?? 100 }}mm;
                                height: {{ $label->height ?? 70 }}mm;
                                border-radius: {{ $label->radius ?? 0 }}px;
                                padding-top: {{ $label->paddingTop  ?? 0 }}mm;
                                padding-bottom: {{ $label->paddingBottom  ?? 0 }}mm;
                                background-color: {{ $label->backgroundColor ?? '#fff' }};
                                border-color: {{ $label->borderColor ?? '#fff' }};
                                color: {{ $label->fontColor ?? '#000' }};
                                ">







                                    {{-- TEXT ONLY --}}


                                    {{-- 1.5: top --}}
                                    <div class='sticker--label-header d-flex  justify-content-around align-items-center'
                                        style="padding-left: {{ $label->paddingLeft  ?? 0 }}mm;
                                        padding-right: {{ $label->paddingRight  ?? 0 }}mm;
                                        border-color: {{ $label->borderColor  ?? '#c2c3c5' }}">




                                        {{-- leftSection --}}
                                        <div style="border-color: {{ $label->borderColor  ?? '#c2c3c5' }}">


                                            {{-- customerName --}}

                                            @if ($label->showCustomerName)

                                            <h4 class='fw-semibold sticker--label-customer mb-1'>{{
                                                $scheduleMeal?->customer?->fullName() }}</h4>

                                            @endif
                                            {{-- end if - showHide --}}






                                            {{-- mealName --}}

                                            @if ($label->showMealName)

                                            <h4 class='fw-normal sticker--label-meal mb-2'>{{
                                                $scheduleMeal?->meal?->name }}</h4>

                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endLeftSection --}}







                                        {{-- rightSection / bottomSection --}}
                                        <div class='text-start ps-3'>
                                            <h4 class='fw-normal sticker--label-general-tag mb-1 fs-10'>Your
                                                Nutritious {{ $scheduleMeal?->mealType?->name }}
                                            </h4>
                                            <h4 class='fw-normal sticker--label-tags mb-2 '>
                                                <span class='fw-normal me-1 fs-10'>Remove Lid,</span><span
                                                    class='fw-normal me-1 fs-10'>heat,</span><span
                                                    class='fw-normal me-1 fs-10'>enjoy</span>
                                            </h4>
                                        </div>




                                    </div>
                                    {{-- endTop --}}







                                    {{-- ------------------------ --}}
                                    {{-- ------------------------ --}}







                                    {{-- 2: middle --}}
                                    <div class='sticker--label-content d-flex justify-content-around align-items-center'
                                        style="padding-left: {{ $label->paddingLeft  ?? 0 }}mm;
                                        padding-right: {{ $label->paddingRight  ?? 0 }}mm;">




                                        {{-- leftSection --}}
                                        <div
                                            class='text-start smaller-section @if(!$label->showProductionDate && !$label->showExpiryDate) d-none @endif'>


                                            {{-- 1: production --}}

                                            @if($label->showProductionDate)

                                            <h4 class='fw-normal sticker--label-production mb-1 '>Prod. Date</h4>
                                            <h4 class='fw-semibold sticker--label-production mb-3'>{{ date('d . m .
                                                Y',
                                                strtotime($scheduleMeal->schedule->scheduleDate)) }}
                                            </h4>

                                            @endif
                                            {{-- end if - showHide --}}






                                            {{-- 2: expiry --}}

                                            @if($label->showExpiryDate)


                                            <h4 class='fw-normal sticker--label-expiry mb-1'>Expiry Date</h4>
                                            <h4 class='fw-semibold sticker--label-expiry mb-0'>{{ date('d . m . Y',
                                                strtotime($scheduleMeal->schedule->scheduleDate . '+1 day')) }}</h4>



                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endLeftSection --}}













                                        {{-- rightSection --}}
                                        <div
                                            class='text-center larger-section d-flex justify-content-evenly h-100 align-items-center'>





                                            {{-- :: mealMacros --}}

                                            @if ($label->showMealMacros)



                                            {{-- :: cals --}}
                                            <h4 class='sticker--label-macro calories'
                                                style="border-color: {{ $label->caloriesColor ?? 'revert-layer' }}; color: {{ $label->caloriesColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>KCAL</span>
                                                <span class='sticker--label-macro-value'>240</span>
                                            </h4>





                                            {{-- :: carbs --}}
                                            <h4 class='sticker--label-macro carbs'
                                                style="border-color: {{ $label->carbsColor ?? 'revert-layer' }}; color: {{ $label->carbsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>Carbs</span>
                                                <span class='sticker--label-macro-value'>70</span>
                                            </h4>






                                            {{-- :: proteins --}}
                                            <h4 class='sticker--label-macro proteins'
                                                style="border-color: {{ $label->proteinsColor ?? 'revert-layer' }}; color: {{ $label->proteinsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>Prot</span>
                                                <span class='sticker--label-macro-value'>30</span>
                                            </h4>





                                            {{-- :: fats --}}
                                            <h4 class='sticker--label-macro fats'
                                                style="border-color: {{ $label->fatsColor ?? 'revert-layer' }}; color: {{ $label->fatsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>Fat</span>
                                                <span class='sticker--label-macro-value'>12</span>
                                            </h4>




                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endSection --}}







                                    </div>
                                    {{-- endMiddle --}}









                                    {{-- ------------------------ --}}
                                    {{-- ------------------------ --}}






                                    {{-- 3: bottom --}}

                                    @if ($label->showFooterImageFile)


                                    <div class='sticker--label-footer d-flex flex-column'>

                                        <img id='footer--preview-2' class='of-cover w-100 h-100'
                                            src=" {{ asset('storage/kitchen/labels/footers/' . $label->footerImageFile) }}"
                                            wire:ignore.self>

                                    </div>
                                    {{-- endBottom --}}



                                    @endif
                                    {{-- end if - showHide --}}





                                </div>
                                {{-- endSticker --}}



                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}




                            </div>
                        </div>
                        {{-- end mealLabel --}}


                        <div class="d-block"></div>




                        @endforeach
                        {{-- end loop - groupByMeal --}}




                    </div>
                    {{-- endPaper --}}


                </form>
                {{-- endRow --}}




            </div>
        </div>
    </div>
</div>
{{-- endModal --}}