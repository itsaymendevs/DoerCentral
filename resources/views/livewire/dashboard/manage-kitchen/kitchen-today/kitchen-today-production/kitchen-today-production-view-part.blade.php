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
                                            <th class="th--lg text-start ps-3">Part</th>
                                            <th class="th--sm text-start ps-3">Amount</th>
                                        </tr>
                                    </thead>








                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}








                                    {{-- tbody --}}
                                    <tbody>





                                        {{-- loop - parts --}}
                                        @foreach ($mealSize?->parts ?? [] as $mealSizePart)



                                        {{-- ** GET AMOUNT - AMOUNT PERCENTAGE OF PART --}}
                                        @php $amount = ((($mealSizePart?->amount ?? 0) /
                                        $mealSizeTotalAmount) * 100) * $partAmount / 100;
                                        @endphp







                                        <tr key='mealSize-ingredient-{{ $mealSizePart->id }}'>



                                            {{-- :: SN --}}
                                            <td class='fs-14 fw-normal'>{{ $globalSNCounter++ }}</td>





                                            {{-- part --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="text-start d-block fs-14 fw-normal">{{
                                                    $mealSizePart?->part?->name }}</span>
                                            </td>



                                            {{-- amount --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="text-start d-block fs-15 fw-semibold text-gold">{{
                                                    round($amount ?? 0, 1) / $unit }}
                                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)'}}</small>
                                                </span>
                                            </td>



                                        </tr>

                                        @endforeach
                                        {{-- end loop - parts --}}






                                    </tbody>
                                </table>
                            </div>
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
                                            <th class="th--lg text-start ps-3">Ingredient</th>
                                            <th class="th--sm text-start ps-3">Amount</th>
                                        </tr>
                                    </thead>






                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}









                                    {{-- tbody --}}
                                    <tbody>



                                        {{-- loop - ingredients --}}
                                        @foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient)





                                        {{-- ** GET AMOUNT - AMOUNT PERCENTAGE OF INGREDIENT --}}
                                        @php $amount = ((($mealSizeIngredient?->amount ?? 0) /
                                        $mealSizeTotalAmount) * 100) * $partAmount / 100;
                                        @endphp






                                        <tr key='mealSize-ingredient-{{ $mealSizeIngredient->id }}'>



                                            {{-- :: SN --}}
                                            <td class='fs-14 fw-normal'>{{ $globalSNCounter++ }}</td>




                                            {{-- ingredient --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="text-start d-block fs-14 fw-normal">{{
                                                    $mealSizeIngredient?->ingredient?->name }}</span>
                                            </td>



                                            {{-- amount --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="text-start d-block fs-15 fw-semibold text-gold">{{
                                                    round($amount ?? 0, 1) / $unit }}
                                                    <small class='fs-10'>{{ $unit == 1 ? '(G)' : '(KG)'}}</small>
                                                </span>
                                            </td>


                                        </tr>

                                        @endforeach
                                        {{-- end loop - ingredients --}}






                                    </tbody>
                                </table>
                            </div>
                        </div>


                        @endif
                        {{-- end if - ingredients --}}





                    </div>





                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}









                    {{-- instructions --}}

                    @if (count($instructions ?? []) > 0)

                    <div class="row mb-3">


                        {{-- title --}}
                        <div class="col-12">
                            <h5 class="text-center mb-4 fw-bold">Cooking Instructions</h5>
                        </div>




                        {{-- -------------------------- --}}
                        {{-- -------------------------- --}}





                        {{-- loop - instructions --}}
                        @foreach ($instructions ?? [] as $instruction)

                        <div class="col-12">
                            <p class='fs-14 instruction--wrap'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-diamond-half me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM8 .989c.127 0 .253.049.35.145l6.516 6.516a.495.495 0 0 1 0 .7L8.35 14.866a.5.5 0 0 1-.35.145z" />
                                </svg>

                                <span>{{ $instruction->content }}</span>
                            </p>
                        </div>

                        @endforeach
                        {{-- end loop --}}





                    </div>
                    {{-- endRow --}}

                    @endif
                    {{-- end if --}}








                </form>
                {{-- endRow --}}




            </div>
        </div>
    </div>
</div>
{{-- endModal --}}