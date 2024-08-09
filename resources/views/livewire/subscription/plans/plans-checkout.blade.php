{{-- wrapper --}}
<div class="wrapper">






    {{-- head --}}
    @section('head')



    {{-- title - description - keywords meta --}}
    <title>{{ $plan->name }} - Checkout</title>

    <meta name="description" content="Checkout - {{ $plan->name }}">

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
            <div class="row">





                {{-- leftCol --}}
                <div class="col-12 col-lg-7">



                    {{-- personal Information --}}
                    <div class="row justify-content-center justify-content-md-start">


                        {{-- mainTitle --}}
                        <div class="col-12 col-sm-12">
                            <div class="m-titles mb-0">
                                <div class="m-title plan--single-title fs-4 mb-0 fw-semibold ">
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">


                                        {{-- hr --}}
                                        <hr>

                                        {{-- collapseToggler --}}
                                        <div class="ps-2 splitting-text-anim-1 scroll-animate motion--slow collapse--title w-100"
                                            data-splitting="chars" data-animate="active">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Delivery Information</span>
                                                <a href="#"
                                                    class='pointer animation--plus @if ($instance?->cityId) d-none @endif'
                                                    data-izimodal-open="#address--modal"
                                                    data-izimodal-transitionin="fadeInDown">
                                                    <i class="bi bi-plus fs-1 color--theme"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endMainTitle --}}






                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}




                        {{-- placeholder --}}


                        {{-- collapseContent --}}
                        @if (empty($instance?->cityId))


                        <div class="col-12 col-sm-12">
                            <div class="collapse show mt-4" id="collapse--location" wire:ignore.self>


                                {{-- row --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <div class="address--overview
                                            @if ($settings?->showAddressMotion) address--motion @endif p-0">

                                            <a class='d-flex align-items-center justify-content-center text-decoration-none'
                                                href="javascript:void(0);" data-izimodal-open="#address--modal"
                                                data-izimodal-transitionin="fadeInDown">


                                                <h4 class='fw-500 fs-6 d-flex align-items-center justify-content-center text-uppercase py-2'
                                                    style="letter-spacing: 0.4px">
                                                    <i class="bi bi-pencil me-3 fs-4"></i>
                                                    <span>Add Your Address</span>
                                                </h4>

                                            </a>

                                        </div>
                                    </div>
                                </div>
                                {{-- endRow --}}

                            </div>
                        </div>


                        @endif
                        {{-- end if --}}










                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}







                        {{-- currentAddress --}}


                        {{-- collapseContent --}}
                        @if ($instance?->cityId)


                        <div class="col-12 col-sm-12">
                            <div class="collapse show mt-4" id="collapse--location" wire:ignore.self>


                                {{-- row --}}
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-xl-12">

                                        <div class="address--overview valid
                                            @if ($settings?->showAddressMotion) address--motion @endif">

                                            {{-- title --}}
                                            <h4 class='mt-0 mb-3 fs-4 fw-bold'>Home</h4>




                                            {{-- general --}}
                                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                                <h6 class='mt-0 mb-1 fw-500 fs-16'>{{
                                                    $district?->city?->name }} - {{ $district?->name }}
                                                </h6>
                                                <h6 class='mt-0 mb-1 fw-500 fs-16'>
                                                    <span class='fs-13'>Apartment</span>
                                                    {{ $instance?->apartment }}
                                                    <i class="bi bi-dash-lg mx-2 fs-6"></i>
                                                    <span class='fs-13'>Floor</span>
                                                    {{ $instance?->floor }}
                                                </h6>
                                            </div>





                                            {{-- ---------------------------- --}}
                                            {{-- ---------------------------- --}}




                                            {{-- location --}}
                                            <p class='mt-3 mb-4 mb-md-2 fs-15'>{{ $instance->locationAddress
                                                }}
                                            </p>





                                            {{-- deliveryDays --}}
                                            <div class='address--overview-days'>


                                                {{-- loop - deliveryDays --}}
                                                @foreach ($instance?->deliveryDays ?? [] as $key => $deliveryDay)

                                                <span>{{ $deliveryDay }}</span>

                                                @endforeach
                                                {{-- end loop --}}


                                            </div>
                                            {{-- endWrapper --}}




                                        </div>
                                    </div>
                                </div>
                                {{-- endRow --}}

                            </div>
                        </div>


                        @endif
                        {{-- end if --}}



                    </div>
                    {{-- endRow --}}








                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}






                    {{-- 2: promo & referral --}}



                    {{-- row --}}
                    @if ($instance?->cityId)

                    <div class="row mt-5 mb-0 justify-content-center justify-content-md-start">



                        {{-- 2.1: promo --}}
                        <div class="col-12 col-sm-6 mb-3">



                            {{-- title --}}
                            <div class="m-title plan--single-title fs-6 mb-3 fw-semibold  pointer">
                                <div
                                    class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">
                                    <hr>

                                    <div class="ps-2 splitting-text-anim-1 scroll-animate motion--slow w-100"
                                        data-splitting="chars" data-animate="active" data-splitting="chars">
                                        <span>Promo</span>
                                    </div>
                                </div>
                            </div>





                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}




                            {{-- input --}}
                            <div class="d-flex form--input-wrapper">
                                <input type="text" class='form--input form--promo
                                @if ($instance?->promoCodeDiscountPrice > 0) active @endif'
                                    wire:model='instance.promoCode' wire:change='checkPromo'>
                            </div>





                        </div>
                        {{-- endCol --}}







                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}








                        {{-- 2.2: referral --}}
                        @if ($settings?->showReferral)


                        <div class="col-12 col-sm-6 mb-3">



                            {{-- title --}}
                            <div class="m-title plan--single-title fs-6 mb-3 fw-semibold  pointer">
                                <div
                                    class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">
                                    <hr>

                                    <div class="ps-2 splitting-text-anim-1 scroll-animate motion--slow w-100"
                                        data-splitting="chars" data-animate="active" data-splitting="chars">
                                        <span>Referral</span>
                                    </div>
                                </div>
                            </div>





                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}




                            {{-- input --}}
                            <div class="d-flex form--input-wrapper">
                                <input type="text" class='form--input form--referral disabled'
                                    wire:model='instance.referral' wire:change='checkReferral' disabled>
                            </div>




                        </div>
                        {{-- endCol --}}



                        @endif
                        {{-- end if --}}







                    </div>

                    @endif
                    {{-- endRow --}}











                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}
                    {{-- ------------------------------------------ --}}












                    {{-- submitButton --}}
                    @if ($instance?->cityId)


                    <form wire:submit='continue'
                        class="row justify-content-center justify-content-md-start @if ($isProcessing) processing--button-wrap @endif">
                        <div class="col-12 col-sm-12 col-lg-11 " wire:ignore>

                            <div class="d-flex justify-content-center mb-4 mt-4
                            @if (!$settings?->showButtonMotion) no--button-motion @endif"
                                wire:loading.class='processing--button-wrap' wire:target='continue'>

                                <livewire:website.components.items.button-blob title='Place Order' type="submit" />

                            </div>

                        </div>
                    </form>


                    @endif
                    {{-- end if --}}






                </div>
                {{-- end leftCol --}}






                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}











                {{-- rightCol --}}
                <div class="col-12 col-lg-4 offset-lg-1 mt-5 mt-lg-0 preference--col">



                    {{-- wrapperToReverse --}}
                    <div class="d-flex flex-column-reverse flex-lg-column">



                        {{-- 1: bundleInformation --}}



                        @if ($pickedPlanBundle)



                        {{-- 1st --}}
                        <div class="d-flex flex-column mb-5">




                            {{-- collapseToggler --}}
                            <div class="section section-inner started-heading mt-0 mb-4" style="z-index: 1000;"
                                wire:ignore>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="h-titles">
                                                <div class="m-title plan--single-title fs-5 mb-0 fw-semibold  pointer">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">


                                                        {{-- hr --}}
                                                        <hr>

                                                        {{-- collapseToggler --}}
                                                        <div class="ps-2 splitting-text-anim-1 scroll-animate collapse--title motion--slow w-100"
                                                            data-splitting="chars" data-animate="active"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse--bundle-information"
                                                            aria-expanded="false"
                                                            aria-controls="collapse--bundle-information"
                                                            data-splitting="chars">
                                                            <div class="d-flex justify-content-between">
                                                                <span>Your Plan Details</span>
                                                                <i
                                                                    class="bi bi-chevron-compact-down collapse--icon"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endRow --}}

                                </div>
                            </div>
                            {{-- endSection --}}










                            {{-- ------------------------------------ --}}
                            {{-- ------------------------------------ --}}











                            {{-- collapseContent --}}
                            <div class="collapse show invoice--sidebar" id="collapse--bundle-information">
                                <div class="section section-inner m-works mb-0">
                                    <div class="container">



                                        {{-- topRow --}}
                                        <div class="row zoom--wrapper align-items-end">


                                            {{-- imageFile --}}
                                            @if ($settings?->showSummaryBundlePicture)

                                            <div
                                                class="col-12 mb-3 mb-md-0 mb-lg-3 mb-xl-0 col-md-6 col-lg-12 col-xl-6">
                                                <div class="d-flex overflow-hidden">
                                                    <img src='{{ url("{$storagePath}/menu/plans/bundles/{$pickedPlanBundle?->imageFile}") }}'
                                                        class='of-contain bg-white zoom--target motion--slow rounded-1 w-100'
                                                        style="height: 150px;">
                                                </div>
                                            </div>


                                            @endif
                                            {{-- end if --}}









                                            {{-- information --}}
                                            <div
                                                class="col-12 @if ($settings?->showSummaryBundlePicture) col-md-6 col-lg-12 col-xl-6 @endif">



                                                {{-- name --}}
                                                <div class="m-titles mb-1 text-center">
                                                    <div class="m-title plan--single-title fw-semibold fs-6 mb-0"
                                                        style="color: var(--summaryBundleColor) !important;">
                                                        {{ $pickedPlanBundle->name }}
                                                    </div>
                                                </div>




                                                {{-- bundleDescription --}}
                                                <span class="desc d-block text-center">
                                                    <span
                                                        class="category text-center splitting-text-anim-1 scroll-animate plan--custom-subtitle fw-500 fs-15"
                                                        data-splitting="chars" data-animate="active">{{
                                                        $pickedPlanBundle->remarks
                                                        }}</span>
                                                </span>





                                                {{-- ----------------------- --}}
                                                {{-- ----------------------- --}}




                                                {{-- range --}}
                                                @if ($pickedPlanBundleRange)

                                                <div class="m-titles mb-1 mt-1">
                                                    <div
                                                        class="m-title plan--single-title fw-semibold fs-15 mb-0 text-center">
                                                        {{
                                                        $pickedPlanBundleRange->range->name }}<span
                                                            class='span--price ms-1'>(Calories)</span>
                                                    </div>
                                                </div>

                                                @endif
                                                {{-- end if --}}







                                            </div>
                                        </div>
                                        {{-- endRow --}}







                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}






                                        {{-- invoiceRow --}}
                                        <div class="row align-items-end mt-5">
                                            <div class="col-12">


                                                {{-- 1: Plan Days --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Duration</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>{{ $instance?->planDays ?? 0
                                                        }}<span class='span--price ms-1'>(days)</span></h6>

                                                </div>





                                                {{-- 2: Start Date --}}
                                                <div
                                                    class="d-flex invoice--tr different justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Start Date</h6>
                                                    <h6 class='my-0 fw-500 fs-13' style="letter-spacing: 1.5px">
                                                        {{
                                                        $instance?->startDate }}</h6>

                                                </div>







                                                {{-- -------------------------------------- --}}
                                                {{-- -------------------------------------- --}}
                                                {{-- -------------------------------------- --}}
                                                {{-- -------------------------------------- --}}





                                                {{-- 1: PlanPrice --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Plan Price</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{ number_format($instance?->totalPlanBundleRangePrice) }}
                                                    </h6>

                                                </div>





                                                {{-- 3: bagPrice --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14 d-flex align-items-end">Cool Bag<span
                                                            class='ms-1 span--price fs-9'
                                                            style="color: var(--textColor)">(Refundable)</span></h6>
                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{ number_format($instance->bagPrice) }}
                                                    </h6>

                                                </div>






                                                {{-- 4: discount --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Discount</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{ number_format($instance?->planBundleRangeDiscountPrice) }}
                                                    </h6>
                                                </div>







                                                {{-- 5: promo --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Promo</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>{{
                                                        number_format($instance?->promoCodeDiscountPrice) }}</h6>
                                                </div>






                                                {{-- 6: Referral --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Referral</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>{{
                                                        number_format($instance?->referralDiscountPrice) }}</h6>
                                                </div>







                                                {{-- 7: deliveryCharge --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">
                                                    <h6 class="fw-500 my-0 fs-14">Delivery</h6>
                                                    <h6 class='my-0 fw-500 fs-16'></h6>
                                                </div>







                                                {{-- 8: totalPrice --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Total Payout</h6>

                                                    @if ($instance->totalCheckoutPrice)

                                                    <h6 class='my-0 fw-semibold fs-6'>
                                                        {{ number_format($instance?->totalCheckoutPrice ?? 0) }}<span
                                                            class='span--price ms-1'>(AED)</span>
                                                    </h6>

                                                    @endif
                                                    {{-- end if --}}

                                                </div>




                                            </div>
                                        </div>
                                        {{-- endRow --}}









                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}





                                    </div>
                                </div>
                            </div>
                            {{-- endWrapper --}}





                        </div>
                        {{-- endWrapper --}}



                        @endif
                        {{-- end if - pickedPlanBundle --}}






                    </div>
                    {{-- endWrapperToReverse --}}



                </div>
                {{-- endRightCol --}}










                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}








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




    {{-- googleMaps --}}
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $mapsKey }}&callback=initMap&v=weekly" defer></script>







    {{-- toggler --}}
    <script>
        if (window.matchMedia("(max-width: 992px)").matches) {


            $('.plans--other-toggler').removeClass('no-events');


        } else {
            $(document).ready(function() {
                setTimeout(() => {
                    $('.plans--other-toggler').trigger('click');
                    $('.plans--other-toggler').removeClass('no-events');
                }, 1800);
            });
        }
    </script>





    {{-- hideLogo --}}
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 0) {
                    $('.logo--wrap').fadeOut();
                } else {
                    $('.logo--wrap').fadeIn();
                }
            });
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




    {{-- information --}}
    <livewire:website.plans.plans-checkout.components.plans-checkout-address />



    @endsection
    {{-- endSection --}}











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









</div>
{{-- endWrapper --}}