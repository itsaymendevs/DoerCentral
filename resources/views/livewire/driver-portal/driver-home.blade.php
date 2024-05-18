<section id="content--section" class="content--section">
    <div class="container">


        {{-- topRow --}}
        <div class="row align-items-end mb-submenu mb-0">


            {{-- shiftType --}}
            <div class="col-12 text-center" data-aos="fade" data-aos-duration="600" data-aos-once="true"
                wire:ignore.self>




                {{-- 1: morningShift --}}
                @if ($driver->shift->name == 'Morning Shift')



                <h6 class="fw-semibold mb-3 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-sun-fill fs-3 me-2 rotateInfinite" style="fill: #dba400">
                        <path
                            d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                    </svg>{{ $driver->shift->name }}
                </h6>




                {{-- 2: eveningShift --}}
                @else



                <h6 class="fw-semibold mb-3 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-moon-fill fs-3 me-2 scaleInfinite" style="fill: #dba400">
                        <path
                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
                        </path>
                    </svg>{{ $driver->shift->name }}
                </h6>




                @endif
                {{-- end if --}}

            </div>






            {{-- overview --}}



            {{-- 1: total --}}
            <div class="col-4 text-end" data-aos="fade-up" data-aos-duration="600" data-aos-once="true"
                wire:ignore.self>
                <div class="overview--box shrink--self solid">
                    <h6 class="fs-11">Total</h6>
                    <p class="fs-5 bg-transparent py-1">{{ $driver?->todayDeliveries()?->count() ?? 0 }}</p>
                </div>
            </div>








            {{-- 2: pending --}}
            <div class="col-4 text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self solid">
                    <h6 class="fs-11">Pending</h6>
                    <p class="fs-5 bg-transparent py-1">{{ $driver?->todayPendingDeliveries()?->count() ?? 0 }}</p>
                </div>
            </div>





            {{-- 3: completed --}}
            <div class="col-4 text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self solid">
                    <h6 class="fs-11">Completed</h6>
                    <p class="fs-5 bg-transparent py-1">{{ $driver?->todayCompletedDeliveries()?->count() ?? 0 }}</p>
                </div>
            </div>
        </div>







        {{-- --------------------------------------- --}}
        {{-- --------------------------------------- --}}







        {{-- content --}}
        <div class="row align-items-end mb-submenu pb-4">



            {{-- filters --}}


            {{-- 1: district --}}
            <div class="col-6 col-lg-6 mt-4" data-aos="fade" data-aos-duration="800" data-aos-once="true"
                wire:ignore.self>




                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">District</label>
                </div>



                {{-- select --}}
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

                    <select class="form-select form--select" id='district-select' data-instance='searchDistrictId'
                        data-clear='true'>
                        <option value=""></option>

                        @foreach ($districts ?? [] as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>

                </div>



            </div>
            {{-- endFilter --}}









            {{-- 2: status --}}
            <div class="col-6 col-lg-6 mt-4" data-aos="fade" data-aos-duration="800" data-aos-once="true"
                wire:ignore.self>




                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Status</label>
                </div>



                {{-- select --}}
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

                    <select class="form-select form--select" data-instance='searchStatus' data-clear='true'>
                        <option value=""></option>

                        @foreach ($statuses ?? [] as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>

                </div>



            </div>
            {{-- endFilter --}}












            {{-- --------------------- --}}
            {{-- --------------------- --}}











            {{-- loop - deliveries --}}

            @foreach ($deliveries ?? [] as $delivery)



            {{-- ** GET ADDRESS --}}
            @php $customerAddress = $delivery?->customer?->addressByDay($delivery->deliveryDate) ?? null; @endphp









            <div class="col-12 mt-5 pb-3" key='single-delivery-{{ $delivery->id }}'>
                <div class="delivery--wrap position-relative" data-aos="fade" data-aos-duration="600"
                    data-aos-once="true" wire:ignore.self>



                    {{-- helperWrap --}}
                    <div class="btn-group delivery--helper-wrap" role="group">


                        {{-- phone --}}
                        <a href='tel:+971{{ $delivery?->customer?->phone }}' class="btn delivery--helper-btn"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-telephone fs-5">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                </path>
                            </svg>
                        </a>







                        {{-- whatsapp --}}
                        <a href='https://api.whatsapp.com/send?phone=971{{ $delivery?->customer?->whatsapp }}&text=Hello%2C%20I%20have%20your%20delivery%20ready%20%F0%9F%91%8B'
                            class="btn delivery--helper-btn" target='_blank'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-whatsapp fs-5">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                </path>
                            </svg>
                        </a>
                    </div>








                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}





                    {{-- top --}}
                    <div class="d-flex align-items-end justify-content-between mb-4">


                        {{-- deliveryNo. --}}
                        <h6 class="mb-0 fs-14">
                            Order<span class="ms-1 text-gold">#{{ $delivery->id }}</span>
                        </h6>





                        {{-- status --}}


                        {{-- :: completed --}}
                        @if ($delivery->status == 'Completed')


                        <h6 class="fs-14 mb-0 text-theme-secondary text-uppercase">{{ $delivery->status }}</h6>



                        {{-- :: canceled --}}
                        @elseif ($delivery->status == 'Canceled' || $delivery->status == 'Not Available')


                        <h6 class="fs-14 mb-0 text-danger text-uppercase">{{ $delivery->status }}</h6>



                        {{-- others --}}
                        @else


                        <h6 class="fs-14 mb-0 text-warning text-uppercase">{{ $delivery->status }}</h6>


                        @endif
                        {{-- end if --}}



                    </div>
                    {{-- endDiv --}}







                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}









                    {{-- customer --}}
                    <div>
                        <h6 class="mb-3 fw-semibold">{{ $delivery->customer->fullName() }}</h6>
                    </div>





                    {{-- address --}}
                    @if ($customerAddress)




                    {{-- city - district --}}
                    <h6 class="mb-2 fs-13 fw-normal">{{ $customerAddress->city->name }}, {{
                        $customerAddress->district->name }}</h6>



                    {{-- addressLocation --}}
                    <h6 class="mb-1 fs-13 fw-normal">
                        Apartment. {{ $customerAddress?->apartment }}
                        @if ($customerAddress?->floor)
                        <span class='me-1'>&#x2022;</span>Floor. {{ $customerAddress?->floor }}
                        @endif
                    </h6>


                    <h6 class="fs-13 fw-normal">{{ $customerAddress?->locationAddress }}</h6>




                    {{-- :: fallback --}}
                    @else


                    <h6 class="mb-2 fs-13 fw-normal">Address Unavailable</h6>


                    @endif
                    {{-- end if --}}






                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}











                    {{-- actionButtons --}}
                    <div class="mt-4 d-flex align-items-center justify-content-between">


                        {{-- confirmPicking --}}


                        {{-- 1: pending --}}
                        @if ($delivery->status == 'Pending')

                        {{-- <button wire:click="update({{ $delivery->id }}, 'Picked')" wire:loading.class='disabled'
                            class="btn btn--scheme btn--scheme-outline-3 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white"
                            type="button">Confirm Picking</button> --}}


                        {{-- capture QR --}}
                        <label for='capture--QR'
                            class="btn btn--scheme btn--scheme-outline-3 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white">Confirm
                            Picking</label>




                        {{-- :: captureEvent --}}
                        <input id='capture--QR' class='d-none' type="file" accept="image/*" capture>










                        {{-- 2: picked --}}
                        @elseif ($delivery->status == 'Picked')


                        <button wire:click='confirmDelivery({{ $delivery->id }})'
                            class="btn btn--scheme btn--scheme-outline-3 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white"
                            type="button" data-bs-toggle='modal' data-bs-target='#confirm-delivery'>Confirm
                            Delivery</button>






                        {{-- 3: completed --}}
                        @elseif ($delivery->status == 'Completed')




                        <button
                            class="btn btn--scheme btn--scheme-3 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white no-events"
                            type="button">{{ $delivery->status }}</button>





                        {{-- 4: canceled --}}
                        @elseif ($delivery->status == 'Canceled' || $delivery->status == 'Not Available')



                        <button
                            class="btn btn--scheme btn--remove py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 px-3 no-events"
                            type="button">{{ $delivery->status }}</button>



                        @endif
                        {{-- end if --}}






                        {{-- --------------------------- --}}
                        {{-- --------------------------- --}}







                        {{-- rightButton --}}



                        {{-- 1: pending --}}
                        @if ($delivery->status == 'Pending')



                        {{-- :: cancel --}}
                        <button wire:click="update({{ $delivery->id }}, 'Canceled')" wire:loading.class='disabled'
                            class="btn btn--scheme btn--remove py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 px-3"
                            type="button">
                            Cancel Order
                        </button>





                        {{-- 2: empty --}}
                        @elseif ($delivery->status == 'Canceled' || $delivery->status == 'Not Available')


                        <button
                            class="btn btn--scheme btn-outline-warning py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 px-3 disabled"
                            type="button" data-bs-target="#map-location" data-bs-toggle="modal">
                            -----------
                        </button>





                        {{-- 3: mapLocation --}}
                        @else



                        <button wire:click='viewDeliveryMap({{ $delivery->id }})'
                            class="btn btn--scheme btn-outline-warning py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 px-3"
                            type="button" data-bs-target="#map-location" data-bs-toggle="modal">
                            Map Location
                        </button>



                        @endif
                        {{-- end if --}}



                    </div>
                </div>
            </div>


            @endforeach
            {{-- end loop --}}









            {{-- ----------------------- --}}
            {{-- ----------------------- --}}






            {{-- :: fallback --}}
            @if ($deliveries->count() == 0)


            <div class="col-12 mb-5">
                <div class="profile--wrap" data-aos="fade" data-aos-duration="600" data-aos-once="true"
                    wire:ignore.self>
                    <div class="d-flex align-items-center justify-content-center mb-0 profile--wrap-section">
                        <button class="btn p-0" type='button'>
                            <svg class="bi bi-info-lg fs-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z">
                                </path>
                            </svg>
                        </button>
                        <p class="fs-6 mb-0 ms-3 fw-normal">No Pending Delivery</p>
                    </div>
                </div>
            </div>


            @endif
            {{-- end if - fallback --}}






        </div>
    </div>
    {{-- endContainer --}}
























    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
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



    {{-- 1: confirm --}}
    <livewire:driver-portal.driver-home.components.driver-home-confirm />



    {{-- 2: map --}}
    <livewire:driver-portal.driver-home.components.driver-home-map />


    @endsection





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










</section>
{{-- endSection --}}