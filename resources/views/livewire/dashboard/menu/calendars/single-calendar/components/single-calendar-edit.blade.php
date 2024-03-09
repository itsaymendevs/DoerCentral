{{-- update / store Form --}}
<form wire:submit='update'>
    <div class="row pt-2">
        <div class="col-12 align-self-center">
            <div class="row align-items-end">



                {{-- scheduleDate --}}
                <div class="col-3">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <hr style="width: 55%" />
                        <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Schedule
                            Date</label>
                    </div>
                    <input class="form-control form--input mb-4" type="date" wire:model='instance.scheduleDate' required
                        wire:change='changeScheduleDate' />
                </div>






                {{-- search --}}
                <div class="col-4 offset-1">
                    <input wire:model='searchMeal' class="form-control form--input main-version mx-auto mb-4"
                        type="search" placeholder="Search By Name" />
                </div>









                {{-- counter - submitButton --}}
                <div class="col-4 d-flex align-items-center justify-content-end">

                    <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                        class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-4 py-1 me-2"
                        title="Number of Meals">
                        2
                    </h3>


                    <button
                        class="btn btn--scheme btn--scheme-2 px-4 py-2 d-inline-flex align-items-center fs-14 mb-4 fw-semibold justify-content-center"
                        type="button" style="border: 1px dashed var(--color-scheme-3)">
                        Save Calendar
                    </button>
                </div>






                {{-- -------------------------------- --}}
                {{-- -------------------------------- --}}









                {{-- tabWrapper --}}
                <div class="col-12">
                    <div>



                        {{-- tabLinks --}}
                        <ul class="nav nav-tabs inner" role="tablist">


                            {{-- loop - mealTypes --}}
                            @foreach ($mealTypes as $mealType)

                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if ($mealTypes->first()->id == $mealType->id) active @endif"
                                    role="tab" data-bs-toggle="tab" href="#tab-type-{{ $mealType->id }}">{{
                                    $mealType->shortName }}</a>
                            </li>

                            @endforeach
                            {{-- end loop --}}


                        </ul>
                        {{-- end tabLinks --}}









                        {{-- ------------------------ --}}
                        {{-- ------------------------ --}}






                        {{-- tabContent --}}
                        <div class="tab-content">



                            {{-- loop - mealTypes --}}
                            @foreach ($mealTypes as $mealType)


                            {{-- tabContent - items by mealType --}}
                            <div class="tab-pane @if ($mealTypes->first()->id == $mealType->id) active @endif no--card"
                                role="tabpanel" id="tab-type-{{ $mealType->id }}">



                                {{-- outlineRow --}}
                                <div class="row row mt-zone-cards align-items-center mb-4">



                                    {{-- loop - items --}}
                                    @foreach ($collection as $item)

                                    @endforeach
                                    <div class="col-4 col-xl-3 col-xxl-3">
                                        <div class="overview--card client-version scale--self-05 mb-floating">
                                            <div class="row">


                                                {{-- imageFile --}}
                                                <div class="col-12 text-center position-relative">
                                                    <img class="client--card-logo" src="../assets/img/Recipes/1.png" />
                                                </div>




                                                {{-- name - diet --}}
                                                <div class="col-12">
                                                    <h6
                                                        class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">
                                                        {{ $ }}</h6>
                                                    <p class="text-center fs-13 fw-bold text-danger mb-3">
                                                        <button
                                                            class="btn btn--raw-icon fs-14 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                            type="button" data-bs-target="#plan-ranges"
                                                            data-bs-toggle="modal">
                                                            Carbohydrates
                                                        </button>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div
                                                            class="form-check form-switch mealType--checkbox justify-content-center flex-column-reverse">
                                                            <input class="form-check-input pointer" type="checkbox"
                                                                id="formCheck-1" checked="" /><label
                                                                class="form-check-label fs-14 mx-0 mb-2"
                                                                for="formCheck-1">Include</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div
                                                            class="form-check itemType--radio justify-content-center flex-column-reverse">
                                                            <input class="form-check-input" type="radio"
                                                                id="formCheck-2" name="snackType" /><label
                                                                class="form-check-label fs-14 mx-0 mb-2"
                                                                for="formCheck-2">Default</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end loop --}}



                                </div>
                            </div>
                            {{-- end tabContent --}}


                            @endforeach
                            {{-- end loop --}}



                        </div>
                        {{-- end tabContent --}}


                    </div>
                </div>
                {{-- end outerCol --}}



            </div>
        </div>
    </div>
</form>
{{-- endForm --}}