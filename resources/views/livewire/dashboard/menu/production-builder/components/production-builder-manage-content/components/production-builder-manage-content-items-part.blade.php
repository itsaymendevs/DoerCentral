<tr key='single-part-{{ $i }}' class='@if ($instance?->isRemoved[$i] == true) d-none @endif'>




    {{-- 1: select --}}
    <td class="fw-bold tr--{{ $instance->typeName[$i] }} td--overflow" style="max-width: 250px;"
        @if(!$versionPermission->menuModuleHasBuilderConversion) colspan='2' @endif wire:ignore>
        <div class="select--single-wrapper builder s mx-auto" style="width: 100%">
            <select class="form-select part--select" id='part--select-{{ $i }}' data-instance='instance.partId.{{ $i }}'
                data-numberOfSizes='{{ $instance->numberOfSizes }}' data-group='{{ $instance->groupToken[$i] }}'
                data-i='{{ $i }}' value='{{ $instance?->partId[$i] }}' required>
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









    {{-- 2: brand --}}


    {{-- :: permission - hasBrand --}}
    @if ($versionPermission->menuModuleHasBuilderConversion)



    <td class="fw-bold"></td>



    @endif
    {{-- end if - permission --}}








    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}






    {{-- 3: type --}}
    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" style="width: 85px !important; max-width: 85px !important">
            <select class="form-select part--type-select " id='part--type-select-{{ $i }}'
                data-instance='instance.partType.{{ $i }}' data-numberOfSizes='{{ $instance->numberOfSizes }}'
                data-group='{{ $instance->groupToken[$i] }}' data-i='{{ $i }}' value='{{ $instance?->partType[$i] }}'>
                <option value=""></option>
                <option value="Main">Main</option>
                <option value="Side">Side</option>
                <option value="Mixed">Mixed</option>
            </select>
        </div>
    </td>










    {{-- 4: cookingTypes --}}

    {{-- :: permission - hasConversion --}}
    @if ($versionPermission->menuModuleHasBuilderConversion)

    <td></td>

    @endif
    {{-- end if - permission --}}









</tr>
{{-- endRow --}}