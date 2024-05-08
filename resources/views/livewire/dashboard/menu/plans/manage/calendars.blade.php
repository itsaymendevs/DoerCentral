{{-- contentSection --}}
<section id="content--section" class="content--section">
    <div class="container">


        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.plans.manage.components.sub-menu :$id />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- midRow --}}
        <div class="row align-items-center">

            {{-- empty --}}
            <div class="col-3"></div>


            {{-- title --}}
            <div class="col-6 text-center">
                <h4 class="mb-0 fw-bold">Plan Calendars</h4>
            </div>



            {{-- counter --}}
            <div class="col-3 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Calendars">
                    {{ $planCalendars->count() }}
                </h3>
            </div>
        </div>
        {{-- end midRow --}}










        {{-- ----------------------------------- --}}
        {{-- ----------------------------------- --}}











        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">


                    {{-- loop - planCalendars --}}
                    @foreach ($planCalendars as $planCalendar)



                    <div class="col-4 col-xl-4 col-xxl-3">
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-cover"
                                        src="{{ asset('storage/menu/calendars/' . $planCalendar->calendar->imageFile) }}" />
                                </div>




                                {{-- midCol --}}
                                <div class="col-12">


                                    {{-- name --}}
                                    <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                        $planCalendar->calendar->name }}</h6>


                                    {{-- tooltips --}}
                                    <div class="d-flex justify-content-around">



                                        {{-- plansTooltip --}}
                                        <p class="text-center fs-13 fw-bold text-danger mb-0">
                                            <button
                                                class="btn btn--raw-icon fs-15 text-warning d-inline-flex align-items-center justify-content-center scale--3 w-auto"
                                                data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true'
                                                type="button" data-bs-placement="top"
                                                title="{{ implode(' &#8226; ', $planCalendar->calendar->plansInArray()) }}">
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
                                                title="{{ implode(' &#8226; ', $planCalendar->calendar->dietsInArray()) }}">
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
                                </div>
                                {{-- end tooltipsDiv - Col --}}




                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}



                                {{-- actions --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">



                                        {{-- isDefaultButton --}}
                                        <button class="btn btn--scheme fs-12 px-3 mx-2 scale--self-05 h-32
                                            @if ($planCalendar->isDefault) btn--theme @else btn--scheme-1 @endif"
                                            type="button" wire:loading.attr='disabled' wire:target='toggleDefault'
                                            wire:click='toggleDefault({{ $planCalendar->id }})'>Default</button>










                                        {{-- preview --}}
                                        <a href="{{ route('dashboard.menuSingleCalendar', $planCalendar->calendar->id) }}#tab-2"
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
                                    </div>
                                    {{-- endActions --}}




                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
        </div>
        {{-- end contentRow --}}





    </div>
</section>
{{-- endSection --}}