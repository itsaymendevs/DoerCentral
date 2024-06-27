{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.inventory.components.sub-menu title='Purchase Orders' key='sub-menu' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}




        {{-- topRow --}}
        <div class="row align-items-end  mb-4">





            {{-- 1: ingredientFilter --}}
            <div class="col-3">
                <input class="form-control form--input" type="text" wire:model.live='searchIngredient'
                    placeholder="Search by Ingredient" />
            </div>








            {{-- 2: fromDate --}}
            <div class="col-3">

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">From</label>
                </div>

                <input class="form-control form--input" type="date" wire:model.live='searchFromDate' />
            </div>





            {{-- 3: untilDate --}}
            <div class="col-3">

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Until</label>
                </div>

                <input class="form-control form--input" type="date" wire:model.live='searchUntilDate' />
            </div>







            {{-- 4: counter --}}
            <div class="col-3 text-end">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Ingredients">
                    {{-- {{ $supplierIngredients?->groupBy('ingredientId')->count() }} --}}
                </h3>
            </div>




        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}











        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-4">






            {{-- tableView --}}
            <div class="col-12 mt-5 mb-3" data-view="table">
                <div class="table-responsive memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">



                        {{-- thead --}}
                        <thead>



                            <tr style="vertical-align: middle">
                                <th class="th--xs"></th>
                                <th class="th--lg">Ingredient</th>
                                <th class="th--md">Category</th>




                                {{-- loop - suppliers --}}
                                @foreach ($suppliers ?? [] as $supplier)

                                <th class="th--md">{{ $supplier?->name }}</th>

                                @endforeach
                                {{-- end loop --}}


                            </tr>


                        </thead>
                        {{-- endHeaders --}}






                        {{-- -------------------------------------- --}}
                        {{-- -------------------------------------- --}}








                        {{-- tbody --}}
                        <tbody>



                            {{-- loop - groupByIngredient --}}
                            @foreach ($supplierIngredients?->groupBy('ingredientId') ?? [] as $commonIngredient =>
                            $supplierIngredientsByIngredient)

                            <tr>



                                {{-- 1: ingredient --}}
                                <td class='fw-bold'>{{ $globalSNCounter++ }}</td>
                                <td>{{ $supplierIngredientsByIngredient?->first()?->ingredient?->name }}</td>



                                {{-- 1.2: category --}}
                                <td>
                                    {{$supplierIngredientsByIngredient?->first()?->ingredient?->category?->name ?? ''}}
                                </td>





                                {{-- 1.3: price --}}


                                {{-- 1.3.1: loop - suppliers --}}
                                @foreach ($suppliers as $supplier)



                                {{-- :: DoProvide --}}
                                @if ($supplierIngredientsByIngredient?->where('supplierId', $supplier->id)?->count())



                                <td class='text-gold fs-6 fw-bold'>
                                    {{ number_format($supplierIngredientsByIngredient?->where('supplierId',
                                    $supplier->id)?->last()?->sellPrice ?? 0, 2) }}
                                </td>



                                {{-- :: DoNotProvide --}}
                                @else

                                <td></td>


                                @endif
                                {{-- end if --}}



                                @endforeach
                                {{-- end loop - suppliers --}}






                            </tr>

                            @endforeach
                            {{-- end loop --}}



                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end tableView --}}




        </div>
    </div>
    {{-- endContainer --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select --}}
    <script>
        $(".form--search-ingredient-select").on("change", function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');

            @this.set(instance, selectValue);


        }); //end function
    </script>









    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}











</section>
{{-- endContent --}}