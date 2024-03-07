{{-- singleRow - item --}}
<tr id='{{ strtolower($instance->type) }}-{{ $instance->id }}'>



    {{-- select --}}
    <td class="fw-bold tr--{{ strtolower($instance->type) }}">
        <div class="select--single-wrapper px-2 mx-auto" wire:ignore
            style="width: 170px !important; max-width: 170px !important">
            <select class="form-select ingredient--select"
                id='ingredient--select-{{ strtolower($instance->type) }}-{{ $instance->id }}'
                data-instance='instance.itemId' required value='{{ $instance?->itemId }}'>
                <option value=""></option>

                @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
        </div>
    </td>






    {{-- type --}}
    <td class="fw-bold" wire:ignore>
        <div class="select--single-wrapper xxs" style="width: 85px !important; max-width: 85px !important">
            <select class="form-select ingredient--type-select"
                id='ingredient--type-select-{{ strtolower($instance->type) }}-{{ $instance->id }}'
                data-instance='instance.itemType' required value='{{ $instance?->itemType }}'>
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
        var instanceType = "{{ strtolower($instance->type) }}";


        $(`#ingredient--select-${instanceType}-${instanceId}`).bind('change', function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');

            @this.set(instance, selectValue);
            @this.update();
        });
    </script>









    {{-- select-handle --}}
    <script>
        $(`#ingredient--type-select-${instanceType}-${instanceId}`).bind('change', function(event) {

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
{{-- end singleRow - item --}}