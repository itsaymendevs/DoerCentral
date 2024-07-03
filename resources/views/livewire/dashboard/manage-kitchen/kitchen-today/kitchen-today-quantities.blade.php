<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Recipes & Items' key='kitchen-submenu' />





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
                <input class="form--input" type="date" wire:model='searchScheduleDate' wire:loading.attr='disabled'
                    required wire:change='dependencies' />
            </div>





            {{-- :: innerSubMenu --}}
            <livewire:dashboard.manage-kitchen.components.inner-sub-menu key='kitchen-inner-submenu' />


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
                    @if ($versionPermission->kitchenModuleHasTypeSizeFilters || session('hasTechAccess'))



                    {{-- search --}}
                    <div class="col-6">
                        <input type="text" class="form--input main-version w-100" placeholder="Search by Name"
                            wire:model.live='searchMeal' />
                    </div>





                    {{-- type --}}
                    <div class="col-6">
                        <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                            <select class="form--select" data-instance='searchType' data-placeholder='Select Type'
                                data-clear='true' required>
                                <option value=""></option>

                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                @if ($versionPermission->kitchenModuleHasPrintExcel || session('hasTechAccess'))





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
                    title="Number of Rows">
                    {{ ($ingredients?->count() ?? 0) + ($parts?->count() ?? 0) }}
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
                <div id="print--table" class="memoir--table w-100 inline--table ">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                            <tr>
                                <th class="th--lg">Name</th>
                                <th class="th--md">Type</th>
                                <th class="th--sm">Amount</th>
                            </tr>
                        </thead>
                        {{-- endHeaders --}}





                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}






                        {{-- body --}}
                        <tbody>



                            {{-- 1: loop - parts --}}
                            @foreach ($parts ?? [] as $part)


                            <tr key='single-part-{{ $part->id }}'>


                                {{-- 1: part --}}
                                <td class='fs-15'>{{ $part?->name }}



                                    {{-- :: viewPart --}}
                                    <button
                                        class="btn btn--raw-icon fs-14 text-warning d-inline-block scale--3 w-auto ms-1"
                                        wire:click="viewPart('{{ $part?->id }}', '{{ $partsWithGrams[$part->id] }}')"
                                        type="button" data-bs-target="#view-part" data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-6"
                                            style="fill: var(--bs-warning)">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                            </path>
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                            </path>
                                        </svg>
                                    </button>

                                </td>







                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}







                                {{-- 1.2: type --}}
                                <td class='fs-15'>{{ $part?->type?->name }}</td>






                                {{-- 1.3: quantity --}}
                                <td class='fw-semibold fs-6 text-warning'>



                                    {{-- A: gram --}}
                                    @if ($unit == 1)


                                    {{ number_format($partsWithGrams[$part->id] / $unit) }}
                                    <small class='fs-10'>(G)</small>



                                    {{-- B: KG --}}
                                    @else


                                    {{ number_format($partsWithGrams[$part->id] / $unit, 2) }}
                                    <small class='fs-10'>(KG)</small>


                                    @endif
                                    {{-- end if --}}

                                </td>


                            </tr>

                            @endforeach
                            {{-- end loop --}}












                            {{-- ----------------------------------- --}}
                            {{-- ----------------------------------- --}}













                            {{-- 2: loop - ingredients --}}
                            @foreach ($ingredients ?? [] as $ingredient)


                            <tr key='single-ingredient-{{ $ingredient->id }}'>




                                {{-- 1: ingredient --}}
                                <td class='fs-15'>{{ $ingredient?->name }}</td>




                                {{-- 1.2: type --}}
                                <td class='fs-15'>Ingredient</td>






                                {{-- 1.3: quantity --}}
                                <td class='fw-semibold fs-6 text-warning'>



                                    {{-- A: gram --}}
                                    @if ($unit == 1)


                                    {{ number_format($ingredientsWithGrams[$ingredient->id] / $unit) }}
                                    <small class='fs-10'>(G)</small>



                                    {{-- B: KG --}}
                                    @else


                                    {{ number_format($ingredientsWithGrams[$ingredient->id] / $unit, 2) }}
                                    <small class='fs-10'>(KG)</small>


                                    @endif
                                    {{-- end if --}}

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





    {{-- 1: viewPart - ingredients & otherParts - instructions --}}
    <livewire:dashboard.manage-kitchen.kitchen-today.kitchen-today-quantities.components.kitchen-today-quantities-view-part
        key='view-part-modal' />





    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







</section>
{{-- endSection --}}