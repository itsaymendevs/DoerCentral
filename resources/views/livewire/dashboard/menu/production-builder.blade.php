{{-- contentSection --}}
<section class="content--section" id="content--section" wire:ignore.self wire:loading.class='no-events'>








    {{-- ----------------------------------------- --}}
    {{-- ----------------------------------------- --}}



    {{-- styles --}}
    @section('styles')

    <style>
        .form--table-input-xxs {
            max-width: 190px;
        }


        .recipe--builder-wrapper .form--table-input-sm {
            padding: 0px 3px !important;
        }
    </style>


    @endsection
    {{-- endSection --}}












    {{-- ----------------------------------------- --}}
    {{-- ----------------------------------------- --}}







    {{-- subMenu --}}
    <div class="container">

        <livewire:dashboard.menu.components.sub-menu key='submenu' />

    </div>
    {{-- endContainer --}}









    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







    {{-- 1: general --}}
    <div class="container-fluid">

        {{-- header --}}
        <div class="builder--header">
            <h4 class='mb-0 fs-5'>General Informations</h4>
        </div>



        <livewire:dashboard.menu.production-builder.components.production-builder-edit-general id='{{ $meal->id }}'
            key='builder-general' />

    </div>
    {{-- endContainer --}}












    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}









    {{-- 2: ingredients --}}
    <div class="container-fluid">

        {{-- header --}}
        <div class="builder--header" style="margin-top: 120px">
            <h4 class='mb-0 fs-5'>Size & Ingredients</h4>
        </div>




        {{-- content --}}
        <div class="row">





            {{-- 1: editContainer --}}
            <div class="col-3">

                <livewire:dashboard.menu.production-builder.components.production-builder-edit-container
                    id='{{ $meal->id }}' key='builder-edit-container' />

            </div>






            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}







            {{-- 2: sizes - sizeOverview --}}
            <div class="col-6">




                {{-- 1: manageSizes --}}
                <livewire:dashboard.menu.production-builder.components.production-builder-manage-sizes
                    id='{{ $meal->id }}' key='builder-manage-sizes' />





                {{-- -------------------------- --}}
                {{-- -------------------------- --}}





                {{-- 2: manageSizesOverview --}}
                <livewire:dashboard.menu.production-builder.components.production-builder-manage-sizes-overview
                    id='{{ $meal->id }}' key='builder-manage-sizes-overview' />






            </div>
            {{-- endCol --}}








            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}








            {{-- 3: editLabel --}}
            <div class="col-3">

                <livewire:dashboard.menu.production-builder.components.production-builder-edit-label
                    id='{{ $meal->id }}' key='builder-edit-label' />

            </div>








            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}







            {{-- 7: instructions --}}
            <div class="col-5">

                <livewire:dashboard.menu.production-builder.components.production-builder-manage-instructions
                    id='{{ $meal->id }}' key='builder-manage-instructions' />

            </div>






            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}








        </div>
        {{-- endRow --}}







        {{--
        <livewire:dashboard.menu.production-builder.components.production-builder-manage-recipe :id='$meal->id'
            key='meal-sizes-and-ingredients' /> --}}


    </div>
    {{-- endContainer --}}













    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







    {{-- 3: packings --}}
    <div class="container-fluid">

        {{-- header --}}
        <div class="builder--header" style="margin-top: 120px">
            <h4 class='mb-0 fs-5'>Serving Information</h4>
        </div>




        {{-- row --}}
        <div class="row align-items-start pt-2 mb-5 pb-4">


            {{--
            <livewire:dashboard.menu.production-builder.components.production-builder-manage-packings :id='$meal->id'
                key='meal-packing-and-servings-1' /> --}}




            {{--
            <livewire:dashboard.menu.production-builder.components.production-builder-manage-labels :id='$meal->id'
                key='meal-packing-and-servings-2' /> --}}





        </div>
        {{-- endRow --}}





    </div>
    {{-- endContainer --}}










    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}










    <div class="container-fluid">











        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 plans-column" data-view="standard" data-instance="1">









                {{-- --------------------------------------------------- --}}
                {{-- --------------------------------------------------- --}}








                {{-- 2: recipeTab / ingredientsTab --}}
                <div class="tab-pane no--card d-none" id="tab-2" role="tabpanel">



                    {{-- :: now refreshItConstantly --}}


                </div>
                {{-- endTab --}}





                {{-- -------------------------------------------------- --}}
                {{-- -------------------------------------------------- --}}





                {{-- 2: packingTab --}}
                <div class="tab-pane no--card d-none" id="tab-3" role="tabpanel">




                </div>
                {{-- endTab --}}



            </div>
        </div>
    </div>
    {{-- emdWrapper --}}























    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}






    @section('modals')



    {{-- 1: viewCost --}}
    {{--
    <livewire:dashboard.menu.production-builder.components.production-builder-view-cost-details
        key='cost-details-modal' /> --}}



    @endsection







    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}








</section>
{{-- end contentSection --}}