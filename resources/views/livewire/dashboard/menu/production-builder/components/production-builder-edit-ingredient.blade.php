{{-- singleRow - part --}}
<tr id='{{ strtolower($instance->typeId) }}-{{ $instance->id }}'>





    {{-- coloringTD --}}
    <td class="fw-bold tr--{{ $instance->typeId == 'Ingredient'
    ? 'ingredient' : strtolower($mealPart->type->name) }}">


        <div class="select--single-wrapper px-2 mx-auto" wire:ignore
            style="width: 170px !important; max-width: 170px !important">
            <select class="form-select ingredient--select"
                id='ingredient--select-{{ strtolower($instance->typeId) }}-{{ $instance->id }}'
                data-instance='instance.partId' required value='{{ $instance?->partId }}'>
                <option value=""></option>

                @foreach ($parts as $part)
                <option value="{{ $part->id }}">{{ $part->name }}</option>
                @endforeach

            </select>
        </div>


    </td>
    {{-- endTD --}}







    {{-- type --}}
    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" style="width: 85px !important; max-width: 85px !important">
            <select class="form-select ingredient--type-select"
                id='ingredient--type-select-{{ strtolower($instance->typeId) }}-{{ $instance->id }}'
                data-instance='instance.partType' required value='{{ $instance?->partType }}'>
                <option value=""></option>
                <option value="Main">Main</option>
                <option value="Side">Side</option>
                <option value="Mixed">Mixed</option>
            </select>
        </div>
    </td>











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






    {{-- select-handle --}}
    <script>
        var instanceId = "{{ $instance->id }}";
        var instanceTypeId = "{{ strtolower($instance->typeId) }}";


        $(`#ingredient--select-${instanceTypeId}-${instanceId}`).bind('change', function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');

            @this.set(instance, selectValue);
            @this.update();
        });
    </script>









    {{-- select-handle --}}
    <script>
        $(`#ingredient--type-select-${instanceTypeId}-${instanceId}`).bind('change', function(event) {

            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');

            @this.set(instance, selectValue);
            @this.updateType();
        });
    </script>





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</tr>
{{-- end singleRow - part --}}