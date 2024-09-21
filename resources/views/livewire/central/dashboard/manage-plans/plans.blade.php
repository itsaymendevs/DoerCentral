<section id="content--section" class="content--section">
    <div class="container">


        {{-- filtersRow --}}
        <div class="row mb-4">



            <div class="col-4 d-flex align-items-center">
                <button class="btn btn--scheme btn--scheme-2  px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    type="button" data-bs-target="#new-plan" data-bs-toggle="modal">
                    <i class='bi bi-plus-circle-dotted fs-5 me-2'></i>New Plan
                </button>




                {{-- ----------------------------- --}}
                {{-- ----------------------------- --}}



                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 ms-3 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Plans">
                    {{ $plans?->count() ?? 0 }}
                </h3>


            </div>








            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}







            {{-- 2: featureFilter --}}
            <div class="col-4">
                <input wire:model.live='searchPlan' class="form-control form--input main-version mx-auto" type="search"
                    placeholder="Search by Name" />
            </div>





            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}









            {{-- sub-menu --}}
            <div class="text-end col-4">
                <livewire:central.dashboard.manage-plans.components.sub-menu key='submenu' />
            </div>




        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mt-cards">




            {{-- loop - plans --}}
            @foreach ($plans ?? [] as $plan)

            <div class="col-4 col-xl-4 col-xxl-3" key='single-plan-{{ $plan->id }}'>
                <div class="overview--card client-version scale--self-05 mb-floating">
                    <div class="row">



                        {{-- imageFile --}}
                        <div class="col-12 text-center position-relative">
                            <img class="client--card-logo of-contain"
                                src="{{ url('storage/plans/' . $plan->imageFile) }}" />
                        </div>




                        {{-- col --}}
                        <div class="col-12">


                            {{-- name --}}
                            <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                $plan->name }}</h6>





                            {{-- --------------------------------------------- --}}
                            {{-- --------------------------------------------- --}}





                            {{-- tooltips --}}
                            <div class="d-flex justify-content-around">



                                {{-- bundles --}}
                                <p class="text-center  fw-bold mb-0">
                                    <button
                                        class="btn btn--raw-icon d-inline-flex fs-16 align-items-center justify-content-center  w-auto"
                                        data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true' type="button"
                                        data-bs-placement="top"
                                        title="{{ implode(' &#8226; ', $plan?->bundlesInArray()) }}">
                                        Bundles<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-list-nested fs-13 ms-1"
                                            style="fill: var(--bs-warning)">
                                            <path fill-rule="evenodd"
                                                d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                                            </path>
                                        </svg>
                                    </button>
                                </p>





                                {{-- ----------------------------------- --}}
                                {{-- ----------------------------------- --}}





                                {{-- price --}}
                                <p class="text-center  fw-bold mb-0">
                                    <button
                                        class="btn btn--raw-icon d-flex fs-16 align-items-center justify-content-center fw-bold"
                                        type="button">{{ number_format($plan?->price, 2) }}<small
                                            class="ms-1 fw-semibold text-gold fs-13">($)</small></button>
                                </p>


                            </div>
                            {{-- endTooltips --}}

                        </div>
                        {{-- endCol --}}






                        {{-- -------------------- --}}
                        {{-- -------------------- --}}







                        {{-- actions --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-center mb-1 mt-3">


                                {{-- 1: edit --}}
                                <button class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                    wire:click='edit({{ $plan->id }})' type="button" data-bs-toggle="modal"
                                    data-bs-target='#edit-plan'>
                                    <svg class="bi bi-pencil fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                        </path>
                                    </svg>
                                </button>




                                {{-- 2: remove --}}
                                <button class="btn btn--scheme btn--remove fs-12 px-2 mx-1 scale--self-05 h-32"
                                    type="button" wire:click='remove({{ $plan->id }})' wire:loading.attr='disabled'
                                    wire:target='toggleForWebsite, remove'>
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
    {{-- endContainer --}}

















    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}








    @section('modals')



    {{-- 1: create --}}
    <livewire:central.dashboard.manage-plans.plans.components.plans-create key='create-plan-modal' />


    {{-- 2: edit --}}
    <livewire:central.dashboard.manage-plans.plans.components.plans-edit key='edit-plan-modal' />


    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







</section>
{{-- endSection --}}