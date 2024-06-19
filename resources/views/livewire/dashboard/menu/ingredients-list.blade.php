<section class="content--section" id="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- filtersRow --}}
        <div class="row pt-2 align-items-end">



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






            {{-- 2: print --}}
            <div class="col-2">
                <button
                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold mx-2 print--labels"
                    style="margin-bottom: 25px" data-print='ingredients--list' type="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg>Print
                </button>
            </div>







            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}







            {{-- counter --}}
            <div class="col-3 text-end">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1 ms-3 mb-4"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Ingredients">
                    {{ $ingredients?->count() }}
                </h3>
            </div>







        </div>
        {{-- endRow --}}










        {{-- ---------------------------------- --}}
        {{-- ---------------------------------- --}}









        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-4">




            {{-- 1: tableView --}}
            <div class="col-12 ingredients-column mt-4 pt-3" data-view="table" wire:ignore.self>



                {{-- table --}}
                <div class="table-responsive memoir--table w-100 mb-4 print--table" id='ingredients--list'>
                    <table class="table table-bordered" id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th style='width: 25px'></th>
                                <th class="th--lg">Ingredient</th>
                                <th class="th--sm">Category</th>
                            </tr>
                        </thead>






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- tbody --}}
                        <tbody>






                            {{-- loop - ingredients --}}
                            @foreach ($ingredients as $ingredient)

                            <tr>
                                <td class="fw-bold">{{ $globalSNCounter++ }}</td>
                                <td class="fw-bold">{{ $ingredient->name }}</td>

                                <td>{{ $ingredient?->category?->name }}</td>


                            </tr>

                            @endforeach
                            {{-- end loop - ingredients --}}




                        </tbody>
                        {{-- end tbody --}}

                    </table>
                </div>



            </div>
            {{-- endCol - tableView --}}

        </div>
        {{-- endRow --}}



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
{{-- endSection --}}