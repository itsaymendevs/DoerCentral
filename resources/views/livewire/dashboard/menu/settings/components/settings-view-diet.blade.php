{{-- singleRow --}}
<tr>


    {{-- id --}}
    <td class="fw-bold">DT-{{ $instance->id }}</td>


    {{-- name --}}
    <td>
        <input wire:model.live='instance.name' required wire:change='update'
            class="form-control form--input form--table-input" type="text" />
    </td>






    {{-- proteins --}}
    <td class="fs-6">
        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
            wire:model='instance.proteins' wire:change='update' required />
    </td>

    {{-- carbs --}}
    <td class="fs-6">
        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
            wire:model='instance.carbs' wire:change='update' required />
    </td>

    {{-- fats --}}
    <td class="fs-6">
        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
            wire:model='instance.fats' wire:change='update' required />
    </td>





    {{-- desc --}}
    <td>
        <textarea class="form-control form--input form--textarea form--table-textarea" wire:model.live='instance.desc'
            wire:change='update' required></textarea>
    </td>


    {{-- remove --}}
    <td>
        <div class="d-flex align-items-center justify-content-center">
            <button class="btn btn--raw-icon inline remove scale--3" type="button"
                wire:click='remove({{ $instance->id }})' wire:loading.attr='disabled' wire:target='remove, update'>
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
{{-- end singleRow --}}
