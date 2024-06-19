{{-- contentSection --}}
<section class="content--section" id="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- midRow --}}
        <div class="row">


            {{-- newPlan --}}
            <div class="col-3">
                <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    data-bs-target="#new-plan" data-bs-toggle="modal" type="button">
                    <svg class="bi bi-plus-circle-dotted fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Plan
                </button>
            </div>




            {{-- title --}}
            <div class="col-6 text-center">
                <h4 class="mb-0 fw-bold">Package Plans</h4>
            </div>





            {{-- standard - master --}}


            {{-- :: permission - hasMasterView --}}
            @if ($versionPermission->hasMasterView)




            <div class="col-3 text-end">
                <div class="btn-group btn--swtich-group me-3" role="group" style="margin-bottom: 10px">

                    {{-- 1: standard --}}
                    <button class="btn active btn--switch-view fw-bold" data-view="standard" data-target="plans-column"
                        data-instance="1" type="button" disabled>
                        S</button>


                    {{-- master --}}
                    <button class="btn btn--switch-view fw-bold" data-view="master" data-target="plans-column"
                        data-instance="1" type="button" disabled>
                        M
                    </button>
                </div>




                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Plans">
                    {{ $plans->count() }}
                </h3>

            </div>




            @endif
            {{-- end if - permission --}}




        </div>
        {{-- endMidRow --}}









        {{-- ------------------------------------------------------- --}}






        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">



            {{-- 1: standardView --}}
            <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">



                    {{-- loop - plans --}}
                    @foreach ($plans as $plan)
                    <div class="col-4 col-xl-3 col-xxl-3">
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- image --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo"
                                        src="{{ asset('storage/menu/plans/' . $plan->imageFile) }}" />
                                </div>




                                {{-- information --}}
                                <div class="col-12">


                                    {{-- name - desc --}}
                                    <h5 class="text-center fw-bold mt-3 mb-1 truncate-text-1l">{{ $plan->name }}</h5>
                                    <p class="text-center fs-13 mb-1 truncate-text-3l height-3l">{{ $plan->desc }}</p>





                                    {{-- ranges --}}
                                    <p class="text-center fs-13 fw-bold text-danger">
                                        <button
                                            class="btn btn--raw-icon fs-14 text-warning d-flex align-items-center justify-content-center scale--3"
                                            data-bs-target="#plan-ranges" data-bs-toggle="modal" type="button"
                                            wire:click='providePlanId({{ $plan->id }})'>
                                            Calorie Ranges<svg class="bi bi-pencil fs-6 ms-2"
                                                style="fill: var(--bs-warning)" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </button>
                                    </p>



                                </div>
                                {{-- endCol --}}







                                {{-- actionsCol --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-1">


                                        {{-- 1: manage --}}
                                        <a wire:navigate href="{{ route('dashboard.menuPlanBundles', [$plan->id]) }}"
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-3 mx-1 scale--self-05"
                                            type="button">Manage</a>








                                        {{-- 2: editButton --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32"
                                            data-bs-toggle="modal" data-bs-target="#edit-plan" type="button"
                                            wire:click='edit({{ $plan->id }})' wire:loading.attr='disabled'
                                            wire:target='toggleForWebsite, remove'>
                                            <svg class="bi bi-pencil fs-5" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </button>











                                        {{-- 3: isForWebsite --}}


                                        {{-- :: permission - hasHidePlan --}}
                                        @if ($versionPermission->menuModuleHasHidePlan)




                                        @if ($plan->isForWebsite)
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Hide Plan"
                                            wire:click='toggleForWebsite({{ $plan->id }})' wire:loading.attr='disabled'
                                            wire:target='toggleForWebsite, remove'>
                                            <svg class="bi bi-eye fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                </path>
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                </path>
                                            </svg>
                                        </button>



                                        {{-- isNot --}}
                                        @else
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Show Plan"
                                            wire:click='toggleForWebsite({{ $plan->id }})' wire:loading.attr='disabled'
                                            wire:target='toggleForWebsite, remove'>
                                            <svg class="bi bi-eye-slash fs-5" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z">
                                                </path>
                                                <path
                                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z">
                                                </path>
                                                <path
                                                    d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z">
                                                </path>
                                            </svg>
                                        </button>
                                        @endif
                                        {{-- end if --}}




                                        @endif
                                        {{-- end if - permission --}}










                                        {{-- 3: remove --}}
                                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-1 scale--self-05 h-32"
                                            type="button" wire:click='remove({{ $plan->id }})'
                                            wire:loading.attr='disabled' wire:target='toggleForWebsite, remove'>
                                            <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                </path>
                                            </svg>
                                        </button>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
            {{-- endView --}}







            {{-- -------------------------------------------------- --}}
            {{-- -------------------------------------------------- --}}










            {{-- 2: masterView (TODO) --}}
            <div class="col-12 plans-column mt-4" data-view="master" data-instance="1" style="display: none">


                {{-- currentMasterPlan --}}
                <div class="row align-items-end pt-2 row mb-4">



                    {{-- leftColumn --}}
                    <div class="col" data-aos="fade-right" data-aos-duration="1000">


                        {{-- overview --}}
                        <div class="row align-items-center">
                            <div class="col-4 mb-3">
                                <div class="overview--box shrink--self">
                                    <h6>Total</h6>
                                    <p class="truncate-text-1l">145</p>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <div class="overview--box shrink--self">
                                    <h6>Active</h6>
                                    <p class="truncate-text-1l">120</p>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <div class="overview--box shrink--self">
                                    <h6>Freeze</h6>
                                    <p class="truncate-text-1l">25</p>
                                </div>
                            </div>


                            {{-- breif --}}
                            <div class="col-12">
                                <div class="item--box mb-3">
                                    <h4 class="fw-semibold d-flex align-items-center">
                                        <svg class="bi bi-chevron-compact-right me-2 fs-13"
                                            style="fill: var(--color-theme-secondary)"
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z">
                                            </path>
                                        </svg>Description
                                    </h4>
                                    <p class="fs-15 mb-0">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>





                            {{-- planMeals (5 total) --}}
                            <div class="col-4">
                                <img class="image--box scale--self-05" src="../assets/img/Meals/plan-meal-sm-3.png" />
                            </div>
                            <div class="col-4">
                                <img class="image--box scale--self-05" src="../assets/img/Meals/plan-meal-sm.png" />
                            </div>
                            <div class="col-4">
                                <img class="image--box scale--self-05" src="../assets/img/Meals/plan-meal-sm-2.png" />
                            </div>






                            {{-- colorScheme --}}
                            <div class="col-6 mt-3">
                                <label
                                    class="col-form-label fs-6 text-center form--label py-0 justify-content-center"><svg
                                        class="bi bi-brush fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z">
                                        </path>
                                    </svg>Color Scheme
                                </label>
                            </div>

                            {{-- colorInput --}}
                            <div class="col-4 mt-3">
                                <input class="form--input" type="color"
                                    style="height: 25px; padding: 0px; cursor: pointer" />
                            </div>


                        </div>
                    </div>
                    {{-- end leftCol --}}





                    {{-- ------------------------------------ --}}






                    {{-- name / startingPrice --}}
                    <div class="col-2 col-xl-3 text-center">
                        <img src="../assets/img/Plans/plan-2.png" />


                        {{-- calorie Range --}}
                        <p class="text-center fs-13 fw-bold text-danger mt-2 mb-0">
                            <button
                                class="btn btn--raw-icon fs-15 text-warning d-flex align-items-center justify-content-center scale--3"
                                data-bs-target="#plan-ranges" data-bs-toggle="modal" type="button">
                                Calorie Ranges<svg class="bi bi-pencil fs-6 ms-2" style="fill: var(--bs-warning)"
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                    </path>
                                </svg>
                            </button>
                        </p>



                        <div class="item--box mt-2 py-2 mx-2 active">
                            <h4 class="fw-semibold d-flex align-items-center justify-content-center">
                                Fitness
                            </h4>
                            <p class="fs-16 mb-0 fw-semibold">
                                Starts From 140<small class="ms-1 fw-semibold text-gold fs-13">(AED)</small>
                            </p>
                        </div>
                    </div>





                    {{-- ------------------------------------ --}}





                    {{-- rightCol --}}
                    <div class="col" data-aos="fade-left" data-aos-duration="1000">


                        {{-- loop - ranges --}}
                        {{-- :: lastRange have mb-0 --}}
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="item--box mb-2 py-2">
                                    <p class="fs-14 mb-0">
                                        Counted calories in pure Veg to support your journey<br />
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="overview--box shrink--self">
                                    <h6>Calories</h6>
                                    <p class="truncate-text-1l">900 - 1100</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="overview--box shrink--self">
                                    <h6>Range</h6>
                                    <p class="truncate-text-1l">Weight Loss</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end rightCol --}}




                </div>
                {{-- end currentMasterPlan --}}






                {{-- ------------------------------------------------ --}}
                {{-- ------------------------------------------------ --}}





                {{-- masterPlansRow --}}
                <div class="row mt-5 pt-5">


                    {{-- loop - plans --}}
                    @foreach ($plans as $plan)
                    <div class="col-3">
                        <div class="plan--switch-card">
                            <a class="init-link d-block" href="#">
                                <img class="w-100 of-contain" src="{{ asset('storage/plans/' . $plan->imageFile) }}"
                                    style="height: 215px" />
                                <h4 style="height: 58px">{{ $plan->name }}</h4>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
            {{-- endMasterView --}}





        </div>
    </div>
    {{-- endContainer --}}











    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




    @section('modals')



    {{-- 1: createPlan --}}
    <livewire:dashboard.menu.plans.components.plans-create key='plans-create-modal' />





    {{-- 1.2: editPlan --}}
    <livewire:dashboard.menu.plans.components.plans-edit key='plans-edit-modal' />








    {{-- ------------------------------- --}}



    {{-- 2: managePlanRanges --}}
    <livewire:dashboard.menu.plans.components.plans-manage-ranges key='plans-manage-ranges-modal' />
    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}










</section>
{{-- endSection --}}