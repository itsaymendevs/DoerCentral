<tr key='single-part-{{ $i }}' wire:ignore.self>




    {{-- select --}}
    <td class="fw-bold tr--{{ $instance->typeName[$i] }} td--overflow" style="max-width: 270px;" wire:ignore>
        <div class="select--single-wrapper builder s mx-auto" wire:loading.class='no-events' style="width: 100%">
            <select class="form-select part--select" id='part--select-{{ $i }}' data-instance='instance.partId.{{ $i }}'
                data-instanceIndex='{{ $i }}' required value='{{ $instance?->partId[$i] }}'>
                <option value=""></option>


                {{-- ** excludingMeal ** --}}
                @foreach ($mealOptions?->where('typeId', $instance->typeId[$i]) ?? []
                as $mealOption)
                <option value="{{ $mealOption->id }}">{{ $mealOption->name }}</option>
                @endforeach

            </select>
        </div>
    </td>
    {{-- endTD --}}







    {{-- type --}}
    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" wire:loading.class='no-events'
            style="width: 85px !important; max-width: 85px !important">
            <select class="form-select part--type-select " id='part--type-select-{{ $i }}'
                data-instance='instanceParts.partType.{{ $i }}' data-instanceIndex='{{ $i }}'
                value='{{ $instance?->partType[$i] }}' required>
                <option value=""></option>
                <option value="Main">Main</option>
                <option value="Side">Side</option>
                <option value="Mixed">Mixed</option>
            </select>
        </div>
    </td>










    {{--cookingTypes --}}

    {{-- :: permission - hasConversion --}}
    @if ($versionPermission->menuModuleHasBuilderConversion)

    <td></td>

    @endif
    {{-- end if - permission --}}



</tr>