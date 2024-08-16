<section id="content--section" class="content--section">
   <div class="container">
      <div class="row justify-content-center">





         {{-- singleInvoice --}}
         <div class="col-12 col-lg-12 col-xl-10 mb-4" data-aos="fade" data-aos-duration="600" data-aos-delay="800"
            data-aos-once="true">




            {{-- Actions --}}
            <div class="d-block text-end">





               {{-- 1: download / capture --}}
               <button
                  class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-4 fs-13 justify-content-center fw-semibold mb-2 download--btn me-2"
                  data-download='#invoice--{{ $subscription->id }}' type="button" data-bs-target="#extend-subscription"
                  data-bs-toggle="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     class="bi bi-download fs-6 me-2" viewBox="0 0 16 16">
                     <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                     <path
                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                  </svg>Download
               </button>






               {{-- 2: print --}}
               <button
                  class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-4 fs-13 justify-content-center fw-semibold mb-2 print--btn"
                  data-print='#invoice--{{ $subscription->id }}' type="button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
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
            <div id='invoice--{{ $subscription->id }}'
               class="text-start overview--card client-version mb-0 w-100 flex-row subscription--side-invoice">
               <div class="row align-items-end w-100">




                  {{-- topCol --}}
                  <div class="col-12">



                     {{-- row --}}
                     <div class="row align-items-center mb-4 pb-3"
                        style="border-bottom: 1px solid var(--bs-border-color-translucent);">
                        <div class="col-12 col-sm-6 text-center text-sm-start">


                           {{-- paymentReference --}}
                           <h5 class="fw-bold mb-2 mt-0">Invoice No.<span
                                 class="ms-2 text-gold fs-15 fw-semibold">#INV-{{
                                 $subscription?->paymentReference ?? '000000' }}</span>
                           </h5>


                           {{-- orderDate --}}
                           <h6 class="fw-semibold mb-0 mt-0 fs-14">
                              Order Date.<span class="ms-2">{{ date('d / m / Y',
                                 strtotime($subscription->created_at)) }}</span>
                           </h6>
                        </div>



                        {{-- profileLogo --}}
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                           <img class="of-contain" src="{{ url('storage/profile/' . $globalProfile->imageFile) }}"
                              style="max-height: 80px; width: 200px; object-fit:contain !important;" />
                        </div>
                     </div>
                     {{-- endRow --}}









                     {{-- row --}}
                     <div class="row align-items-start mb-3">


                        {{-- planDays --}}
                        <div class="col-12 col-sm-6 text-center text-sm-start mb-4">
                           <div class="invoice--box">
                              <h6 class="fw-semibold">Plan Duration</h6>
                              <h4 class="mb-0">
                                 <span class="fw-bold text-gold">{{
                                    $subscription->planDays }}
                                    Days</span>
                              </h4>
                           </div>
                        </div>





                        {{-- profileInformation --}}
                        <div class="col-12 col-sm-6 text-center text-sm-end mb-4">


                           {{-- name --}}
                           <h5 class="mb-2 mt-0 fw-semibold">{{$globalProfile->name }}</h5>


                           {{-- address --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $globalProfile->locationAddress }}
                           </h6>

                           {{-- city - district --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $globalProfile->city->name }}, {{
                              $globalProfile->district->name }}
                           </h6>


                           {{-- number --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $globalProfile->phone }}
                           </h6>


                           {{-- email --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $globalProfile->email }}
                           </h6>
                        </div>







                        {{-- billTo --}}
                        <div class="col-4">
                           <h5 class="mb-2 mt-0 fw-bold">BILL TO</h5>



                           {{-- customer - phone - email --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $subscription->customer->fullName() }}
                           </h6>
                           <h6 class="mb-1 text--white-dim fs-15">
                              +971 {{ $subscription->customer->phone }}
                           </h6>
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $subscription->customer->email }}
                           </h6>
                        </div>






                        {{-- ** getAddress ** --}}
                        @php $customerAddress = $subscription->customer->addresses->first();
                        @endphp







                        {{-- location --}}
                        <div class="col-4">
                           <h5 class="mb-2 mt-0 fw-bold">Location</h5>


                           {{-- locationAddress --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $customerAddress?->locationAddress }}
                           </h6>


                           {{-- city - district --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              {{ $customerAddress?->city?->name }}, {{
                              $customerAddress?->district?->name }}
                           </h6>


                           {{-- apartment - floor --}}
                           <h6 class="mb-1 text--white-dim fs-15">
                              Apartment. {{ $customerAddress?->apartment }}{{
                              $customerAddress?->floor ? ' - Floor. ' .
                              $customerAddress?->floor : '' }}
                           </h6>
                        </div>




                        {{-- plan - bundle --}}
                        <div class="col-12 col-sm-4 mb-4">
                           <div class="invoice--box mx-auto me-0">
                              <h6 class="fw-semibold">{{ $subscription->plan->name }}</h6>
                              <h5 class="mb-0 text-center">
                                 <span class="fw-bold text-gold">
                                    {{ $subscription->range->caloriesRange
                                    }}<br />CALS</span>
                              </h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- end topCol --}}






                  {{-- ------------------------------------------ --}}
                  {{-- ------------------------------------------ --}}







                  {{-- midCol --}}
                  <div class="col-12">
                     <div style="border-top: 2px solid var(--color-scheme-dark-1);
                                    border-radius: 1px;">




                        {{-- tableRow --}}
                        <div class="row">




                           {{-- 1: items --}}
                           <div class="col-4" style="border-right: 2px solid var(--color-scheme-dark-1);">
                              <p class="text-center w-100 mt-2
                                                mb-4 pb-2 border-bottom fw-semibold">ITEM</p>




                              {{-- plan - coupon - Cool Bag --}}
                              <p class="text-center mb-3 fw-bold">{{
                                 $subscription->plan->name}}</p>




                              {{-- :: checkCoupon --}}
                              @if ($subscription?->promoCodeId)

                              <p class="text-center mb-3 fw-bold">{{
                                 $subscription->promoCode }}</p>

                              @endif
                              {{-- end if --}}




                              <p class="text-center mb-0 fw-bolder">{{
                                 $subscription?->bag->name }}</p>
                           </div>




                           {{-- --------------------------- --}}
                           {{-- --------------------------- --}}




                           {{-- 2: QTY --}}
                           <div class="col-2" style="border-right: 2px solid var(--color-scheme-dark-1);">
                              <p class="text-center w-100 mt-2 mb-4
                                                pb-2 border-bottom fw-semibold">QTY</p>



                              {{-- quantity --}}
                              <p class="text-center mb-3 fw-bold">x1</p>



                              {{-- :: checkCoupon --}}
                              @if ($subscription?->promoCodeId)

                              <p class="text-center mb-3 fw-bold">x1</p>

                              @endif
                              {{-- end if --}}


                              <p class="text-center mb-0 fw-bold">x1</p>
                           </div>





                           {{-- --------------------------- --}}
                           {{-- --------------------------- --}}






                           {{-- 3: VAT --}}
                           <div class="col-2" style="border-right: 2px solid var(--color-scheme-dark-1);">
                              <p class="text-center w-100 mt-2
                                                mb-4 pb-2 border-bottom fw-semibold">TAX</p>
                              <p class="text-center mb-3 fw-bold">%0</p>
                              <p class="text-center mb-3 fw-bold">%0</p>
                              <p class="text-center mb-0 fw-bold">%0</p>
                           </div>





                           {{-- --------------------------- --}}
                           {{-- --------------------------- --}}





                           {{-- 4: prices --}}
                           <div class="col-4">
                              <p class="text-center w-100 mt-2 mb-4
                                                 pb-2 border-bottom fw-semibold">PRICE<small
                                    class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                              </p>


                              {{-- plan - promoCode - coolBag --}}


                              {{-- planPrice --}}
                              <p class="text-center mb-3 fw-bold">{{
                                 $subscription?->planPrice ?? 0 }}</p>




                              {{-- :: checkCoupon --}}
                              @if ($subscription?->promoCodeId)

                              <p class="text-center mb-3 fw-bold">{{
                                 $subscription?->promoCodeDiscountPrice ?? 0 }}</p>

                              @endif
                              {{-- end if --}}




                              {{-- bagPrice --}}
                              <p class="text-center mb-0 fw-bold">{{
                                 $subscription?->bagPrice
                                 ?? 0 }}</p>


                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- endCol --}}






                  {{-- -------------------------------- --}}
                  {{-- -------------------------------- --}}






                  {{-- totalCol --}}
                  <div class="col-12 mt-4">
                     <div class="row align-items-center">



                        {{-- payment - HIDDEN --}}
                        <div class="col-6 invisible1">
                           <h6 class="mb-2 mt-0 fw-bold invisible">
                              Payment
                           </h6>
                        </div>



                        {{-- totalCheckoutPrice --}}
                        <div class="col-2 text-center">
                           <h6 class="mb-2 mt-0 fw-bold">Total Amount</h6>
                        </div>
                        <div class="col-4">
                           <h4 class="text-center mb-2 mt-0 fw-bold">
                              {{ $subscription?->totalCheckoutPrice?? 0 }}
                           </h4>
                        </div>






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}









                        {{-- noteFromAdmin --}}
                        <div class="col-11 mt-3 mb-2 d-none">
                           <h6 class="mb-2 mt-0 fw-bold d-flex align-items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                 viewBox="0 0 16 16" class="bi bi-info-circle fs-6 me-2">
                                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                 </path>
                                 <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                 </path>
                              </svg>Note
                           </h6>
                           <h6 class="mb-1 text--white-dim fs-15">
                              Lorem ipsum, dolor sit amet consectetur
                              adipisicing elit. Dolorem quod voluptatum
                              inventore doloribus at. Consequatur.<br />
                           </h6>
                        </div>
                        {{-- endCol --}}



                     </div>
                  </div>
               </div>
            </div>







         </div>







         {{-- -------------------------- --}}
         {{-- -------------------------- --}}







         {{-- :: returnButton --}}
         <div class="col-12">


            <div class="d-block text-center">
               <a href="{{ route('subscription.customerStepOne') }}"
                  class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-5 fw-semibold justify-content-center shrink--self w-100"
                  style="border: 1px dashed var(--color-scheme-3); max-width: 200px">
                  Continue
               </a>
            </div>
         </div>










      </div>
   </div>
</section>
{{-- endSection --}}