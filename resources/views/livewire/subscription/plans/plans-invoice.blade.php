{{-- wrapper --}}
<div class="wrapper">





    {{-- head --}}
    @section('head')



    {{-- title - description - keywords meta --}}
    <title>Invoice</title>

    <meta name="description" content="Subscription - Invoice Details">

    <meta name="keywords"
        content="Healthy Meal Plans Provider in Dubai, Best Healthy Meal Plans Provider in Dubai, Healthy Meal Plans Provider">


    @endsection
    {{-- endHead --}}









    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}







    {{-- colors --}}
    <livewire:website.components.colors.colors-plans-customization />







    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}







    {{-- blobBG --}}
    <livewire:website.components.items.background-blob />








    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}








    {{-- section --}}
    <div class="section section-inner m-description plan--section">
        <div class="container">
            <div class="row justify-content-center">




                {{-- message --}}
                @if ($formSettings?->showInvoiceText)


                <div class="col-11 col-lg-8 text-center" wire:ignore>

                    <h3 class='splitting-text-anim-3 scroll-animate mt-0 mb-5 fw-semibold' data-splitting="chars"
                        data-animate="active">
                        We’re
                        thrilled to have you on board and can’t wait for you to enjoy our delicious meals.</h3>
                </div>
                {{-- endCol --}}



                @endif
                {{-- end if --}}








                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}




                {{-- invoice --}}
                <div class="col-12 col-lg-9">
                    <div
                        class="invoice--final-wrapper @if ($formSettings?->showInvoiceMotion) invoice--final-motion @endif">



                        {{-- 1: top --}}
                        <div class="invoice--final-spacer">
                            <div class="row align-items-center">


                                {{-- logo --}}
                                <div class="col-12 text-center text-sm-start col-sm-6">
                                    <img src='{{ url("{$storagePath}/profile/{$profile->imageFileDark}") }}'
                                        class='invoice--final-logo of-contain' />
                                </div>





                                {{-- date - invoice --}}
                                <div class="col-12 col-sm-6 invoice--top-wrapper d-flex justify-content-center justify-content-sm-end"
                                    wire:ignore>

                                    <div class="d-inline-block text-center text-sm-end invoice--top me-4">
                                        <p class='mt-0 mb-2 fs-14'>Date</p>
                                        <p class='mt-0 mb-0 fw-semibold color--theme fs-14 splitting-text-anim-2 scroll-animate'
                                            data-splitting="chars" data-animate="active">{{ date('M d, Y') }}</p>
                                    </div>


                                    <div
                                        class="d-inline-block text-center text-sm-end invoice--top-wrapper invoice--top">
                                        <p class='mt-0 mb-2 fs-14'>Invoice #</p>
                                        <p class='mt-0 mb-0 fw-semibold color--theme fs-14 splitting-text-anim-2 scroll-animate'
                                            data-splitting="chars" data-animate="active">INV-{{
                                            substr($subscription->paymentReference, 0, 7) }}</p>
                                    </div>

                                </div>






                            </div>
                        </div>
                        {{-- endTop --}}





                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}






                        {{-- 2: mid --}}
                        <div class="invoice--final-spacer"
                            style="background-color: var(--invoiceMidSectionBackgroundColor); padding-top: 35px; padding-bottom: 35px">
                            <div class="row align-items-start">






                                {{-- leftCol --}}
                                <div class="col-12 col-md-6 col-lg-6 invoice--top-wrapper mb-4 mb-lg-0 scrolla-element-anim-1 scroll-animate"
                                    data-animate="active" wire:ignore>

                                    <div class="d-block">
                                        <h6
                                            class='mt-0 mb-3 fs-18 text-center text-md-start text-uppercase fw-semibold color--theme'>
                                            Bill To</h6>


                                        {{-- customer --}}
                                        <p
                                            class='fs-15 my-0 mb-2 fw-500 d-flex align-items-center justify-content-center justify-content-md-start '>
                                            {{ $customer?->fullName() }}
                                        </p>



                                        {{-- phone --}}
                                        <p
                                            class='fs-15 my-0 mb-2 fw-500 d-flex align-items-end justify-content-center justify-content-md-start'>
                                            {{ $customer->phoneKey }} {{ $customer->phone }}
                                        </p>



                                        {{-- email --}}
                                        <p
                                            class='fs-15 my-0 mb-1 fw-500 d-flex align-items-end justify-content-center justify-content-md-start'>
                                            {{ $customer->fullEmail() }}
                                        </p>

                                    </div>
                                </div>
                                {{-- endLeft --}}







                                {{-- ----------------------------------- --}}
                                {{-- ----------------------------------- --}}





                                {{-- rightCol --}}
                                <div class="col-12 col-md-6 col-lg-6 invoice--bottom-wrapper mb-4 mb-lg-0 scrolla-element-anim-1 scroll-animate"
                                    data-animate="active" wire:ignore>

                                    <div class="d-block text-center text-md-end text-lg-end">
                                        <h6 class='mt-0 mb-3 fs-18 text-uppercase fw-semibold color--theme'>{{
                                            $profile?->name }}
                                        </h6>


                                        {{-- phone --}}
                                        <p
                                            class='fs-15 my-0 mb-2 fw-500 d-flex align-items-center justify-content-center justify-content-md-end justify-content-lg-end'>
                                            {{ $profile?->phone }}
                                        </p>



                                        {{-- email --}}
                                        <p
                                            class='fs-15 my-0 mb-2 fw-500 d-flex align-items-center justify-content-center justify-content-md-end justify-content-lg-end'>
                                            {{ $profile?->email }}
                                        </p>



                                        {{-- location --}}
                                        <p
                                            class='fs-15 my-0 mb-2 fw-500 d-flex align-items-center justify-content-center justify-content-md-end justify-content-lg-end'>
                                            {{ $profile?->locationAddress }}
                                        </p>




                                    </div>
                                </div>
                                {{-- endRightCol --}}




                            </div>
                        </div>
                        {{-- endMid --}}
















                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}









                        {{-- 3: bottom --}}
                        <div class="invoice--final-spacer scrolla-element-anim-1 scroll-animate" data-animate="active"
                            style="padding-top: 50px; padding-bottom: 50px">
                            <div class="row align-items-center">





                                {{-- table --}}
                                <div class="col-12">
                                    <div class="invoice--final-table row">



                                        {{-- 1: number --}}
                                        <div class="col-2 invoice--final-table-col d-none d-md-block">



                                            {{-- header --}}
                                            <div class="invoice--final-table-header">
                                                <h6 class='fw-semibold text-uppercase fs-14 text-center'>#</h6>
                                            </div>






                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}





                                            {{-- content --}}
                                            <div class="invoice--final-table-content invoice--final-table-numbers">

                                                {{-- 1: plan - bag --}}
                                                <p class='fw-500'>{{ $globalSNCounter++ }}<span>.</span></p>
                                                <p class='fw-500 tr--multi'>{{ $globalSNCounter++ }}<span>.</span>
                                                </p>


                                                {{-- 2: promo --}}
                                                @if ($subscription?->promoCodeId)

                                                <p class='fw-500'>{{ $globalSNCounter++ }}<span>.</span></p>

                                                @endif
                                                {{-- end if --}}





                                                {{-- 3: deliveryCharge --}}
                                                @if ($settings?->hasDeliveryCharge)

                                                <p class='fw-500'>{{ $globalSNCounter++ }}<span>.</span></p>

                                                @endif





                                                {{-- empty --}}
                                                <p class='fw-500'></p>


                                            </div>
                                        </div>
                                        {{-- endCol --}}







                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}






                                        {{-- 2: description --}}
                                        <div class="col-7 col-md-5 invoice--final-table-col">



                                            {{-- header --}}
                                            <div class="invoice--final-table-header">
                                                <h6 class='fw-semibold text-uppercase fs-14 text-center'>Description
                                                </h6>
                                            </div>






                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}





                                            {{-- content --}}
                                            <div class="invoice--final-table-content">


                                                {{-- 1: plan - bag --}}
                                                <p class='fw-500'>{{ $subscription->plan->name }}</p>
                                                <p class='fw-500 tr--multi flex-column'>
                                                    {{ $subscription->bag->name }}
                                                </p>



                                                {{-- 2: promo --}}
                                                @if ($subscription?->promoCodeId)

                                                <p class='fw-500'>Promo </p>

                                                @endif
                                                {{-- end if --}}





                                                {{-- 3: deliveryCharge --}}
                                                @if ($settings?->hasDeliveryCharge)

                                                <p class='fw-500'>Delivery</p>

                                                @endif





                                                {{-- empty --}}
                                                <p class='fw-500'></p>


                                            </div>
                                        </div>
                                        {{-- endCol --}}





                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}







                                        {{-- 3: quantity --}}
                                        <div class="col-2 d-none d-md-block invoice--final-table-col">



                                            {{-- header --}}
                                            <div class="invoice--final-table-header">
                                                <h6 class='fw-semibold text-uppercase fs-14 text-center'>QTY</h6>
                                            </div>






                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}





                                            {{-- content --}}
                                            <div class="invoice--final-table-content invoice--final-table-quantity">


                                                {{-- 1: plan - bag --}}
                                                <p class='fw-500'><span>x</span>1</p>
                                                <p class='fw-500 tr--multi'><span>x</span>1</p>


                                                {{-- 2: promo --}}
                                                @if ($subscription?->promoCodeId)

                                                <p class='fw-500'><span class='invisible'>x</span></p>

                                                @endif
                                                {{-- end if --}}





                                                {{-- 3: deliveryCharge --}}
                                                @if ($settings?->hasDeliveryCharge)

                                                <p class='fw-500'><span class='invisible'>x</span></p>

                                                @endif




                                                {{-- empty --}}
                                                <p class='fw-500'></p>

                                            </div>
                                        </div>
                                        {{-- endCol --}}







                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}







                                        {{-- 4: price --}}
                                        <div class="col-5 col-md-3 invoice--final-table-col">



                                            {{-- header --}}
                                            <div class="invoice--final-table-header">
                                                <h6 class='fw-semibold text-uppercase fs-14 text-center'>
                                                    Price<span class='span--price ms-1'>AED</span></h6>
                                            </div>






                                            {{-- ------------------------ --}}
                                            {{-- ------------------------ --}}





                                            {{-- content --}}
                                            <div class="invoice--final-table-content invoice--final-table-quantity">

                                                {{-- 1: plan - bag --}}
                                                <p class='fw-500'>{{ number_format($subscription?->planPrice, 1) }}
                                                </p>
                                                <p class='fw-500 tr--multi'>
                                                    {{ number_format($subscription?->bagPrice, 1) }}
                                                </p>



                                                {{-- 2: promo --}}
                                                @if ($subscription?->promoCodeId)

                                                <p class='fw-500'>
                                                    {{ number_format($subscription?->promoCodeDiscountPrice, 1) }}
                                                </p>

                                                @endif
                                                {{-- end if --}}





                                                {{-- 3: deliveryCharge --}}
                                                @if ($settings?->hasDeliveryCharge)

                                                <p class='fw-500'>
                                                    {{ number_format($subscription?->deliveryCharge, 1) }}
                                                </p>
                                                @endif






                                                {{-- 4: totalCheckoutPrice --}}
                                                <p class='fw-semibold fs-4'>
                                                    <span class='table--total-price mx-0'>{{
                                                        number_format($subscription?->totalCheckoutPrice, 1)
                                                        }}</span>
                                                </p>


                                            </div>
                                        </div>
                                        {{-- endCol --}}







                                    </div>
                                </div>
                                {{-- endTable --}}






                                {{-- ----------------------------------------- --}}
                                {{-- ----------------------------------------- --}}
                                {{-- ----------------------------------------- --}}







                                {{-- returnButton --}}
                                <div class="col-12 text-center mt-4 d-flex justify-content-center
                                    @if (!$formSettings?->showButtonMotion) no--button-motion @endif">
                                    <livewire:website.components.items.button-blob title='Back Home'
                                        url="{{ route('website.home') }}" />
                                </div>




                            </div>
                        </div>
                        {{-- endBottom --}}








                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}





                    </div>
                </div>
                {{-- endCol --}}




            </div>
        </div>
    </div>
    {{-- endSection --}}













    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










    {{-- scripts --}}
    @section('scripts')






    {{-- hideLogo --}}
    <script>
        $(document).ready(function() {
            $('.logo--wrap').addClass('d-none');
        });
    </script>






    @endsection
    {{-- endSection --}}









    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










    {{-- modals --}}
    @section('modals')




    @endsection
    {{-- endSection --}}






</div>
{{-- endWrapper --}}