{{-- singleRow --}}
<tr>

    {{-- name --}}
    <td class="fs-6 fw-bold">
        <input class="form-control form--input form--table-input" type="text" wire:model='instance.name'
            wire:change='update' required />
    </td>

    {{-- calories --}}
    <td class="fs-6">
        <input class="form-control form--input form--table-input-sm" type="number" step='0.01'
            wire:model='instance.calories' wire:change='update' required />
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


    {{-- remove --}}
    <td>
        <div class="d-flex align-items-center justify-content-center">
            <button class="btn btn--raw-icon inline remove scale--3" type="button" wire:loading.attr='disabled'
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
{{-- end singleRow --}}