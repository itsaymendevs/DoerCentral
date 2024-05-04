{{-- row --}}
<div class="row align-items-end pt-2">


    {{-- filter --}}
    <div class="col-4 mb-5">
        <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
            <hr style="width: 65%" />
            <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Week Filter</label>
        </div>


        {{-- weekSelect --}}
        <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
            <select class="form-select form--select form--view-calendar-select" data-instance='searchFromDate'
                data-trigger='true' required value='{{ $searchFromDate }}'>

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
    <div class="col-4 mb-5">
        <div class="btn-group btn--swtich-group mb-0" role="group" style="margin-bottom: 10px">

            {{-- left --}}
            <button class="btn btn--switch-view fw-bold" type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-arrow-left">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                    </path>
                </svg>
            </button>


            {{-- right --}}
            <button class="btn btn--switch-view fw-bold" type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-arrow-right">
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
    <div class="col-12">
        <div class="table-responsive memoir--table vertical w-100 calendar--table">
            <table class="table table-bordered" id="memoir--table">


                {{-- tableHead --}}
                <thead>
                    <tr>
                        <th class="th--md"></th>


                        {{-- :: loop - weekDates --}}
                        @foreach ($weekDates as $weekDate)

                        <th colspan="">{{ date('l', strtotime($weekDate)) }}
                            <br>
                            <span class='fs-10 text-dark fw-semibold'>({{ date('d / m', strtotime($weekDate)) }})</span>
                        </th>

                        @endforeach
                        {{-- end loop --}}


                    </tr>
                </thead>




                {{-- ------------------------------------------ --}}
                {{-- ------------------------------------------ --}}








                {{-- tableBody --}}
                <tbody>





                    {{-- :: loop - scheduleMeals by mealType --}}
                    @foreach ($scheduleMeals->groupBy('mealTypeId') as $commonMealType => $scheduleMealsByMealType)
                    <tr>


                        {{-- 1: commonMealType --}}
                        <td class="fw-bold fs-14 underline-gold py-3" colspan="">
                            {{ $scheduleMealsByMealType->first()->mealType->name }}
                        </td>




                        {{-- :: loop - weekDates --}}
                        @foreach ($weekDates as $weekDate)




                        {{-- 2: weekDate --}}
                        <td>


                            {{-- :: loop - scheduleMeals by weekDate --}}
                            @foreach ($scheduleMealsByMealType->where('scheduleDate', $weekDate) as $scheduleMeal)

                            <p class="calendar--table-meal @if ($scheduleMeal->isDefault) tr--ingredient @endif"
                                @if($scheduleMeal->isDefault) data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Default" @endif>
                                {{ $scheduleMeal->meal->name }}
                            </p>

                            @endforeach
                            {{-- end loop --}}


                        </td>
                        {{-- end weekDate --}}





                        @endforeach
                        {{-- end loop --}}



                    </tr>
                    @endforeach
                    {{-- end loop --}}



                </tbody>
            </table>
        </div>
    </div>
    {{-- endCol --}}








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--view-calendar-select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}




</div>
{{-- endRow --}}