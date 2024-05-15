{{-- singleRow --}}
<tr id='{{ strtolower($instance->typeId) }}-{{ $instance->id }}'>


    {{-- @if (!$versionPermission->menuModuleHasBuilderPercentage) colspan='2' @endif --}}
    {{-- amount - grams --}}
    <td class="fw-bold">
        <input id='ingredient--grams-input-{{ $instance->typeId }}-{{ $instance->id }}'
            class="form-control form--input form--table-input-xxs px-1 ingredient--grams-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' required wire:model='instance.amount'
            wire:change='update' wire:loading.attr='readonly' wire:target='remove, update, init' />
    </td>





    {{-- afterCookGrams - Amount --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 ingredient--afterCookGrams-input readonly"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' required
            wire:model='instance.afterCookGrams' readonly="" wire:loading.attr='readonly' />
    </td>






    {{-- percentage --}}


    {{-- :: permission - hasPercentage --}}
    @if ($versionPermission->menuModuleHasBuilderPercentage)


    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--percentage-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly="" />
    </td>



    @endif
    {{-- end if - permission --}}









    {{-- ------- macros --------- --}}








    {{-- calories --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--calories-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly="" wire:model='instance.calories'
            wire:loading.attr='readonly' />
    </td>







    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}





    {{-- :: permission - hasMacros --}}
    @if ($versionPermission->menuModuleHasBuilderMacros)




    {{-- proteins --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--proteins-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly="" wire:model='instance.proteins'
            wire:loading.attr='readonly' />
    </td>



    {{-- carbs --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--carbs-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly="" wire:model='instance.carbs'
            wire:loading.attr='readonly' />
    </td>





    {{-- fats --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--fats-input" type="number"
            data-size='{{ $instance->mealSizeId }}' step='0.01' readonly="" wire:model='instance.fats'
            wire:loading.attr='readonly' />
    </td>








    {{-- Hidden --}}
    @else








    {{-- proteins --}}
    <td class="fw-bold invisible">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--proteins-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly="" wire:model='instance.proteins'
            wire:loading.attr='readonly' />
    </td>



    {{-- carbs --}}
    <td class="fw-bold invisible">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--carbs-input"
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly="" wire:model='instance.carbs'
            wire:loading.attr='readonly' />
    </td>





    {{-- fats --}}
    <td class="fw-bold invisible">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--fats-input" type="number"
            data-size='{{ $instance->mealSizeId }}' step='0.01' readonly="" wire:model='instance.fats'
            wire:loading.attr='readonly' />
    </td>






    @endif
    {{-- end if - permission --}}









    {{-- cost --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--cost-input" type="number"
            data-size='{{ $instance->mealSizeId }}' step='0.01' readonly="" wire:model='instance.cost'
            wire:loading.attr='readonly' />
    </td>











    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}




    {{-- :: afterCook Hidden --}}



    {{-- calories --}}
    <td class='d-none'>
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCalories-input "
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly=""
            wire:model='instance.afterCookCalories' wire:loading.attr='readonly' />




        {{-- proteins --}}
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookProteins-input "
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly=""
            wire:model='instance.afterCookProteins' wire:loading.attr='readonly' />



        {{-- carbs --}}
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookCarbs-input "
            data-size='{{ $instance->mealSizeId }}' type="number" step='0.01' readonly=""
            wire:model='instance.afterCookCarbs' wire:loading.attr='readonly' />





        {{-- fats --}}
        <input class="form-control form--input form--table-input-xxs px-1 readonly ingredient--afterCookFats-input "
            type="number" data-size='{{ $instance->mealSizeId }}' step='0.01' readonly=""
            wire:model='instance.afterCookFats' wire:loading.attr='readonly' />

    </td>





    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}











    {{-- remarks --}}
    {{-- <td class="fw-bold">
        <input class="form-control form--input form--table-input-sm px-2" style="max-width: 100%;" type="text"
            wire:model='instance.remarks' wire:change='update' wire:loading.attr='readonly'
            wire:target='remove, update, init' />
    </td> --}}








    {{-- removableFromItem --}}
    <td class="fw-bold">
        <div class="form-check form-switch mealType--checkbox justify-content-center">


            <input class="form-check-input pointer removable--checkbox" type="checkbox"
                data-group='{{ $instance->groupToken }}' @if($this->instance->isRemovable) checked @endif
            id="formCheck-{{ strtolower($instance->typeId) }}-{{ $instance->id }}" wire:model='instance.isRemovable'
            wire:change='update' wire:loading.attr='disabled' wire:target='update, remove, init' />


            <label class="form-check-label d-none"
                for="formCheck-{{ strtolower($instance->typeId) }}-{{ $instance->id }}">placeholder</label>
        </div>
    </td>











    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}







    {{-- isReplacement --}}



    {{-- :: permission - hasReplacements --}}
    @if ($versionPermission->menuModuleHasBuilderReplacements)




    <td class="fw-bold">
        <div class="form-check form-switch mealType--checkbox justify-content-center">


            <input class="form-check-input pointer replacement--checkbox" data-group='{{ $instance->groupToken }}'
                type="checkbox" @if($this->instance->isReplacement) checked @endif
            id="formCheck-replacement-{{ strtolower($instance->typeId) }}-{{ $instance->id }}"
            wire:model='instance.isReplacement'
            wire:change='update' wire:loading.attr='disabled' wire:target='update, remove, init' />


            <label class="form-check-label d-none"
                for="formCheck-replacement-{{ strtolower($instance->typeId) }}-{{ $instance->id }}">placeholder</label>
        </div>
    </td>





    @endif
    {{-- end if - permission --}}












    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}







    {{-- remove Ingredient - stretch --}}
    <td class="fw-bold" @if (!$versionPermission->menuModuleHasBuilderReplacements) colspan='2' @endif>
        <div class="d-flex align-items-center justify-content-center">
            <button class="btn btn--raw-icon inline remove scale--3 px-0 " type="button" wire:loading.attr='disabled'
                wire:target='remove, update, init' wire:click='remove({{ $instance->id }})'>
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