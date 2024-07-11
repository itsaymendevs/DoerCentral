{{-- contentSection --}}
<section id="content--section" class="content--section">
    <div class="container">



        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- midRow --}}
        <div class="row">



            {{-- newButton --}}
            <div class="col-3">


                {{-- :: permission - hasCreateCalendar --}}
                @if ($versionPermission->menuModuleHasCreateCalendar || session('hasTechAccess'))



                <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    type="button" data-bs-target="#new-calendar" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-plus-circle-dotted fs-5 me-2">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Calendar
                </button>


                @endif
                {{-- end if - permission --}}




            </div>
            {{-- endCol --}}












            {{-- search --}}
            <div class="col-6 text-center">
                <input wire:model.live='searchCalendar' type="search" class="form--input main-version mx-auto"
                    placeholder="Search for Calendar" />
            </div>




            {{-- counter --}}
            <div class="col-3 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Calendars">
                    {{ $calendars->count() }}
                </h3>
            </div>
        </div>
        {{-- endMidRow --}}






        {{-- ------------------------------------------------------- --}}







        {{-- cardsRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">




                    {{-- loop - calendars --}}
                    @foreach ($calendars as $calendar)

                    <div class="col-4 col-xl-4 col-xxl-3" key='single-calendar-{{ $calendar->id }}'>
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-cover"
                                        src="{{ asset('storage/menu/calendars/' . $calendar->imageFile) }}" />
                                </div>




                                {{-- col --}}
                                <div class="col-12">


                                    {{-- name --}}
                                    <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                        $calendar->name }}</h6>



                                    {{-- tooltips --}}
                                    <div class="d-flex justify-content-around">



                                        {{-- plansTooltip --}}
                                        <p class="text-center fs-13 fw-bold text-danger mb-0">
                                            <button
                                                class="btn btn--raw-icon fs-15 text-warning d-inline-flex align-items-center justify-content-center scale--3 w-auto"
                                                data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true'
                                                type="button" data-bs-placement="top"
                                                title="{{ implode(' &#8226; ', $calendar->plansInArray()) }}">
                                                Plans<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16"
                                                    class="bi bi-list-nested fs-6 ms-2" style="fill: var(--bs-warning)">
                                                    <path fill-rule="evenodd"
                                                        d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </p>






                                        {{-- dietsTooltip --}}
                                        <p class="text-center fs-13 fw-bold text-danger mb-0">
                                            <button
                                                class="btn btn--raw-icon fs-15 text-warning d-inline-flex align-items-center justify-content-center scale--3 w-auto"
                                                data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true'
                                                type="button" data-bs-placement="top"
                                                title="{{ implode(' &#8226; ', $calendar->dietsInArray()) }}">
                                                Diets<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-tags fs-6 ms-2"
                                                    style="fill: var(--bs-warning)">
                                                    <path
                                                        d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z">
                                                    </path>
                                                    <path
                                                        d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </p>

                                    </div>
                                    {{-- endTooltips --}}

                                </div>
                                {{-- endCol --}}






                                {{-- -------------------- --}}
                                {{-- -------------------- --}}







                                {{-- actionsCol --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">


                                        {{-- 1: manage --}}
                                        <a href="{{ route('dashboard.menuSingleCalendar', $calendar->id) }}"
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05">Manage</a>





                                        {{-- 2: edit --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            wire:click='edit({{ $calendar->id }})' type="button" data-bs-toggle="modal"
                                            data-bs-target='#edit-calendar'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil fs-5">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </button>






                                        {{-- 3: preview --}}
                                        <a href="{{ route('dashboard.menuSingleCalendar', $calendar->id) }}#tab-2"
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            type="button" title="Preview">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-5">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                </path>
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                </path>
                                            </svg>
                                        </a>






                                        {{-- 4: clone --}}

                                        {{-- :: permission - hasCloneCalendar --}}
                                        @if ($versionPermission->menuModuleHasCloneCalendar
                                        || session('hasTechAccess'))



                                        <button
                                            class="btn btn--scheme btn--scheme-1 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            type="button" data-bs-toggle='modal' data-bs-target='#clone-calendar'
                                            wire:click="clone('{{ $calendar->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-front fs-5">
                                                <path
                                                    d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5z">
                                                </path>
                                            </svg>
                                        </button>


                                        @endif
                                        {{-- end if - permission --}}




                                    </div>
                                    {{-- endCol --}}


                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- endCard --}}


                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
        </div>
    </div>
    {{-- end container --}}


















    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




    @section('modals')


    {{-- 1: createCalendar --}}
    <livewire:dashboard.menu.calendars.components.calendars-create key='create-calendar-modal' />

    {{-- 1.2: editCalendar --}}
    <livewire:dashboard.menu.calendars.components.calendars-edit key='edit-calendar-modal' />


    {{-- 1.3: cloneCalendar --}}
    <livewire:dashboard.menu.calendars.components.calendars-clone key='clone-calendar-modal' />



    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}





</section>
{{-- endSection --}}