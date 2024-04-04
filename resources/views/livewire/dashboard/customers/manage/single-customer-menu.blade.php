<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.manage.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- mainRow --}}
        <div class="row align-items-end pt-3 row mb-5">



            {{-- empty --}}
            <div class="col-4"></div>




            {{-- calendarSelect --}}
            <div class="col-4">


                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Calendar</label>
                </div>


                {{-- select --}}
                <div class="select--single-wrapper mb-4" wire:ignore>
                    <select class="form-select form--select" data-instance='menuCalendarId' data-trigger='true'
                        value='{{ $subscription->menuCalendarId }}'>
                        <option value=""></option>

                        @foreach ($menuCalendars as $menuCalendar)
                        <option value="{{ $menuCalendar->id }}">{{ $menuCalendar->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>








            {{-- skip --}}
            <div class="col-4">
                <div class="text-center mb-4">
                    <button class="btn btn--scheme btn--remove align-items-center d-inline-flex px-3 fs-12 scale--3"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-skip-end fs-5 me-2">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0V4zM5 4.633 10.804 8 5 11.367V4.633z">
                            </path>
                        </svg>Skip {{ date('jS F', strtotime($scheduleDate)) }}
                    </button>
                </div>
            </div>










            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}








            {{-- untilSubscription - dates --}}
            <div class="col-12">
                <div class="d-block overflow-auto pb-3 text-center" style="white-space: nowrap">



                    {{-- loop - datesUntilSubscription --}}
                    @foreach ($datesUntilSubscription as $commonDate => $numberOfMeals)



                    <a class="btn btn--scheme menu--calendar-days @if ($numberOfMeals > 0) has-meals @endif
                        @if ($scheduleDate == $commonDate) active @endif" role="button" href="javascript:void(0);"
                        wire:click="changeScheduleDate('{{ $commonDate }}')">


                        {{-- day --}}
                        <span class="d-block fs-12 fw-semibold text-theme-secondary">{{ date('d',
                            strtotime($commonDate)) }}</span>


                        {{-- month --}}
                        <span class="d-block mt-1 fs-15">{{ date('M',
                            strtotime($commonDate)) }}</span>


                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dot">
                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                        </svg>
                    </a>


                    @endforeach
                    {{-- end loop --}}



                </div>
            </div>
            {{-- endDates --}}











            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}











            {{-- tabs --}}
            <div class="col-12 mt-2">
                <div class="tabs--wrap">



                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs" role="tablist">


                        {{-- loop - mealTypes --}}
                        @foreach ($mealTypes as $mealType)

                        <li class="nav-item" role="presentation">
                            <a class="nav-link px-3
                            @if ($mealType->id == $mealTypes->first()->id)) active @endif" data-bs-toggle="tab"
                                role="tab" href="#tab-{{ $mealType->id }}">{{
                                $mealType->name}}</a>
                        </li>

                        @endforeach
                        {{-- end loop --}}






                        {{-- :: add-ons --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link px-3 disabled" data-bs-toggle="tab" role="tab"
                                href="#tab-addons">Add-ons</a>
                        </li>



                    </ul>
                    {{-- endLinks --}}










                    {{-- -------------------------- --}}
                    {{-- -------------------------- --}}











                    {{-- tabContent --}}
                    <div class="tab-content">




                        {{-- loop - mealTypes --}}
                        @foreach ($mealTypes as $mealType)




                        {{-- tab - mealType --}}
                        <div class="tab-pane fade show no--card px-1
                        @if ($mealType->id == $mealTypes->first()->id) active @endif" role="tabpanel"
                            id="tab-{{ $mealType->id }}">


                            {{-- mainRow --}}
                            <div class="row align-items-center mt-cards">









                                {{-- loop - calendarScheduleMeals --}}
                                @foreach ($calendarScheduleMeals
                                ?->where('mealTypeId', $mealType->id) ?? [] as $calendarScheduleMeal)



                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-5 mb-lg-5">
                                    <div class="overview--card client-version scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . $calendarScheduleMeal->meal->imageFile) }}" />
                                            </div>




                                            {{-- name --}}
                                            <div class="col-12">
                                                <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                                    $calendarScheduleMeal->meal->name }}</h6>
                                            </div>





                                            {{-- ----------------- --}}
                                            {{-- ----------------- --}}






                                            {{-- topCol --}}
                                            <div class="col-12">


                                                {{-- size --}}
                                                <div class="d-flex align-items-center justify-content-center mb-3">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button" data-bs-target="#plan-ranges"
                                                        data-bs-toggle="modal">
                                                        Medium
                                                    </button>
                                                </div>



                                                {{-- Actions --}}
                                                <div class="d-flex align-items-center justify-content-center mb-2 mt-1">


                                                    {{-- viewExclude --}}
                                                    <button class="btn  btn--scheme btn--remove fs-11 px-2 mx-1 py-1"
                                                        type="button">Excludes</button>



                                                    {{-- replace --}}
                                                    <button
                                                        class="btn  btn--scheme btn-outline-warning fs-11 px-2 mx-1 py-1"
                                                        type="button">Replace</button>




                                                    {{-- note --}}
                                                    <button
                                                        class="btn btn--scheme btn-outline-warning fs-11 px-2 mx-1 py-1"
                                                        type="button">Note</button>
                                                </div>
                                            </div>
                                            {{-- endCol --}}







                                            {{-- ----------------- --}}
                                            {{-- ----------------- --}}








                                            {{-- sizeMacros --}}
                                            <div class="col-12 mt-1">
                                                <div class="row">


                                                    {{-- 1: calories --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">320</p>
                                                        </div>
                                                    </div>


                                                    {{-- 2: proteins --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">43</p>
                                                        </div>
                                                    </div>



                                                    {{-- carbs --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">200</p>
                                                        </div>
                                                    </div>



                                                    {{-- fats --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">15</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end sizeMacros --}}







                                            {{-- changeButton --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <button class="btn btn--scheme btn--scheme-2 fs-12 mx-1 h-32 w-75"
                                                        type="button">
                                                        I Want This
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- endButton --}}




                                        </div>
                                    </div>
                                </div>
                                {{-- endCard --}}


                                @endforeach
                                {{-- end loop - scheduleMeals --}}




                            </div>
                        </div>
                        {{-- end tab --}}


                        @endforeach
                        {{-- end tab - byMealTypes --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



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