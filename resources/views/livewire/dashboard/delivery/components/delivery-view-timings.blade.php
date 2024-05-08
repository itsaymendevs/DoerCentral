{{-- row --}}
<div class="row row pt-2 align-items-center mb-4">


    {{-- newButton --}}
    <div class="col-3">
        <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center "
            data-bs-target="#new-timing" data-bs-toggle="modal" type="button" wire:click='provideCityId'>
            <svg class="bi bi-plus-circle-dotted fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                </path>
            </svg>New Timing
        </button>
    </div>






    {{-- -------------------------- --}}
    {{-- -------------------------- --}}






    {{-- midCol --}}
    <div class="col-6 text-center" wire:ignore>


        {{-- search --}}
        <input class="form-control form--input main-version mx-auto city-column-{{ $city->id }}" type="text"
            wire:model.live.debounce.100ms='searchTiming' placeholder="Search by Timing" data-view="timings"
            data-instance="{{ $city->id }}">



        {{-- delivery Charge --}}
        <input class="form-control form--input main-version mx-auto city-column-{{ $city->id }}"
            placeholder="Delivery Charge" type="number" step='0.01' style="display: none" data-view="holidays"
            data-instance="{{ $city->id }}" wire:change='updateCharge($event.target.value)' data-bs-toggle="tooltip"
            data-bss-tooltip="" title="Delivery Price in AED" value='{{ $city->deliveryCharge }}' required>

    </div>
    {{-- end midCol --}}






    {{-- -------------------------- --}}
    {{-- -------------------------- --}}





    {{-- rightCol --}}
    <div class="col-3 text-end">



        {{-- switchViews --}}
        <div class="btn-group btn--swtich-group me-3" role="group" style="margin-bottom: 10px; width: 155px;"
            wire:ignore>

            {{-- 1: Timings --}}
            <button class="btn active btn--switch-view fw-bold fs-12" data-view="timings"
                data-target="city-column-{{ $city->id }}" data-instance="{{ $city->id }}" type="button">Timings</button>


            {{-- 2: holidays --}}
            <button class="btn btn--switch-view fw-bold fs-12" data-view="holidays"
                data-target="city-column-{{ $city->id }}" data-instance="{{ $city->id }}" type="button">Days
                Off</button>
        </div>
        {{-- end switchViews --}}





        {{-- counter --}}
        <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
            data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Timings">{{ $deliveryTimes->count() }}</h3>


    </div>
    {{-- endCol --}}









    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}










    {{-- viewTimings --}}
    <div class="col-12 mt-5 city-column-{{ $city->id }}" data-view="timings" data-instance="{{ $city->id }}"
        wire:ignore.self>
        <div class="table-responsive memoir--table w-100">

            {{-- table --}}
            <table class="table table-bordered" id="memoir--table">


                {{-- headers --}}
                <thead>
                    <tr>
                        <th class="th--xs"></th>
                        <th class="th--md">Timing</th>
                        <th class="th--xs">From</th>
                        <th class="th--xs">Until</th>
                        <th class="th--md"></th>
                    </tr>
                </thead>



                {{-- tbody --}}
                <tbody>


                    {{-- loop - timings --}}
                    @foreach ($deliveryTimes as $deliveryTime)
                    <tr>

                        {{-- serial - timingName - from - until - charge --}}
                        <td class="fw-bold">T-{{ $deliveryTime->id }}</td>
                        <td class="fw-bold">{{ $deliveryTime->title }}</td>
                        <td>{{ $deliveryTime->deliveryFrom }}</td>
                        <td>{{ $deliveryTime->deliveryUntil }}</td>




                        {{-- actions --}}
                        <td>
                            <div class="d-flex align-items-center justify-content-center">


                                {{-- editButton --}}
                                <button class="btn btn--raw-icon inline edit scale--3" data-bs-toggle="modal"
                                    data-bs-target='#edit-timing' type="button"
                                    wire:click='edit({{ $deliveryTime->id }})'>
                                    <svg class="bi bi-pencil-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                                        </path>
                                    </svg>
                                </button>





                                {{-- removeButton --}}
                                <button class="btn btn--raw-icon inline remove scale--3" type="button"
                                    wire:click='remove({{ $deliveryTime->id }})' wire:loading.attr='disabled'>
                                    <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                        </path>
                                    </svg>
                                </button>




                            </div>
                        </td>
                    </tr>
                    @endforeach
                    {{-- end loop --}}




                </tbody>
            </table>
            {{-- endTable --}}


        </div>
    </div>
    {{-- endCOl --}}








    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}






    {{-- manageHolidays --}}
    <livewire:dashboard.delivery.components.delivery-manage-holidays :cityId='$city->id' key='{{ $city->id }}' />



</div>
{{-- endRow --}}