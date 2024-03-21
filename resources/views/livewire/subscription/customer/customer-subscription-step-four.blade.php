<section id="content--section" class="content--section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-12 col-xl-9">




            {{-- heading --}}
            <h4 data-aos="fade" data-aos-duration="600" data-aos-delay="800" data-aos-once="true"
               class="mb-4 fw-bold text-center" wire:ignore.self>
               Delivery Information
            </h4>



            {{-- form --}}
            <form wire:submit='continue' class="row mt-4 align-items-center mb-5">
               <div class="col-12">



                  {{-- subheading --}}
                  <div class="d-flex align-items-center justify-content-between mb-2 hr--title">
                     <hr class="w-100" />
                     <label class="form-label form--label px-3 mb-0 w-75
                            justify-content-center fs-13">Delivery Days</label>
                  </div>






                  {{-- deliveryDays --}}
                  <div class="mb-4 flex submenu--group text-start" wire:ignore>


                     {{-- loop - deliveryDays --}}
                     @foreach ($weekDays as $key => $weekDay)


                     <label class="form-check button--checkbox btn fs-14 p-0" for="formCheck-{{ $key }}">{{
                        $weekDay }}</label>


                     {{-- input --}}
                     <input class="form-check-input d-none" type="checkbox" value='{{ $weekDay }}'
                        wire:model='instance.deliveryDays.{{ $weekDay }}' id="formCheck-{{ $key }}" />

                     @endforeach
                     {{-- end loop --}}

                  </div>
               </div>






               {{-- ------------------------------------- --}}
               {{-- ------------------------------------- --}}









               {{-- city --}}
               <div class="col-6 col-sm-4" wire:ignore>
                  <label class="form-label form--label">Location</label>
                  <div class="select--single-wrapper mb-4">
                     <select class="form-select form--select parent-select" data-instance='instance.cityId'
                        data-child='#district-select' data-second-child='#deliveryTime-select' required>
                        <option value=""></option>

                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach

                     </select>
                  </div>
               </div>





               {{-- districts --}}
               <div class="col-6 col-sm-4" wire:ignore>
                  <label class="form-label form--label">District</label>
                  <div class="select--single-wrapper mb-4">
                     <select class="form-select form--select" id='district-select'
                        data-instance='instance.cityDistrictId' data-empty='true' required>
                        <option value=""></option>
                     </select>
                  </div>
               </div>




               {{-- deliveryTimes --}}
               <div class="col-12 col-sm-4" wire:ignore>
                  <label class="form-label form--label">Delivery Time</label>
                  <div class="select--single-wrapper mb-4">
                     <select class="form-select form--select" id='deliveryTime-select'
                        data-instance='instance.cityDeliveryTimeId' data-empty='true' required>
                        <option value=""></option>
                     </select>
                  </div>
               </div>







               {{-- address --}}
               <div class="col-12">
                  <label class="form-label form--label">Your Address</label>
                  <input type="text" class="form--input mb-4" wire:model='instance.locationAddress' required />
               </div>



               {{-- apartment --}}
               <div class="col-6 col-sm-4">
                  <label class="form-label form--label">Apartment / Villa</label>
                  <input type="text" class="form--input mb-4" wire:model='instance.apartment' />
               </div>



               {{-- floor --}}
               <div class="col-6 col-sm-4">
                  <label class="form-label form--label">Floor</label>
                  <input type="text" class="form--input mb-4" wire:model='instance.floor' />
               </div>




               {{-- submitButton --}}
               <div class="col-12 col-sm-4 align-self-end text-center">
                  <button
                     class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-4 w-75 fw-semibold justify-content-center shrink--self"
                     type="submit" style="border: 1px dashed var(--color-scheme-3)">
                     Continue
                  </button>
               </div>

            </form>
         </div>
         {{-- endCol --}}









         {{-- ----------------------------------------------- --}}
         {{-- ----------------------------------------------- --}}







         {{-- rightCol --}}
         <div class="col-12 col-sm-10 col-md-7 col-xl-3 text-center mt-zone-cards plans-column" data-aos="fade-left"
            data-aos-duration="600" data-aos-delay="800" data-aos-once="true" wire:ignore.self>



            {{-- planRow --}}
            <div class="overview--card client-version scale--self-05 mb-4">
               <div class="row">


                  {{-- cover --}}
                  <div class="col-12 text-center position-relative">
                     <img class="client--card-logo of-cover"
                        src="{{ asset('storage/menu/plans/' . $plan->imageFile) }}" />
                  </div>


                  {{-- content --}}
                  <div class="col-12">
                     <h5 class="text-center fw-bold mt-3 mb-2 truncate-text-1l">{{ $plan->name }}</h5>
                     <p class="text-center fs-12 fw-semibold text-gold mb-2">
                        Starting From {{ $plan->startingPrice }}<small
                           class="ms-1 fw-semibold text-gold fs-10">(AED)</small>/ Day
                     </p>
                     <p class="text-center fs-12 mb-2">{{ $plan->longDesc }}</p>
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







         //  1.2: refreshChild to defaultValue
         if ($(this).hasClass('parent-select')) {

            childSelect = $(this).attr('data-child');
            childSecondSelect = $(this).attr('data-second-child');

            @this.refreshSelect(childSelect, 'city', 'district', selectValue, true);
            @this.refreshSelect(childSecondSelect, 'city', 'deliveryTime', selectValue, true);


         } // end if




      }); //end function


   </script>









   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}






</section>
{{-- endSection --}}