{{-- contentSection --}}
<section id="content--section" class="content--section">
    <div class="container">


        {{-- title --}}
        <div class="row">
            <div class="col-12 text-center" wire:ignore>
                <h4 class="mb-4 fw-bold position-relative" data-aos="fade-down" data-aos-duration="800"
                    data-aos-once="true">
                    Pick Your Meal Plan
                </h4>
            </div>
        </div>




        {{-- cardsRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 mt-zone-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">




                    {{-- loop - plans --}}
                    @foreach ($plans as $plan)

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo"
                                        src="{{ asset('storage/menu/plans/' . $plan->imageFile) }}" />
                                </div>



                                {{-- midCol --}}
                                <div class="col-12">


                                    {{-- name --}}
                                    <h5 class="text-center fw-bold mt-3 mb-2 truncate-text-1l">{{ $plan->name }}</h5>


                                    {{-- startingPrice --}}
                                    <p class="text-center fs-12 fw-semibold text-gold mb-2">
                                        Starting From {{ $plan->startingPrice }}<small
                                            class="mx-1 fw-semibold text-gold fs-10">(AED)</small>/ Day
                                    </p>


                                    {{-- brief --}}
                                    <p class="text-center fs-12 mb-2 truncate-text-4l h-4l">{{ $plan->desc }}</p>

                                </div>
                                {{-- end midCol --}}






                                {{-- actionButtons --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-1">


                                        {{-- selectPlan --}}
                                        <button class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                            wire:click="determine({{ $plan->id }})" type="button"
                                            data-bs-target="#determine-customer" data-bs-toggle="modal">
                                            Select Plan</button>


                                        {{-- view --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" type="button"
                                            title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-5">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                </path>
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                {{-- endActionButtons --}}


                            </div>
                        </div>
                    </div>

                    @endforeach
                    {{-- end loop --}}



                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}










    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




    @section('modals')



    {{-- 1: determineCustomer --}}
    <livewire:subscription.customer.customer-subscription-step-one.components.customer-subscription-step-one-determine-customer />




    {{-- 1.2: newCustomer --}}
    <livewire:subscription.customer.customer-subscription-step-one.components.customer-subscription-step-one-new-customer />




    {{-- 1.3: existingCustomer --}}
    <livewire:subscription.customer.customer-subscription-step-one.components.customer-subscription-step-one-existing-customer />






    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







</section>
{{-- endSection --}}