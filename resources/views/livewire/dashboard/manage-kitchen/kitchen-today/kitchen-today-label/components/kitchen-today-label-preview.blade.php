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
                        class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-4 fs-13 justify-content-center fw-semibold mb-2 print--labels"
                        data-print='label--paper' type="button">
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
                    <div class="d-inline-block text-center print print--bg" id='label--paper'>





                        {{-- loop - meals --}}
                        @foreach ($scheduleMeals ?? [] as $scheduleMeal)








                        {{-- :: checkLabel --}}
                        @if (!empty($scheduleMeal?->meal?->label))





                        {{-- :: notRounded --}}
                        {{-- @if ($scheduleMeal?->meal?->label?->name != 'Rounded Label') --}}






                        {{-- :: mealLabel --}}
                        <div class="d-inline-flex justify-content-around align-items-center text-start printable-schedule-meal
                        @if (env('APP_CLIENT') == 'Aleens' && $scheduleMeal?->meal?->label?->name == 'Rounded Label') isRounded @elseif(env('APP_CLIENT') == 'Aleens') isSquare @endif"
                            key='printable-schedule-meal-{{ $scheduleMeal->id }}'>
                            <div class="sticker--label-layout sticky--div px-0 py-0"
                                id='label--paper-{{ $scheduleMeal->id }}'>







                                {{-- 1:: Aleens Special Prinout --}}

                                @if (env('APP_CLIENT') == 'Aleens')





                                {{-- sticker - label --}}
                                <div class="sticker--label mx-auto position-relative aleens--sticker-printout
                                @if ($scheduleMeal?->meal?->label?->isVertical) vertical @endif" style="
                                 width: {{ $scheduleMeal?->meal?->label->width ?? 100 }}mm;
                                 height: {{ $scheduleMeal?->meal?->label->height ?? 70 }}mm;
                                 border-radius: {{ $scheduleMeal?->meal?->label->radius ?? 0 }}px;
                                 padding-top: {{ $scheduleMeal?->meal?->label->paddingTop  ?? 0 }}mm;
                                 padding-bottom: {{ $scheduleMeal?->meal?->label->paddingBottom  ?? 0 }}mm;
                                 background-color: {{ $scheduleMeal?->meal?->label->backgroundColor ?? '#fff' }};
                                 color: {{ $scheduleMeal?->meal?->label->fontColor ?? '#000' }};">







                                    {{-- TEXT ONLY --}}


                                    {{-- 1.5: top --}}
                                    <div class='sticker--label-header d-flex  justify-content-around align-items-center w-100'
                                        style="padding-left: {{ $scheduleMeal?->meal?->label->paddingLeft  ?? 0 }}mm;
                                      padding-right: {{ $scheduleMeal?->meal?->label->paddingRight  ?? 0 }}mm;
                                      border-color: transparent">




                                        {{-- leftSection --}}
                                        <div class='pe-2' style="border-color: transparent">


                                            {{-- customerName --}}

                                            @if ($scheduleMeal?->meal?->label->showCustomerName)

                                            <h4 class='fw-bold sticker--label-customer mb-1 fs-12'>{{
                                                $scheduleMeal?->customer?->fullName() }}</h4>

                                            @endif
                                            {{-- end if - showHide --}}






                                            {{-- mealName --}}

                                            @if ($scheduleMeal?->meal?->label->showMealName)

                                            <h4 class='fw-semibold sticker--label-meal mb-2 fs-12'>{{
                                                $scheduleMeal?->meal?->name }}</h4>

                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endLeftSection --}}







                                        {{-- rightSection / bottomSection --}}
                                        <div class='text-start nutrition-tag @if (!$scheduleMeal?->meal?->label?->isVertical) ps-3 @endif'
                                            style="border-color: transparent">


                                            {{-- subtitle --}}
                                            <h4 class='fw-normal sticker--label-general-tag mb-1 fw-semibold fs-10'>Your
                                                Nutritious {{ $scheduleMeal?->mealType?->name }}
                                            </h4>



                                            {{-- servingInstructions --}}

                                            @if ($scheduleMeal?->meal?->label?->showServingInstructions)

                                            <h4 class='fw-normal sticker--label-tags mb-2 fs-11'>
                                                <span class='fw-normal me-1 fs-11 fw-semibold'>{{ implode(', ',
                                                    $scheduleMeal?->meal?->servingInstructionsInArray()) }}</span>
                                            </h4>

                                            @endif
                                            {{-- end if - showHide --}}


                                        </div>




                                    </div>
                                    {{-- endTop --}}







                                    {{-- ------------------------ --}}
                                    {{-- ------------------------ --}}







                                    {{-- 2: middle --}}
                                    <div class='sticker--label-content d-flex justify-content-around align-items-center w-100'
                                        style="padding-left: {{ $scheduleMeal?->meal?->label->paddingLeft  ?? 0 }}mm;
                                      padding-right: {{ $scheduleMeal?->meal?->label->paddingRight  ?? 0 }}mm;">




                                        {{-- leftSection --}}
                                        <div
                                            class='text-start smaller-section @if(!$scheduleMeal?->meal?->label->showProductionDate && !$scheduleMeal?->meal?->label->showExpiryDate) d-none @endif'>


                                            {{-- 1: production --}}

                                            @if($scheduleMeal?->meal?->label->showProductionDate)


                                            <div>
                                                <h4 class='fw-normal sticker--label-production mb-0 invisible'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ? 'Prod.' : 'Prod.
                                                    Date' }}
                                                </h4>

                                                <h4 class='fw-semibold sticker--label-production mb-4'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ?
                                                    date('d.m.Y', strtotime($searchScheduleDate)) :
                                                    date('d . m . Y', strtotime($searchScheduleDate)) }}
                                                </h4>
                                            </div>


                                            @endif
                                            {{-- end if - showHide --}}






                                            {{-- 2: expiry --}}

                                            @if($scheduleMeal?->meal?->label->showExpiryDate)


                                            <div>
                                                <h4 class='fw-normal sticker--label-expiry mb-0 invisible'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ? 'Expiry.' : 'Expiry
                                                    Date' }}
                                                </h4>

                                                <h4 class='fw-semibold sticker--label-expiry mb-3'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ?
                                                    date('d.m.Y',
                                                    strtotime($scheduleMeal->schedule->scheduleDate .
                                                    "+{$scheduleMeal?->meal?->validity} days"))
                                                    :
                                                    date('d . m . Y',
                                                    strtotime($scheduleMeal->schedule->scheduleDate .
                                                    "+{$scheduleMeal?->meal?->validity} days"))
                                                    }}
                                                </h4>
                                            </div>



                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endLeftSection --}}













                                        {{-- rightSection --}}
                                        <div
                                            class='text-center larger-section d-flex justify-content-evenly h-100 align-items-center'>





                                            {{-- :: mealMacros --}}

                                            @if ($scheduleMeal?->meal?->label->showMealMacros)



                                            {{-- :: cals --}}
                                            <h4 class='sticker--label-macro calories'
                                                style="border-color: transparent; color: {{ $scheduleMeal?->meal?->label->caloriesColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-bold invisible'>KCAL</span>
                                                <span class='sticker--label-macro-value fw-bold' style="
                                                    margin-right: {{ ($scheduleMeal?->meal?->label->isVertical) ? '0px' : '50px' }};
                                                    color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookCalories ?? 0 }}</span>
                                            </h4>





                                            {{-- :: carbs --}}
                                            <h4 class='sticker--label-macro carbs'
                                                style="border-color: transparent; color: {{ $scheduleMeal?->meal?->label->carbsColor ?? 'revert-layer' }}">
                                                <span
                                                    class='sticker--label-macro-caption fw-bold invisible'>Carbs</span>
                                                <span class='sticker--label-macro-value fw-bold' style="
                                                    margin-right: {{ ($scheduleMeal?->meal?->label->isVertical) ? '0px' : '50px' }};
                                                    color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookCarbs ?? 0 }}</span>
                                            </h4>






                                            {{-- :: proteins --}}
                                            <h4 class='sticker--label-macro proteins'
                                                style="border-color: transparent; color: {{ $scheduleMeal?->meal?->label->proteinsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-bold invisible'>Prot</span>
                                                <span class='sticker--label-macro-value fw-bold' style="
                                                    margin-right: {{ ($scheduleMeal?->meal?->label->isVertical) ? '0px' : '50px' }};
                                                    color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookProteins ?? 0 }}</span>
                                            </h4>





                                            {{-- :: fats --}}
                                            <h4 class='sticker--label-macro fats'
                                                style="border-color: transparent; color: {{ $scheduleMeal?->meal?->label->fatsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-bold invisible'>Fat</span>
                                                <span class='sticker--label-macro-value fw-bold' style="
                                                    margin-right: {{ ($scheduleMeal?->meal?->label->isVertical) ? '0px' : '50px' }};
                                                    color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookFats ?? 0 }}</span>
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

                                    @if ($scheduleMeal?->meal?->label->showFooterImageFile)




                                    <div class='sticker--label-footer d-flex flex-column invisible'>

                                        <img class='of-cover w-100 h-100'
                                            src=" {{ asset('storage/kitchen/labels/footers/' . $scheduleMeal?->meal?->label->footerImageFile) }}">

                                    </div>
                                    {{-- endBottom --}}






                                    @endif
                                    {{-- end if - showHide --}}





                                </div>
                                {{-- endSticker --}}








                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}












                                {{-- 2: regular Printout --}}
                                @else








                                {{-- sticker - label --}}
                                <div class="sticker--label mx-auto position-relative
                                @if ($scheduleMeal?->meal?->label?->isVertical) vertical @endif" style="
                                width: {{ $scheduleMeal?->meal?->label->width ?? 100 }}mm;
                                height: {{ $scheduleMeal?->meal?->label->height ?? 70 }}mm;
                                border-radius: {{ $scheduleMeal?->meal?->label->radius ?? 0 }}px;
                                padding-top: {{ $scheduleMeal?->meal?->label->paddingTop  ?? 0 }}mm;
                                padding-bottom: {{ $scheduleMeal?->meal?->label->paddingBottom  ?? 0 }}mm;
                                background-color: {{ $scheduleMeal?->meal?->label->backgroundColor ?? '#fff' }};
                                border-color: {{ $scheduleMeal?->meal?->label->borderColor ?? '#fff' }};
                                color: {{ $scheduleMeal?->meal?->label->fontColor ?? '#000' }};">







                                    {{-- TEXT ONLY --}}


                                    {{-- 1.5: top --}}
                                    <div class='sticker--label-header d-flex  justify-content-around align-items-center'
                                        style="padding-left: {{ $scheduleMeal?->meal?->label->paddingLeft  ?? 0 }}mm;
                                        padding-right: {{ $scheduleMeal?->meal?->label->paddingRight  ?? 0 }}mm;
                                        border-color: {{ $scheduleMeal?->meal?->label->borderColor  ?? '#c2c3c5' }}">




                                        {{-- leftSection --}}
                                        <div
                                            style="border-color: {{ $scheduleMeal?->meal?->label->borderColor  ?? '#c2c3c5' }}">


                                            {{-- customerName --}}

                                            @if ($scheduleMeal?->meal?->label->showCustomerName)

                                            <h4 class='fw-semibold sticker--label-customer mb-1'>{{
                                                $scheduleMeal?->customer?->fullName() }}</h4>

                                            @endif
                                            {{-- end if - showHide --}}






                                            {{-- mealName --}}

                                            @if ($scheduleMeal?->meal?->label->showMealName)

                                            <h4 class='fw-normal sticker--label-meal mb-2'>{{
                                                $scheduleMeal?->meal?->name }}</h4>

                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endLeftSection --}}







                                        {{-- rightSection / bottomSection --}}
                                        <div class='text-start @if (!$scheduleMeal?->meal?->label?->isVertical) ps-3 @endif'
                                            style="border-color: {{ $scheduleMeal?->meal?->label->borderColor ?? '#c2c3c5' }}">


                                            {{-- subtitle --}}
                                            <h4 class='fw-normal sticker--label-general-tag mb-1 fs-10'>Your
                                                Nutritious {{ $scheduleMeal?->mealType?->name }}
                                            </h4>



                                            {{-- servingInstructions --}}

                                            @if ($scheduleMeal?->meal?->label?->showServingInstructions)

                                            <h4 class='fw-normal sticker--label-tags mb-2 fs-10'>
                                                <span class='fw-normal me-1 fs-10'>{{ implode(', ',
                                                    $scheduleMeal?->meal?->servingInstructionsInArray())
                                                    }}</span>
                                            </h4>

                                            @endif
                                            {{-- end if - showHide --}}


                                        </div>




                                    </div>
                                    {{-- endTop --}}







                                    {{-- ------------------------ --}}
                                    {{-- ------------------------ --}}







                                    {{-- 2: middle --}}
                                    <div class='sticker--label-content d-flex justify-content-around align-items-center'
                                        style="padding-left: {{ $scheduleMeal?->meal?->label->paddingLeft  ?? 0 }}mm;
                                        padding-right: {{ $scheduleMeal?->meal?->label->paddingRight  ?? 0 }}mm;">




                                        {{-- leftSection --}}
                                        <div
                                            class='text-start smaller-section @if(!$scheduleMeal?->meal?->label->showProductionDate && !$scheduleMeal?->meal?->label->showExpiryDate) d-none @endif'>


                                            {{-- 1: production --}}

                                            @if($scheduleMeal?->meal?->label->showProductionDate)

                                            <div>
                                                <h4 class='fw-normal sticker--label-production mb-1'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ? 'Prod.' : 'Prod.
                                                    Date' }}
                                                </h4>

                                                <h4 class='fw-semibold sticker--label-production mb-3'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ?
                                                    date('d.m.Y', strtotime($searchScheduleDate)) :
                                                    date('d . m . Y', strtotime($searchScheduleDate)) }}
                                                </h4>
                                            </div>

                                            @endif
                                            {{-- end if - showHide --}}






                                            {{-- 2: expiry --}}

                                            @if($scheduleMeal?->meal?->label->showExpiryDate)


                                            <div>
                                                <h4 class='fw-normal sticker--label-expiry mb-1'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ? 'Expiry.' : 'Expiry
                                                    Date' }}
                                                </h4>

                                                <h4 class='fw-semibold sticker--label-expiry mb-0'>
                                                    {{ $scheduleMeal?->meal?->label?->isVertical ?
                                                    date('d.m.Y',
                                                    strtotime($scheduleMeal->schedule->scheduleDate .
                                                    "+{$scheduleMeal?->meal?->validity} days"))
                                                    :
                                                    date('d . m . Y',
                                                    strtotime($scheduleMeal->schedule->scheduleDate .
                                                    "+{$scheduleMeal?->meal?->validity} days"))
                                                    }}
                                                </h4>
                                            </div>


                                            @endif
                                            {{-- end if - showHide --}}



                                        </div>
                                        {{-- endLeftSection --}}













                                        {{-- rightSection --}}
                                        <div
                                            class='text-center larger-section d-flex justify-content-evenly h-100 align-items-center'>





                                            {{-- :: mealMacros --}}

                                            @if ($scheduleMeal?->meal?->label->showMealMacros)



                                            {{-- :: cals --}}
                                            <h4 class='sticker--label-macro calories'
                                                style="border-color: {{ $scheduleMeal?->meal?->label->caloriesColor ?? 'revert-layer' }}; color: {{ $scheduleMeal?->meal?->label->caloriesColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>KCAL</span>
                                                <span class='sticker--label-macro-value'
                                                    style="color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookCalories ?? 0
                                                    }}</span>
                                            </h4>





                                            {{-- :: carbs --}}
                                            <h4 class='sticker--label-macro carbs'
                                                style="border-color: {{ $scheduleMeal?->meal?->label->carbsColor ?? 'revert-layer' }}; color: {{ $scheduleMeal?->meal?->label->carbsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>Carbs</span>
                                                <span class='sticker--label-macro-value'
                                                    style="color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookCarbs ?? 0 }}</span>
                                            </h4>






                                            {{-- :: proteins --}}
                                            <h4 class='sticker--label-macro proteins'
                                                style="border-color: {{ $scheduleMeal?->meal?->label->proteinsColor ?? 'revert-layer' }}; color: {{ $scheduleMeal?->meal?->label->proteinsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>Prot</span>
                                                <span class='sticker--label-macro-value'
                                                    style="color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookProteins ?? 0
                                                    }}</span>
                                            </h4>





                                            {{-- :: fats --}}
                                            <h4 class='sticker--label-macro fats'
                                                style="border-color: {{ $scheduleMeal?->meal?->label->fatsColor ?? 'revert-layer' }}; color: {{ $scheduleMeal?->meal?->label->fatsColor ?? 'revert-layer' }}">
                                                <span class='sticker--label-macro-caption fw-semibold'>Fat</span>
                                                <span class='sticker--label-macro-value'
                                                    style="color: {{ $scheduleMeal?->meal?->label->fontColor }}">{{
                                                    $scheduleMeal?->mealSize()?->afterCookFats ?? 0 }}</span>
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

                                    @if ($scheduleMeal?->meal?->label->showFooterImageFile)


                                    <div class='sticker--label-footer d-flex flex-column'>

                                        <img class='of-cover w-100 h-100'
                                            src=" {{ asset('storage/kitchen/labels/footers/' . $scheduleMeal?->meal?->label->footerImageFile) }}">

                                    </div>
                                    {{-- endBottom --}}



                                    @endif
                                    {{-- end if - showHide --}}





                                </div>
                                {{-- endSticker --}}








                                @endif
                                {{-- end if - printoutSpecials --}}



                            </div>
                        </div>
                        {{-- end mealLabel --}}




                        {{-- :: sepearator --}}
                        <div class="d-block"></div>









                        {{-- @endif --}}
                        {{-- end if - noRounded --}}






                        {{-- ------------------------------------------- --}}
                        {{-- ------------------------------------------- --}}
                        {{-- ------------------------------------------- --}}
                        {{-- ------------------------------------------- --}}











                        {{-- :: noLabel --}}
                        @else




                        {{-- fallback --}}
                        <div class="d-block px-2 py-3 overview--card client-version  text-center mt-2">
                            <h5>{{ $scheduleMeal?->meal?->name }}</h5>
                            <p class="fs-14 text-gold mb-0">Label is not assigned</p>
                        </div>






                        @endif
                        {{-- end if - checkLabel --}}









                        @endforeach
                        {{-- end loop - groupByMeal --}}




                    </div>
                    {{-- endPaper --}}


                </form>
                {{-- endRow --}}




            </div>
        </div>
    </div>








    {{-- :: mealLabel --}}









</div>
{{-- endModal --}}