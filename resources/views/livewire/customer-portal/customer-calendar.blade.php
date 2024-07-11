<section id="content--section" class="content--section">
    <div class="container">






        {{-- :: SubMenu --}}
        <livewire:customer-portal.components.sub-menu id='{{ $customer->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- :: FOR DESKTOP --}}



        {{-- mainRow --}}
        <div class="row align-items-end pt-2 d-none d-lg-block">


            {{-- filter --}}
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-5">
                <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Week
                        Filter</label>
                </div>


                {{-- weekSelect --}}
                <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                    <select class="form-select form--select" data-instance='searchFromDate' data-trigger='true' required
                        value='{{ $searchFromDate }}'>

                        @foreach ($weeks as $week)
                        <option value="{{ $week }}">Show From {{ date('d / m / Y', strtotime($week)) }}</option>
                        @endforeach

                    </select>
                </div>

            </div>
            {{-- endFilters --}}







            {{-- ---------------------------------------- --}}
            {{-- ---------------------------------------- --}}









            {{-- left-right actions --}}
            <div class="col-4 mb-5 d-none d-sm-block">
                <div class="btn-group btn--swtich-group mb-0 d-none" role="group" style="margin-bottom: 10px">

                    {{-- left --}}
                    <button class="btn btn--switch-view fw-bold" type="button" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-arrow-left">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                            </path>
                        </svg>
                    </button>


                    {{-- right --}}
                    <button class="btn btn--switch-view fw-bold" type="button" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-arrow-right">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>







            {{-- ---------------------------------------------------- --}}
            {{-- ---------------------------------------------------- --}}








            {{-- calendarView --}}
            <div class="col-12 mb-4">
                <div class="table-responsive memoir--table w-100 vertical calendar--table mobile">
                    <table class="table table-bordered pb-3 " id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th class="th--md" style="min-width: 105px;"></th>


                                {{-- :: loop - weekDates --}}
                                @foreach ($weekDates as $weekDate)

                                <th colspan="" class='mobile'>{{ date('l', strtotime($weekDate)) }}
                                    <br>
                                    <span class='fs-10 text-dark fw-semibold'>
                                        ({{ date('d / m', strtotime($weekDate)) }})
                                    </span>
                                </th>

                                @endforeach
                                {{-- end loop --}}


                            </tr>
                        </thead>




                        {{-- ------------------------------------------ --}}
                        {{-- ------------------------------------------ --}}








                        {{-- tableBody --}}
                        <tbody>




                            {{-- :: mealTypes --}}
                            @foreach ($mealTypes ?? [] as $mealType)
                            <tr key='mealType-{{ $mealType->id }}'>




                                {{-- 1: common - mealType --}}
                                <td class="fw-bold fs-13  py-3">
                                    {{ $mealType->name }}
                                </td>







                                {{-- :: loop - weekDates --}}
                                @foreach ($weekDates as $weekDate)




                                {{-- 2: weekDate --}}
                                <td key='weekDay-{{ $mealType->id }}'>


                                    {{-- loop - schedules by weekDate --}}
                                    @foreach ($schedules?->where('scheduleDate', $weekDate) as $schedule)



                                    {{-- loop - scheduleMeals --}}
                                    @foreach ($schedule?->meals?->where('mealTypeId', $mealType->id) as $scheduleMeal)




                                    {{-- meal-exists --}}
                                    @if ($scheduleMeal?->meal)



                                    <p class="calendar--table-meal tr--ingredient mb-0"
                                        key='scheduleMeal-{{ $scheduleMeal->meal->id }}'>
                                        {{ $scheduleMeal->meal->name }}
                                    </p>



                                    @endif
                                    {{-- end if --}}





                                    @endforeach
                                    {{-- end loop - scheduleMeals --}}





                                    @endforeach
                                    {{-- end loop - schedules --}}





                                </td>
                                @endforeach
                                {{-- end loop - weekDays --}}




                            </tr>
                            @endforeach
                            {{-- end loop - mealTypes --}}




                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endCol --}}












        </div>
        {{-- endRow --}}



















        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}











        {{-- :: FOR MOBILE --}}




        {{-- mainRow --}}
        <div class="row align-items-end pt-2 d-block d-lg-none">


            {{-- filter --}}
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-5">
                <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Schedule Date</label>
                </div>


                {{-- scheduleDate --}}
                <input type="date" class="form--input mb-0" wire:model.live='searchScheduleDate'
                    wire:loading.class='disabled' />

            </div>
            {{-- endFilters --}}









            {{-- ---------------------------------------------------- --}}
            {{-- ---------------------------------------------------- --}}








            {{-- calendarView --}}
            <div class="col-12 mb-5">
                <div class="table-responsive memoir--table w-100 vertical calendar--table mobile">
                    <table class="table table-bordered pb-3 " id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th class="th--md" style="min-width: 105px;"></th>

                                <th colspan="" class='mobile'>{{ date('l', strtotime($searchScheduleDate)) }}</th>

                            </tr>
                        </thead>




                        {{-- ------------------------------------------ --}}
                        {{-- ------------------------------------------ --}}








                        {{-- tableBody --}}
                        <tbody>




                            {{-- :: mealTypes --}}
                            @foreach ($mealTypes ?? [] as $mealType)
                            <tr key='mealType-{{ $mealType->id }}'>




                                {{-- 1: common - mealType --}}
                                <td class="fw-bold fs-13 py-3">
                                    {{ $mealType->name }}
                                </td>







                                {{-- 2: scheduleDate --}}
                                <td key='weekDay-{{ $mealType->id }}'>


                                    {{-- loop - schedules by searchScheduleDate --}}
                                    @foreach ($schedulesForMobile as $schedule)



                                    {{-- loop - scheduleMeals --}}
                                    @foreach ($schedule?->meals?->where('mealTypeId', $mealType->id) as $scheduleMeal)




                                    {{-- meal-exists --}}
                                    @if ($scheduleMeal?->meal)



                                    <p class="calendar--table-meal tr--ingredient mb-0"
                                        key='scheduleMeal-{{ $scheduleMeal->meal->id }}'>
                                        {{ $scheduleMeal->meal->name }}
                                    </p>



                                    @endif
                                    {{-- end if --}}





                                    @endforeach
                                    {{-- end loop - scheduleMeals --}}





                                    @endforeach
                                    {{-- end loop - schedules --}}





                                </td>
                                {{-- endTD --}}




                            </tr>
                            @endforeach
                            {{-- end loop - mealTypes --}}




                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endCol --}}












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






</section>
{{-- endSection --}}