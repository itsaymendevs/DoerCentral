{{-- row --}}
<form wire:submit='update' class="row recipe--builder-wrapper mt-5 no-events-loading" wire:ignore.self>






    {{-- 1: types --}}
    <div class="col-12 text-start d-flex justify-content-evenly mb-2">






        {{-- 1: ingredient --}}
        <button class="btn btn--scheme btn--scheme-2 px-2 item--append me-1 scalemix--3 py-2 d-inline-flex align-items-center fs-14 mb-2 w-100 fw-semibold item--scheme-0
        @if ($meal->sizes->count() == 0) disabled @endif" type="button" wire:loading.attr='disabled'
            wire:click="append('Ingredient')">
            <svg class="bi bi-plus-circle-dotted fs-6 me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                </path>
            </svg>Ingredient
        </button>










        {{-- 2: loop - itemTypes --}}
        @foreach ($itemTypes ?? [] as $itemType)



        <button key='meal-type-button-{{ $itemType->id }}'
            class="btn btn--scheme btn--scheme-2 px-2 mx-1 scalemix--3 item--append py-2 d-inline-flex align-items-center fs-14 mb-2 w-100 fw-semibold item--scheme-{{ $itemType->id }} @if ($meal->sizes->count() == 0) disabled @endif"
            type="button" wire:loading.attr='disabled' wire:click="append('{{ $itemType->id }}')">
            <svg class="bi bi-plus-circle-dotted fs-6 me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                </path>
            </svg>{{ $itemType->name }}
        </button>



        @endforeach
        {{-- end loop --}}




    </div>
    {{-- endCol --}}











    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}









    {{-- 2: items --}}
    <div class="col-6 pe-0">





        {{-- upperTable --}}
        <div class="table memoir--table w-100 mb-0">
            <table class="table builder--table mb-0" id="memoir--table">



                {{-- header --}}
                <thead>
                    <tr>
                        <th class="th--md" style="opacity: 0" colspan="4">
                            Placeholder
                        </th>
                    </tr>
                </thead>
                {{-- endHeaders --}}







                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}







                {{-- tbody --}}
                <tbody>



                    {{-- 1: afterCookManual --}}
                    <tr>
                        <td class="fw-bold" style="height: 62px">
                            After Cook <small class="fw-semibold text-gold fs-10 ms-1">(Manual)</small>
                        </td>
                    </tr>






                    {{-- 2: afterCookAuto --}}


                    {{-- :: permission - hasConversion --}}
                    @if ($versionPermission->menuModuleHasBuilderConversion)

                    <tr>
                        <td class="fw-bold" style="height: 62px">
                            After Cook
                        </td>
                    </tr>

                    @endif
                    {{-- end if - permission --}}








                    {{-- 3: rawAuto --}}
                    <tr>
                        <td class="fw-bold" style="height: 62px">
                            Raw
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        {{-- endTable --}}









        {{-- ------------------------------------- --}}
        {{-- ------------------------------------- --}}
        {{-- ------------------------------------- --}}
        {{-- ------------------------------------- --}}










        {{-- contentTable --}}
        <div class="table memoir--table w-100 h-100">
            <table class=" table table-responsive table-bordered" id="memoir--table">




                {{-- tbody --}}
                <tbody>




                    {{-- subHeader --}}
                    <tr class='subheader border-top-0'>




                        <td @if(!$versionPermission->menuModuleHasBuilderBrand &&
                            !$versionPermission->menuModuleHasBuilderBrand) colspan='3'
                            @elseif(!$versionPermission->menuModuleHasBuilderConversion) colspan='2'
                            @elseif(!$versionPermission->menuModuleHasBuilderBrand) colspan='2' @endif
                            class="fw-bold
                            fs-11"></td>




                        {{-- :: permission - hasBrand --}}
                        @if ($versionPermission->menuModuleHasBuilderBrand)

                        <td class="fw-bold th--sm fs-11">Brand</td>

                        @endif
                        {{-- end if - permission --}}





                        <td class="fw-bold th--sm fs-11">Type</td>



                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td class="fw-bold th--lg fs-11">Cook Type</td>

                        @endif
                        {{-- end if - permission --}}



                    </tr>
                    {{-- endHeaders --}}










                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}








                    {{-- 1: loop - items --}}
                    @for ($i = 0; count($instanceUnique->type ?? []) > $i; $i++)





                    {{-- 1.2: ingredients --}}
                    @if ($instanceUnique->type[$i] == 'Ingredient')



                    <tr key='single-ingredient-{{ $i }}-{{ $instanceUnique?->isRemoved[$i] }}'
                        class='@if ($instanceUnique?->isRemoved[$i] == true) d-none @endif'>





                        {{-- 1: select --}}
                        <td class="fw-bold tr--{{ $instanceUnique->typeName[$i] }} td--overflow"
                            style="max-width: 250px;" @if(!$versionPermission->menuModuleHasBuilderBrand &&
                            !$versionPermission->menuModuleHasBuilderBrand) colspan='3'
                            @elseif(!$versionPermission->menuModuleHasBuilderConversion) colspan='2'
                            @elseif(!$versionPermission->menuModuleHasBuilderBrand) colspan='2' @endif wire:ignore>


                            <div class="select--single-wrapper builder mx-auto" style="width: 100% !important;"
                                wire:loading.class='no-events'>
                                <select class="form-select part--select" id='part--select-{{ $i }}'
                                    data-instance='instance.partId.{{ $i }}' data-trigger='true'
                                    data-numberOfSizes='{{ $instanceUnique->numberOfSizes }}' data-i='{{ $i }}'
                                    data-group='{{ $instanceUnique->groupToken[$i] }}'
                                    value="{{ $instanceUnique->partId[$i] }}" required>
                                    <option value=""></option>

                                    @foreach ($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </td>









                        {{-- 2: brand --}}

                        {{-- :: permission - hasBrand --}}
                        @if ($versionPermission->menuModuleHasBuilderBrand)


                        <td class="fw-bold" wire:ignore>
                            <div class="select--single-wrapper xxs"
                                style="width: 95px !important; max-width: 95px !important"
                                wire:loading.class='no-events'>
                                <select class="form-select part--brand-select" id='part--brand-select-{{ $i }}'
                                    data-instance='instance.partBrandId.{{ $i }}'
                                    data-numberOfSizes='{{ $instanceUnique->numberOfSizes }}'
                                    data-group='{{ $instanceUnique->groupToken[$i] }}' data-i='{{ $i }}'
                                    value='{{ $instanceUnique?->partBrandId[$i] }}'>
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>


                        @endif
                        {{-- end if - permission --}}






                        {{-- ------------------------------------------------- --}}
                        {{-- ------------------------------------------------- --}}







                        {{-- 3: type --}}
                        <td class="fw-bold" wire:ignore>
                            <div class="select--single-wrapper xxs"
                                style="width: 85px !important; max-width: 85px !important">
                                <select class="form-select part--type-select" id='part--type-select-{{ $i }}'
                                    data-instance='instance.partType.{{ $i }}'
                                    data-numberOfSizes='{{ $instanceUnique->numberOfSizes }}'
                                    data-group='{{ $instanceUnique->groupToken[$i] }}' data-i='{{ $i }}'
                                    value="{{ $instanceUnique->partType[$i] }}">
                                    <option value=""></option>
                                    <option value="Main">Main</option>
                                    <option value="Side">Side</option>
                                    <option value="Mixed">Mixed</option>
                                </select>
                            </div>
                        </td>









                        {{-- 4: cookingType --}}

                        {{-- :: permission inline - hasConversion --}}
                        <td
                            class="fw-bold px-0
                            @if (!$versionPermission->menuModuleHasBuilderConversion || $instanceUnique?->partType[$i] != 'Main') d-none @endif">
                            <div class="select--single-wrapper builder mx-auto" wire:ignore
                                style="width: 155px !important; max-width: 155px !important"
                                wire:loading.class='no-events'>
                                <select class="form-select part--cooking-type-select"
                                    id='part--cooking-type-select-{{ $i }}'
                                    data-instance='instance.cookingTypeId.{{ $i }}' data-withValue='true'
                                    data-group='{{ $instanceUnique->groupToken[$i] }}'
                                    data-numberOfSizes='{{ $instanceUnique->numberOfSizes }}' data-i='{{ $i }}'
                                    value="{{ $instanceUnique->cookingTypeId[$i] }}">
                                    <option value=""></option>


                                    @foreach ($cookingTypes ?? [] as $cookingType)
                                    <option value="{{ $cookingType->id }}">{{ $cookingType->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </td>








                        {{-- fallback --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion && $instanceUnique->partType[$i] !=
                        'Main')

                        <td></td>

                        @endif
                        {{-- end if --}}




                    </tr>
                    {{-- end loop --}}










                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}











                    {{-- 2.5: parts --}}
                    @elseif ($instanceUnique->type[$i] == 'Part')






                    <tr key='single-part-{{ $i }}-{{ $instanceUnique?->isRemoved[$i] }}'
                        class='@if ($instanceUnique?->isRemoved[$i] == true) d-none @endif'>




                        {{-- 1: select --}}
                        <td class="fw-bold tr--{{ $instanceUnique->typeName[$i] }} td--overflow"
                            style="max-width: 250px;" @if(!$versionPermission->menuModuleHasBuilderBrand &&
                            !$versionPermission->menuModuleHasBuilderBrand) colspan='3'
                            @elseif(!$versionPermission->menuModuleHasBuilderConversion) colspan='2'
                            @elseif(!$versionPermission->menuModuleHasBuilderBrand) colspan='2' @endif wire:ignore>
                            <div class="select--single-wrapper builder s mx-auto" style="width: 100%"
                                wire:loading.class='no-events'>
                                <select class="form-select part--select" id='part--select-{{ $i }}'
                                    data-instance='instance.partId.{{ $i }}' data-trigger='true'
                                    data-numberOfSizes='{{ $instanceUnique->numberOfSizes }}'
                                    data-group='{{ $instanceUnique->groupToken[$i] }}' data-i='{{ $i }}'
                                    value='{{ $instanceUnique?->partId[$i] }}' required>
                                    <option value=""></option>


                                    {{-- ** excludingMeal ** --}}
                                    @foreach ($mealOptions?->where('typeId', $instanceUnique->typeId[$i]) ?? []
                                    as $mealOption)
                                    <option value="{{ $mealOption->id }}">{{ $mealOption->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </td>
                        {{-- endTD --}}









                        {{-- 2: brand --}}


                        {{-- :: permission - hasBrand --}}
                        @if ($versionPermission->menuModuleHasBuilderBrand)



                        <td class="fw-bold"></td>



                        @endif
                        {{-- end if - permission --}}








                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}






                        {{-- 3: type --}}
                        <td class="fw-bold" wire:ignore>
                            <div class="select--single-wrapper xxs"
                                style="width: 85px !important; max-width: 85px !important">
                                <select class="form-select part--type-select " id='part--type-select-{{ $i }}'
                                    data-instance='instance.partType.{{ $i }}'
                                    data-numberOfSizes='{{ $instanceUnique->numberOfSizes }}'
                                    data-group='{{ $instanceUnique->groupToken[$i] }}' data-i='{{ $i }}'
                                    value='{{ $instanceUnique?->partType[$i] }}'>
                                    <option value=""></option>
                                    <option value="Main">Main</option>
                                    <option value="Side">Side</option>
                                    <option value="Mixed">Mixed</option>
                                </select>
                            </div>
                        </td>










                        {{-- 4: cookingTypes --}}

                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td></td>

                        @endif
                        {{-- end if - permission --}}




                    </tr>
                    {{-- endRow --}}





                    @endif
                    {{-- end if --}}



                    @endfor
                    {{-- end loop --}}






                </tbody>
            </table>
        </div>
        {{-- endTable --}}





    </div>
    {{-- endCol --}}























    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}












    {{-- 2.5: initialSize --}}
    @php $initSize = $meal?->sizes?->first()?->sizeId ?? null; @endphp





    {{-- loop - mealSizes --}}
    @foreach ($meal?->sizes ?? [] as $mealSize)






    {{-- options --}}
    <div class="col-6 ps-0 @if ($initSize != $mealSize->size->id) d-none @endif" data-instance='mealSizes'
        data-view='size-{{ $mealSize->size->id }}' wire:ignore.self>
        <div class="table-responsive builder--table right memoir--table w-100">
            <table class="table">


                {{-- thead --}}
                <thead>
                    <tr>


                        {{-- 1: grams - cookedGrams --}}
                        <th class="th--sm" colspan="2">Grams</th>



                        {{-- 1.2: percentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)

                        <th class="th--xs"></th>

                        @endif
                        {{-- end if - permission --}}





                        {{-- ------------------------- --}}
                        {{-- ------------------------- --}}




                        {{-- 1.3: macros --}}
                        <th class="th--sm" colspan="1">C</th>
                        <th class="th--sm" colspan="1">P</th>
                        <th class="th--sm" colspan="1">C</th>
                        <th class="th--sm" colspan="1">F</th>



                        {{-- 1.4: cost --}}
                        <th class="th--sm" colspan="1">Cost</th>




                        {{-- 1.5: removable - delete --}}
                        <th class="th--xs" colspan="3">Actions</th>



                    </tr>
                </thead>
                {{-- endHeader --}}







                {{-- --------------------------------------------------------- --}}
                {{-- --------------------------------------------------------- --}}
                {{-- --------------------------------------------------------- --}}
                {{-- --------------------------------------------------------- --}}








                {{-- tbody --}}
                <tbody>







                    {{-- 1: manualAfterCook --}}
                    <tr>


                        {{-- 1.2: grams --}}
                        <td class='border-start-0 h-62' colspan="2">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                wire:loading.attr='readonly' value="{{ $mealSize->afterCookGrams }}"
                                wire:change="updateAfterCookMacros('Grams', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>








                        {{-- 1.3: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        <td colspan="1" style="height: 62px"></td>


                        @endif
                        {{-- end if - permission --}}








                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{-- 1.4: macros --}}



                        {{-- calories --}}
                        <td class="fw-bold" colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                wire:loading.attr='readonly' value="{{ $mealSize->afterCookCalories }}"
                                wire:change="updateAfterCookMacros('Calories', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>




                        {{-- proteins --}}
                        <td colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                wire:loading.attr='readonly' value="{{ $mealSize->afterCookProteins }}"
                                wire:change="updateAfterCookMacros('Proteins', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>






                        {{-- carbs --}}
                        <td colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                wire:loading.attr='readonly' value="{{ $mealSize->afterCookCarbs }}"
                                wire:change="updateAfterCookMacros('Carbs', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>






                        {{-- fats --}}
                        <td colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                wire:loading.attr='readonly' value="{{ $mealSize->afterCookFats }}"
                                wire:change="updateAfterCookMacros('Fats', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>









                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- 1.5: cost --}}
                        <td colspan="1">
                            <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                                wire:loading.attr='readonly' value="{{ $mealSize->afterCookCost }}"
                                wire:change="updateAfterCookMacros('Cost', $event.target.value, {{ $mealSize->id }})"
                                wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                        </td>





                        {{-- 1.6: actions --}}
                        <td colspan="3" class='cell--empty'></td>




                    </tr>
                    {{-- endRow --}}









                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}









                    {{-- 2rd Row --}}





                    {{-- 2: automaticAfterCook --}}

                    {{-- :: permission - inline hasConversion --}}

                    <tr class='@if (!$versionPermission->menuModuleHasBuilderConversion) d-none @endif'>




                        {{-- 2.1: afterCookGrams --}}
                        <td colspan="2" class='border-start-0 h-62'>
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookGrams-total-input"
                                wire:model='instanceOptions.totalAfterCookGrams.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        <td colspan="1"></td>


                        @endif
                        {{-- end if - permission --}}







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- 2.3: macros --}}



                        {{-- CA --}}
                        <td class="fw-bold" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookCalories-total-input"
                                wire:model='instanceOptions.totalAfterCookCalories.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>





                        {{-- P --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookProteins-total-input"
                                wire:model='instanceOptions.totalAfterCookProteins.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>




                        {{-- C --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookCarbs-total-input"
                                wire:model='instanceOptions.totalAfterCookCarbs.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>




                        {{-- F --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--afterCookFats-total-input"
                                wire:model='instanceOptions.totalAfterCookFats.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}







                        {{-- 2.4: cost --}}
                        <td colspan="1" class='border-top'>
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--cost-total-input"
                                wire:model='instanceOptions.totalAfterCookCost.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>






                        {{-- actions --}}
                        <td class='cell--empty' colspan="3"></td>


                    </tr>
                    {{-- endRow --}}














                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}






                    {{-- 3rd Row --}}




                    {{-- 3: automaticRaw --}}
                    <tr>



                        {{-- 3.1: Grams --}}
                        <td colspan="2" class='border-start-0 h-62'>
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--grams-total-input"
                                wire:model='instanceOptions.totalGrams.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)

                        <td colspan="1"></td>

                        @endif
                        {{-- end if - permission --}}







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{-- 3.3: macros --}}





                        {{-- CA --}}
                        <td class="fw-bold" colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--calories-total-input"
                                wire:model='instanceOptions.totalCalories.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>





                        {{-- P --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--proteins-total-input"
                                wire:model='instanceOptions.totalProteins.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>


                        {{-- C --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--carbs-total-input"
                                wire:model='instanceOptions.totalCarbs.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>



                        {{-- F --}}
                        <td colspan="1">
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--fats-total-input"
                                wire:model='instanceOptions.totalFats.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{-- 3.4: cost --}}
                        <td colspan="1" class='border-top'>
                            <input
                                class="form-control form--input form--table-input-sm readonly ingredient--cost-total-input"
                                wire:model='instanceOptions.totalCost.{{ $mealSize->id }}'
                                data-size='{{ $mealSize->id }}' type="number" value="0" readonly="" step='0.01' />
                        </td>




                        {{-- 3.5: actions --}}
                        <td class="cell--empty" colspan="3"></td>


                    </tr>







                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}





                    {{-- 4th Row --}}
                    <tr class="subheader">



                        {{-- 4.1: grams - afterCookGrams - % --}}
                        <td class="fw-bold fs-11 th--sm
                    border-start-0" @if(!$versionPermission->menuModuleHasBuilderConversion) colspan='2'
                            @endif>Raw<small class="fw-semibold text-gold fs-9 ms-1">(G)</small></td>





                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td class="fw-bold fs-11 px-1 th--sm">Cooked<small
                                class="fw-semibold text-gold fs-9 ms-1">(G)</small></td>

                        @endif
                        {{-- end if - permission --}}







                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)

                        <td class="fw-bold fs-11">%</td>

                        @endif
                        {{-- end if - permission --}}






                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}




                        {{-- 4.2: macros --}}



                        {{-- :: permission - hasMacros --}}
                        @if ($versionPermission->menuModuleHasBuilderMacros)



                        <td class="fw-bold fs-11">CA</td>
                        <td class="fw-bold fs-11">P</td>
                        <td class="fw-bold fs-11">C</td>
                        <td class="fw-bold fs-11">F</td>


                        <td class="fw-bold fs-11">Cost</td>

                        @endif
                        {{-- end if --}}





                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- 4.3: removable --}}
                        <td class="fw-bold fs-11 border-top" @if (!$versionPermission->menuModuleHasBuilderMacros)
                            colspan='3' @endif>REM.</td>







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- :: permission - hasReplacements --}}
                        @if ($versionPermission->menuModuleHasBuilderReplacements)


                        <td class="fw-bold fs-11 border-top" @if (!$versionPermission->menuModuleHasBuilderMacros)
                            colspan='2' @endif>DEF.</td>



                        @endif
                        {{-- end if - permission --}}













                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}





                        {{--4.5: delete --}}
                        <td @if (!$versionPermission->menuModuleHasBuilderReplacements) colspan='2' @endif
                            class="fw-bold border-top" ></td>



                    </tr>









                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}






                    {{-- 5th Row --}}




                    {{-- 5.1: loop - items --}}
                    @for ($i = 0; count($instance->typeId ?? []) > $i; $i++)





                    {{-- A: ingredients --}}
                    @if ($instance->type[$i] == 'Ingredient' && $instance->mealSizeId[$i] == $mealSize->id)





                    <tr key='builder-content-options-ingredients-{{ $i }}-{{ $instance->isRemoved[$i] }}'
                        class='@if ($instance?->isRemoved[$i] == true) d-none @endif'>


                        {{-- 1: grams --}}
                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderConversion) colspan='2'
                            @endif>
                            <input id='ingredient--grams-input'
                                class="form-control form--input form--table-input-xxs px-1 ingredient--grams-input"
                                wire:loading.attr='readonly' data-size='{{ $instance->mealSizeId[$i] }}' type="number"
                                step='0.01' required wire:model='instance.amount.{{ $i }}'
                                wire:change='recalculate({{ $i }})'
                                wire:target='toggleRemovable, toggleDefault, remove, recalculate' />
                        </td>








                        {{-- 2: afterCookGrams --}}


                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 ingredient--afterCookGrams-input readonly"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' required
                                wire:model='instance.afterCookGrams.{{ $i }}' readonly=""
                                wire:loading.attr='readonly' />
                        </td>


                        @endif
                        {{-- end if - permission --}}








                        {{-- 3: percentage --}}

                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--percentage-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly="" />
                        </td>



                        @endif
                        {{-- end if - permission --}}









                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}







                        {{-- :: permission - hasMacros --}}
                        @if ($versionPermission->menuModuleHasBuilderMacros)





                        {{-- raw --}}


                        {{-- calories --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--calories-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.calories.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- proteins --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--proteins-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.proteins.{{ $i }}' wire:loading.attr='readonly' />
                        </td>



                        {{-- carbs --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--carbs-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.carbs.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- fats --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--fats-input"
                                type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
                                wire:model='instance.fats.{{ $i }}' wire:loading.attr='readonly' />
                        </td>











                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}





                        {{-- afterCook --}}






                        {{-- calories --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCalories-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.afterCookCalories.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- proteins --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookProteins-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.afterCookProteins.{{ $i }}' wire:loading.attr='readonly' />
                        </td>



                        {{-- carbs --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCarbs-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.afterCookCarbs.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- fats --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookFats-input"
                                type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
                                wire:model='instance.afterCookFats.{{ $i }}' wire:loading.attr='readonly' />
                        </td>








                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}







                        {{-- cost --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--cost-input"
                                type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
                                wire:model='instance.cost.{{ $i }}' wire:loading.attr='readonly' />
                        </td>








                        @endif
                        {{-- end if - permission --}}












                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}









                        {{-- 4: Removable --}}
                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderMacros) colspan='3' @endif>
                            <div class="form-check form-switch mealType--checkbox justify-content-center" wire:ignore>
                                <input class="form-check-input pointer togglers--checkbox removable--checkbox"
                                    type="checkbox" style="width: 30px;" data-group='{{ $instance->groupToken[$i] }}'
                                    @if($instance->isRemovable[$i])
                                checked @endif
                                id="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}"
                                wire:model='instance.isRemovable.{{ $i }}'
                                wire:change="toggleRemovable('{{ $instance->groupToken[$i] }}', '{{ $i }}')"
                                wire:loading.attr='disabled'
                                wire:target='toggleRemovable, toggleDefault, refreshTogglers, remove' />


                                <label class="form-check-label d-none"
                                    for="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}">placeholder</label>
                            </div>
                        </td>








                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}







                        {{-- 5: isDefault --}}



                        {{-- :: permission - hasReplacements --}}
                        @if ($versionPermission->menuModuleHasBuilderReplacements)



                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderMacros) colspan='2' @endif>
                            <div class="form-check form-switch mealType--checkbox justify-content-center" wire:ignore>
                                <input class="form-check-input pointer togglers--checkbox replacement--checkbox"
                                    type="checkbox" style="width: 30px;" data-group='{{ $instance->groupToken[$i] }}'
                                    @if($instance->isDefault[$i])
                                checked @endif
                                id="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}"
                                wire:model='instance.isDefault.{{ $i }}'
                                wire:change="toggleDefault('{{ $instance->groupToken[$i] }}', '{{ $i }}')"
                                wire:loading.attr='disabled'
                                wire:target='toggleRemovable, toggleDefault, refreshTogglers, remove' />


                                <label class="form-check-label d-none"
                                    for="formCheck-replacement-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}">placeholder</label>
                            </div>
                        </td>




                        @endif
                        {{-- end if - permission --}}












                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}







                        {{-- 6: delete --}}
                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderReplacements) colspan='2'
                            @endif>
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn--raw-icon inline remove togglers--checkbox scale--3 px-0 "
                                    type="button" wire:loading.attr='disabled'
                                    wire:target="toggleRemovable, toggleDefault, refreshTogglers, remove"
                                    wire:click="remove('{{ $instance->groupToken[$i] }}')">
                                    <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>






                    </tr>
                    {{-- end singelRow --}}















                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}











                    {{-- B: parts --}}
                    @elseif ($instance->type[$i] == 'Part' && $instance->mealSizeId[$i] == $mealSize->id)







                    <tr key='builder-content-options-part-{{ $i }}-{{ $instance->isRemoved[$i] }}'
                        class='@if ($instance?->isRemoved[$i] == true) d-none @endif'>


                        {{-- 1: grams --}}
                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderConversion) colspan='2'
                            @endif>
                            <input id='ingredient--grams-input'
                                class="form-control form--input form--table-input-xxs px-1 ingredient--grams-input"
                                wire:loading.attr='readonly' data-size='{{ $instance->mealSizeId[$i] }}' type="number"
                                step='0.01' required wire:model='instance.amount.{{ $i }}'
                                wire:change='recalculate({{ $i }})'
                                wire:target='toggleRemovable, toggleDefault, remove, recalculate' />
                        </td>








                        {{-- 2: afterCookGrams --}}


                        {{-- :: permission - hasConversion --}}
                        @if ($versionPermission->menuModuleHasBuilderConversion)

                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 ingredient--afterCookGrams-input readonly"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' required
                                wire:model='instance.afterCookGrams.{{ $i }}' readonly=""
                                wire:loading.attr='readonly' />
                        </td>


                        @endif
                        {{-- end if - permission --}}








                        {{-- 3: percentage --}}

                        {{-- :: permission - hasPercentage --}}
                        @if ($versionPermission->menuModuleHasBuilderPercentage)


                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--percentage-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly="" />
                        </td>



                        @endif
                        {{-- end if - permission --}}









                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}







                        {{-- :: permission - hasMacros --}}
                        @if ($versionPermission->menuModuleHasBuilderMacros)





                        {{-- raw --}}


                        {{-- calories --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--calories-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.calories.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- proteins --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--proteins-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.proteins.{{ $i }}' wire:loading.attr='readonly' />
                        </td>



                        {{-- carbs --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--carbs-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.carbs.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- fats --}}
                        <td class="fw-bold d-none">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--fats-input"
                                type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
                                wire:model='instance.fats.{{ $i }}' wire:loading.attr='readonly' />
                        </td>











                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}





                        {{-- afterCook --}}






                        {{-- calories --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCalories-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.afterCookCalories.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- proteins --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookProteins-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.afterCookProteins.{{ $i }}' wire:loading.attr='readonly' />
                        </td>



                        {{-- carbs --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCarbs-input"
                                data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
                                wire:model='instance.afterCookCarbs.{{ $i }}' wire:loading.attr='readonly' />
                        </td>





                        {{-- fats --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookFats-input"
                                type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
                                wire:model='instance.afterCookFats.{{ $i }}' wire:loading.attr='readonly' />
                        </td>








                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}







                        {{-- cost --}}
                        <td class="fw-bold">
                            <input
                                class="form-control form--input form--table-input-xxs px-1 readonly ingredient--cost-input"
                                type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
                                wire:model='instance.cost.{{ $i }}' wire:loading.attr='readonly' />
                        </td>








                        @endif
                        {{-- end if - permission --}}












                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}









                        {{-- 4: Removable --}}
                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderMacros) colspan='3' @endif>
                            <div class="form-check form-switch mealType--checkbox justify-content-center" wire:ignore>
                                <input class="form-check-input pointer togglers--checkbox removable--checkbox"
                                    type="checkbox" style="width: 30px;" data-group='{{ $instance->groupToken[$i] }}'
                                    @if($instance->isRemovable[$i])
                                checked @endif
                                id="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}"
                                wire:model='instance.isRemovable.{{ $i }}'
                                wire:change="toggleRemovable('{{ $instance->groupToken[$i] }}', '{{ $i }}')"
                                wire:loading.attr='disabled'
                                wire:target='toggleRemovable, toggleDefault, refreshTogglers, remove' />


                                <label class="form-check-label d-none"
                                    for="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}">placeholder</label>
                            </div>
                        </td>






                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}












                        {{-- isDefault --}}



                        {{-- :: permission - hasReplacements --}}
                        @if ($versionPermission->menuModuleHasBuilderReplacements)



                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderMacros) colspan='2' @endif>
                            <div class="form-check form-switch mealType--checkbox justify-content-center" wire:ignore>
                                <input class="form-check-input pointer togglers--checkbox replacement--checkbox"
                                    type="checkbox" style="width: 30px;" data-group='{{ $instance->groupToken[$i] }}'
                                    @if($instance->isDefault[$i])
                                checked @endif
                                id="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}"
                                wire:model='instance.isDefault.{{ $i }}'
                                wire:change="toggleDefault('{{ $instance->groupToken[$i] }}', '{{ $i }}')"
                                wire:loading.attr='disabled'
                                wire:target='toggleRemovable, toggleDefault, refreshTogglers, remove' />


                                <label class="form-check-label d-none"
                                    for="formCheck-replacement-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}">placeholder</label>
                            </div>
                        </td>




                        @endif
                        {{-- end if - permission --}}












                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}







                        {{-- 6: delete --}}
                        <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderReplacements) colspan='2'
                            @endif>
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn--raw-icon inline remove togglers--checkbox scale--3 px-0 "
                                    type="button" wire:loading.attr='disabled'
                                    wire:target="toggleRemovable, toggleDefault, refreshTogglers, remove"
                                    wire:click="remove('{{ $instance->groupToken[$i] }}')">
                                    <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>








                        {{-- --------------------------------- --}}
                        {{-- --------------------------------- --}}






                        {{-- 7: remarks --}}
                        <td class="fw-bold d-none">
                            <input class="form-control form--input form--table-input-sm px-2" style="max-width: 100%;"
                                type="text" wire:model='instance.remarks' wire:change='update'
                                wire:loading.attr='readonly' wire:target='remove, toggle, init' />
                        </td>




                    </tr>
                    {{-- end singelRow --}}




                    @endif
                    {{-- end if --}}





                    @endfor
                    {{-- end loop --}}






                </tbody>
            </table>
            {{-- end table --}}



        </div>
    </div>
    {{-- endCol --}}















    @endforeach
    {{-- end loop --}}














    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}











    {{-- submitButton --}}
    <div class="col-12 text-center">


        <button
            class="btn btn--scheme btn--scheme-2 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
            style="border: 1px dashed var(--color-scheme-3); width: 200px" wire:loading.attr="disabled">Update</button>


    </div>









    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










    {{-- selectHandle --}}
    <script>
        $('body').on('change', `.part--select`, function(event) {


            // 1.1: getValue - instance
            i = parseInt($(this).attr('data-i'));
            group = $(this).attr('data-group');
            selectValue = $(this).select2('val');
            sizes = parseInt($(this).attr('data-numberOfSizes'));
            index = parseInt($(this).attr('data-i')) * sizes;



            // 1.2: setValues
            @this.set(`instanceUnique.partId.${i}`, selectValue);
            @this.getPartBrands(i, selectValue);


            for (let i = 0; i < sizes; i++) {

                @this.set(`instance.partId.${index}`, selectValue);
                @this.set(`instance.partBrandId.${index}`, null);
                @this.recalculate(index);

                index += 1;

            } // end loop


        });
    </script>










    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--brand-select`, function(event) {



            // 1.1: getValue - instance
            i = parseInt($(this).attr('data-i'));
            group = $(this).attr('data-group');
            selectValue = $(this).select2('val');
            sizes = parseInt($(this).attr('data-numberOfSizes'));
            index = parseInt($(this).attr('data-i')) * sizes;
            indexSecond = parseInt($(this).attr('data-i')) * sizes;



            // 1.2: setValues
            @this.set(`instanceUnique.partBrandId.${i}`, selectValue);


            for (let i = 0; i < sizes; i++) {

                @this.set(`instance.partBrandId.${index}`, selectValue);
                @this.recalculate(index);
                index += 1;

            } // end loop


        });
    </script>












    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--type-select`, function(event) {



            // 1.1: getValue - instance
            i = parseInt($(this).attr('data-i'));
            group = $(this).attr('data-group');
            selectValue = $(this).select2('val');
            sizes = parseInt($(this).attr('data-numberOfSizes'));
            index = parseInt($(this).attr('data-i')) * sizes;




            // 1.2: setValues
            @this.set(`instanceUnique.partType.${i}`, selectValue);


            for (let i = 0; i < sizes; i++) {

                @this.set(`instance.partType.${index}`, selectValue);
                @this.set(`instance.cookingTypeId.${index}`, null);
                index += 1;

            } // end loop


        });
    </script>












    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--cooking-type-select`, function(event) {



        // 1.1: getValue - instance
        i = parseInt($(this).attr('data-i'));
        group = $(this).attr('data-group');

        selectValue = $(this).select2('val');
        sizes = parseInt($(this).attr('data-numberOfSizes'));
        index = parseInt($(this).attr('data-i')) * sizes;





        // 1.2: setValues
        for (let i = 0; i < sizes; i++) {

            @this.set(`instance.cookingTypeId.${index}`, selectValue);
            @this.recalculate(index);

            index += 1;

        } // end loop





    });
    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- sync removable - replacement in UI --}}
    <script>



    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










</form>
{{-- endWrapper --}}