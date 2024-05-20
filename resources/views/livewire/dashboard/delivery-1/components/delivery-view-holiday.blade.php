{{-- singleRow --}}
<tr>

    {{-- weekday --}}
    <td class="fs-6 fw-bold">{{ $instance->weekday }}</td>



    {{-- checkbox --}}
    <td class="fw-bold">
        <div class="form-check form-switch form-check-inline input--switch">
            <input class="form-check-input pointer" id="formCheck-{{ $instance->cityId }}-{{ $instance->weekday }}"
                type="checkbox" @if ($instance->isActive) checked @endif wire:change='toggleActive({{ $instance->id
            }})'>
            <label class="form-check-label d-none"
                for="formCheck-{{ $instance->cityId }}-{{ $instance->weekday }}">Label</label>
        </div>
    </td>





    {{-- message --}}
    <td class="fs-6 fw-bold text-theme">
        <input class="form-control form--input form--table-input text-start" type="text"
            wire:change='update({{ $instance->id }})' wire:model.live='instance.message'>
    </td>


</tr>
{{-- end singleRow --}}