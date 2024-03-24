<tr id='{{ $instance->id }}'>


    {{-- days --}}
    <td>
        <input class="form-control form--input form--table-input-md" type="number" step='1' wire:model='instance.days'
            required wire:change='update'>
    </td>


    {{-- discount --}}
    <td>
        <input class="form-control form--input form--table-input-md" type="number" step='0.01' required
            wire:model='instance.discount' wire:change='update'>
    </td>




    {{-- rangePrices - tooltip --}}
    <td>
        <button
            class="btn btn--raw-icon fs-15 text-warning d-inline-flex align-items-center justify-content-center scale--3 w-auto"
            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true' type="button"
            title="{{ implode('<br />', $bundleDay->rangesByDiscount()) }}">
            Range Prices
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                class="bi bi-list-nested fs-6 ms-2" style="fill: var(--bs-warning);">
                <path fill-rule="evenodd"
                    d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                </path>
            </svg>
        </button>
    </td>






    {{-- remove --}}
    <td>
        <button class="btn btn--raw-icon scale--3" type="button" wire:click='remove({{ $instance?->id }})'
            wire:loading.attr='disabled' wire:target='remove, update'>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                class="bi bi-trash fs-5" style="fill: var(--delete-color);">
                <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                </path>
                <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                </path>
            </svg>
        </button>
    </td>


</tr>
{{-- endRow --}}