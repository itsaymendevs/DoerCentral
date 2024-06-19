<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Preparation & Stock' key='kitchen-submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- midRow --}}
        <div class="row align-items-end">


            {{-- date --}}
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Date</label>
                </div>

                {{-- input --}}
                <input class="form--input" type="date" wire:model.live='searchScheduleDate'
                    wire:loading.attr='disabled' />
            </div>





            {{-- :: innerSubMenu --}}
            <livewire:dashboard.manage-kitchen.components.inner-sub-menu />


        </div>
        {{-- end midRow --}}









        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- bottomRow --}}
        <div class="row align-items-center mt-5">


            {{-- filters --}}
            <div class="col-4">
                <div class="row">




                    {{-- :: permission - hasTypeSizeFilters --}}
                    @if ($versionPermission->kitchenModuleHasTypeSizeFilters)



                    {{-- search --}}
                    <div class="col-6">
                        <input type="text" class="form--input main-version w-100" placeholder="Search Ingredient"
                            wire:model.live='searchIngredient' />
                    </div>





                    {{-- category --}}
                    <div class="col-6">
                        <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                            <select class="form--select" data-instance='searchCategory'
                                data-placeholder='Select Category' data-clear='true' required>
                                <option value=""></option>

                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- endCol --}}




                    @endif
                    {{-- end if - permission --}}





                </div>
            </div>
            {{-- endSearch --}}






            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}







            {{-- actions --}}
            <div class="col-4 text-center">






                {{-- :: permission - hasPrintExcel --}}
                @if ($versionPermission->kitchenModuleHasPrintExcel)





                {{-- 1: print --}}
                <button
                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                    disabled type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg>Print
                </button>






                {{-- 2: exportExcel --}}
                <button wire:click='export' wire:loading.class='disabled'
                    class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold ms-2"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-file-text fs-6 me-2">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                        </path>
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                        </path>
                    </svg>Excel
                </button>




                @endif
                {{-- end if - permission --}}






            </div>
            {{-- endActions --}}





            {{-- -------------------- --}}
            {{-- -------------------- --}}



            {{-- counter --}}
            <div class="col-4 text-end d-flex align-items-center justify-content-end">





                {{-- switchToKG --}}
                <div class="form-check form-switch mealType--checkbox py-2 rounded-1 px-4 d-inline-flex me-2 mb-0"
                    style="background-color: var(--color-scheme-2)">


                    {{-- input --}}
                    <input class="form-check-input pointer" type="checkbox" id="switch-unit" wire:model.live='toKG'
                        wire:loading.attr='disabled' />


                    {{-- label --}}
                    <label class="form-check-label border-0 ms-2 me-0 fw-semibold" for="switch-unit">KG</label>

                </div>




                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Meals">
                    {{ $ingredients?->count() ?? 0 }}
                </h3>
            </div>


        </div>
    </div>
    {{-- endBottomRow --}}








    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- tableContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 mb-2">
            <div class="col-12 mt-4">
                <div id="print--table" class="memoir--table w-100 inline--table">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                            <tr>
                                <th class='th--xs'></th>
                                <th class="th--lg">Ingredient</th>
                                <th class="th--md">Category</th>
                                <th class="th--sm">Quantity</th>
                            </tr>
                        </thead>
                        {{-- endHeaders --}}





                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}






                        {{-- body --}}
                        <tbody>



                            {{-- loop - ingredients --}}
                            @foreach ($ingredients ?? [] as $ingredient)

                            <tr key='single-ingredient-{{ $ingredient->id }}'>


                                {{-- 1: ingredient --}}
                                <td class='fw-semibold'>{{ $globalSNCounter++ }}</td>
                                <td class='fs-14'>{{ $ingredient?->name ?? '' }}</td>






                                {{-- 1.2: category --}}
                                <td class='fs-14'>{{ $ingredient?->category?->name ?? '' }}</td>




                                {{-- 1.3: quantity --}}
                                <td class='fw-semibold fs-6 text-warning'>
                                    {{ $ingredientsWithGrams[$ingredient->id] / $unit }}
                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)' }}</small>
                                </td>



                            </tr>

                            @endforeach
                            {{-- end loop --}}



                        </tbody>
                    </table>
                    {{-- endTable --}}



                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);

      }); //end function
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}











    @section('modals')



    {{-- 1: viewInstructions - meal --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-instructions
        key='view-instructions-modal' />





    {{-- 2: viewPart - ingredients & otherParts --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-part
        key='view-part-modal' />




    {{-- 3: viewRemarks - customer & remarks --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-remarks
        key='view-remarks-modal' />





    {{-- 4: viewExcludes - customer & excludes --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-excludes
        key='view-excludes-modal' />






    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}








</section>
{{-- endSection --}}