{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.inventory.components.sub-menu title='Comparison Table' key='sub-menu' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}




        {{-- topRow --}}
        <div class="row align-items-end  mb-4">





            {{-- 1: ingredientFilter --}}
            <div class="col-4">
                <input class="form-control form--input" type="text" wire:model.live='searchIngredient'
                    placeholder="Search by Ingredient" />
            </div>








            {{-- 2: categoryFilter --}}
            <div class="col-3" wire:ignore>

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Category</label>
                </div>


                <div class="select--single-wrapper" wire:loading.class='no-events'>
                    <select class="form-select form--select form--search-ingredient-select" data-clear='true'
                        data-instance='searchCategory'>
                        <option value=""></option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>








            {{-- 3: counter --}}
            <div class="col-5 text-end">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Ingredients">
                    {{ $supplierIngredients?->groupBy('ingredientId')->count() }}
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
                                @foreach ($suppliers as $supplier)

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
                            @foreach ($supplierIngredients->groupBy('ingredientId') ?? [] as $commonIngredient =>
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