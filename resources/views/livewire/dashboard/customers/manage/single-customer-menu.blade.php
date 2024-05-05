<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.manage.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- mainRow --}}
        <div class="row align-items-end pt-3 row mb-5">



            {{-- upcomingSubscription --}}
            <div class="col-4">
                <div class="text-center mb-4">






                    {{-- A: hasUpcomingSubscription --}}
                    @if ($hasUpcomingSubscription)




                    {{-- 1: showUpcoming --}}
                    @if (empty(session('showUpcomingSubscription')) || session('showUpcomingSubscription') == false)


                    <button
                        class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-12 scale--3"
                        type="button" wire:click='upcomingSubscription()' wire:loading.attr='disabled'>
                        <svg class="bi bi-arrow-right fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                            </path>
                        </svg>Upcoming Subscription
                    </button>




                    {{-- 2: return to Current --}}
                    @else



                    <button
                        class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-12 scale--3"
                        type="button" wire:click='currentSubscription()' wire:loading.attr='disabled'>
                        <svg class="bi bi-arrow-left fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                            </path>
                        </svg>Current Subscription
                    </button>



                    @endif
                    {{-- end if - toggleUpcoming / current --}}






                    @endif
                    {{-- end if - upcomingSubscription --}}


                </div>
            </div>
            {{-- endCol --}}









            {{-- -------------------------------- --}}
            {{-- -------------------------------- --}}









            {{-- calendarSelect --}}


            {{-- :: permission - hasEditCalendar --}}
            @if ($versionPermission->customerModuleEditCalendar)




            <div class="col-4">



                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Calendar</label>
                </div>


                {{-- select --}}
                <div class="select--single-wrapper mb-4 " wire:loading.class='no-events' wire:ignore>
                    <select class="form-select form--select" disabled data-instance='menuCalendarId' data-trigger='true'
                        value='{{ $subscription->menuCalendarId }}'>
                        <option value=""></option>

                        @foreach ($menuCalendars as $menuCalendar)
                        <option value="{{ $menuCalendar->id }}">{{ $menuCalendar->name }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            {{-- endCol --}}




            @endif
            {{-- end if - permission --}}









            {{-- skip / unSkip --}}
            <div class="col-4">


                {{-- :: permission - hasSkip --}}
                @if ($versionPermission->customerModuleHasSkip)



                {{-- wrapper --}}
                <div class="text-center mb-4">






                    {{-- A: skip --}}
                    @if ($deliveryStatus != 'Skipped' && $deliveryStatus == 'Pending')





                    {{-- :: restriction inline - skip --}}

                    <button class="btn btn--scheme btn--remove align-items-center d-inline-flex px-3 fs-12 scale--3
                        @if ($deliveryStatus == 'No Delivery') disabled @endif
                        @if($scheduleDate < $allowedSkipDate) disabled @endif" type="button"
                        wire:click='skipScheduleDay()' wire:loading.attr='disabled' wire:target='skipScheduleDay'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-skip-end fs-5 me-2">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0V4zM5 4.633 10.804 8 5 11.367V4.633z">
                            </path>
                        </svg>Skip {{ date('jS F', strtotime($scheduleDate)) }}
                    </button>









                    {{-- B: unSKip --}}
                    @elseif ($deliveryStatus == 'Skipped')



                    <button class="btn btn--scheme btn--scheme-1 align-items-center d-inline-flex px-3 fs-12 scale--3 fw-semibold @if ($deliveryStatus == 'No Delivery') disabled @endif
                        @if($scheduleDate < $allowedUnPauseDate) disabled @endif" type="button"
                        wire:click='unSkipScheduleDay()' wire:loading.attr='disabled' wire:target='unSkipScheduleDay'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-skip-end fs-5 me-2">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0V4zM5 4.633 10.804 8 5 11.367V4.633z">
                            </path>
                        </svg>Unskip {{ date('jS F', strtotime($scheduleDate)) }}
                    </button>





                    @endif
                    {{-- end if --}}




                </div>
                {{-- endWrapper --}}



                @endif
                {{-- end if - permission --}}



            </div>
            {{-- endDiv --}}









            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}










            {{-- untilSubscription - dates --}}
            <div class="col-12">
                <div class="d-block overflow-auto pb-3 text-center" style="white-space: nowrap">



                    {{-- loop - datesUntilSubscription --}}
                    @foreach ($datesUntilSubscription as $commonDate => $numberOfMeals)




                    {{-- :: disabled previousDates --}}

                    <a class="btn btn--scheme menu--calendar-days @if ($numberOfMeals > 0) has-meals @endif
                        @if ($scheduleDate == $commonDate) active @endif
                        @if ($commonDate < $globalCurrentDate) disabled @endif" role="button"
                        href="javascript:void(0);" wire:click="changeScheduleDate('{{ $commonDate }}')">


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







                {{-- :: scheduleMealExists --}}
                @if ($subscriptionScheduleMeals && ($deliveryStatus == 'Pending' || $deliveryStatus == 'Completed')
                )





                <div class="tabs--wrap">



                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs" role="tablist">


                        {{-- loop - mealTypes --}}
                        @foreach ($mealTypes as $mealType)

                        <li class="nav-item" role="presentation" wire:ignore>
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













                    {{-- ------------------------ --}}
                    {{-- ------------------------ --}}













                    {{-- tabContent --}}
                    <div class="tab-content">




                        {{-- loop - mealTypes --}}
                        @foreach ($mealTypes as $mealType)




                        {{-- tab - mealType --}}
                        <div class="tab-pane fade show no--card px-1
                        @if ($mealType->id == $mealTypes->first()->id) active @endif" role="tabpanel"
                            id="tab-{{ $mealType->id }}" wire:ignore.self>



                            {{-- mainRow --}}
                            <div class="row align-items-center mt-cards">








                                {{-- 1: loop - subscription - scheduleMeals --}}
                                @foreach ($subscriptionScheduleMeals?->where('mealTypeId', $mealType->id)
                                ?->whereNotNull('mealId') ?? [] as $subscriptionScheduleMeal)






                                {{-- -------------------- --}}
                                @php


                                // :: check allergy - exclude
                                $combine =
                                $customer->checkMealCompatibility($subscriptionScheduleMeal->meal->id);


                                $isNotAllergy = $combine?->allergies->count() == 0;
                                $isNotExclude = $combine?->excludes->count() == 0;


                                @endphp
                                {{-- -------------------- --}}











                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-5 mb-lg-5"
                                    key='schedule-meal-{{ $subscriptionScheduleMeal->id }}'>
                                    <div class="overview--card client-version scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . ($subscriptionScheduleMeal->meal->imageFile ?? $defaultPlate)) }}" />
                                            </div>




                                            {{-- name --}}
                                            <div class="col-12">
                                                <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                                    $subscriptionScheduleMeal->meal->name }}</h6>
                                            </div>










                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}











                                            {{-- topCol --}}
                                            <div class="col-12">


                                                {{-- diet--}}

                                                {{-- :: permission - hasMealFullView --}}
                                                @if ($versionPermission->menuModuleHasMealFullView)



                                                <div class="d-flex align-items-center justify-content-center mb-3">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button">
                                                        {{ $subscriptionScheduleMeal?->meal?->diet?->name }}
                                                    </button>
                                                </div>



                                                @endif
                                                {{-- end if - permission --}}







                                                {{-- Actions --}}
                                                <div class="d-flex align-items-center justify-content-center mb-2 mt-1">




                                                    {{-- 1: checkExclude / checkAllergy --}}
                                                    <button class="btn  btn--scheme btn--remove fs-11 px-2 mx-1 py-1"
                                                        @if($isNotAllergy && $isNotExclude) disabled @endif
                                                        type="button" data-bs-toggle='modal'
                                                        data-bs-target='#meal-excludes' wire:click='viewExcludes({{ $subscriptionScheduleMeal->meal->id
                                                        }})'>Excludes</button>









                                                    {{-- 2: note --}}
                                                    <button
                                                        class="btn btn--scheme btn-outline-warning fs-11 px-2 mx-1 py-1"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target='#meal-remarks'
                                                        wire:click='editRemarks({{ $subscriptionScheduleMeal->id }})'>Note</button>
                                                </div>
                                            </div>
                                            {{-- endCol --}}







                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}








                                            {{-- sizeMacros --}}

                                            {{-- :: permission - hasMealFullView --}}
                                            @if ($versionPermission->menuModuleHasMealFullView)



                                            <div class="col-12 mt-1">
                                                <div class="row">



                                                    {{-- :: AFTERCOOK --}}

                                                    {{-- 1: calories --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookCalories
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>






                                                    {{-- 2: proteins --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookProteins
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>






                                                    {{-- carbs --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookCarbs
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>



                                                    {{-- fats --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookFats
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            @endif
                                            {{-- end if - permission --}}




                                            {{-- end sizeMacros --}}












                                            {{-- changeButton - inActive --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <button class="btn btn--scheme btn--theme fs-12 mx-1 h-32 w-75
                                                    @if ($skipStatus == 'Skipped') disabled @endif" type="button">
                                                        You Will Get This
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- endButton --}}




                                        </div>
                                    </div>
                                </div>
                                {{-- endCard --}}



                                @endforeach
                                {{-- end loop - subscription - scheduleMeals --}}


















                                {{-- ------------------------------------- --}}
                                {{-- ------------------------------------- --}}
                                {{-- ------------------------------------- --}}
                                {{-- ------------------------------------- --}}














                                {{-- 2: loop - calendarScheduleMeals --}}
                                @foreach ($calendarScheduleMeals
                                ?->where('mealTypeId', $mealType->id) ?? [] as $calendarScheduleMeal)





                                {{-- withoutDefault --}}
                                @if ($calendarScheduleMeal->mealId !=
                                $subscriptionScheduleMeals?->where('mealTypeId', $mealType->id)?->first()?->mealId)








                                {{-- -------------------- --}}
                                @php


                                // :: check allergy - exclude
                                $combine =
                                $customer->checkMealCompatibility($calendarScheduleMeal->meal->id);


                                $isNotAllergy = $combine?->allergies->count() == 0;
                                $isNotExclude = $combine?->excludes->count() == 0;


                                @endphp
                                {{-- -------------------- --}}








                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-5 mb-lg-5"
                                    key='schedule-meal-{{ $calendarScheduleMeal->id }}'>
                                    <div class="overview--card client-version scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . ($calendarScheduleMeal->meal->imageFile ?? $defaultPlate)) }}" />
                                            </div>




                                            {{-- name --}}
                                            <div class="col-12">
                                                <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                                    $calendarScheduleMeal->meal->name }}</h6>
                                            </div>








                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}








                                            {{-- topCol --}}
                                            <div class="col-12">


                                                {{-- diet--}}

                                                {{-- :: permission - hasMealFullView --}}
                                                @if ($versionPermission->menuModuleHasMealFullView)



                                                <div class="d-flex align-items-center justify-content-center mb-3">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button">
                                                        {{ $calendarScheduleMeal?->meal?->diet?->name }}
                                                    </button>
                                                </div>



                                                @endif
                                                {{-- end if - permission --}}










                                                {{-- Actions --}}
                                                <div class="d-flex align-items-center justify-content-center mb-2 mt-1">


                                                    {{-- 1: checkExclude / checkAllergy --}}
                                                    <button class="btn  btn--scheme btn--remove fs-11 px-2 mx-1 py-1"
                                                        @if($isNotAllergy && $isNotExclude) disabled @endif
                                                        type="button" data-bs-toggle='modal'
                                                        data-bs-target='#meal-excludes' wire:click='viewExcludes({{ $calendarScheduleMeal->meal->id
                                                        }})'>Excludes</button>






                                                    {{-- 1.1: replace --}}
                                                    <button
                                                        class="btn  btn--scheme btn-outline-warning fs-11 px-2 mx-1 py-1"
                                                        @if($isNotAllergy && $isNotExclude) disabled @endif
                                                        type="button" data-bs-toggle='modal'
                                                        data-bs-target='#meal-replacement' wire:click='replaceMeal({{ $calendarScheduleMeal->id
                                                        }})'>Replace</button>



                                                </div>
                                            </div>
                                            {{-- endCol --}}











                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}











                                            {{-- sizeMacros --}}


                                            {{-- :: permission - hasMealFullView --}}
                                            @if ($versionPermission->menuModuleHasMealFullView)




                                            <div class="col-12 mt-1">
                                                <div class="row">



                                                    {{-- :: AFTERCOOK --}}

                                                    {{-- 1: calories --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">
                                                                {{ $calendarScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookCalories
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>






                                                    {{-- 2: proteins --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">
                                                                {{ $calendarScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookProteins
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>






                                                    {{-- carbs --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">
                                                                {{ $calendarScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookCarbs
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>



                                                    {{-- fats --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">
                                                                {{ $calendarScheduleMeal?->meal
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookFats
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            @endif
                                            {{-- end if - permission --}}



                                            {{-- end sizeMacros --}}










                                            {{-- changeButton --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">




                                                    {{-- 1: disabled --}}
                                                    <button class="btn btn--scheme btn--scheme-2 fs-12 mx-1 h-32 w-75
                                                        @if ($skipStatus == 'Skipped') disabled @endif
                                                        @if (!$isNotAllergy) disabled @endif" type="button"
                                                        wire:loading.attr='disabled' wire:target='changeMeal'
                                                        wire:click='changeMeal({{ $calendarScheduleMeal->mealId }}, {{ $calendarScheduleMeal->mealTypeId }})'>
                                                        I Want This
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- endButton --}}







                                        </div>
                                    </div>
                                </div>
                                {{-- endCard --}}




                                @endif
                                {{-- end if - withoutDefault --}}


                                @endforeach
                                {{-- end loop - scheduleMeals --}}



















                                {{-- ------------------------------------- --}}
                                {{-- ------------------------------------- --}}
                                {{-- ------------------------------------- --}}
                                {{-- ------------------------------------- --}}











                                {{-- 2: loop - subscriptionScheduleReplacements --}}
                                @foreach ($subscriptionScheduleReplacements
                                ?->where('mealTypeId', $mealType->id) ?? [] as $subscriptionScheduleReplacement)











                                {{-- -------------------- --}}
                                @php


                                // :: check allergy - exclude
                                $combine =
                                $customer->checkMealCompatibility($subscriptionScheduleReplacement->replacement->id);


                                $isNotAllergy = $combine?->allergies->count() == 0;
                                $isNotExclude = $combine?->excludes->count() == 0;



                                @endphp
                                {{-- -------------------- --}}













                                {{-- withoutDefault --}}
                                @if ($subscriptionScheduleReplacement->replacementId !=
                                $subscriptionScheduleMeals?->where('mealTypeId', $mealType->id)?->first()?->mealId)




                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-5 mb-lg-5"
                                    key='schedule-meal-{{ $subscriptionScheduleReplacement->id }}'>
                                    <div class="overview--card client-version scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . ($subscriptionScheduleReplacement->replacement->imageFile ?? $defaultPlate)) }}" />
                                            </div>




                                            {{-- name --}}
                                            <div class="col-12">
                                                <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                                    $subscriptionScheduleReplacement->replacement->name }}</h6>
                                            </div>








                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}








                                            {{-- topCol --}}
                                            <div class="col-12">


                                                {{-- diet--}}

                                                {{-- :: permission - hasMealFullView --}}
                                                @if ($versionPermission->menuModuleHasMealFullView)



                                                <div class="d-flex align-items-center justify-content-center mb-3">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button">
                                                        {{
                                                        $subscriptionScheduleReplacement?->replacement?->diet?->name}}
                                                    </button>
                                                </div>



                                                @endif
                                                {{-- end if - permission --}}










                                                {{-- Actions --}}
                                                <div class="d-flex align-items-center justify-content-center mb-2 mt-1">


                                                    {{-- 1: checkExclude / checkAllergy --}}
                                                    <button class="btn  btn--scheme btn--remove fs-11 px-2 mx-1 py-1"
                                                        @if($isNotAllergy && $isNotExclude) disabled @endif
                                                        type="button" data-bs-toggle='modal'
                                                        data-bs-target='#meal-excludes' wire:click='viewExcludes({{
                                                        $subscriptionScheduleReplacement->replacement->id
                                                        }})'>Excludes</button>






                                                    {{-- 1.1: replace --}}
                                                    <button
                                                        class="btn  btn--scheme btn-outline-warning fs-11 px-2 mx-1 py-1"
                                                        @if($isNotAllergy && $isNotExclude) disabled @endif
                                                        type="button" data-bs-toggle='modal'
                                                        data-bs-target='#meal-replacement' wire:click='replaceMealForReplacement({{
                                                        $subscriptionScheduleReplacement->id
                                                        }}, {{
                                                        $subscriptionScheduleReplacement->replacement
                                                        }})'>Replace</button>



                                                </div>
                                            </div>
                                            {{-- endCol --}}











                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}











                                            {{-- sizeMacros --}}


                                            {{-- :: permission - hasMealFullView --}}
                                            @if ($versionPermission->menuModuleHasMealFullView)



                                            <div class="col-12 mt-1">
                                                <div class="row">



                                                    {{-- :: AFTERCOOK --}}

                                                    {{-- 1: calories --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleReplacement?->replacement
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookCalories
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>






                                                    {{-- 2: proteins --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleReplacement?->replacement
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookProteins
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>






                                                    {{-- carbs --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleReplacement?->replacement
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookCarbs
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>



                                                    {{-- fats --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">
                                                                {{ $subscriptionScheduleReplacement?->replacement
                                                                ?->certainSize($sizesByMealType[$mealType->id]?->id)?->afterCookFats
                                                                ?? 0
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            @endif
                                            {{-- end if - permission --}}



                                            {{-- end sizeMacros --}}










                                            {{-- changeButton --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <button class="btn btn--scheme btn--scheme-2 fs-12 mx-1 h-32 w-75
                                                    @if ($skipStatus == 'Skipped') disabled @endif" type="button"
                                                        wire:loading.attr='disabled' wire:target='changeMeal'
                                                        wire:click='changeMeal({{ $subscriptionScheduleReplacement->replacementId }}, {{ $subscriptionScheduleReplacement->mealTypeId }})'>
                                                        I Want This
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- endButton --}}




                                        </div>
                                    </div>
                                </div>
                                {{-- endCard --}}





                                @endif
                                {{-- end if - withoutDefault --}}




                                @endforeach
                                {{-- end loop - subscriptionScheduleReplacements --}}



                            </div>
                        </div>
                        {{-- end tab --}}


                        @endforeach
                        {{-- end tab - byMealTypes --}}


                    </div>
                </div>
                {{-- end tabsWrap --}}











                {{-- ------------------------------------------ --}}
                {{-- ------------------------------------------ --}}









                {{-- :: schedule - notFound --}}
                @else




                {{-- alert - fallback --}}





                {{-- 1: No Delivery --}}
                @if ($deliveryStatus == 'No Delivery')

                <div class="w-100 mb-5 menu--alert py-3 px-4 mt-4">
                    <div class="d-flex flex-column align-items-start justify-content-center">
                        <h5 class="mb-0 fw-normal">No Scheduled Meals for <span class="text-gold">today</span>
                        </h5>
                    </div>
                </div>







                {{-- 2: Canceled --}}
                @elseif ($deliveryStatus == 'Canceled')

                <div class="w-100 mb-5 menu--alert py-3 px-4 mt-4">
                    <div class="d-flex flex-column align-items-start justify-content-center">
                        <h5 class="mb-0 fw-normal">Today's Schedule has been <span class="text-gold">canceled</span>
                        </h5>
                    </div>
                </div>








                {{-- 3: Paused --}}
                @elseif ($deliveryStatus == 'Paused')


                <div class="w-100 mb-5 menu--alert py-3 px-4 mt-4">
                    <div class="d-flex flex-column align-items-start justify-content-center">
                        <h5 class="mb-0 fw-normal">Today's Schedule has been <span class="text-gold">paused</span>
                        </h5>
                    </div>
                </div>







                {{-- 4: Slipped --}}
                @elseif ($deliveryStatus == 'Skipped')


                <div class="w-100 mb-5 menu--alert py-3 px-4 mt-4">
                    <div class="d-flex flex-column align-items-start justify-content-center">
                        <h5 class="mb-0 fw-normal">Today's Schedule has been <span class="text-gold">skipped</span>
                        </h5>
                    </div>
                </div>






                @endif
                {{-- end if --}}






                @endif
                {{-- end if - existingScheduleMeals --}}





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













    @section('modals')


    {{-- 1: editRemarks --}}
    <livewire:dashboard.customers.manage.single-customer-menu.components.single-customer-menu-edit-remarks
        id='{{ $customer->id }}' key='{{ $customer->id }}' />






    {{-- ------------------------------------- --}}





    {{-- 2: viewExcludes --}}
    <livewire:dashboard.customers.manage.single-customer-menu.components.single-customer-menu-view-excludes
        id='{{ $customer->id }}' key='{{ $customer->id }}' />










    {{-- ------------------------------------- --}}





    {{-- 3: replaceMeal --}}
    <livewire:dashboard.customers.manage.single-customer-menu.components.single-customer-menu-replace-meal
        id='{{ $customer->id }}' key='{{ $customer->id }}' />








    {{-- 3.5: replaceMealExcludes --}}
    <livewire:dashboard.customers.manage.single-customer-menu.components.single-customer-menu-replace-meal-excludes
        id='{{ $customer->id }}' key='{{ $customer->id }}' />






    @endsection
    {{-- endSection --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</section>
{{-- endSection --}}