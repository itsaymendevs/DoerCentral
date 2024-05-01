{{-- contentSection --}}
<section class="content--section" id="content--section" wire:ignore.self wire:loading.class='no-events'>
    <div class="container-fluid">






        {{-- :: restyling --}}
        @section('styles')

        <style>
            .form--table-input-xxs {
                max-width: 190px;
            }


            .recipe--builder-wrapper .form--table-input-sm {
                padding: 0px 3px !important;
            }



            .itemType--radio input[type=radio][checked] {
                background-color: var(--bg-golden-dark) !important;
                border-color: var(--bg-golden-dark) !important;
            }
        </style>



        @endsection
        {{-- endSection --}}








        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}











        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 plans-column" data-view="standard" data-instance="1">


                {{-- tabWrap --}}
                <div class="tabs--wrap">


                    {{-- navLinks --}}
                    <ul class="nav nav-tabs inner" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">General</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab">Ingredients</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab">Packings</a>
                        </li>
                    </ul>
                    {{-- end navLinks --}}







                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}






                    {{-- tabContetn --}}
                    <div class="tab-content">




                        {{-- 1: generalTab --}}
                        <div class="tab-pane active no--card" id="tab-1" role="tabpanel">

                            <livewire:dashboard.menu.production-builder.components.production-builder-update-general
                                :id='$meal->id' />

                        </div>
                        {{-- endTab --}}









                        {{-- --------------------------------------------------- --}}
                        {{-- --------------------------------------------------- --}}








                        {{-- 2: recipeTab / ingredientsTab --}}
                        <div class="tab-pane no--card" id="tab-2" role="tabpanel">



                            {{-- :: now refreshItConstantly --}}
                            <livewire:dashboard.menu.production-builder.components.production-builder-manage-recipe
                                :id='$meal->id' />

                        </div>
                        {{-- endTab --}}





                        {{-- -------------------------------------------------- --}}
                        {{-- -------------------------------------------------- --}}





                        {{-- 2: packingTab --}}
                        <div class="tab-pane no--card" id="tab-3" role="tabpanel">

                            {{-- row --}}
                            <div class="row align-items-start pt-2 mb-5 pb-4">


                                {{-- :: packingServingCol --}}
                                <livewire:dashboard.menu.production-builder.components.production-builder-manage-packings
                                    :id='$meal->id' />




                                {{-- label / cutlery --}}
                                <livewire:dashboard.menu.production-builder.components.production-builder-manage-labels
                                    :id='$meal->id' />


                            </div>
                            {{-- endRow --}}



                        </div>
                        {{-- endTab --}}



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end contentSection --}}