{{-- row --}}
<div class="row recipe--builder-wrapper mt-5">





    {{-- 1: types --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-types
        id='{{ $meal->id }}' key='builder-content-types' />







    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}








    {{-- 2: items --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items
        :instance='$instanceUnique' id='{{ $meal->id }}' key='builder-content-items' />

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.part--select`, function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            instanceIndex = $(this).attr('data-instanceIndex');

            @this.set(instance, selectValue);
        });
    </script>










    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.part--type-select`, function(event) {



            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            instanceIndex = $(this).attr('data-instanceIndex');

            @this.set(instance, selectValue);
            @this.checkPartType(instanceIndex, selectValue);

        });

    </script>












    {{-- select-handle --}}
    <script>
        $('tbody').on('change', `.part--cooking-type-select`, function(event) {



        // 1.1: getValue - instance
        selectValue = $(this).select2('val');
        instance = $(this).attr('data-instance');
        instanceIndex = $(this).attr('data-instanceIndex');

        @this.set(instance, selectValue);
    });

    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</div>
{{-- endWrapper --}}