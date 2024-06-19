<section id="content--section" class="content--section">
    <div class="container">






        {{-- :: SubMenu --}}
        <livewire:customer-portal.components.sub-menu id='{{ $customer->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- mainRow --}}
        <div class="row align-items-end justify-content-center  pt-2  mb-5">






            {{-- subheading --}}
            <div class="col-12 col-sm-12">


                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <label
                        class="form-label form--label px-3 w-100 justify-content-center mb-3 fs-5 fw-bold menu--title">Delicious
                        Meals Cooked with Love</label>
                </div>

            </div>










            {{-- ------------------------------------------------ --}}
            {{-- ------------------------------------------------ --}}






            {{-- sizeMacros --}}
            <div class="col-12 mb-4">
                <div class="row justify-content-center">



                    {{-- :: AFTERCOOK --}}

                    {{-- 1: calories --}}
                    <div class="col-auto text-end px-1">
                        <div class="overview--box shrink--self macros-version for-calories lg">
                            <h6 class="fs-14 fw-semibold">CA</h6>
                            <p class="fs-13">{{ $totalCalories }}</p>
                        </div>
                    </div>






                    {{-- 2: proteins --}}
                    <div class="col-auto text-end px-1">
                        <div class="overview--box shrink--self macros-version for-proteins lg">
                            <h6 class="fs-14 fw-semibold">P</h6>
                            <p class="fs-13">{{ $totalProteins }}</p>
                        </div>
                    </div>






                    {{-- carbs --}}
                    <div class="col-auto text-end px-1">
                        <div class="overview--box shrink--self macros-version for-carbs lg">
                            <h6 class="fs-14 fw-semibold">C</h6>
                            <p class="fs-13">{{ $totalCarbs }}</p>
                        </div>
                    </div>



                    {{-- fats --}}
                    <div class="col-auto text-end px-1">
                        <div class="overview--box shrink--self macros-version for-fats lg">
                            <h6 class="fs-14 fw-semibold">F</h6>
                            <p class="fs-13">{{ $totalFats }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end sizeMacros --}}










            {{-- -------------------------------- --}}
            {{-- -------------------------------- --}}










            {{-- upcomingSubscription --}}


            {{-- A: hasUpcomingSubscription --}}
            @if ($hasUpcomingSubscription)



            <div class="col-12 col-sm-6 col-md-6 mb-2 mb-sm-4">
                <div class="text-center">





                    {{-- 1: showUpcoming --}}
                    @if (empty(session('showUpcomingSubscription')) || session('showUpcomingSubscription') == false)


                    <button
                        class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-12 scale--3"
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
                        class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-12 scale--3"
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




                </div>
            </div>
            {{-- endCol --}}




            @endif
            {{-- end if - upcomingSubscription --}}















            {{-- skip --}}
            <div class="col-12 col-sm-6 col-md-6">








                {{-- :: permission - hasSkip --}}
                @if ($versionPermission->customerModuleHasSkip)



                <div class="text-center  text-md-center mb-4">




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
                        @if($scheduleDate < $allowedSkipDate) disabled @endif" type="button"
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
                @if ($subscriptionScheduleMeals && ($deliveryStatus == 'Pending' || $deliveryStatus == 'Completed') )





                <div class="tabs--wrap for-mobile for-menu">



                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs nav-tabs-centered customer--nav" role="tablist">


                        {{-- loop - mealTypes --}}
                        @foreach ($mealTypes as $mealType)

                        <li class="nav-item" role="presentation" wire:ignore>
                            <a class="nav-link px-3
                            @if ($mealType->id == $mealTypes->first()->id)) active @endif" data-bs-toggle="tab"
                                role="tab" href="#tab-{{ $mealType->id }}">{{$mealType->name}}</a>
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
                    <div class="tab-content mt-0 mt-lg-0">




                        {{-- loop - mealTypes --}}
                        @foreach ($mealTypes as $mealType)




                        {{-- tab - mealType --}}
                        <div class="tab-pane fade show no--card px-1
                        @if ($mealType->id == $mealTypes->first()->id) active @endif" role="tabpanel"
                            id="tab-{{ $mealType->id }}" wire:ignore.self>


                            {{-- mainRow --}}
                            <div
                                class="row align-items-center mt-cards justify-content-center justify-content-md-start">








                                {{-- 1: loop - subscription - scheduleMeals --}}
                                @foreach ($subscriptionScheduleMeals?->where('mealTypeId', $mealType->id)
                                ?->whereNotNull('mealId') ?? [] as $subscriptionScheduleMeal)






                                {{-- -------------------- --}}
                                @php


                                // :: check allergy - exclude
                                $combine =
                                $customer->checkMealCompatibility($subscriptionScheduleMeal?->meal?->id);


                                $isNotAllergy = $combine?->allergies->count() == 0;
                                $isNotExclude = $combine?->excludes->count() == 0;


                                @endphp
                                {{-- -------------------- --}}









                                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 mb-0 mb-lg-5"
                                    key='schedule-meal-{{ $subscriptionScheduleMeal?->id }}'>
                                    <div class="overview--card client-version menu scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . ($subscriptionScheduleMeal?->meal?->imageFile ?? $defaultPlate)) }}" />
                                            </div>




                                            {{-- name --}}
                                            <div class="col-12">
                                                <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                                    $subscriptionScheduleMeal?->meal?->name }}</h6>
                                            </div>










                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}











                                            {{-- topCol --}}
                                            <div class="col-12">


                                                {{-- diet--}}
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 d-none">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button">
                                                        {{ $subscriptionScheduleMeal?->meal?->diet?->name }}
                                                    </button>
                                                </div>



                                                {{-- Actions (HIDDEN) --}}
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-2 mt-1 d-none">




                                                    {{-- 1: checkExclude / checkAllergy --}}
                                                    <button class="btn  btn--scheme btn--remove fs-11 px-2 mx-1 py-1"
                                                        @if($isNotAllergy && $isNotExclude) disabled @endif
                                                        type="button" data-bs-toggle='modal'
                                                        data-bs-target='#meal-excludes' wire:click='viewExcludes({{ $subscriptionScheduleMeal?->meal?->id
                                                        }})'>Excludes</button>


                                                </div>
                                            </div>
                                            {{-- endCol --}}







                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}








                                            {{-- sizeMacros --}}
                                            <div class="col-12 mt-1">
                                                <div class="row justify-content-center">



                                                    {{-- :: AFTERCOOK --}}

                                                    {{-- 1: calories --}}
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-calories sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-proteins sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-carbs sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-fats sm">
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
                                            {{-- end sizeMacros --}}







                                            {{-- changeButton - inActive --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <button class="btn btn--scheme btn--scheme-outline-2 disabled fs-12 mx-1 h-32 w-75
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











                                {{-- 2: loop - calendarScheduleMeals --}}
                                @foreach ($calendarScheduleMeals
                                ?->where('mealTypeId', $mealType->id) ?? [] as $calendarScheduleMeal)





                                {{-- withoutDefault --}}
                                @if ($calendarScheduleMeal?->mealId !=
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









                                <div class="col-10 col-sm-6 col-lg-4 col-xl-3 mb-0 mb-lg-5"
                                    key='schedule-meal-{{ $calendarScheduleMeal->id }}'>
                                    <div class="overview--card client-version menu scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . ($calendarScheduleMeal?->meal->imageFile ?? $defaultPlate)) }}" />
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
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 d-none">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button">
                                                        {{ $calendarScheduleMeal?->meal?->diet?->name }}
                                                    </button>
                                                </div>










                                                {{-- Actions (HIDDEN) --}}
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-2 mt-1 d-none">


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
                                            <div class="col-12 mt-1">
                                                <div class="row justify-content-center">



                                                    {{-- :: AFTERCOOK --}}

                                                    {{-- 1: calories --}}
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-calories sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-proteins sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-carbs sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-fats sm">
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
                                            {{-- end sizeMacros --}}










                                            {{-- changeButton --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">




                                                    {{-- 1: disabled --}}
                                                    <button
                                                        class="btn btn--scheme btn--scheme-2 fs-12 mx-1 h-32 w-75
                                                        @if ($skipStatus == 'Skipped') disabled @endif
                                                        @if (!$isNotAllergy) disabled @endif
                                                        @if ($scheduleDate < $allowedMealSelectionDate) disabled @endif"
                                                        type="button" wire:loading.attr='disabled'
                                                        wire:target='changeMeal'
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











                                {{-- 2: loop - subscriptionScheduleReplacements --}}
                                @foreach ($subscriptionScheduleReplacements
                                ?->where('mealTypeId', $mealType->id) ?? [] as $subscriptionScheduleReplacement)





                                {{-- withoutDefault --}}
                                @if ($subscriptionScheduleReplacement->replacementId !=
                                $subscriptionScheduleMeals?->where('mealTypeId', $mealType->id)?->first()?->mealId)












                                {{-- -------------------- --}}
                                @php


                                // :: check allergy - exclude
                                $combine =
                                $customer->checkMealCompatibility($subscriptionScheduleReplacement->replacement->id);


                                $isNotAllergy = $combine?->allergies->count() == 0;
                                $isNotExclude = $combine?->excludes->count() == 0;



                                @endphp
                                {{-- -------------------- --}}









                                <div class="col-10 col-sm-6 col-lg-4 col-xl-3 mb-0 mb-lg-5"
                                    key='schedule-meal-{{ $subscriptionScheduleReplacement->id }}'>
                                    <div class="overview--card client-version menu scale--self-05 mb-floating">
                                        <div class="row">


                                            {{-- imageFile --}}
                                            <div class="col-12 text-center position-relative">
                                                <img class="client--card-logo"
                                                    src="{{ asset('storage/menu/meals/' . ($subscriptionScheduleReplacement?->replacement?->imageFile ?? $defaultPlate)) }}" />
                                            </div>




                                            {{-- name --}}
                                            <div class="col-12">
                                                <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                                    $subscriptionScheduleReplacement?->replacement?->name }}</h6>
                                            </div>








                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}








                                            {{-- topCol --}}
                                            <div class="col-12">


                                                {{-- diet--}}
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 d-none">
                                                    <button
                                                        class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                        type="button">
                                                        {{ $subscriptionScheduleReplacement?->meal?->diet?->name }}
                                                    </button>
                                                </div>










                                                {{-- Actions (HIDDEN) --}}
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-2 mt-1 d-none">


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
                                            <div class="col-12 mt-1">
                                                <div class="row justify-content-center">



                                                    {{-- :: AFTERCOOK --}}

                                                    {{-- 1: calories --}}
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-calories sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-proteins sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-carbs sm">
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
                                                    <div class="col-auto text-end px-1">
                                                        <div
                                                            class="overview--box shrink--self macros-version for-fats sm">
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
                                            {{-- end sizeMacros --}}







                                            {{-- changeButton --}}
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <button class="btn btn--scheme btn--scheme-2 fs-12 mx-1 h-32 w-75
                                                    @if ($skipStatus == 'Skipped') disabled @endif
                                                    @if ($scheduleDate < $allowedMealSelectionDate) disabled @endif"
                                                        type="button" wire:loading.attr='disabled'
                                                        wire:target='changeMeal'
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
        {{-- endRow --}}



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




    {{-- 1: viewExcludes --}}
    <livewire:customer-portal.customer-menu.components.customer-menu-view-excludes id='{{ $customer->id }}'
        key='view-excludes-modal-{{ $customer->id }}' />





    @endsection
    {{-- endSection --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









</section>
{{-- endSection --}}