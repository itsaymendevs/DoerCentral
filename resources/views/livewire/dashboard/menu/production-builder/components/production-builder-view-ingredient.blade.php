{{-- singleRow --}}
<tr id='{{ strtolower($instance->typeId) }}-{{ $instance->id }}'>



    {{-- amount --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1" type="number" step='0.01' required
            wire:model='instance.amount' wire:change='update' />
    </td>







    {{-- ------- macros --}}








    {{-- calories --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly" type="number" step='0.01'
            readonly="" wire:model='instance.calories' />
    </td>


    {{-- proteins --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly" type="number" step='0.01'
            readonly="" wire:model='instance.proteins' />
    </td>



    {{-- carbs --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly" type="number" step='0.01'
            readonly="" wire:model='instance.carbs' />
    </td>





    {{-- fats --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-xxs px-1 readonly" type="number" step='0.01'
            readonly="" wire:model='instance.fats' />
    </td>








    {{-- --------------- --}}
    {{-- --------------- --}}








    {{-- remarks --}}
    <td class="fw-bold">
        <input class="form-control form--input form--table-input-sm px-2" style="max-width: 100%;" type="text"
            wire:model='instance.remarks' wire:change='update' />
    </td>








    {{-- removableFromItem --}}
    <td class="fw-bold">
        <div class="form-check form-switch mealType--checkbox justify-content-center">


            <input class="form-check-input pointer" type="checkbox" @if ($this->instance->isRemovable)
            checked @endif
            id="formCheck-{{ strtolower($instance->typeId) }}-{{ $instance->id }}" wire:model='instance.isRemovable'
            wire:change='update' />


            <label class="form-check-label d-none"
                for="formCheck-{{ strtolower($instance->typeId) }}-{{ $instance->id }}">placeholder</label>
        </div>
    </td>







    {{-- isReplacement --}}
    <td class="fw-bold">
        <div class="form-check form-switch mealType--checkbox justify-content-center">


            <input class="form-check-input pointer" type="checkbox" @if ($this->instance->isReplacement)
            checked @endif
            id="formCheck-replacement-{{ strtolower($instance->typeId) }}-{{ $instance->id }}"
            wire:model='instance.isReplacement'
            wire:change='update' />


            <label class="form-check-label d-none"
                for="formCheck-replacement-{{ strtolower($instance->typeId) }}-{{ $instance->id }}">placeholder</label>
        </div>
    </td>









    {{-- remove Ingredient --}}
    <td class="fw-bold">
        <div class="d-flex align-items-center justify-content-center">
            <button class="btn btn--raw-icon inline remove scale--3 px-0" type="button" wire:loading.attr='disabled'
                wire:click='remove({{ $instance->id }})'>
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