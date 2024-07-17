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




                    {{-- 1.5: removable - default - delete --}}
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
                            value="{{ $mealSize->afterCookGrams }}"
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
                    <td colspan="1">
                        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                            value="{{ $mealSize->afterCookCarbs }}"
                            wire:change="updateAfterCookMacros('Carbs', $event.target.value, {{ $mealSize->id }})"
                            wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                    </td>






                    {{-- fats --}}
                    <td colspan="1">
                        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                            value="{{ $mealSize->afterCookFats }}"
                            wire:change="updateAfterCookMacros('Fats', $event.target.value, {{ $mealSize->id }})"
                            wire:loading.attr='readonly' wire:target='updateAfterCookMacros' required />
                    </td>









                    {{-- ---------------------- --}}
                    {{-- ---------------------- --}}






                    {{-- 1.5: cost --}}
                    <td colspan="1">
                        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
                            value="{{ $mealSize->afterCookCost }}"
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
                            wire:model='instanceOptions.totalGrams.{{ $mealSize->id }}' data-size='{{ $mealSize->id }}'
                            type="number" value="0" readonly="" step='0.01' />
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
                            wire:model='instanceOptions.totalCarbs.{{ $mealSize->id }}' data-size='{{ $mealSize->id }}'
                            type="number" value="0" readonly="" step='0.01' />
                    </td>



                    {{-- F --}}
                    <td colspan="1">
                        <input
                            class="form-control form--input form--table-input-sm readonly ingredient--fats-total-input"
                            wire:model='instanceOptions.totalFats.{{ $mealSize->id }}' data-size='{{ $mealSize->id }}'
                            type="number" value="0" readonly="" step='0.01' />
                    </td>







                    {{-- ---------------------- --}}
                    {{-- ---------------------- --}}





                    {{-- 3.4: cost --}}
                    <td colspan="1" class='border-top'>
                        <input
                            class="form-control form--input form--table-input-sm readonly ingredient--cost-total-input"
                            wire:model='instanceOptions.totalCost.{{ $mealSize->id }}' data-size='{{ $mealSize->id }}'
                            type="number" value="0" readonly="" step='0.01' />
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









                    {{-- 4.4: default --}}

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
                @if ($instance->type[$i] == 'Ingredient' && $instance->mealSizeId[$i] == $mealSize->id &&
                $instance->isRemoved[$i] == false)





                <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-options-ingredients
                    :instance='$instance' i='{{ $i }}' id='{{ $mealSize->id }}'
                    key='builder-content-options-ingredients-{{ $i }}' />





                {{-- B: parts --}}
                @elseif ($instance->type[$i] == 'Part' && $instance->mealSizeId[$i] == $mealSize->id &&
                $instance->isRemoved[$i] == false)



                <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-options-parts
                    :instance='$instance' i='{{ $i }}' id='{{ $mealSize->id }}'
                    key='builder-content-options-ingredients-{{ $i }}' />




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