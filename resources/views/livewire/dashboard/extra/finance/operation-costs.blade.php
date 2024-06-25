{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-end">



            {{-- empty --}}
            <div class="col-3 mb-4 pb-3"></div>





            {{-- sub-menu --}}
            <div class="col-6 text-center mb-4 pb-3">
                <livewire:dashboard.extra.finance.components.sub-menu key='submenu' />
            </div>









            {{-- switch - counter --}}
            <div class="col-3 text-end d-flex align-items-center justify-content-end  mb-4 pb-3">




                {{-- :: permission - hasMasterView --}}
                @if ($versionPermission->hasMasterView)

                <div class="btn-group btn--swtich-group me-3" role="group" wire:ignore>


                    {{-- cardView --}}
                    <button class="btn btn--switch-view" data-view="cards" data-target="payments-column"
                        data-instance="1" type="button">
                        <svg class="bi bi-card-text" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z">
                            </path>
                            <path
                                d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z">
                            </path>
                        </svg>
                    </button>



                    {{-- 2: tableView --}}
                    <button class="btn btn--switch-view active" data-view="table" data-target="payments-column"
                        data-instance="1" type="button">
                        <svg class="bi bi-table" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z">
                            </path>
                        </svg>
                    </button>


                </div>

                @endif
                {{-- end if - permission --}}






                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-original-title="Number of Payments">
                    {{ $invoices->total() }}
                </h3>

            </div>









            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}








            {{-- filters --}}




            {{-- search --}}
            <div class="col-3 text-center">
                <input type="text" class="form--input" placeholder="Search for User" wire:model.live='searchUser' />
            </div>






            {{-- fromDate --}}
            <div class="col-3" wire:ignore>

                <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">From Date</label>
                </div>

                <input type="date" class="form--input" wire:model.live='searchFromDate' />

            </div>







            {{-- untilDate --}}
            <div class="col-3" wire:ignore>

                <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Until Date</label>
                </div>

                <input type="date" class="form--input" wire:model.live='searchUntilDate' />

            </div>





            {{-- plan --}}
            <div class="col-3" wire:ignore>

                <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Plan</label>
                </div>

                <div class="select--single-wrapper" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='searchPlan' data-clear='true'>
                        <option value=""></option>

                        @foreach ($plans as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>









        </div>
        {{-- end topRow --}}











        {{-- ---------------------------------------------- --}}
        {{-- ---------------------------------------------- --}}











        {{-- overview --}}
        <div class="row justify-content-center mt-4 pt-2">




            {{-- overviewBoxes --}}


            {{-- total --}}
            <div class="col text-end" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Revenue</h6>
                    <p class="truncate-text-1l">{{
                        number_format($invoicesForOverview?->sum('totalCheckoutPrice')) }}</p>
                </div>
            </div>



            {{-- totalInclusiveBag --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Revenue Inc. Bag</h6>
                    <p class="truncate-text-1l">{{ number_format($invoicesForOverview?->sum('totalCheckoutPrice') -
                        $invoicesForOverview?->sum('bagPrice'))}}</p>
                </div>
            </div>






            {{-- coolBagTotal --}}
            <div class="col text-end" data-aos="fade-up" d ata-aos-duration="600" data-aos-delay="200"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Bag Total</h6>
                    <p class="truncate-text-1l">{{ number_format($invoicesForOverview?->sum('bagPrice'))
                        }}</p>
                </div>
            </div>






            {{-- coolBagRefunded--}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Bag Refunds</h6>
                    <p class="truncate-text-1l">{{ number_format($invoicesForOverview?->sum('bagRefund.amount'))}}</p>
                </div>
            </div>






            {{-- coolBagBalance --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Bag Balance</h6>
                    <p class="truncate-text-1l">{{ number_format($invoicesForOverview?->sum('bagPrice') -
                        $invoicesForOverview?->sum('bagRefund.amount'))}}</p>
                </div>
            </div>






            {{-- deliveryCharges --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Delivery Charges</h6>
                    <p class="truncate-text-1l">{{ number_format($invoicesForOverview?->sum('deliveryCharge')) }}</p>
                </div>
            </div>






            {{-- balanceAmount --}}

            {{-- ** total in SOA ** --}}

            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="600"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Balance Amount</h6>
                    <p class="truncate-text-1l">0</p>
                </div>
            </div>






            <div class="col-12">
                <hr class='mb-0 pb-0' data-aos="fade-up" data-aos-duration="600" data-aos-delay="700"
                    data-aos-once="true" wire:ignore.self style="border-color:#23262b">
            </div>


        </div>
        {{-- endRow --}}











        {{-- ---------------------------------------------- --}}
        {{-- ---------------------------------------------- --}}









        {{-- mainRow --}}
        <div class="row pt-2 align-items-center mb-5">






            {{-- 1: tableView --}}
            <div class="col-12 mt-4 pt-4 payments-column mb-3" data-view="table" wire:ignore.self>
                <div id="print--table" class="memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- header --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--md">Customer</th>
                                <th class="th--md">Plan</th>
                                <th class="th--md">Order Date</th>
                                <th class="th--md"></th>
                            </tr>
                        </thead>



                        {{-- ------------------------ --}}
                        {{-- ------------------------ --}}






                        {{-- tbody --}}
                        <tbody>




                            {{-- loop - invoices --}}
                            @foreach ($invoices ?? [] as $invoice)



                            <tr key='invoice-{{ $invoice->id }}'>


                                {{-- 1: counter --}}
                                <td class="fw-bold text-start">
                                    <span class="fs-6 text-center d-block fw-bold">{{ $globalSNCounter++ }}</span>
                                </td>



                                {{-- 2: name --}}
                                <td class="text-center fw-semibold">
                                    <a class="init-link"
                                        href="{{ route('dashboard.singleCustomer', $invoice->customerId) }}"
                                        target='_blank'>
                                        <span class="d-block fs-14 fw-semibold text-gold">
                                            {{ $invoice?->customer?->fullName() }}</span>
                                    </a>
                                </td>





                                {{-- 3: plan --}}
                                <td class="text-center fs-14">
                                    {{ $invoice->plan->name }}
                                </td>





                                {{-- 3: orderDate --}}
                                <td class="text-center">
                                    <span class="d-block fs-14">{{ date('d / m / Y',
                                        strtotime($invoice->created_at)) }}</span>
                                </td>






                                {{-- printInvoice --}}
                                <td>
                                    <button
                                        class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-12 justify-content-center fw-semibold py-1"
                                        type="button" data-bs-toggle='modal' data-bs-target='#invoice-preview'
                                        wire:click='invoicePreview({{ $invoice->id }})'><svg
                                            class="bi bi-printer fs-6 me-2" xmlns="http://www.w3.org/2000/svg"
                                            width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                            <path
                                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                            </path>
                                        </svg>Print
                                    </button>
                                </td>






                            </tr>
                            @endforeach
                            {{-- end loop - invoices --}}




                        </tbody>
                    </table>
                </div>
            </div>








            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}









            {{-- 2: cardsView --}}


            {{-- :: permission - hasMasterView --}}
            @if ($versionPermission->hasMasterView)


            <div class="col-12 mt-4 pt-4 payments-column mb-3" data-view="cards" style="display: none" wire:ignore.self>
                <div class="row">



                    {{-- loop - invoices --}}
                    @foreach ($invoices ?? [] as $invoice)



                    <div class="col-4 text-center mb-4 pb-3">





                        {{-- customer - plan --}}
                        <div class="d-block px-2 py-3 overview--card client-version">



                            {{-- orderDate - printButton --}}
                            <div class="d-flex justify-content-between px-4 align-items-center mb-3">




                                {{-- orderDate --}}
                                <h6 class="text-center fw-semibold fs-13 mb-0">{{ date('d / m / Y',
                                    strtotime($invoice->created_at)) }}</h6>



                                {{-- printButton --}}
                                <button
                                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-12 justify-content-center fw-semibold py-1"
                                    type="button" data-bs-toggle='modal' data-bs-target='#invoice-preview'
                                    wire:click='invoicePreview({{ $invoice->id }})'><svg class="bi bi-printer fs-6 me-2"
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                        </path>
                                    </svg>Print
                                </button>

                            </div>
                            {{-- endWrapper --}}






                            {{-- plan - customer --}}
                            <h5>{{ $invoice->customer->fullName() }}</h5>
                            <p class="fs-6 text-gold mb-0">{{ $invoice->plan->name }}</p>


                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}





                </div>
            </div>


            @endif
            {{-- end if - permission --}}









            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}





            {{-- pagination --}}
            <div class="col-12">
                {{ $invoices->links() }}
            </div>




        </div>
    </div>
    {{-- endContainer --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- selectHandle --}}
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








    @section('modals')


    {{-- 1: preview / print --}}
    <livewire:dashboard.extra.finance.payment-details.components.payment-details-preview key='payment-details-modal' />



    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




</section>
{{-- endSection --}}