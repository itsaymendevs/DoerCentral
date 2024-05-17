<section id="content--section" class="content--section">
    <div class="container">


        {{-- overview --}}
        <div class="row align-items-end mb-submenu mb-0">



            {{-- 1: total --}}
            <div class="col-4 text-end" data-aos="fade-up" data-aos-duration="600" data-aos-once="true"
                wire:ignore.self>
                <div class="overview--box shrink--self solid">
                    <h6 class="fs-11">Total</h6>
                    <p class="fs-5 bg-transparent py-1">15</p>
                </div>
            </div>








            {{-- 2: pending --}}
            <div class="col-4 text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self solid">
                    <h6 class="fs-11">Pending</h6>
                    <p class="fs-5 bg-transparent py-1">12</p>
                </div>
            </div>




            {{-- 3: completed --}}
            <div class="col-4 text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self solid">
                    <h6 class="fs-11">Completed</h6>
                    <p class="fs-5 bg-transparent py-1">3</p>
                </div>
            </div>


        </div>
        {{-- endRow --}}





        {{-- --------------------------------------- --}}
        {{-- --------------------------------------- --}}









        {{-- content --}}
        <div class="row align-items-end mb-submenu">



            {{-- filters --}}



            {{-- 1: district --}}
            <div class="col-12 mt-4" data-aos="fade" data-aos-duration="600" data-aos-once="true" data-aos-once="true"
                wire:ignore.self>

                {{-- subheading --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">District</label>
                </div>



                {{-- select --}}
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

                    <select class="form-select form--select" id='district-select' data-instance='searchDistrictId
                        data-clear=' true'>
                        <option value=""></option>

                        @foreach ($districts ?? [] as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>

                </div>

            </div>
            {{-- endCol --}}







            {{-- 2: customer --}}
            <div class="col-12" data-aos="fade" data-aos-duration="600" data-aos-delay="200" data-aos-once="true"
                wire:ignore.self>


                {{-- subheading --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Customer</label>
                </div>


                {{-- input --}}
                <div class="select--single-wrapper mb-4">
                    <input type="text" class="form--input" />
                </div>
            </div>






            {{-- --------------------- --}}
            {{-- --------------------- --}}







            {{-- loop - deliveries --}}
            <div class="col-12 mt-5 pb-3" data-aos="fade" data-aos-duration="600" data-aos-delay="200"
                data-aos-once="true" wire:ignore.self>
                <div class="delivery--wrap position-relative">



                    {{-- helperWrap --}}
                    <div class="btn-group delivery--helper-wrap" role="group">


                        {{-- phone --}}
                        <button class="btn delivery--helper-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-telephone fs-5">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                </path>
                            </svg>
                        </button>







                        {{-- whatsapp --}}
                        <button class="btn delivery--helper-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-whatsapp fs-5">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                </path>
                            </svg>
                        </button>
                    </div>








                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}





                    {{-- top --}}
                    <div class="d-flex align-items-end justify-content-between mb-4">


                        {{-- deliveryNo. --}}
                        <h6 class="mb-0 fs-14">
                            Order<span class="ms-1 text-gold">#32</span>
                        </h6>


                        {{-- status --}}
                        <h6 class="fs-14 mb-0 text-warning">Pending</h6>
                    </div>





                    {{-- customer --}}
                    <div>
                        <h6 class="mb-3 fw-semibold">Christina Lutfi</h6>
                    </div>



                    {{-- city - district --}}
                    <h6 class="mb-2 fs-13 fw-normal">Dubai, Business Bay</h6>


                    {{-- addressLocation --}}
                    <h6 class="mb-1 fs-13 fw-normal">Block. 12B - Floor. 5</h6>
                    <h6 class="fs-13 fw-normal">Churchill Tower South</h6>









                    {{-- actionButtons --}}
                    <div class="mt-4 d-flex align-items-center justify-content-between">


                        {{-- confirmPicking --}}
                        <button
                            class="btn btn--scheme btn--scheme-outline-3 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white"
                            type="button" style="/*border: 1px solid var(--color-theme-secondary);*/">
                            Confirm Picking</button>



                        {{-- notAvailable --}}
                        <button
                            class="btn btn--scheme btn--remove py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 px-3"
                            type="button" style="/*border: 1px solid var(--color-theme-secondary);*/">
                            Not Available
                        </button>



                    </div>
                </div>
            </div>
            {{-- end loop --}}

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