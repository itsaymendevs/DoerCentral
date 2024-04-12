{{-- singleRow --}}
<tr>


    {{-- name - desc --}}
    <td class="fw-bold">AG-{{ $instance->id }}</td>

    <td class="fw-bold">
        <input class="form-control form--input form--table-input" type="text" wire:model='instance.name' required
            wire:change='update' />
    </td>


    <td class="fw-bold">
        <textarea class="form-control form--input form--textarea" wire:model='instance.desc' wire:change='update'
            required></textarea>
    </td>






    {{-- actions --}}
    <td>


        <div class="d-flex align-items-center justify-content-center">



            {{-- edit --}}
            <button class="btn btn--raw-icon inline scale--3" type="button"
                wire:click='editIngredients({{ $instance->id }})' data-bs-toggle='modal' data-bs-target='#edit-allergy'>
                <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                    </path>
                </svg>
            </button>





            {{-- remove --}}
            <button class="btn btn--raw-icon inline remove scale--3" type="button"
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