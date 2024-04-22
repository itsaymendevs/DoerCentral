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


            </div>
            {{-- endActions --}}







            {{-- -------------------- --}}
            {{-- -------------------- --}}






            {{-- counter --}}
            <div class="col-4 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Meals">
                    {{ $deliveries->count() }}
                </h3>
            </div>





        </div>
    </div>
    {{-- endBottomRow --}}








    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- tableContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 mb-2">
            <div class="col-12 mt-4 mb-3">
                <div id="print--table" class="memoir--table w-100 kitchen--table">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--md">Customer</th>
                                <th class="th--xs">Company</th>
                                <th class="th--sm">Timing</th>
                                <th class="th--lg">Address</th>
                                <th class="th--xs">Date</th>
                                <th class="th--xs"></th>
                            </tr>
                        </thead>
                        {{-- endHeaders --}}







                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}






                        {{-- body --}}
                        <tbody>





                            {{-- loop - deliveries --}}
                            @foreach ($deliveries as $delivery)


                            <tr key='delivery-{{ $delivery->id }}'>




                                {{-- SN --}}
                                <td class="fw-bold text-start">
                                    <span class="fs-6 text-center d-block fw-bold">{{ $globalSNCounter++ }}</span>
                                </td>




                                {{-- customer - plan --}}
                                <td class="text-center fw-bold text-start">
                                    <span class="d-block fs-14">{{ $delivery->customer->fullName() }}
                                        <small class="fw-semibold text-gold fs-14 d-block">{{
                                            $delivery->subscription->plan->name }}</small>
                                    </span>
                                </td>







                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}







                                {{-- company --}}
                                <td class="text-start">
                                    <span class="text-center d-block fs-14 mb-4 fw-normal"></span>
                                </td>







                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}








                                {{-- deliveryTime --}}
                                <td class="text-start">
                                    <span class="text-center d-block fs-14 fw-normal">
                                        {{ $delivery->customer->deliveryTimeByDay($delivery->deliveryDate)?->title }}
                                    </span>
                                </td>








                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}









                                {{-- address --}}
                                <td class="text-start">
                                    <span class="text-center d-block fs-14 fw-normal">
                                        {!! $delivery->customer
                                        ->addressByDay($delivery->deliveryDate)?->halfAddress() ?? '' !!}

                                        <br />

                                        {{ $delivery->customer
                                        ->addressByDay($delivery->deliveryDate)?->apartmentAndFloor() ?? ''
                                        }}
                                    </span>
                                </td>









                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}










                                {{-- deliveryDate --}}
                                <td class="text-start">
                                    <span class="text-center d-block fs-13 fw-normal">{{ date('d / m / Y',
                                        strtotime($delivery->deliveryDate)) }}</span>
                                </td>









                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}









                                {{-- status --}}
                                <td class="text-center">
                                    <span class="badge fs-13 scale--self-05
                                        @if ($delivery->status == 'Pending')
                                        badge--warning
                                        @elseif ($delivery->status == 'Paused')
                                        badge--secondary
                                        @elseif ($delivery->status == 'Canceled' || $delivery->status == 'Skipped')
                                        badge--remove
                                        @else
                                        badge--theme-secondary
                                        @endif">{{ $delivery->status }}
                                    </span>
                                </td>








                            </tr>
                            {{-- endRow --}}



                            @endforeach
                            {{-- end loop --}}



                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endCol --}}










            {{-- pagination --}}
            <div class="col-12 mb-4">
                {{ $deliveries->links() }}
            </div>





        </div>
    </div>
    {{-- endContainer --}}









</section>
{{-- endSection --}}