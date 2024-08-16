<section id="content--section" class="content--section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-12 col-xl-8 text-center">




            {{-- heading --}}
            <h4 data-aos="fade" data-aos-duration="600" data-aos-delay="800" data-aos-once="true"
               class="mb-4 fw-bold position-relative" wire:ignore.self>Checkout Information


               {{-- :: backButton --}}
               <a class="btn submenu--group btn--scheme-2 d-flex align-items-center subscription--back-button py-1 d-none d-md-block"
                  role="button" href="{{ route('subscription.customerStepFour', [$plan->id]) }}"><svg
                     class="bi bi-arrow-up-left me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                     </path>
                  </svg>Go Back</a>

            </h4>
            {{-- endHeading --}}






            {{-- form --}}
            <form wire:submit='continue' class="row mt-4 align-items-center mb-5">



               {{-- promoCode - coupon --}}
               <div class="col-12 col-sm-6">
                  <label class="form-label form--label">Coupon</label>
                  <input type="text" class="form--input mb-4 coupon--input @if ($isCouponApplied) active @endif"
                     wire:model='instance.promoCode' wire:keyup.debounce.100ms='checkPromoCode'>
               </div>






               {{-- ---------------------------- --}}
               {{-- ---------------------------- --}}







               {{-- 1: Stripe PAYMENT --}}
               @if ($paymentMethod && $paymentMethod->name == 'Stripe')




               {{-- subHeading --}}
               <div class="col-12">
                  <div class="d-flex align-items-center justify-content-between mb-3 13">
                     <hr class="w-75">
                     <label class="form-label form--label px-3 mb-0 w-50 justify-content-center fs-13">Card
                        Details</label>
                  </div>
               </div>





               {{-- cardNumber --}}
               <div class="col-12 col-sm-6 col-lg-3">
                  <label class="form-label form--label">Card Number</label>
                  <input type="text" class="form--input mb-4" wire:model='payment.cardNumber' required>
               </div>





               {{-- fullName --}}
               <div class="col-12 col-sm-6 col-lg-3">
                  <label class="form-label form--label">Full Name</label>
                  <input type="text" class="form--input mb-4" wire:model='payment.cardHolder' required>
               </div>




               {{-- cardExpiry --}}
               <div class="col-12 col-sm-4 col-lg-3">
                  <label class="form-label form--label">Expiry Month</label>
                  <input class="form--input mb-4" type="month" wire:model='payment.cardExpiry'
                     wire:change='convertExpiry' required>
               </div>







               {{-- CVV --}}
               <div class="col-12 col-sm-4 col-lg-3">
                  <label class="form-label form--label">CVV</label>
                  <input type="text" class="form--input mb-4" wire:model='payment.cardCVV' required>
               </div>







               @endif
               {{-- endIF --}}











               {{-- ---------------------------- --}}
               {{-- ---------------------------- --}}







               {{-- submitButton --}}
               <div class="col-12 col-sm-4 col-lg-4 align-self-end offset-lg-4">
                  <button
                     class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-4 w-100 fw-semibold justify-content-center shrink--self"
                     style="border: 1px dashed var(--color-scheme-3);">Checkout</button>
               </div>


            </form>
         </div>
         {{-- endColumn --}}












         {{-- ----------------------------------------------- --}}
         {{-- ----------------------------------------------- --}}












         {{-- rightCol --}}
         <div class="col-12 col-sm-10 col-md-7 col-xl-4 text-center mt-zone-cards plans-column" data-aos="fade-left"
            data-aos-duration="600" data-aos-delay="800" data-aos-once="true" wire:ignore.self>



            {{-- planRow --}}
            <div class="overview--card client-version scale--self-05 mb-3 position-relative">


               {{-- :: backButton --}}
               <a class="btn submenu--group btn--scheme-2 d-flex align-items-center subscription--back-button py-1 d-md-none"
                  role="button" href="{{ route('subscription.customerStepFour', [$plan->id]) }}"><svg
                     class="bi bi-arrow-up-left me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                     </path>
                  </svg>Back</a>







               {{-- mainRow --}}
               <div class="row">


                  {{-- cover --}}
                  <div class="col-12 text-center position-relative">
                     <img class="client--card-logo of-cover"
                        src="{{ url('storage/menu/plans/' . $plan->imageFile) }}" />
                  </div>


                  {{-- content --}}
                  <div class="col-12">
                     <h4 class="text-center fw-bold mt-3 mb-1">{{ $plan->name }}</h4>
                  </div>
               </div>
            </div>
            {{-- end planRow --}}






            {{-- -------------------- --}}
            {{-- -------------------- --}}






            {{-- invoiceRow --}}
            <div class="text-start overview--card client-version mb-5 w-100 flex-row subscription--side-invoice">
               <div class="row w-100">
                  <div class="col-12">

                     {{-- heading --}}
                     <h6 class="fw-semibold mb-3 text-gold text-center">Summary</h6>



                     {{-- :: averageCaloriesPerDay --}}
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <p class="fs-12 w-75 pe-3 mb-0">
                           Calories / Day
                        </p>
                        <p class="fs-13 mb-0 w-50 text-end">{{ $instance->totalBundleRangeCalories ?? '' }}
                        </p>
                     </div>




                     {{-- :: planDays --}}
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <p class="fs-12 w-75 pe-3 mb-0">Plan Days</p>
                        <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->planDays ?? '' }}</p>
                     </div>



                     {{-- :: pricePerDay --}}
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <p class="fs-12 w-75 pe-3 mb-0">Price / Day</p>
                        <p class="fs-13 mb-0 w-50 text-end ">{{ $instance->bundleRangePricePerDay ?? '' }}
                        </p>
                     </div>



                     {{-- :: plan - meals --}}
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <p class="fs-12 w-50 pe-3 mb-0">Plan Details</p>
                        <p class="fs-13 mb-0 w-50 text-end">
                           {{ $instance->bundleTypesInArray ?? '' }}
                        </p>
                     </div>






                     {{-- --------------------------- --}}
                     {{-- --------------------------- --}}




                     {{-- :: planPrice --}}
                     <div class="d-flex align-items-center justify-content-between pt-3"
                        style="border-top: 1px dashed var(--bg-golden-dark)">
                        <p class="fs-12 w-50 pe-3 mb-0">Plan Price</p>
                        <p class="mb-0 w-50 text-end fw-bold">{{ $instance->totalBundleRangePrice ?? ''}}
                           <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                        </p>
                     </div>




                     {{-- :: bag --}}
                     <div class="d-flex align-items-center justify-content-between pt-2">
                        <p class="fs-12 w-50 pe-3 mb-0">{{ $instance->bag }}</p>
                        <p class="mb-0 w-50 text-end fw-bold">{{ $instance->bagPrice }}
                           <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                        </p>
                     </div>


                     {{-- :: Coupon --}}
                     <div class="d-flex align-items-center justify-content-between pt-2">
                        <p class="fs-12 w-50 pe-3 mb-0">Coupon</p>
                        <p class="mb-0 w-50 text-end fw-bold">{{ $instance->promoCodeDiscountPrice ?? '0' }}
                           <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                        </p>
                     </div>




                     {{-- :: totalCheckoutPrice --}}
                     <div class="d-flex align-items-center justify-content-between pt-2">
                        <p class="w-50 pe-2 mb-0 fs-14 fw-semibold">Total Checkout</p>
                        <p class="mb-0 w-50 text-end fw-bold fs-4">{{ $instance->totalCheckoutPrice ?? '0' }}
                           <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                        </p>
                     </div>






                  </div>
               </div>
            </div>
            {{-- end invoiceRow --}}


         </div>
         {{-- end rightCol --}}






      </div>
   </div>
   {{-- endContainer --}}



















   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}









   {{-- handleSelect --}}
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






</section>
{{-- endSection --}}