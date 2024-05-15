<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Kitchen Today' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- midRow --}}
        <div class="row align-items-end">


            {{-- date --}}
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Date</label>
                </div>


                {{-- input --}}
                <input class="form--input" type="date" wire:model.live='searchDeliveryDate' />
            </div>





            {{-- :: innerSubMenu --}}
            <livewire:dashboard.manage-kitchen.components.inner-sub-menu />


        </div>
        {{-- end midRow --}}













        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- bottomRow --}}
        <div class="row align-items-center mt-5">



            {{-- search --}}
            <div class="col-4 text-center">



                {{-- search - customerName --}}
                <input type="text" class="form--input main-version w-100" placeholder="Search Customer"
                    wire:model.live='searchCustomer' />


            </div>
            {{-- endSearch --}}








            {{-- actions --}}
            <div class="col-4 text-center">





                {{-- :: permission - hasPrintExcel --}}
                @if ($versionPermission->kitchenModuleHasPrintExcel)





                {{-- 1: print --}}
                <button
                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                    disabled type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg>Print
                </button>






                {{-- 2: exportExcel --}}
                <button
                    class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold ms-2 disabled"
                    type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-file-text fs-6 me-2">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                        </path>
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                        </path>
                    </svg>Excel
                </button>




                @endif
                {{-- end if - permission --}}


            </div>
            {{-- endActions --}}







            {{-- -------------------- --}}
            {{-- -------------------- --}}









            {{-- counter --}}
            <div class="col-4 d-flex align-items-center justify-content-end">


                {{-- switchTypes --}}
                <div class="form-check form-switch mealType--checkbox py-2 rounded-1 px-4 d-inline-flex me-2 mb-0"
                    style="background-color: var(--color-scheme-2)">


                    {{-- input --}}
                    <input class="form-check-input pointer" type="checkbox" id="switch-types"
                        wire:model.live='hideTypes' wire:loading.attr='disabled' />


                    {{-- label --}}
                    <label class="form-check-label border-0 ms-2 me-0 fw-semibold" for="switch-types">Hide Types</label>

                </div>





                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Meals">
                    {{ $deliveries->total() }}
                </h3>
            </div>



        </div>
    </div>
    {{-- endBottomRow --}}










    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- tableContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 pt-4">




            {{-- loop - deliveries (checkout) --}}
            @foreach ($deliveries as $delivery)



            <div class="col-4 col-xl-3 col-xxl-3 mb-5" key='delivery-{{ $delivery->id }}'>
                <div class="overview--card client-version checkout--card scale--img align-items-start h-100">
                    <div class="wrapper h-100 w-100">



                        {{-- dateTime --}}
                        <div class="single-row">
                            <h5 class="text-center fs-12 mb-0 w-50"></h5>
                            <h5 class="text-center fs-12 mb-0 w-50">
                                {{ date('d-m-Y', strtotime($delivery->deliveryDate)) }}<br />06:00 PM
                            </h5>
                        </div>




                        {{-- clientName --}}
                        <div class="single-row">
                            <h5 class="text-center fs-14 mb-1 w-100 border-start-0 fw-semibold">
                                {{ env('APP_CLIENT') }}
                            </h5>
                        </div>






                        {{-- -------------------------- --}}
                        {{-- -------------------------- --}}






                        {{-- QR --}}
                        <div class="single-row">
                            <h5 class="text-center mb-1 w-100 border-start-0">
                                {!! QrCode::size(85)
                                ->backgroundColor(255,255,255, 0)
                                ->generate(route('dashboard.singleCustomer', [$delivery->customer->id])) !!}
                            </h5>
                        </div>






                        {{-- -------------------------- --}}
                        {{-- -------------------------- --}}






                        {{-- customer --}}
                        <div class="single-row">
                            <h5 class="text-center fs-13 mb-0 w-100 border-start-0 fw-semibold truncate-text-1l"><span
                                    class="fw-normal me-1">To</span>{{ $delivery->customer->fullName() }}</h5>
                        </div>




                        {{-- city - district --}}
                        <div class="single-row">
                            <h5 class="text-center fs-12 mb-0 w-50">{{
                                $delivery->customer->addressByDay($delivery->deliveryDate)->city->name }}</h5>
                            <h5 class="text-center fs-12 mb-0 w-50">{{
                                $delivery->customer->addressByDay($delivery->deliveryDate)->district->name }}</h5>
                        </div>








                        {{-- -------------------------- --}}
                        {{-- -------------------------- --}}







                        {{-- plan - bundle --}}
                        <div class="single-row">


                            <h5 class="text-center fs-12 w-50
                                @if ($hideTypes) border-bottom-0 mb-0 @else mb-1 @endif">
                                {{$delivery->subscription->plan->name }}</h5>


                            <h5 class="text-center fs-12 w-50
                                @if ($hideTypes) border-bottom-0 mb-0 @else mb-1 @endif">
                                {{$delivery->subscription->bundle->name }}</h5>
                        </div>







                        {{-- mealTypes --}}
                        @if (!$hideTypes)

                        <div class="single-row">
                            <h5 class="text-center fs-12 mb-0 w-100 border-start-0 border-bottom-0 px-2"
                                style="line-height: 18px">
                                {{ implode(' - ', $delivery?->schedule?->mealTypesWithSize()) }}
                            </h5>
                        </div>


                        @endif
                        {{-- end if - hideTypes --}}




                    </div>
                </div>
            </div>


            @endforeach
            {{-- end loop --}}









            {{-- pagination --}}
            <div class="col-12 mb-4">
                {{ $deliveries->links() }}
            </div>







        </div>
    </div>
    {{-- endContainer --}}









</section>
{{-- endSection --}}