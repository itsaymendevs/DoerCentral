<form>




    {{-- filtersRow --}}
    <div class="row">




        {{-- empty --}}
        <div class="col-4"></div>







        {{-- 1: ingredientFilter --}}
        <div class="col-4">
            <input wire:model.live='searchIngredient' class="form-control form--input main-version mx-auto"
                type="search" placeholder="Search by Ingredient" />
        </div>








        {{-- counter --}}
        <div class="col-4 text-end">
            <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Suppliers">
                {{ $stockIngredients?->groupBy('ingredientId')->count() }}
            </h3>
        </div>





    </div>
    {{-- endRow --}}












    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}












    {{-- cardRow --}}
    <div class="row align-items-center mb-4">
        <div class="col-12 ingredients-column" data-view="cards">
            <div class="row mt-zone-cards" style="margin-top: 70px;">




                {{-- singleCol --}}
                @foreach ($stockIngredients?->groupBy('ingredientId') ?? [] as $commonIngredient =>
                $stockIngredientsByIngredient)


                <div class="col-4 col-xl-3 col-xxl-2">
                    <div class="overview--card client-version scale--self-05 mb-floating">
                        <div class="row">


                            {{-- imageFile --}}
                            <div class="col-12 text-center position-relative">
                                <img class="client--card-logo"
                                    src="{{ asset('storage/inventory/ingredients/' . ($stockIngredientsByIngredient?->first()->ingredient->imageFile ?? $defaultIngredient)) }}">
                            </div>



                            {{-- ingredientName --}}
                            <div class="col-12">
                                <h6 class="text-center fw-bold mt-4 mb-2 truncate-text-1l fs-16 text-heading">{{
                                    $stockIngredientsByIngredient?->first()->ingredient->name }}</h6>
                            </div>






                            {{-- cookedQuantity --}}
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-center mb-1 mt-2">
                                    <span
                                        class="btn--raw-icon fs-12 d-flex align-items-center justify-content-center scale--3 text-heading">Cooked</span>
                                    <button
                                        class="btn btn--raw-icon d-flex align-items-center justify-content-center scale--3 fw-bold text-danger"
                                        type="button">0</button>
                                </div>


                                {{-- available --}}
                                <div class="d-flex align-items-center justify-content-center">
                                    <span
                                        class="btn--raw-icon fs-12 d-flex align-items-center justify-content-center scale--3 text-heading">Available</span>
                                    <button
                                        class="btn btn--raw-icon d-flex align-items-center justify-content-center scale--3 fw-bold text-warning"
                                        type="button">{{ $stockIngredientsByIngredient->sum('quantity') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @endforeach


            </div>
        </div>
    </div>






</form>
{{-- endForm --}}