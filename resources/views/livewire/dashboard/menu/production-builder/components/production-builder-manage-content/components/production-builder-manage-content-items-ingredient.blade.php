<tr key='single-ingredient-{{ $i }}'>




    {{-- select --}}
    <td class="fw-bold tr--{{ $instance->typeName[$i] }} td--overflow" style="max-width: 270px;" wire:ignore>
        <div class="select--single-wrapper builder mx-auto" wire:loading.class='no-events'
            style="width: 100% !important;">
            <select class="form-select part--select" id='part--select-{{ $i }}' data-instance='instance.partId.{{ $i }}'
                data-instanceIndex='{{ $i }}' value="{{ $instance->partId[$i] }}" required>
                <option value=""></option>

                @foreach ($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach

            </select>
        </div>
    </td>







    {{-- type --}}
    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" wire:loading.class='no-events'
            style="width: 85px !important; max-width: 85px !important">
            <select class="form-select part--type-select" id='part--type-select-{{ $i }}'
                data-instance='instance.partType.{{ $i }}' data-instanceIndex='{{ $i }}' required
                value="{{ $instance->partType[$i] }}">
                <option value=""></option>
                <option value="Main">Main</option>
                <option value="Side">Side</option>
                <option value="Mixed">Mixed</option>
            </select>
        </div>
    </td>









    {{-- cookingType --}}


    {{-- :: permission inline - hasConversion --}}
    <td
        class="fw-bold px-0 @if (!$versionPermission->menuModuleHasBuilderConversion || $instance?->partType[$i] != 'Main') d-none @endif">



        <div class="select--single-wrapper builder mx-auto" wire:loading.class='no-events' wire:ignore
            style="width: 155px !important; max-width: 155px !important">
            <select class="form-select part--cooking-type-select" id='part--cooking-type-select-{{ $i }}'
                data-instance='instance.cookingTypeId.{{ $i }}' data-instanceIndex='{{ $i }}'
                value="{{ $instance->cookingTypeId[$i] }}" required>
                <option value=""></option>


                @foreach ($cookingTypes ?? [] as $cookingType)
                <option value="{{ $cookingType->id }}">{{ $cookingType->name }}</option>
                @endforeach

            </select>
        </div>
    </td>






    {{-- fallback --}}
    @if ($instance->partType[$i] != 'Main')

    <td></td>

    @endif
    {{-- end if --}}




</tr>
{{-- end loop --}}