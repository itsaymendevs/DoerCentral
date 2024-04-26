<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.manage.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- mainRow --}}
        <div class="row align-items-start">
            <div class="col-12">


                {{-- tabsWrap --}}
                <div class="tabs--wrap">



                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs mb-4" role="tablist" data-aos="flip-up" data-aos-duration="600"
                        data-aos-delay="800" data-aos-once="true" wire:ignore.self>


                        {{-- 1: subscriptions --}}

                        @if (!$versionPermission->isProcessing)


                        <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-1">Subscriptions</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}










                        {{-- 2: invoices --}}



                        {{-- :: permission - hasInvoicesView --}}
                        @if ($versionPermission->customerModuleHasInvoicesView)


                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-2">Invoices</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}







                    </ul>
                    {{-- end tabLinks --}}












                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}




                    {{-- tabsContent --}}
                    <div class="tab-content">





                        {{-- 1: subscriptionsTab --}}
                        <div class="tab-pane fade no--card" role="tabpanel" id="tab-1"></div>
                        {{-- end tab --}}







                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}




                        {{-- :: permission - hasInvoicesView --}}
                        @if ($versionPermission->customerModuleHasInvoicesView)






                        {{-- 2: invoicesTab --}}
                        <div class="tab-pane fade show active no--card" role="tabpanel" id="tab-2">
                            <div class="row">




                                {{-- loop - invoices --}}
                                @foreach ($invoices as $invoice)


                                <div class="col-12">



                                    {{-- Actions --}}
                                    <div class="d-block text-end">





                                        {{-- 1: download / capture --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-4 fs-13 justify-content-center fw-semibold mb-2 download--btn me-2"
                                            data-download='#invoice--{{ $invoice->id }}' type="button"
                                            data-bs-target="#extend-subscription" data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="bi bi-download fs-6 me-2"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                <path
                                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                            </svg>Download
                                        </button>






                                        {{-- 2: print --}}
                                        <button
                                            class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-4 fs-13 justify-content-center fw-semibold mb-2 print--btn"
                                            data-print='#invoice--{{ $invoice->id }}' type="button"
                                            data-bs-target="#extend-subscription" data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                                <path
                                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                                </path>
                                            </svg>Print
                                        </button>







                                    </div>
                                    {{-- endActions --}}






                                    {{-- ------------------------------------- --}}
                                    {{-- ------------------------------------- --}}







                                    {{-- invoiceWrapper --}}
                                    <div class="text-start overview--card client-version mb-5 w-100 flex-row subscription--side-invoice"
                                        id='invoice--{{ $invoice->id }}'>
                                        <div class="row align-items-end w-100">



                                            {{-- topCol --}}
                                            <div class="col-12 order-first">
                                                <div class="row align-items-center">


                                                    {{-- title --}}
                                                    <div class="col-12 col-sm-6 text-center text-sm-start">
                                                        <h1 class="display-4 fw-bold mb-4 mt-0">Invoice</h1>
                                                    </div>


                                                    {{-- logo --}}
                                                    <div class="col-12 col-sm-6 text-center text-sm-end">
                                                        <img class="mb-3 of-contain"
                                                            src="{{ asset('assets/img/Logo/doer.png') }}"
                                                            style="height: 55px" />
                                                    </div>
                                                </div>
                                            </div>





                                            {{-- ------------------ --}}
                                            {{-- ------------------ --}}





                                            {{-- leftCol --}}
                                            <div class="col-12 col-lg-6 order-3 order-lg-2">


                                                {{-- date / serial --}}
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="fs-6 w-50 pe-3 mb-0 text-gold"># 104050</p>
                                                    <p class="fs-6 mb-0 w-50 text-end fw-bold">
                                                        {{ date('d / m / Y', strtotime($invoice->created_at)) }}
                                                    </p>
                                                </div>





                                                {{-- tableOfContent --}}
                                                <div
                                                    style=" border-top: 2px solid var(--color-scheme-dark-1); border-radius: 1px;">
                                                    <div class="row">


                                                        {{-- 1: plan / coupon / bagPrice / empty --}}
                                                        <div class="col-6 col-sm-4 pt-2"
                                                            style="border-right: 2px solid var(--color-scheme-dark-1);">
                                                            <p class="text-center w-100 fs-13 mt-2 mb-4">Item</p>
                                                            <p class="text-center mb-3 fw-bold">{{
                                                                $invoice?->plan?->name }}</p>


                                                            {{-- :: checkCoupon --}}
                                                            @if ($invoice?->promoCodeId)

                                                            <p class="text-center mb-3 fw-bold">Coupon</p>

                                                            @endif
                                                            {{-- end if - --}}


                                                            <p class="text-center mb-3 fw-bold">{{
                                                                $invoice?->bag?->name }}</p>
                                                            <p class="text-center mb-3 fw-bold"></p>
                                                        </div>






                                                        {{-- ------------------------- --}}
                                                        {{-- ------------------------- --}}




                                                        {{-- 2: QTY --}}
                                                        <div class="col-6 col-sm-4 pt-2 d-none d-sm-block"
                                                            style="border-right: 2px solid var(--color-scheme-dark-1);">
                                                            <p class="text-center w-100 fs-13 mt-2 mb-4">QTY</p>
                                                            <p class="text-center mb-3 fw-bold">x1</p>


                                                            {{-- :: checkCoupon --}}
                                                            @if ($invoice?->promoCodeId)

                                                            <p class="text-center mb-3 fw-bold">x1</p>

                                                            @endif
                                                            {{-- end if - --}}


                                                            <p class="text-center mb-3 fw-bold">x1</p>
                                                        </div>






                                                        {{-- ------------------------- --}}
                                                        {{-- ------------------------- --}}








                                                        {{-- 3: planPrice - coupon - bagPrice - totalPrice --}}
                                                        <div class="col-6 col-sm-4 pt-2">
                                                            <p class="text-center w-100 fs-13 mt-2 mb-4">Total<small
                                                                    class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                                                            </p>


                                                            {{-- planPrice --}}
                                                            <p class="text-center mb-3 fw-bold">{{
                                                                $invoice?->planPrice ?? 0 }}</p>



                                                            {{-- :: checkCoupon --}}
                                                            @if ($invoice?->promoCodeId)

                                                            <p class="text-center mb-3 fw-bold">
                                                                {{ $invoice?->promoCodeDiscountPrice ?? 0 }}</p>

                                                            @endif
                                                            {{-- end if - --}}



                                                            {{-- bagPrice - totalCheckoutPrice --}}
                                                            <p class="text-center mb-3 fw-bold">{{
                                                                $invoice?->bagPrice ?? 0 }}</p>
                                                            <p class="fs-4 text-center mb-0 fw-bold">
                                                                {{ $invoice?->totalCheckoutPrice?? 0 }}
                                                            </p>



                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end tableOfContetn --}}




                                            </div>
                                            {{-- end leftCol --}}







                                            {{-- ------------------ --}}
                                            {{-- ------------------ --}}







                                            {{-- ** getAddress ** --}}
                                            @php $customerAddress = $customer->addresses->first(); @endphp





                                            {{-- rightCol - personalInformatino --}}
                                            <div
                                                class="col-12 col-lg-6 text-center text-lg-start order-2 order-lg-2 mb-5 mb-lg-0">
                                                <div class="invoice--right-section">
                                                    <h6 class="fw-normal mb-1">Bill To</h6>


                                                    {{-- name --}}
                                                    <h6 class="fw-semibold text-gold mb-4">{{ $customer?->fullName() }}
                                                    </h6>

                                                    {{-- city - district - address --}}
                                                    <h6 class="fw-normal mb-1">{{ $customerAddress?->city?->name }} - {{
                                                        $customerAddress?->district?->name }}</h6>
                                                    <h6 class="fw-normal mb-1">{{ $customerAddress?->locationAddress }}
                                                    </h6>


                                                    {{-- apartment - floor --}}
                                                    <h6 class="fw-normal mb-3">Apartment. {{
                                                        $customerAddress?->apartment }}{{
                                                        $customerAddress?->floor ? ' - Floor. ' .
                                                        $customerAddress?->floor : '' }}</h6>


                                                    {{-- phone - email --}}
                                                    <h6 class="fw-normal mb-1">+971 {{ $customer?->phone }}</h6>
                                                    <h6 class="fw-normal mb-1">{{ $customer?->email }}</h6>
                                                </div>
                                            </div>
                                            {{-- end rightCol --}}
                                        </div>
                                    </div>
                                    {{-- end invoiceWrapper --}}




                                </div>


                                @endforeach
                                {{-- end loop - invoices --}}









                                {{-- pagination --}}
                                <div class="col-12">
                                    {{ $invoices->links() }}
                                </div>





                            </div>
                        </div>
                        {{-- end tab --}}





                        @endif
                        {{-- end if - permission --}}



                    </div>
                </div>
                {{-- end tabWraps --}}



            </div>
        </div>
    </div>
    {{-- endContainer --}}













</section>
{{-- endSection --}}