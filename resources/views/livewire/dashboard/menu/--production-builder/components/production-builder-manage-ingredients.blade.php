{{-- row --}}
<div class="row recipe--builder-wrapper">
    <div class="col-12 text-start d-flex justify-content-evenly mb-2">


        {{-- newIngredient --}}
        <button class="btn btn--scheme btn--scheme-2 px-2 me-1 scalemix--3 py-2 d-inline-flex align-items-center fs-14 mb-2 w-100 fw-semibold item--scheme-0
        @if ($meal->sizes->count() == 0) disabled @endif" type="button" wire:loading.attr='disabled'
            wire:click="append('Ingredient')">
            <svg class="bi bi-plus-circle-dotted fs-6 me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                </path>
            </svg>Ingredient
        </button>










        {{-- :: baseOnTypes --}}
        @foreach ($types as $type)




        {{-- newTypeButton --}}
        <button
            class="btn btn--scheme btn--scheme-2 px-2 mx-1 scalemix--3 py-2 d-inline-flex align-items-center fs-14 mb-2 w-100 fw-semibold item--scheme-{{ $type->id }} @if ($meal->sizes->count() == 0) disabled @endif"
            type="button" wire:loading.attr='disabled' wire:click="append('{{ $type->id }}')">
            <svg class="bi bi-plus-circle-dotted fs-6 me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                </path>
            </svg>{{ $type->name }}
        </button>



        @endforeach
        {{-- end loop --}}




    </div>
    {{-- endColumn --}}








    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}







    <!-- ingredientsCol -->
    <div class="col-5 px-0">
        <div class="table memoir--table w-100 h-100">
            <table class=" table table-bordered" id="memoir--table">

                {{-- header --}}
                <thead>
                    <tr>
                        <th class="th--md" style="opacity: 0" colspan="3">
                            Placeholder
                        </th>
                    </tr>
                </thead>


                {{-- tbody --}}
                <tbody>





                    {{-- subtitle --}}
                    <tr>
                        <td class="fw-bold" style="height: 62px" colspan="3">
                            After Cook <small class="fw-semibold text-gold fs-10 ms-1">(Manual)</small>
                        </td>
                    </tr>






                    {{-- fixedSubtitle --}}


                    {{-- :: permission - hasConversion --}}
                    @if ($versionPermission->menuModuleHasBuilderConversion)

                    <tr>
                        <td class="fw-bold" style="height: 62px" colspan="3">
                            After Cook<small class="fw-semibold text-gold fs-10 ms-1">(Auto)</small>
                        </td>
                    </tr>

                    @endif
                    {{-- end if - permission --}}








                    {{-- fixedSubtitle --}}
                    <tr>
                        <td class="fw-bold" style="height: 62px" colspan="3">
                            Raw Macros<small class="fw-semibold text-gold fs-10 ms-1">(Auto)</small>
                        </td>
                    </tr>



                    {{-- fixedSubtitle --}}
                    <tr class="subheader">
                        <td class="fw-bold fs-11"></td>
                        <td class="fw-bold th--sm fs-11">Type</td>


                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td class="fw-bold th--lg fs-11">Cook Type</td>

                        @endif
                        {{-- end if - permission --}}


                    </tr>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}















                    {{-- loop - ingredients --}}
                    @if ($mealSize)



                    {{-- 1: ingredients --}}
                    @foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient)





                    {{-- singleRow - part --}}
                    <tr key='single-ingredient-{{ $mealSizeIngredient->id }}' wire:ignore>




                        {{-- coloringTD --}}
                        <td class="fw-bold tr--ingredient td--overflow" style="max-width: 270px;">


                            <div class="select--single-wrapper builder mx-auto" wire:loading.class='no-events'
                                style="width: 100% !important;">
                                <select class="form-select ingredient--select"
                                    id='ingredient--select-{{ $mealSizeIngredient->id }}'
                                    data-instance='instance.partId.{{ $mealSizeIngredient->id }}'
                                    data-instanceId='{{ $mealSizeIngredient->id }}' required
                                    value='{{ $mealSizeIngredient?->ingredientId }}'>
                                    <option value=""></option>

                                    @foreach ($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                        </td>
                        {{-- endTD --}}







                        {{-- type --}}
                        <td class="fw-bold">
                            <div class="select--single-wrapper xxs" wire:loading.class='no-events'
                                style="width: 85px !important; max-width: 85px !important">
                                <select class="form-select ingredient--type-select "
                                    id='ingredient--type-select-{{ $mealSizeIngredient->id }}'
                                    data-instance='instance.partType.{{ $mealSizeIngredient->id }}'
                                    data-instanceId='{{ $mealSizeIngredient->id }}' data-instanceType='Ingredient'
                                    required value='{{ $mealSizeIngredient?->partType }}'>
                                    <option value=""></option>
                                    <option value="Main">Main</option>
                                    <option value="Side">Side</option>
                                    <option value="Mixed">Mixed</option>
                                </select>
                            </div>
                        </td>






                        {{-- cookingType --}}

                        {{-- :: permission inline - hasConversion --}}

                        <td
                            class="fw-bold px-0 @if (!$versionPermission->menuModuleHasBuilderConversion) d-none @endif">
                            <div class="select--single-wrapper builder mx-auto" wire:loading.class='no-events'
                                style="width: 155px !important; max-width: 155px !important">
                                <select class="form-select ingredient--cookingType-select "
                                    id='ingredient--cookingType-select-{{ $mealSizeIngredient->id }}'
                                    data-instance='instance.cookingTypeId.{{ $mealSizeIngredient->id }}'
                                    data-instanceId='{{ $mealSizeIngredient->id }}' data-instanceType='Ingredient'
                                    required value='{{ $mealSizeIngredient?->cookingTypeId }}'>
                                    <option value=""></option>


                                    @foreach ($cookingTypes as $cookingType)
                                    <option value="{{ $cookingType->id }}">{{ $cookingType->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </td>





                    </tr>
                    {{-- end loop --}}





                    @endforeach
                    {{-- end loop --}}














                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}

















                    {{-- 2: parts --}}
                    @foreach ($mealSize?->parts ?? [] as $mealSizePart)






                    {{-- singleRow - part --}}
                    <tr key='single-part-{{ $mealSizePart->id }}' wire:ignore>




                        {{-- coloringTD --}}
                        <td class="fw-bold tr--{{ strtolower($mealSizePart->type->name) }} td--overflow"
                            style="max-width: 270px;">



                            <div class="select--single-wrapper builder s mx-auto" wire:loading.class='no-events'
                                style="width: 100%">
                                <select class="form-select part--select" id='part--select-{{ $mealSizePart->id }}'
                                    data-instance='instanceParts.partId.{{ $mealSizePart->id }}'
                                    data-instanceId='{{ $mealSizePart->id }}'
                                    data-instanceType='{{ $mealSizePart->type->id }}' required
                                    value='{{ $mealSizePart?->partId }}'>
                                    <option value=""></option>



                                    {{-- :: without CurrentMeal - with SameType --}}
                                    @foreach ($mealOptions?->where('typeId',
                                    $mealSizePart->typeId) ?? [] as $mealOption)
                                    <option value="{{ $mealOption->id }}">{{ $mealOption->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                        </td>
                        {{-- endTD --}}







                        {{-- type --}}
                        <td class="fw-bold">
                            <div class="select--single-wrapper xxs" wire:loading.class='no-events'
                                style="width: 85px !important; max-width: 85px !important">
                                <select class="form-select part--type-select "
                                    id='part--type-select-{{ $mealSizePart->id }}'
                                    data-instance='instanceParts.partType.{{ $mealSizePart->id }}'
                                    data-instanceId='{{ $mealSizePart->id }}'
                                    data-instanceType='{{ $mealSizePart->type->id }}' required
                                    value='{{ $mealSizePart?->partType }}'>
                                    <option value=""></option>
                                    <option value="Main">Main</option>
                                    <option value="Side">Side</option>
                                    <option value="Mixed">Mixed</option>
                                </select>
                            </div>
                        </td>







                        {{-- empty - cookingTypes --}}




                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td></td>

                        @endif
                        {{-- end if - permission --}}






                    </tr>
                    {{-- end loop --}}





                    @endforeach
                    {{-- end loop --}}





                    @endif
                    {{-- end if --}}











                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}











                </tbody>
            </table>
        </div>
    </div>
    {{-- endCol --}}










    {{-- ------------------------------------------------------------ --}}
    {{-- ------------------------------------------------------------ --}}



    {{-- --------- --}}
    @php

    $initSizeId = $meal?->sizes?->first()?->sizeId ?? null;

    @endphp
    {{-- --------- --}}









    {{-- loop - mealSizes --}}
    @foreach ($meal?->sizes as $mealSize)



    {{-- viewIngredients --}}
    <div class="col-7 px-0 @if ($initSizeId != $mealSize->size->id) d-none @endif" data-instance='mealSizes'
        data-view='size-{{ $mealSize->size->id }}' wire:ignore.self>
        <div class="table-responsive memoir--table w-100">
            <table class="table table-bordered">


                {{-- thead --}}
                <thead>
                    <tr>
                        <th class="th--sm" colspan="2"></th>



                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)

                        {{-- percentage --}}
                        <th class="th--xs"></th>

                        @endif
                        {{-- end if - permission --}}



                        <th class="th--sm" colspan="1">Calories</th>
                        <th class="th--sm" colspan="1">Protein</th>
                        <th class="th--sm" colspan="1">Carb</th>
                        <th class="th--sm" colspan="1">Fat</th>
                        <th class="th--sm" colspan="1">Cost</th>
                        <th class="th--xs" colspan="3"></th>

                    </tr>
                </thead>


                {{-- tbody --}}
                <tbody>







                    {{-- 1: manualAfterCook For Size --}}
                    <tr>

                        {{-- empty --}}
                        <td colspan="2" style="height: 62px"></td>







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        {{-- percentage --}}
                        <td colspan="1" style="height: 62px"></td>



                        @endif
                        {{-- end if - permission --}}






                        {{-- calories --}}
                        <td class="fw-bold" colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                value="{{ $mealSize->afterCookCalories }}"
                                wire:change="updateAfterCookMacros('Calories', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>

                        {{-- proteins --}}
                        <td colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                value="{{ $mealSize->afterCookProteins }}"
                                wire:change="updateAfterCookMacros('Proteins', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>


                        {{-- carbs --}}
                        <td class="scale--3" colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                value="{{ $mealSize->afterCookCarbs }}"
                                wire:change="updateAfterCookMacros('Carbs', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>


                        {{-- fats --}}
                        <td class="scale--3" colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                value="{{ $mealSize->afterCookFats }}"
                                wire:change="updateAfterCookMacros('Fats', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>




                        {{-- empty - cost --}}
                        <td class="scale--3" colspan="1"></td>




                        {{-- empty --}}
                        <td class="scale--3" colspan="3"></td>
                    </tr>










                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}









                    {{-- 2rd Row --}}





                    {{-- 1.2: automaticAfterCook For Size --}}

                    {{-- :: permission - inline hasConversion --}}

                    <tr class='@if (!$versionPermission->menuModuleHasBuilderConversion) d-none @endif'>




                        {{-- afterCookGrams --}}
                        <td colspan="2" style="height: 62px">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookGrams-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        {{-- percentage --}}
                        <td colspan="1"></td>



                        @endif
                        {{-- end if - permission --}}







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- CA --}}
                        <td class="fw-bold" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookCalories-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>





                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{-- :: permission - hasMacros --}}
                        @if ($versionPermission->menuModuleHasBuilderMacros)





                        {{-- P --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookProteins-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>


                        {{-- C --}}
                        <td class="scale--3" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookCarbs-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>



                        {{-- F --}}
                        <td class="scale--3" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookFats-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        {{-- HIDDEN --}}
                        @else





                        {{-- P --}}
                        <td class='invisible' colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookProteins-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>


                        {{-- C --}}
                        <td class="invisible" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookCarbs-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>



                        {{-- F --}}
                        <td class="invisible" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookFats-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        @endif
                        {{-- end if - permission --}}









                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}



                        {{-- cost [not-used] --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly d-none ingredient--afterCookCost-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        {{-- empty --}}
                        <td class="scale--3" colspan="3"></td>


                    </tr>















                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}






                    {{-- 3rd Row --}}




                    {{-- 1.2: automaticFresh For Size --}}
                    <tr>



                        {{-- Grams --}}
                        <td colspan="2" style="height: 62px">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--grams-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        {{-- percentage --}}
                        <td colspan="1"></td>



                        @endif
                        {{-- end if - permission --}}







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- CA --}}
                        <td class="fw-bold" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--calories-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>





                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{-- :: permission - hasMacros --}}
                        @if ($versionPermission->menuModuleHasBuilderMacros)





                        {{-- P --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--proteins-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>


                        {{-- C --}}
                        <td class="scale--3" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--carbs-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>



                        {{-- F --}}
                        <td class="scale--3" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--fats-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        {{-- HIDDEN --}}
                        @else





                        {{-- P --}}
                        <td class='invisible' colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--proteins-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>


                        {{-- C --}}
                        <td class="invisible" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--carbs-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>



                        {{-- F --}}
                        <td class="invisible" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--fats-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        @endif
                        {{-- end if - permission --}}









                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}



                        {{-- cost --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--cost-total-input"
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        {{-- empty --}}
                        <td class="scale--3" colspan="3"></td>


                    </tr>







                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}



                    {{-- 4td Row --}}





                    {{-- ingredientsHeaders --}}
                    <tr class="subheader">



                        {{-- grams - afterCookGrams - % --}}
                        <td class="fw-bold fs-11 th--sm" @if (!$versionPermission->menuModuleHasBuilderConversion)
                            colspan='2' @endif>Grams</td>





                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td class="fw-bold fs-11 px-1 th--sm">Cooked<small
                                class="fw-semibold text-gold fs-10 ms-1">(G)</small></td>

                        @endif
                        {{-- end if - permission --}}







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        <td class="fw-bold fs-11">%</td>


                        @endif
                        {{-- end if - permission --}}






                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        <td class="fw-bold fs-11">CA</td>





                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{-- :: permission - hasMacros --}}
                        @if ($versionPermission->menuModuleHasBuilderMacros)


                        <td class="fw-bold fs-11">P</td>
                        <td class="fw-bold fs-11">C</td>
                        <td class="fw-bold fs-11">F</td>



                        @else


                        <td class="fw-bold invisible">P</td>
                        <td class="fw-bold invisible">C</td>
                        <td class="fw-bold invisible">F</td>


                        @endif
                        {{-- end if --}}





                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}


                        <td class="fw-bold fs-11">Cost</td>
                        <td class="fw-bold fs-11">Remov.</td>



                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- :: permission - hasReplacements --}}
                        @if ($versionPermission->menuModuleHasBuilderReplacements)


                        <td class="fw-bold fs-11">Default</td>


                        @endif
                        {{-- end if - permission --}}




                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- :: stretch --}}
                        <td @if (!$versionPermission->menuModuleHasBuilderReplacements) colspan='2' @endif
                            class="fw-bold" ></td>



                    </tr>






                    {{-- ------------------------------------------------------- --}}
                    {{-- ------------------------- items ----------------------- --}}
                    {{-- ------------------------------------------------------- --}}





                    {{-- 5th Row --}}






                    {{-- 1: ingredient --}}
                    @foreach ($mealSize->ingredients ?? [] as $mealSizeIngredient)


                    <livewire:dashboard.menu.production-builder.components.production-builder-view-ingredient
                        :id='$mealSizeIngredient->id' typeId='Ingredient'
                        key='ingredient-details-{{ $mealSizeIngredient->id }}' />

                    @endforeach
                    {{-- end singleIngredientDetails --}}









                    {{-- 2: parts --}}
                    @foreach ($mealSize->parts ?? [] as $mealSizePart)



                    <livewire:dashboard.menu.production-builder.components.production-builder-view-ingredient
                        :id='$mealSizePart->id' typeId='{{ $mealSizePart->type->id }}'
                        key='part-details-{{ $mealSizePart->id }}' />

                    @endforeach
                    {{-- end loop --}}






                    {{-- ---------------------------- end items --}}




                </tbody>
            </table>
            {{-- end table --}}


        </div>
    </div>

    @endforeach
    {{-- end loop --}}



















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.ingredient--select`, function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            instanceId = $(this).attr('data-instanceId');

            @this.set(instance, selectValue);
            @this.update(instanceId, 'Ingredient');
        });
    </script>










    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.ingredient--type-select`, function(event) {



            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            instanceId = $(this).attr('data-instanceId');

            @this.set(instance, selectValue);
            @this.updateType(instanceId, 'Ingredient');
        });

    </script>












    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.ingredient--cookingType-select`, function(event) {



        // 1.1: getValue - instance
        selectValue = $(this).select2('val');
        instance = $(this).attr('data-instance');
        instanceId = $(this).attr('data-instanceId');

        @this.set(instance, selectValue);
        @this.update(instanceId, 'Ingredient');
    });

    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}













    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.part--select`, function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            instanceId = $(this).attr('data-instanceId');
            instanceType = $(this).attr('data-instanceType');

            @this.set(instance, selectValue);
            @this.update(instanceId, instanceType);
        });
    </script>










    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.part--type-select`, function(event) {



            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            instanceId = $(this).attr('data-instanceId');
            instanceType = $(this).attr('data-instanceType');


            @this.set(instance, selectValue);
            @this.updateType(instanceId, instanceType);
        });

    </script>











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






    {{-- sync removable - replacement in UI --}}
    <script>
        $('tbody').on('change', '.replacement--checkbox', function () {

            // 1: getGroup
            groupToken = $(this).attr('data-group');


            // 1.2: check
            if ($(this).prop('checked'))
                $(`.replacement--checkbox[data-group=${groupToken}]`).prop('checked', true);



            // :: unCheck
            else
                $(`.replacement--checkbox[data-group=${groupToken}]`).prop('checked', false);

        });






        // -------------------------------------------------
        // -------------------------------------------------








        $('tbody').on('change', '.removable--checkbox', function () {

            // 1: getGroup
            groupToken = $(this).attr('data-group');


            // 1.2: check
            if ($(this).prop('checked'))
                $(`.removable--checkbox[data-group=${groupToken}]`).prop('checked', true);



            // :: unCheck
            else
                $(`.removable--checkbox[data-group=${groupToken}]`).prop('checked', false);

        });



    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</div>
{{-- endRow --}}