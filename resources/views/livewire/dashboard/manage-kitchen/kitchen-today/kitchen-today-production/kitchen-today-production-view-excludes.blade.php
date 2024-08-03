<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="view-excludes" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Excludes</h5>
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
                                value="{{ $scheduleMeals?->first()?->meal?->name }}">
                        </div>




                        {{-- subHeading --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr style="width: 65%;">
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">
                                    List of Excludes
                                </label>
                            </div>
                        </div>










                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}







                        {{-- tableCol --}}
                        <div class="col-12">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">


                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xs"></th>
                                            <th class="th--md"></th>
                                            <th class="th--md text-start ps-3">Size</th>
                                            <th class="th--xl text-start ps-3">Exclude</th>
                                            <th class="th--xl text-start ps-3">Amount</th>
                                        </tr>
                                    </thead>




                                    {{-- -------------------------- --}}
                                    {{-- -------------------------- --}}




                                    {{-- tbody --}}
                                    <tbody>



                                        {{-- loop - mealSizes --}}
                                        @foreach ($mealSizes ?? [] as $mealSize)





                                        {{-- 1: ingredients --}}
                                        @foreach ($mealSize?->ingredients?->where('isDefault',
                                        1) ?? [] as $mealSizeIngredient)




                                        @if(!empty($ingredientsBySize[$mealSize?->sizeId][$mealSizeIngredient?->ingredientId]))



                                        <tr key='meal-customer-exclude-{{ $mealSizeIngredient->id }}'>


                                            {{-- SN - name --}}
                                            <td class="fw-bold text-center">{{ $globalSNCounter++ }}</td>
                                            <td class="fw-semibold text-center">
                                                <span
                                                    class="badge fs-10 scale--self-05 badge--warning-outline pointer fw-500"
                                                    data-bs-toggle="tooltip" data-bss-tooltip=""
                                                    data-bs-placement="right" data-bs-html='true'
                                                    title="{{ $ingredientsBySize[$mealSize?->sizeId][$mealSizeIngredient->ingredientId]['customers'] }}">Customers</span>
                                            </td>





                                            {{-- size --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="d-block fs-14 fw-normal">{{
                                                    $ingredientsBySize[$mealSize?->sizeId][$mealSizeIngredient->ingredientId]['size']
                                                    }}</span>
                                            </td>








                                            {{-- exclude - ingredient --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="d-block fs-14 fw-normal">{{
                                                    $ingredientsBySize[$mealSize?->sizeId][$mealSizeIngredient->ingredientId]['ingredient']
                                                    }}</span>
                                            </td>



                                            {{-- amount --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="text-start d-block fs-15 fw-semibold text-gold">{{
                                                    round($ingredientsBySize[$mealSize?->sizeId][$mealSizeIngredient->ingredientId]['amount'],
                                                    1)
                                                    / $unit }}
                                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)'}}</small>
                                                </span>
                                            </td>

                                        </tr>



                                        @endif
                                        {{-- end if --}}




                                        @endforeach
                                        {{-- end loop --}}








                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}











                                        {{-- 2: loop - parts --}}
                                        @foreach ($mealSize?->parts?->where('isDefault', 1) ?? []
                                        as $mealSizePart)



                                        {{-- loop - partIngredients [LayerOne] - --}}
                                        @foreach ($mealSizePart->part->ingredients?->where('isDefault',
                                        1) ?? [] as $partIngredient)





                                        @if (!empty($partsBySize[$mealSize?->sizeId][$partIngredient?->ingredientId]))



                                        <tr key='meal-customer-part-exclude-{{ $partIngredient->id }}'>


                                            {{-- SN - customers --}}
                                            <td class="fw-bold text-center">{{ $globalSNCounter++ }}</td>
                                            <td class="fw-semibold text-center">
                                                <span
                                                    class="badge fs-10 scale--self-05 badge--warning-outline pointer fw-500"
                                                    data-bs-toggle="tooltip" data-bss-tooltip=""
                                                    data-bs-placement="right" data-bs-html='true'
                                                    title="{{ $partsBySize[$mealSize?->sizeId][$partIngredient->ingredientId]['customers'] }}">Customers</span>
                                            </td>






                                            {{-- size --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="d-block fs-14 fw-normal">{{
                                                    $partsBySize[$mealSize?->sizeId][$partIngredient->ingredientId]['size']
                                                    }}</span>
                                            </td>






                                            {{-- exclude - ingredient --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="d-block fs-14 fw-normal">{{
                                                    $partsBySize[$mealSize?->sizeId][$partIngredient->ingredientId]['ingredient']
                                                    }}</span>
                                            </td>



                                            {{-- amount --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="text-start d-block fs-15 fw-semibold text-gold">{{
                                                    round($partsBySize[$mealSize?->sizeId][$partIngredient->ingredientId]['amount'],
                                                    1) / $unit }}
                                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)'}}</small>
                                                </span>
                                            </td>

                                        </tr>



                                        @endif
                                        {{-- end if --}}



                                        @endforeach
                                        {{-- end loop - partIngredients --}}






                                        @endforeach
                                        {{-- end loop - parts --}}



                                        @endforeach
                                        {{-- end outerLoop --}}



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end tableCol --}}


                    </div>
                </form>
                {{-- endRow --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}