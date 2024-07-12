<div class='d-block' style="margin-top: 52px">



    {{-- 1: initSize --}}
    @php $initSizeId = $meal?->sizes?->first()?->sizeId ?? null; @endphp






    {{-- loop - mealSizes --}}
    @foreach ($meal?->sizes ?? [] as $mealSize)





    {{-- tableView --}}
    <div class='row align-content-center  justify-content-center @if ($initSizeId != $mealSize->size->id) d-none @endif'
        key='size-serving-{{ $mealSize->id }}' data-instance='mealSizes' data-view='size-{{ $mealSize->size->id }}'
        wire:ignore.self>
        <div class="col-12">
            <div class="table-responsive memoir--table w-100">
                <table class="table table-bordered" id="memoir--table">






                    {{-- head --}}
                    <thead>
                        <tr>
                            <th class="th--lg">Yield
                                <small class="fw-semibold text-theme-secondary fs-10 ms-1">(%)</small>
                            </th>

                            <th class="th--lg">No. of Servings</th>

                            <th class="th--lg">Total Grams
                                <small class="fw-semibold text-theme-secondary fs-10 ms-1">(P/S)</small>
                            </th>

                            <th class="th--lg">Grams / Serving</th>

                        </tr>
                    </thead>






                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}







                    {{-- tbody --}}
                    <tbody>




                        {{-- 1: yield --}}
                        <td>
                            <input class="form-control form--input form--table-input" type="number" step='0.01'
                                wire:change="update('yield', $event.target.value, '{{ $mealSize->id }}')"
                                wire:loading.attr='readonly' value='{{ $mealSize->yield }}' />
                        </td>





                        {{-- 2: numberOfServing --}}
                        <td>
                            <input class="form-control form--input form--table-input" type="number" step='0.01'
                                wire:change="update('numberOfServing', $event.target.value, '{{ $mealSize->id }}')"
                                wire:loading.attr='readonly' value='{{ $mealSize->numberOfServing }}' />
                        </td>





                        {{-- 3: totalServingGrams --}}
                        <td>
                            <input class="form-control form--input form--table-input" type="number" step='0.01'
                                wire:change="update('totalServingGrams', $event.target.value, '{{ $mealSize->id }}')"
                                wire:loading.attr='readonly' value='{{ $mealSize->totalServingGrams }}' />
                        </td>






                        {{-- 4: gramsPerServing --}}
                        <td>
                            <input class="form-control form--input form--table-input readonly" type="number" step='0.01'
                                wire:change="update('gramsPerServing', $event.target.value, '{{ $mealSize->id }}')"
                                wire:loading.attr='readonly' value='{{ $mealSize->gramsPerServing }}' />
                        </td>




                    </tbody>
                    {{-- end tbody --}}



                </table>
            </div>
        </div>
    </div>
    {{-- end tableView --}}






    @endforeach
    {{-- end loop - mealSizes --}}




</div>
{{-- endWrapper --}}