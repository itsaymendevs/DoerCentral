{{-- singleRange  --}}
<tr>


   {{-- 1: ID - caloriesRange - desc --}}
   <td>{{ $instance->name }}</td>

   <td>
      <input class="form-control form--input form--table-input-md" type="text" wire:model='instance.caloriesRange'
         wire:change="update()" wire:loading.attr='readonly' wire:taget='update, remove' />
   </td>

   <td>
      <input class="form-control form--input form--table-input" type="text" wire:model='instance.desc'
         wire:change="update()" wire:loading.attr='readonly' wire:taget='update, remove' />
   </td>




   {{-- toggleForWebsite --}}
   <td>
      <div class="form-check form-switch form-check-inline input--switch">
         <input class="form-check-input" id="formCheck-{{ $instance->id }}" type="checkbox"
            @if ($instance->isForWebsite) checked @endif wire:model='instance.isForWebsite'
            wire:change="toggleForWebsite({{ $instance->id }})" wire:loading.attr='readonly'
            wire:taget='update, remove' />
         <label class="form-check-label d-none" for="formCheck-{{ $instance->id }}">Label</label>
      </div>
   </td>





   {{-- removeRange --}}
   <td>
      <button class="btn btn--raw-icon scale--3" type="button" wire:click='remove({{ $instance->id }})'
         wire:loading.attr='disabled' wire:target='remove, update'>
         <svg class="bi bi-trash fs-5" style="fill: var(--delete-color)" xmlns="http://www.w3.org/2000/svg"
            width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
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
{{-- end singleRange --}}
