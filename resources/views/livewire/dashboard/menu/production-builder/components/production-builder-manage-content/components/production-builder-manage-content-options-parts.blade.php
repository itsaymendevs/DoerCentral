<tr class='@if ($instance?->isRemoved[$i] == true) d-none @endif'>


    {{-- 1: grams --}}
    <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderConversion) colspan='2' @endif>
        <input id='ingredient--grams-input'
            class="form-control form--input form--table-input-xxs px-1 ingredient--grams-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' required
            wire:model='instance.amount.{{ $i }}' wire:change='recalculate' wire:target='remove, recalculate' />
    </td>








    {{-- 2: afterCookGrams --}}


    {{-- :: permission - hasConversion --}}
    @if ($versionPermission->menuModuleHasBuilderConversion)

    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 ingredient--afterCookGrams-input readonly"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' required
            wire:model='instance.afterCookGrams.{{ $i }}' readonly="" wire:loading.attr='readonly' />
    </td>


    @endif
    {{-- end if - permission --}}








    {{-- 3: percentage --}}

    {{-- :: permission - hasPercentage --}}
    @if ($versionPermission->menuModuleHasBuilderPercentage)


    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--percentage-input"
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





    {{-- calories --}}
    <td class="fw-bold d-none">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--calories-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
            wire:model='instance.calories.{{ $i }}' wire:loading.attr='readonly' />
    </td>





    {{-- proteins --}}
    <td class="fw-bold d-none">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--proteins-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
            wire:model='instance.proteins.{{ $i }}' wire:loading.attr='readonly' />
    </td>



    {{-- carbs --}}
    <td class="fw-bold d-none">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--carbs-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
            wire:model='instance.carbs.{{ $i }}' wire:loading.attr='readonly' />
    </td>





    {{-- fats --}}
    <td class="fw-bold d-none">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--fats-input" type="number"
            data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly="" wire:model='instance.fats.{{ $i }}'
            wire:loading.attr='readonly' />
    </td>







    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}





    {{-- afterCook --}}




    {{-- calories --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCalories-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
            wire:model='instance.afterCookCalories.{{ $i }}' wire:loading.attr='readonly' />
    </td>





    {{-- proteins --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookProteins-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
            wire:model='instance.afterCookProteins.{{ $i }}' wire:loading.attr='readonly' />
    </td>



    {{-- carbs --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCarbs-input"
            data-size='{{ $instance->mealSizeId[$i] }}' type="number" step='0.01' readonly=""
            wire:model='instance.afterCookCarbs.{{ $i }}' wire:loading.attr='readonly' />
    </td>





    {{-- fats --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookFats-input"
            type="number" data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly=""
            wire:model='instance.afterCookFats.{{ $i }}' wire:loading.attr='readonly' />
    </td>








    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}








    {{-- cost --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--cost-input" type="number"
            data-size='{{ $instance->mealSizeId[$i] }}' step='0.01' readonly="" wire:model='instance.cost.{{ $i }}'
            wire:loading.attr='readonly' />
    </td>






    @endif
    {{-- end if - permission --}}









    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}











    {{-- 4: Removable --}}
    <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderMacros) colspan='3' @endif>
        <div class="form-check form-switch mealType--checkbox justify-content-center" wire:ignore>
            <input class="form-check-input pointer togglers--checkbox removable--checkbox" type="checkbox"
                style="width: 30px;" data-group='{{ $instance->groupToken[$i] }}' @if($this->instance->isRemovable[$i])
            checked @endif
            id="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}"
            wire:model='instance.isRemovable.{{ $i }}'
            wire:change='toggleRemovable' wire:loading.attr='disabled'
            wire:target="toggleRemovable, refreshTogglers, remove" />


            <label class="form-check-label d-none"
                for="formCheck-{{ strtolower($instance->type[$i]) }}-{{ $instance->id[$i] }}">placeholder</label>
        </div>
    </td>

















    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}







    {{-- 6: delete --}}
    <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderReplacements) colspan='2' @endif wire:ignore>
        <div class="d-flex align-items-center  justify-content-center">
            <button class="btn btn--raw-icon inline remove togglers--checkbox scale--3 px-0 " type="button"
                wire:loading.attr='disabled' wire:target="toggleRemovable, refreshTogglers, remove" wire:click='remove'>
                <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                    </path>
                </svg>
            </button>
        </div>
    </td>






</tr>
{{-- end singelRow --}}