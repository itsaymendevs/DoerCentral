{{-- row --}}
<form wire:submit='update' class="row recipe--builder-wrapper mt-5">






    {{-- 1: types --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-types
        id='{{ $meal->id }}' key='builder-content-types' />







    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}








    {{-- 2: items --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items
        :instance='$instanceUnique' id='{{ $meal->id }}' key='builder-content-items' />








    {{-- ---------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------- --}}





    {{-- 2.5: initialSize --}}
    @php $initSize = $meal?->sizes?->first()?->sizeId ?? null; @endphp





    {{-- loop - mealSizes --}}
    @foreach ($meal?->sizes ?? [] as $mealSize)






    {{-- 2.7: options --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-options
        :instance='$instance' id='{{ $mealSize->id }}' initSize='{{ $initSize }}'
        key='builder-content-options-{{ $mealSize->id }}' />





    @endforeach
    {{-- end loop --}}











    {{-- submitButton --}}
    <div class="col-12 text-center">


        <button
            class="btn btn--scheme btn--scheme-2 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
            style="border: 1px dashed var(--color-scheme-3); width: 200px" wire:loading.attr="disabled">Update</button>


    </div>









    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--select`, function(event) {


            // 1.1: getValue - instance
            i = parseInt($(this).attr('data-i'));
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            sizes = parseInt($(this).attr('data-numberOfSizes'));
            index = parseInt($(this).attr('data-i')) * sizes;



            // 1.2: setValues
            @this.set(`instanceUnique.partId.${i}`, selectValue);
            @this.checkPartUnique(i, selectValue);


            for (let i = 0; i < sizes; i++) {

                @this.set(`instance.partId.${index}`, selectValue);
                @this.set(`instance.partBrandId.${index}`, null);
                index += 1;

            } // end loop





            // 1.3: checkAction
            @this.checkPart(index, selectValue);





        });
    </script>










    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--brand-select`, function(event) {



            // 1.1: getValue - instance
            i = parseInt($(this).attr('data-i'));
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            sizes = parseInt($(this).attr('data-numberOfSizes'));
            index = parseInt($(this).attr('data-i')) * sizes;



            // 1.2: setValues
            @this.set(`instanceUnique.partBrandId.${i}`, selectValue);
            @this.checkPartBrandUnique(i, selectValue);


            for (let i = 0; i < sizes; i++) {

                @this.set(`instance.partBrandId.${index}`, selectValue);
                index += 1;

            } // end loop





            // 1.3: checkAction
            @this.checkPartBrand(index, selectValue);



        });
    </script>












    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--type-select`, function(event) {



            // 1.1: getValue - instance
            i = parseInt($(this).attr('data-i'));
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');
            sizes = parseInt($(this).attr('data-numberOfSizes'));
            index = parseInt($(this).attr('data-i')) * sizes;




            // 1.2: setValues
            @this.set(`instanceUnique.partType.${i}`, selectValue);
            @this.checkPartTypeUnique(i, selectValue);


            for (let i = 0; i < sizes; i++) {

                @this.set(`instance.partType.${index}`, selectValue);
                @this.set(`instance.cookingTypeId.${index}`, null);
                index += 1;

            } // end loop




            // 1.3: checkAction
            @this.checkPartType(index, selectValue);


        });
    </script>












    {{-- selectHandle --}}
    <script>
        $('tbody').on('change', `.part--cooking-type-select`, function(event) {



        // 1.1: getValue - instance
        i = parseInt($(this).attr('data-i'));
        selectValue = $(this).select2('val');
        instance = $(this).attr('data-instance');
        sizes = parseInt($(this).attr('data-numberOfSizes'));
        index = parseInt($(this).attr('data-i')) * sizes;





        // 1.2: setValues
        for (let i = 0; i < sizes; i++) {

            @this.set(`instance.cookingTypeId.${index}`, selectValue);
            index += 1;

        } // end loop





        // 1.3: checkAction
        @this.checkPartCookingType(index, selectValue);


    });
    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- sync removable - replacement in UI --}}
    <script>
        $('tbody').on('change', '.replacement--checkbox', function () {

            groupToken = $(this).attr('data-group');


            // 1.2: check
            if ($(this).prop('checked')) {


                $(`.replacement--checkbox[data-group=${groupToken}]`).prop('checked', true);


            } else {


                $(`.replacement--checkbox[data-group=${groupToken}]`).prop('checked', false);


            } // end if


        });






        // -------------------------------------------------
        // -------------------------------------------------








        $('tbody').on('change', '.removable--checkbox', function () {

            // 1: getGroup
            groupToken = $(this).attr('data-group');


            // 1.2: check
            if ($(this).prop('checked')) {

                $(`.removable--checkbox[data-group=${groupToken}]`).prop('checked', true);

            } else {

                $(`.removable--checkbox[data-group=${groupToken}]`).prop('checked', false);

            } // end if


        });



    </script>








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










</form>
{{-- endWrapper --}}