<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Kitchen Today' />




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
                <input class="form--input" type="date" wire:model.live='searchScheduleDate' />
            </div>





            {{-- :: innerSubMenu --}}
            <livewire:dashboard.manage-kitchen.components.inner-sub-menu />


        </div>
        {{-- end midRow --}}









        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- bottomRow --}}
        <div class="row align-items-center mt-5">


            {{-- filters --}}
            <div class="col-4">
                <div class="row">



                    {{-- search - mealTypes --}}
                    <div class="col-6">
                        <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                            <select class="form--select" data-instance='searchMealType' data-placeholder='Select Type'
                                data-clear='true' required>
                                <option value=""></option>

                                @foreach ($mealTypes as $mealType)
                                <option value="{{ $mealType->id }}">{{ $mealType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>



                    {{-- search - mealSize --}}
                    <div class="col-6">
                        <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                            <select class="form--select" data-instance='searchSize' data-placeholder='Select Size'
                                data-clear='true' required>
                                <option value=""></option>

                                @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- endCol --}}


                </div>
            </div>
            {{-- endSearch --}}






            {{-- actions --}}
            <div class="col-4 text-center">





                {{-- 1: print --}}
                <button
                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                    disabled type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg>Print
                </button>






                {{-- 2: exportExcel --}}
                <button wire:click='export' wire:loading.class='disabled'
                    class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold ms-2"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-file-text fs-6 me-2">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                        </path>
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                        </path>
                    </svg>Excel
                </button>


            </div>
            {{-- endActions --}}





            {{-- -------------------- --}}
            {{-- -------------------- --}}



            {{-- counter --}}
            <div class="col-4 text-end d-flex align-items-center justify-content-end">





                {{-- switchToKG --}}
                <div class="form-check form-switch mealType--checkbox py-2 rounded-1 px-4 d-inline-flex me-2 mb-0"
                    style="background-color: var(--color-scheme-2)">


                    {{-- input --}}
                    <input class="form-check-input pointer" type="checkbox" id="switch-unit" wire:model.live='toKG'
                        wire:loading.attr='disabled' />


                    {{-- label --}}
                    <label class="form-check-label border-0 ms-2 me-0 fw-semibold" for="switch-unit">KG</label>

                </div>




                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Meals">
                    {{ $scheduleMeals->count() }}
                </h3>
            </div>


        </div>
    </div>
    {{-- endBottomRow --}}








    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- tableContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 mb-2">
            <div class="col-12 mt-4">
                <div id="print--table" class="memoir--table w-100 kitchen--table">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                            <tr>
                                <th class="th--xs">Type</th>
                                <th class="th--xs">Name</th>
                                <th class="th--sm">Total Grams</th>
                                <th class="th--xs">Meals</th>
                                <th class="th--sm">Total P/S</th>
                                <th class="th--md">Size &amp; Ingredients</th>
                                <th class="th--sm">Allergies</th>
                                <th class="th--sm">Actions</th>
                            </tr>
                        </thead>
                        {{-- endHeaders --}}





                        {{-- body --}}
                        <tbody>








                            {{-- 1: loop - scheduleMeals - groupByType --}}
                            @foreach ($scheduleMeals?->groupBy('mealTypeId') ?? [] as $commonType =>
                            $scheduleMealsByType)





                            {{-- 2: loop - scheduleMeals - groupByMeal --}}
                            @foreach ($scheduleMealsByType?->groupBy('mealId') ?? [] as $commonMeal =>
                            $scheduleMealsByMeal)






                            {{-- singleRow --}}
                            <tr key='production-row-{{ $scheduleMealsByMeal?->first()?->id }}'>



                                {{-- 1: mealType --}}
                                <td class="fw-bold text-start">
                                    <span class="text-center d-block fs-14 fw-normal">{{
                                        $scheduleMealsByType?->first()->mealType->name }}</span>
                                </td>




                                {{-- 2: meals --}}
                                <td class="fw-bold text-start">
                                    <span class="d-block fw-normal">{{
                                        $scheduleMealsByMeal->first()?->meal?->name }}
                                        <small class="fw-semibold text-gold fs-10 d-block">
                                            {{ $scheduleMealsByMeal->first()?->meal?->diet?->name }}
                                        </small>
                                    </span>
                                </td>















                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}


                                {{-- ** init totalGrams ** --}}
                                @php $totalGrams = $totalGramsOfParts = [] @endphp







                                {{-- 3: totalGrams --}}
                                <td class="text-start">





                                    {{-- :: loop - scheduleMeals - groupBySize --}}
                                    @foreach ($scheduleMealsByMeal->groupBy('sizeId') ?? [] as $commonSize =>
                                    $scheduleMealsBySize)



                                    {{-- ** Get MealSize ** --}}
                                    @php $mealSize = $scheduleMealsBySize?->first()?->mealSize(); @endphp








                                    {{-- A: loop - ingredients - sumGrams --}}
                                    @foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient)



                                    {{-- sumGrams --}}
                                    @php $totalGrams[$mealSizeIngredient?->ingredientId] =
                                    ($totalGrams[$mealSizeIngredient?->ingredientId] ?? 0)
                                    + $mealSizeIngredient?->amount * $scheduleMealsBySize->count(); @endphp


                                    @endforeach
                                    {{-- end loop - ingredients - sumGrams --}}














                                    {{-- B: loop - parts - sumGrams --}}
                                    @foreach ($mealSize?->parts ?? [] as $mealSizePart)



                                    {{-- sumGrams --}}
                                    @php $totalGramsOfParts[$mealSizePart?->partId] =
                                    ($totalGramsOfParts[$mealSizePart?->partId] ?? 0)
                                    + $mealSizePart?->amount * $scheduleMealsBySize->count(); @endphp


                                    @endforeach
                                    {{-- end loop - parts - sumGrams --}}




                                    @endforeach
                                    {{-- end loop - groupBySize --}}













                                    {{-- ------------------------------------- --}}
                                    {{-- ------------------------------------- --}}









                                    {{-- A: loop - ingredients - totalGrams --}}
                                    @foreach ($scheduleMealsByMeal->first()?->meal?->ingredients
                                    ?->groupBy('ingredientId') ?? [] as $commonIngredient =>
                                    $mealIngredientsByIngredient)


                                    <span class="mb-2 d-block fw-normal">
                                        <small class="fw-semibold text-gold fs-14 me-1">
                                            {{ ($totalGrams[$mealIngredientsByIngredient?->first()?->ingredient?->id] ??
                                            0) / $unit }}
                                        </small>{{ $mealIngredientsByIngredient?->first()?->ingredient?->name }}
                                    </span>


                                    @endforeach
                                    {{-- end loop - ingredients --}}








                                    {{-- B: loop - parts - totalGrams --}}
                                    @foreach ($scheduleMealsByMeal->first()?->meal?->parts
                                    ?->groupBy('partId') ?? [] as $commonPart =>
                                    $mealPartsByPart)



                                    <span class="mb-2 d-block fw-normal">
                                        <small class="fw-semibold text-gold fs-14 me-1">
                                            {{ ($totalGramsOfParts[$mealPartsByPart?->first()?->partId] ?? 0) / $unit }}
                                        </small>{{ $mealPartsByPart?->first()?->part?->name }}
                                    </span>


                                    @endforeach
                                    {{-- end loop - parts --}}






                                </td>
                                {{-- end data --}}













                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}










                                {{-- 4: totalMeals --}}
                                <td class="scale--3 text-start">
                                    <span class="fs-5 d-block text-center fw-bold">
                                        {{ $scheduleMealsByMeal->count() }}
                                    </span>
                                </td>










                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}









                                {{-- 5: totalPerSize --}}
                                <td class="text-start">



                                    {{-- :: loop - scheduleMeals - groupBySize --}}
                                    @foreach ($scheduleMealsByMeal->groupBy('sizeId') ?? [] as $commonSize =>
                                    $scheduleMealsBySize)





                                    <div class="kitchen--size-box mb-2">
                                        <h1 class="fs-13 my-0">{{ $scheduleMealsBySize?->first()?->size?->name }}</h1>
                                        <span class="d-block">
                                            <small class="fw-semibold text-gold fs-14">
                                                {{ $scheduleMealsBySize?->count() }}
                                            </small>
                                        </span>
                                    </div>




                                    @endforeach
                                    {{-- end loop - groupBySize --}}


                                </td>
                                {{-- endData --}}











                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}









                                {{-- 6: quantityPerSize + its Ingredients / parts --}}
                                <td class="text-start">




                                    {{-- :: loop - scheduleMeals - groupBySize --}}
                                    @foreach ($scheduleMealsByMeal->groupBy('sizeId') ?? [] as $commonSize =>
                                    $scheduleMealsBySize)




                                    {{-- quantityPerSize --}}
                                    <div class="kitchen--size-box mb-2">
                                        <h1 class="fs-13 my-0">{{ $scheduleMealsBySize?->first()?->size?->name }}</h1>
                                        <span class="d-block">
                                            <small class="fw-semibold text-gold fs-14">
                                                {{ $scheduleMealsBySize?->count() }}</small>
                                        </span>
                                    </div>










                                    {{-- :: ingredients / Parts --}}
                                    <div class="mb-3">




                                        {{-- ** Get MealSize ** --}}
                                        @php $mealSize = $scheduleMealsBySize?->first()?->mealSize(); @endphp








                                        {{-- A: loop - ingredients --}}
                                        @foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient)



                                        <span class="mb-2 d-block fw-normal">


                                            {{-- name - grams --}}
                                            {{-- :: previous: * $scheduleMealsBySize->count() --}}
                                            <small class="fw-semibold text-gold fs-13 me-1">
                                                {{ ($mealSizeIngredient?->amount ?? 0) / $unit }}</small>
                                            {{ $mealSizeIngredient?->ingredient?->name }}


                                        </span>




                                        @endforeach
                                        {{-- end loop - ingredients --}}










                                        {{-- B: loop - parts --}}
                                        @foreach ($mealSize?->parts ?? [] as $mealSizePart)



                                        <span class="mb-2 d-block fw-normal">


                                            {{-- name - grams --}}
                                            {{-- previous: * $scheduleMealsBySize->count() --}}
                                            <small class="fw-semibold text-gold fs-13 me-1">
                                                {{ ($mealSizePart?->amount ?? 0) / $unit }}</small>
                                            {{ $mealSizePart?->part?->name }}




                                            {{-- :: viewPart --}}
                                            <button
                                                class="btn btn--raw-icon fs-14 text-warning d-inline-block scale--3 w-auto ms-1"
                                                wire:click='viewPart({{ $mealSizePart->part->id }})' type="button"
                                                data-bs-target="#view-part" data-bs-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-6"
                                                    style="fill: var(--bs-warning)">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                    </path>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </span>




                                        @endforeach
                                        {{-- end loop - parts --}}






                                    </div>
                                    {{-- end ingredients / parts --}}








                                    @endforeach
                                    {{-- end loop - groupBySize --}}




                                </td>
                                {{-- endData --}}










                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}







                                {{-- empty --}}
                                <td class="text-start"></td>










                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}








                                {{-- actions --}}
                                <td class="text-start">


                                    <img class='w-100 of-contain' style="height: 130px"
                                        src="{{ asset('storage/menu/meals/' . ($scheduleMealsByMeal->first()?->meal?->imageFile ?? $defaultPlate)) }}">





                                    {{-- cookButton --}}
                                    <div class="d-block text-center mt-3">


                                        {{-- A: pending --}}
                                        @if ($scheduleMealsByMeal?->where('cookStatus', 'Pending')?->count() ?? 0 > 0)

                                        <button
                                            class="btn btn--scheme btn--scheme-outline-3 align-items-center d-inline-flex px-3 py-1 fs-12 justify-content-center fw-semibold"
                                            type="button" style="border:1px dashed var(--color-theme-secondary)"
                                            wire:click='cookMeal({{ $commonType }}, {{ $commonMeal }})'>
                                            Mark As Cooked?
                                        </button>





                                        {{-- B: Cooked or Else --}}
                                        @else


                                        <button
                                            class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 py-1 fs-12 justify-content-center fw-semibold disabled"
                                            type="button" style="border:1px dashed var(--bs-warning)">
                                            Meal is Cooked
                                        </button>



                                        @endif

                                    </div>
                                </td>






                            </tr>
                            @endforeach
                            {{-- end loop - scheduleMeals - groupByMeal --}}







                            @endforeach
                            {{-- end loop - scheduleMeals - groupByType --}}



                        </tbody>
                    </table>
                    {{-- endTable --}}



                </div>
            </div>
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


    {{-- 1: viewPart - ingredients & otherParts --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-part />



    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}








</section>
{{-- endSection --}}