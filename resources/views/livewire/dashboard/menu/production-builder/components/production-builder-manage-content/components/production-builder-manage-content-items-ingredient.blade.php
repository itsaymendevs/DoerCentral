<tr key='single-ingredient-{{ $i }}' class='@if ($instance?->isRemoved[$i] == true) d-none @endif'>




    {{-- 1: select --}}
    <td class="fw-bold tr--{{ $instance->typeName[$i] }} td--overflow" style="max-width: 250px;"
        @if(!$versionPermission->menuModuleHasBuilderConversion) colspan='2' @endif wire:ignore>
        <div class="select--single-wrapper builder mx-auto" style="width: 100% !important;">
            <select class="form-select part--select" id='part--select-{{ $i }}' data-instance='instance.partId.{{ $i }}'
                data-numberOfSizes='{{ $instance->numberOfSizes }}' data-i='{{ $i }}'
                data-group='{{ $instance->groupToken[$i] }}' value="{{ $instance->partId[$i] }}" required>
                <option value=""></option>

                @foreach ($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach

            </select>
        </div>
    </td>









    {{-- 2: brand --}}

    {{-- :: permission - hasBrand --}}
    @if ($versionPermission->menuModuleHasBuilderConversion)


    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" style="width: 95px !important; max-width: 95px !important">
            <select class="form-select part--brand-select" id='part--brand-select-{{ $i }}'
                data-instance='instance.partBrandId.{{ $i }}' data-numberOfSizes='{{ $instance->numberOfSizes }}'
                data-group='{{ $instance->groupToken[$i] }}' data-i='{{ $i }}'
                value='{{ $instance?->partBrandId[$i] }}'>
                <option value=""></option>
            </select>
        </div>
    </td>


    @endif
    {{-- end if - permission --}}






    {{-- ------------------------------------------------- --}}
    {{-- ------------------------------------------------- --}}







    {{-- 3: type --}}
    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" style="width: 85px !important; max-width: 85px !important">
            <select class="form-select part--type-select" id='part--type-select-{{ $i }}'
                data-instance='instance.partType.{{ $i }}' data-numberOfSizes='{{ $instance->numberOfSizes }}'
                data-group='{{ $instance->groupToken[$i] }}' data-i='{{ $i }}' value="{{ $instance->partType[$i] }}">
                <option value=""></option>
                <option value="Main">Main</option>
                <option value="Side">Side</option>
                <option value="Mixed">Mixed</option>
            </select>
        </div>
    </td>









    {{-- 4: cookingType --}}


    {{-- :: permission inline - hasConversion --}}
    <td class="fw-bold px-0
        @if (!$versionPermission->menuModuleHasBuilderConversion || $instance?->partType[$i] != 'Main') d-none @endif">
        <div class="select--single-wrapper builder mx-auto" wire:ignore
            style="width: 155px !important; max-width: 155px !important">
            <select class="form-select part--cooking-type-select" id='part--cooking-type-select-{{ $i }}'
                data-instance='instance.cookingTypeId.{{ $i }}' data-withValue='true'
                data-group='{{ $instance->groupToken[$i] }}' data-numberOfSizes='{{ $instance->numberOfSizes }}'
                data-i='{{ $i }}' value="{{ $instance->cookingTypeId[$i] }}">
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