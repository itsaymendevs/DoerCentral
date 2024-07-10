{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.inventory.components.sub-menu title='Purchase Orders' key='sub-menu' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}




        {{-- topRow --}}
        <div class="row align-items-end  mb-4">





            {{-- 1: ingredientFilter --}}
            <div class="col-3">
                <input class="form-control form--input" type="text" wire:model.live='searchIngredient'
                    placeholder="Search by Ingredient" />
            </div>







            {{-- 2: fromDate --}}
            <div class="col-3">

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">From</label>
                </div>

                <input class="form-control form--input" type="date" wire:model='searchScheduleDate'
                    wire:loading.attr='readonly' wire:change='dependencies' />
            </div>





            {{-- 3: untilDate --}}
            <div class="col-3">

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Until</label>
                </div>

                <input class="form-control form--input" type="date" wire:model='searchScheduleUntilDate'
                    wire:loading.attr='readonly' wire:change='dependencies' />
            </div>






            {{-- -------------------------------------- --}}
            {{-- -------------------------------------- --}}






            {{-- 4: switch - counter --}}
            <div class="col-3 text-end d-flex align-items-end justify-content-end">




                {{-- switchToTotal --}}
                <div class="form-check form-switch mealType--checkbox py-2 rounded-1 px-3 d-inline-flex me-2 mb-0"
                    style="background-color: var(--color-scheme-2)">


                    {{-- input --}}
                    <input class="form-check-input pointer" type="checkbox" id="switch-quantity"
                        wire:model.live='toTotal' wire:loading.attr='disabled' />


                    {{-- label --}}
                    <label class="form-check-label border-0 ms-2 me-0 fw-semibold fs-16" for="switch-quantity">Total
                        Price</label>

                </div>





                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Ingredients">
                    {{ $ingredients?->count() }}
                </h3>
            </div>




        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}











        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-4">




            {{-- confirmPurchase --}}
            <div class="col-12 text-center mb-4">
                <button class="btn btn--scheme-2 px-3 py-2 text-uppercase fs-15" type='button'
                    wire:click='confirmPurchase' data-bs-toggle='modal' data-bs-target='#purchase-cart'>Confirm
                    Order<span class='fw-semibold fs-13 ms-1 text-gold counter--small'>{{count($cart) }}</span>
                </button>
            </div>







            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}






            {{-- tableView --}}
            <div class=" col-12 mb-3" data-view="table">
                <div class="table-responsive memoir--table w-100 po--table">
                    <table class="table table-bordered" id="memoir--table">



                        {{-- thead --}}
                        <thead>

                            <tr style="vertical-align: middle">
                                <th class="th--xs empty"></th>
                                <th class="th--sm empty"></th>
                                <th class="th--sm">Amount</th>



                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}





                                {{-- loop - suppliers --}}
                                @foreach ($supplierIngredients?->groupBy('supplierId') ?? [] as $commonSupplier =>
                                $supplierIngredientsBySupplier)


                                <th class="th--sm" key='common-supplier-{{ $commonSupplier }}'>{{
                                    $supplierIngredientsBySupplier?->first()?->supplier?->name }}


                                    {{-- A: total --}}
                                    @if ($toTotal)

                                    <small class='fs-10 text-dark fw-semibold'>(Price)</small>

                                    {{-- B: single --}}
                                    @else

                                    <small class='fs-10 text-dark fw-semibold'>(P/KG)</small>

                                    @endif
                                    {{-- end if --}}


                                </th>

                                @endforeach
                                {{-- end loop --}}




                            </tr>
                        </thead>
                        {{-- endHeaders --}}








                        {{-- -------------------------------------- --}}
                        {{-- -------------------------------------- --}}








                        {{-- tbody --}}
                        <tbody>



                            {{-- loop - ingredients --}}
                            @foreach ($ingredients ?? [] as $ingredient)


                            <tr key='single-ingredient-{{ $ingredient->id }}'>



                                {{-- 1: ingredient --}}
                                <td class='fs-15'>{{ $globalSNCounter++ }}</td>
                                <td class='fs-15'>{{ $ingredient?->name}}</td>





                                {{-- 1.2: quantity --}}
                                <td class='fw-semibold fs-6 text-warning'>


                                    {{-- A: gram --}}
                                    @if ($unit == 1)


                                    {{ number_format(($ingredientsWithGrams[$ingredient->id] +
                                    ($ingredientsWithGrams[$ingredient->id] *
                                    $ingredient->getWastage())) / $unit) }}
                                    <small class='fs-9'>(G)</small>



                                    {{-- B: KG --}}
                                    @else

                                    {{ number_format(($ingredientsWithGrams[$ingredient->id] +
                                    ($ingredientsWithGrams[$ingredient->id] *
                                    $ingredient->getWastage())) / $unit, 2) }}
                                    <small class='fs-9'>(KG)</small>

                                    @endif
                                    {{-- end if --}}

                                </td>









                                {{-- ------------------------------------ --}}
                                {{-- ------------------------------------ --}}
                                {{-- ------------------------------------ --}}
                                {{-- ------------------------------------ --}}







                                {{-- 1.3: suppliers --}}



                                {{-- loop - suppliers --}}
                                @foreach ($supplierIngredients?->groupBy('supplierId') ?? [] as $commonSupplier =>
                                $supplierIngredientsBySupplier)




                                {{-- A: found --}}
                                @if ($supplierIngredientsBySupplier?->where('ingredientId', $ingredient->id)
                                ?->count() > 0)




                                {{-- ** getSupplierIngredient --}}
                                @php $supplierIngredient = $supplierIngredientsBySupplier->where('ingredientId',
                                $ingredient->id)?->first(); @endphp







                                <td class="th--sm fw-semibold fs-6 text-theme">


                                    {{-- 1: total --}}
                                    @if ($toTotal)


                                    <div class='d-flex align-items-center justify-content-center'>



                                        {{-- A: append --}}
                                        @if (! in_array($ingredient->id, array_column($cart, 'ingredientId')))




                                        <button type='button' wire:loading.class='disabled'
                                            wire:click="append('{{ $ingredient->id }}', '{{ $commonSupplier }}')"
                                            class='btn btn--raw-icon hover--icon-gold w-auto d-inline-block px-1 py-0 fs-10 scalemix--3'>
                                            <svg class="bi bi-plus-circle-dotted fs-5 ms-1"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                                                </path>
                                            </svg>
                                        </button>




                                        {{-- B: remove --}}
                                        @else




                                        <button type='button' wire:loading.class='disabled'
                                            wire:click="remove('{{ $ingredient->id }}', '{{ $commonSupplier }}')"
                                            class='btn btn--raw-icon hover--icon-danger w-auto d-inline-block px-1 py-0 fs-10 scalemix--3'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="bi bi-dash-circle-dotted  fs-5 ms-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0q-.264 0-.523.017l.064.998a7 7 0 0 1 .918 0l.064-.998A8 8 0 0 0 8 0M6.44.152q-.52.104-1.012.27l.321.948q.43-.147.884-.237L6.44.153zm4.132.271a8 8 0 0 0-1.011-.27l-.194.98q.453.09.884.237zm1.873.925a8 8 0 0 0-.906-.524l-.443.896q.413.205.793.459zM4.46.824q-.471.233-.905.524l.556.83a7 7 0 0 1 .793-.458zM2.725 1.985q-.394.346-.74.74l.752.66q.303-.345.648-.648zm11.29.74a8 8 0 0 0-.74-.74l-.66.752q.346.303.648.648zm1.161 1.735a8 8 0 0 0-.524-.905l-.83.556q.254.38.458.793l.896-.443zM1.348 3.555q-.292.433-.524.906l.896.443q.205-.413.459-.793zM.423 5.428a8 8 0 0 0-.27 1.011l.98.194q.09-.453.237-.884zM15.848 6.44a8 8 0 0 0-.27-1.012l-.948.321q.147.43.237.884zM.017 7.477a8 8 0 0 0 0 1.046l.998-.064a7 7 0 0 1 0-.918zM16 8a8 8 0 0 0-.017-.523l-.998.064a7 7 0 0 1 0 .918l.998.064A8 8 0 0 0 16 8M.152 9.56q.104.52.27 1.012l.948-.321a7 7 0 0 1-.237-.884l-.98.194zm15.425 1.012q.168-.493.27-1.011l-.98-.194q-.09.453-.237.884zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a7 7 0 0 1-.458-.793zm13.828.905q.292-.434.524-.906l-.896-.443q-.205.413-.459.793zm-12.667.83q.346.394.74.74l.66-.752a7 7 0 0 1-.648-.648zm11.29.74q.394-.346.74-.74l-.752-.66q-.302.346-.648.648zm-1.735 1.161q.471-.233.905-.524l-.556-.83a7 7 0 0 1-.793.458zm-7.985-.524q.434.292.906.524l.443-.896a7 7 0 0 1-.793-.459zm1.873.925q.493.168 1.011.27l.194-.98a7 7 0 0 1-.884-.237zm4.132.271a8 8 0 0 0 1.012-.27l-.321-.948a7 7 0 0 1-.884.237l.194.98zm-2.083.135a8 8 0 0 0 1.046 0l-.064-.998a7 7 0 0 1-.918 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z" />
                                            </svg>
                                        </button>




                                        @endif
                                        {{-- end if --}}







                                        {{-- price --}}
                                        <div class='ms-1'>
                                            {{ number_format(($supplierIngredient?->sellPrice ?? 0) *
                                            (($ingredientsWithGrams[$ingredient->id] +
                                            ($ingredientsWithGrams[$ingredient->id] * $ingredient->getWastage())) /
                                            $unit),
                                            1) }}
                                            <small class='fs-9'>(AED)</small>
                                        </div>




                                    </div>
                                    {{-- endWrapper --}}







                                    {{-- ---------------------------------------- --}}
                                    {{-- ---------------------------------------- --}}







                                    {{-- 2: single --}}
                                    @else





                                    <div class='d-flex align-items-center justify-content-center'>


                                        {{-- A: append --}}
                                        @if (! in_array($ingredient->id, array_column($cart, 'ingredientId')))




                                        <button type='button' wire:loading.class='disabled'
                                            wire:click="append('{{ $ingredient->id }}', '{{ $commonSupplier }}')"
                                            class='btn btn--raw-icon hover--icon-gold w-auto d-inline-block px-1 py-0 fs-10 scalemix--3'>
                                            <svg class="bi bi-plus-circle-dotted fs-5 ms-1"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                                                </path>
                                            </svg>
                                        </button>




                                        {{-- B: remove --}}
                                        @else




                                        <button type='button' wire:loading.class='disabled'
                                            wire:click="remove('{{ $ingredient->id }}', '{{ $commonSupplier }}')"
                                            class='btn btn--raw-icon hover--icon-danger w-auto d-inline-block px-1 py-0 fs-10 scalemix--3'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="bi bi-dash-circle-dotted  fs-5 ms-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0q-.264 0-.523.017l.064.998a7 7 0 0 1 .918 0l.064-.998A8 8 0 0 0 8 0M6.44.152q-.52.104-1.012.27l.321.948q.43-.147.884-.237L6.44.153zm4.132.271a8 8 0 0 0-1.011-.27l-.194.98q.453.09.884.237zm1.873.925a8 8 0 0 0-.906-.524l-.443.896q.413.205.793.459zM4.46.824q-.471.233-.905.524l.556.83a7 7 0 0 1 .793-.458zM2.725 1.985q-.394.346-.74.74l.752.66q.303-.345.648-.648zm11.29.74a8 8 0 0 0-.74-.74l-.66.752q.346.303.648.648zm1.161 1.735a8 8 0 0 0-.524-.905l-.83.556q.254.38.458.793l.896-.443zM1.348 3.555q-.292.433-.524.906l.896.443q.205-.413.459-.793zM.423 5.428a8 8 0 0 0-.27 1.011l.98.194q.09-.453.237-.884zM15.848 6.44a8 8 0 0 0-.27-1.012l-.948.321q.147.43.237.884zM.017 7.477a8 8 0 0 0 0 1.046l.998-.064a7 7 0 0 1 0-.918zM16 8a8 8 0 0 0-.017-.523l-.998.064a7 7 0 0 1 0 .918l.998.064A8 8 0 0 0 16 8M.152 9.56q.104.52.27 1.012l.948-.321a7 7 0 0 1-.237-.884l-.98.194zm15.425 1.012q.168-.493.27-1.011l-.98-.194q-.09.453-.237.884zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a7 7 0 0 1-.458-.793zm13.828.905q.292-.434.524-.906l-.896-.443q-.205.413-.459.793zm-12.667.83q.346.394.74.74l.66-.752a7 7 0 0 1-.648-.648zm11.29.74q.394-.346.74-.74l-.752-.66q-.302.346-.648.648zm-1.735 1.161q.471-.233.905-.524l-.556-.83a7 7 0 0 1-.793.458zm-7.985-.524q.434.292.906.524l.443-.896a7 7 0 0 1-.793-.459zm1.873.925q.493.168 1.011.27l.194-.98a7 7 0 0 1-.884-.237zm4.132.271a8 8 0 0 0 1.012-.27l-.321-.948a7 7 0 0 1-.884.237l.194.98zm-2.083.135a8 8 0 0 0 1.046 0l-.064-.998a7 7 0 0 1-.918 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z" />
                                            </svg>
                                        </button>




                                        @endif
                                        {{-- end if --}}






                                        {{-- price --}}
                                        <div class="ms-1">
                                            {{ number_format($supplierIngredient?->sellPrice ?? 0, 1) }}
                                            <small class='fs-9'>(AED)</small>
                                        </div>





                                    </div>

                                    @endif
                                    {{-- end if --}}



                                </td>
                                {{-- endTR --}}





                                {{-- B: notFound --}}
                                @else


                                <td></td>


                                @endif
                                {{-- end if --}}





                                @endforeach
                                {{-- end loop - suppliers --}}



                            </tr>
                            @endforeach
                            {{-- end loop - ingredients --}}



                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end tableView --}}




        </div>
    </div>
    {{-- endContainer --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select --}}
    <script>
        $(".form--search-ingredient-select").on("change", function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');

            @this.set(instance, selectValue);


        }); //end function
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- section --}}
    @section('modals')




    {{-- 1: cart --}}
    <livewire:dashboard.inventory.purchase-orders.components.purchase-orders-cart key='purchase-orders-cart-modal' />




    @endsection
    {{-- endSection --}}



    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}













</section>
{{-- endContent --}}