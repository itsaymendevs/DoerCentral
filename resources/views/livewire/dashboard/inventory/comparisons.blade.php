{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.inventory.components.sub-menu title='Comparison Table' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}




        {{-- topRow --}}
        <div class="row align-items-end  mb-4">





            {{-- 1: ingredientFilter --}}
            <div class="col-4">
                <input class="form-control form--input mb-4" type="text" wire:model.live='searchIngredient'
                    placeholder="Search by Ingredient" />
            </div>








            {{-- 2: categoryFilter --}}
            <div class="col-3" wire:ignore>

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Category</label>
                </div>


                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
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
                    {{ $ingredients->total() }}
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
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--lg">Ingredient</th>
                                <th class="th--md">Category</th>





                                {{-- 1: loop - ingredients --}}
                                @foreach ($ingredients ?? [] as $ingredient)



                                {{-- 2: loop - suppliers --}}
                                @for ($i = 0; $i < $globalMaximumSuppliers; $i++) <th class="th--md"
                                    style="font-weight: bold !important">{{
                                    $ingredient?->suppliers[$i]?->supplier?->name ?? '' }}</th> @endfor



                                    @endforeach
                                    {{-- end loop - ingredients --}}

                            </tr>
                        </thead>






                        {{-- -------------------------------------- --}}
                        {{-- -------------------------------------- --}}








                        {{-- tbody --}}
                        <tbody>


                            {{-- loop - ingredients --}}
                            @foreach ($ingredients ?? [] as $ingredient)

                            <tr>


                                {{-- name - category --}}
                                <td class="fw-bold fs-6">{{ $globalSNCounter++ }}</td>
                                <td class="fs-6">{{ $ingredient->name }}</td>
                                <td class='fs-6'>{{ $ingredient?->category?->name }}</td>




                                {{-- 2: loop - suppliers --}}
                                @for ($i = 0; $i < $globalMaximumSuppliers; $i++) <td class='fs-6 text-gold fw-bold'>
                                    {{ ($ingredient?->suppliers[$i]?->sellPrice ?? null) ?
                                    number_format($ingredient?->suppliers[$i]?->sellPrice, 2) : '' }}</td> @endfor



                            </tr>


                            @endforeach
                            {{-- end loop --}}





                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end tableView --}}











            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}








            {{-- pagination --}}
            <div class="col-12">
                {{ $ingredients->links() }}
            </div>



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