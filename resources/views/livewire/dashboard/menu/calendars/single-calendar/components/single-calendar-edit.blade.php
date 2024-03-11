{{-- update / store Form --}}
<form wire:submit='update' id='schedule--form'>
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
                        wire:change='changeScheduleDate' wire:loading.attr='readonly'
                        wire:target='changeScheduleDate, toggle, update' />
                </div>






                {{-- search --}}
                <div class="col-4 offset-1">
                    <input wire:model.live='searchMeal' class="form-control form--input main-version mx-auto mb-4"
                        type="search" placeholder="Search By Name" />
                </div>









                {{-- counter - submitButton --}}
                <div class="col-4 d-flex align-items-center justify-content-end">

                    <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                        class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-4 py-1 me-2"
                        title="Number of Meals">
                        {{ $meals->count() }}
                    </h3>


                    <button
                        class="btn btn--scheme btn--scheme-2 px-4 py-2 d-inline-flex align-items-center fs-14 mb-4 fw-semibold justify-content-center"
                        type="button" style="border: 1px dashed var(--color-scheme-3)" wire:click='update()'
                        wire:loading.attr='disabled' wire:target='update, include, toggle, changeScheduleDate'>
                        Save Changes
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
                                    role="tab" data-bs-toggle="tab" href="#tab-type-{{ $mealType->id }}"
                                    wire:ignore.self>{{
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


                            {{-- tabContent - meals by mealType --}}
                            <div class="tab-pane @if ($mealTypes->first()->id == $mealType->id) active @endif no--card"
                                role="tabpanel" id="tab-type-{{ $mealType->id }}" wire:ignore.self>



                                {{-- outlineRow --}}
                                <div class="row row mt-zone-cards align-items-center mb-4">



                                    {{-- loop - meals --}}
                                    @foreach ($meals->where('typeId', $mealType->typeId) as $meal)




                                    {{-- ** STRICT TO MEALTYPE IF IT IS ** --}}
                                    @if ($meal->type->name != 'Meal'
                                    || $meal?->types?->whereIn('mealTypeId', [$mealType->id])?->first())






                                    {{-- --------------------------- --}}
                                    {{-- :: get scheduleMeals - if-found --}}
                                    @php

                                    $scheduleMeal = $scheduleMeals?->where('mealId',
                                    $meal->id)?->where('mealTypeId', $mealType->id)?->first()

                                    @endphp
                                    {{-- --------------------------- --}}








                                    <div class="col-4 col-xl-3 col-xxl-3" key='{{ now() }}'>
                                        <div class="overview--card client-version scale--self-05 mb-floating">
                                            <div class="row">



                                                {{-- imageFile --}}
                                                <div class="col-12 text-center position-relative">
                                                    <img class="client--card-logo"
                                                        src="{{ asset('storage/menu/meals/' . $meal->imageFile) }}" />
                                                </div>




                                                {{-- name - diet --}}
                                                <div class="col-12">
                                                    <h6 class="text-center fw-bold mt-3
                                                    mb-2 truncate-text-2l height-2l">{{ $meal->name }}</h6>


                                                    <p class="text-center fs-13 fw-bold text-danger mb-3">
                                                        <button
                                                            class="btn btn--raw-icon fs-14 text-warning d-flex align-items-center justify-content-center fw-bold no-events"
                                                            type="button">
                                                            {{ $meal->diet->name }}
                                                        </button>
                                                    </p>
                                                </div>





                                                {{-- :: includeButton --}}
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div
                                                            class="form-check form-switch mealType--checkbox justify-content-center flex-column-reverse">

                                                            {{-- :: checked --}}
                                                            <input class="form-check-input pointer"
                                                                id="formCheck-{{ $mealType->id }}-{{ $meal->id }}"
                                                                type="checkbox" @if ($scheduleMeal) checked @endif
                                                                wire:change='include({{ $mealType->id }}, {{ $meal->id }})'
                                                                wire:loading.attr='disabled'
                                                                wire:target='changeScheduleDate, include, update' />



                                                            {{-- label --}}
                                                            <label class="form-check-label fs-14 mx-0 mb-2 pointer"
                                                                for="formCheck-{{ $mealType->id }}-{{ $meal->id }}">Include</label>
                                                        </div>
                                                    </div>
                                                </div>






                                                {{-- :: default --}}
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div
                                                            class="form-check itemType--radio justify-content-center flex-column-reverse">


                                                            {{-- input --}}
                                                            <input class="form-check-input pointer" type="radio"
                                                                id="formRadio-{{ $mealType->id }}-{{ $meal->id }}"
                                                                name="{{ $mealType->shortName }}-default"
                                                                wire:loading.attr='disabled'
                                                                wire:target='changeScheduleDate, toggle, update'
                                                                wire:change='toggle({{ $mealType->id }}, {{ $meal->id }})'
                                                                @if($scheduleMeal?->isDefault) checked @endif

                                                            />


                                                            {{-- label --}}
                                                            <label class="form-check-label fs-14 mx-0 mb-2 pointer"
                                                                for="formRadio-{{ $mealType->id }}-{{ $meal->id }}">Default</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- endCol --}}



                                            </div>
                                        </div>
                                    </div>
                                    {{-- endCard --}}



                                    @endif
                                    {{-- end if --}}



                                    @endforeach
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