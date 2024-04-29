<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Labels Today' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- midRow --}}
        <div class="row align-items-end">


            {{-- date --}}
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Date</label>
                </div>


                {{-- input --}}
                <input class="form--input" type="date" wire:model.live='searchScheduleDate'
                    wire:loading.attr='disabled' />
            </div>








            {{-- -------------------- --}}
            {{-- -------------------- --}}






            {{-- midCol --}}
            <div class="col-4">




                {{-- search - mealTypes --}}


                {{-- :: permission - hasTypeSizeFilters --}}
                @if ($versionPermission->kitchenModuleHasTypeSizeFilters)



                <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                    <select class="form--select" data-instance='searchMealType' data-placeholder='Select Type'
                        value='{{ $searchMealType }}' required>
                        <option value=""></option>

                        @foreach ($mealTypes as $mealType)
                        <option value="{{ $mealType->id }}">{{ $mealType->name }}</option>
                        @endforeach
                    </select>
                </div>



                @endif
                {{-- end if - permission --}}




            </div>
            {{-- endCol --}}







            {{-- -------------------- --}}
            {{-- -------------------- --}}






            {{-- counter --}}
            <div class="col-4 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Meals">
                    {{ $scheduleMeals?->groupBy('mealId')?->count() ?? 0 }}
                </h3>
            </div>







        </div>
        {{-- end midRow --}}




    </div>
    {{-- endBottomRow --}}













    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- labelsContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 pt-4 align-items-start">






            {{-- loop - meals --}}
            @foreach ($scheduleMeals?->groupBy('mealId') as $commonMeal => $scheduleMealsByMeal)




            {{-- ** get first - scheduleMeal ** --}}
            @php $scheduleMeal = $scheduleMealsByMeal->first(); @endphp







            <div class="col-5 mb-4" key='schedule-meal-{{ $commonMeal }}'>


                {{-- topBar --}}
                <div class="d-flex justify-content-evenly align-items-center mb-2">



                    {{-- 1: customerPerMeal --}}
                    <h6 class="text-center mb-0 fw-bold">{{ $scheduleMealsByMeal->count() }} Customer</h6>




                    {{-- 2: PrintLabel --}}
                    <button
                        class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                        @if (empty($scheduleMeal?->meal?->label)) disabled @endif
                        type="button" data-bs-toggle='modal' data-bs-target='#label-print'
                        wire:click='labelPrint({{ $scheduleMealsByMeal }})'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                            </path>
                        </svg>Print
                    </button>
                </div>








                {{-- ---------------------------- --}}
                {{-- ---------------------------- --}}









                {{-- :: mealLabel --}}



                {{-- :: checkLabel --}}
                @if (!empty($scheduleMeal?->meal?->label))




                <div class="d-flex justify-content-around align-items-center ">
                    <div class="sticker--label-layout sticky--div mb-2 px-0 py-2 ">





                        {{-- sticker - label --}}
                        <div class="sticker--label mx-auto position-relative " style="
                        width: {{ $scheduleMeal?->meal?->label->width ?? 100 }}mm;
                        height: {{ $scheduleMeal?->meal?->label->height ?? 70 }}mm;
                        border-radius: {{ $scheduleMeal?->meal?->label->radius ?? 0 }}px;
                        padding-top: {{ $scheduleMeal?->meal?->label->paddingTop  ?? 0 }}mm;
                        padding-bottom: {{ $scheduleMeal?->meal?->label->paddingBottom  ?? 0 }}mm;
                        background-color: {{ $scheduleMeal?->meal?->label->backgroundColor ?? '#fff' }};
                        border-color: {{ $scheduleMeal?->meal?->label->borderColor ?? '#fff' }};
                        color: {{ $label->fontColor ?? '#000' }};">









                            {{-- TEXT ONLY --}}


                            {{-- 1.5: top --}}
                            <div class='sticker--label-header d-flex  justify-content-around align-items-center' style="padding-left: {{ $scheduleMeal?->meal?->label->paddingLeft  ?? 0 }}mm;
                            padding-right: {{ $scheduleMeal?->meal?->label->paddingRight  ?? 0 }}mm;
                            border-color: {{ $scheduleMeal?->meal?->label->borderColor  ?? '#c2c3c5' }}">







                                {{-- leftSection --}}
                                <div
                                    style="border-color: {{ $scheduleMeal?->meal?->label->borderColor  ?? '#c2c3c5' }}">




                                    {{-- customerName --}}

                                    @if ($scheduleMeal?->meal?->label->showCustomerName)

                                    <h4 class='fw-semibold sticker--label-customer mb-1'>Richard Branson
                                    </h4>

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
                                <div class='text-start ps-3'>
                                    <h4 class='fw-normal sticker--label-general-tag mb-1 fs-10'>Your Nutritious
                                        {{ $scheduleMeal?->mealType?->name }}
                                    </h4>


                                    {{-- servingInstructions --}}

                                    @if ($scheduleMeal?->meal?->label?->showServingInstructions)

                                    <h4 class='fw-normal sticker--label-tags mb-2 fs-10'>
                                        <span class='fw-normal me-1 fs-10'>{{ implode(', ',
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
                            <div class='sticker--label-content d-flex justify-content-around align-items-center' style="padding-left: {{ $scheduleMeal?->meal?->label->paddingLeft  ?? 0 }}mm;
                            padding-right: {{ $scheduleMeal?->meal?->label->paddingRight  ?? 0 }}mm;">




                                {{-- leftSection --}}
                                <div
                                    class='text-start smaller-section @if(!$scheduleMeal?->meal?->label->showProductionDate && !$scheduleMeal?->meal?->label->showExpiryDate) d-none @endif'>





                                    {{-- 1: production --}}

                                    @if($scheduleMeal?->meal?->label->showProductionDate)

                                    <h4 class='fw-normal sticker--label-production mb-1'>Prod. Date</h4>
                                    <h4 class='fw-semibold sticker--label-production mb-3'>{{ date('d . m . Y',
                                        strtotime($searchScheduleDate)) }}
                                    </h4>

                                    @endif
                                    {{-- end if - showHide --}}






                                    {{-- 2: expiry --}}

                                    @if($scheduleMeal?->meal?->label->showExpiryDate)


                                    <h4 class='fw-normal sticker--label-expiry mb-1'>Expiry Date</h4>
                                    <h4 class='fw-semibold sticker--label-expiry mb-0'>{{ date('d . m . Y',
                                        strtotime($searchScheduleDate . "+{$scheduleMeal?->meal?->validity} day"))
                                        }}</h4>



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
                                            $scheduleMeal?->mealSize()?->afterCookCalories ?? 0 }}</span>
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
                                            $scheduleMeal?->mealSize()?->afterCookProteins ?? 0 }}</span>
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

                                <img id='footer--preview-2' class='of-cover w-100 h-100'
                                    src=" {{ asset('storage/kitchen/labels/footers/' . $scheduleMeal?->meal?->label->footerImageFile) }}"
                                    wire:ignore.self>

                            </div>
                            {{-- endBottom --}}



                            @endif
                            {{-- end if - showHide --}}




                        </div>
                        {{-- endSticker --}}



                    </div>
                </div>
                {{-- end mealLabel --}}









                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}









                {{-- :: noLabel --}}
                @else




                {{-- fallback --}}
                <div class="d-block px-2 py-3 overview--card client-version w-75 mx-auto text-center mt-3">
                    <p class="fs-13 text-gold mb-0">Label is not assigned</p>
                    <h6 class='truncate-text-1l px-2 mb-1'>{{ $scheduleMeal?->meal?->name }}</h6>
                </div>



                @endif
                {{-- end if - checkLabel --}}





            </div>
            @endforeach
            {{-- end loop - groupByMeal --}}







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











    @section('modals')


    {{-- 1: preview / print --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-label.components.kitchen-today-label-preview />



    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}









</section>
{{-- endSection --}}