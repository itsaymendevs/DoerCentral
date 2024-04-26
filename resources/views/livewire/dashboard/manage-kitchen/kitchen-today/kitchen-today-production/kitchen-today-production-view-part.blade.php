<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="view-part" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Details</h5>
                    <button class="btn btn--raw-icon w-auto" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}




                {{-- row --}}
                <form class="px-4">
                    <div class="row pt-2 mb-4">


                        {{-- partName --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value="{{ $mealSize?->meal?->name }}">
                        </div>




                        {{-- subHeading --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr style="width: 65%;">
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">
                                    Consist Of
                                </label>
                            </div>
                        </div>
















                        {{-- A: parts Exists --}}
                        @if ($mealSize?->parts?->count() > 0)



                        <div class="col-12 mb-3">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">

                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xs"></th>
                                            <th class="th--lg">Part</th>
                                            <th class="th--sm">Grams</th>
                                        </tr>
                                    </thead>



                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}






                                    {{-- tbody --}}
                                    <tbody>





                                        {{-- loop - parts --}}
                                        @foreach ($mealSize?->parts ?? [] as $mealSizePart)

                                        <tr key='mealSize-ingredient-{{ $mealSizePart->id }}'>



                                            {{-- :: SN --}}
                                            <td class='fs-14 fw-normal'>{{ $globalSNCounter++ }}</td>





                                            {{-- part --}}
                                            <td class="fw-bold text-start">
                                                <span class="text-center d-block fs-14 fw-normal">{{
                                                    $mealSizePart?->part?->name }}</span>
                                            </td>



                                            {{-- amount (grams) --}}
                                            <td class="fw-bold text-start">
                                                <span class="text-center d-block fs-15 fw-semibold text-gold">{{
                                                    ($mealSizePart?->amount ?? 0) / $unit }}
                                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)'}}</small>
                                                </span>
                                            </td>



                                        </tr>

                                        @endforeach
                                        {{-- end loop - parts --}}






                                    </tbody>
                                </table>
                            </div>
                            {{-- endTable --}}



                        </div>



                        @endif
                        {{-- end if - parts --}}











                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}









                        {{-- A: ingredient Exists --}}
                        @if ($mealSize?->ingredients?->count() > 0)



                        <div class="col-12">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">

                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class='th--xs'></th>
                                            <th class="th--lg">Ingredient</th>
                                            <th class="th--sm">Grams</th>
                                        </tr>
                                    </thead>



                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}






                                    {{-- tbody --}}
                                    <tbody>



                                        {{-- loop - ingredients --}}
                                        @foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient)

                                        <tr key='mealSize-ingredient-{{ $mealSizeIngredient->id }}'>



                                            {{-- :: SN --}}
                                            <td class='fs-14 fw-normal'>{{ $globalSNCounter++ }}</td>




                                            {{-- ingredient --}}
                                            <td class="fw-bold text-start">
                                                <span class="text-center d-block fs-14 fw-normal">{{
                                                    $mealSizeIngredient?->ingredient?->name }}</span>
                                            </td>



                                            {{-- amount (grams) --}}
                                            <td class="fw-bold text-start">
                                                <span class="text-center d-block fs-15 fw-semibold text-gold">{{
                                                    ($mealSizeIngredient?->amount ?? 0) / $unit }}
                                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)'}}</small>
                                                </span>
                                            </td>


                                        </tr>

                                        @endforeach
                                        {{-- end loop - ingredients --}}






                                    </tbody>
                                </table>
                            </div>
                            {{-- endTable --}}



                        </div>



                        @endif
                        {{-- end if - ingredients --}}












                    </div>
                </form>
                {{-- endRow --}}




            </div>
        </div>
    </div>
</div>
{{-- endModal --}}