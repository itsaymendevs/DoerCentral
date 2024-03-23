{{-- sectionContainer --}}
<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.components.sub-menu id='1' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- filters - overviewRow --}}
        <div class="row align-items-center mb-3">



            {{-- filters --}}


            {{-- 1: name --}}
            <div class="col-3">
                <label class="form-label form--label">Customer</label>
                <input type="text" class="form--input mb-4" wire:model.live='searchCustomer'>
            </div>



            {{-- 2: plan --}}
            <div class="col-3" wire:ignore>
                <label class="form-label form--label">Plan</label>
                <div class="select--single-wrapper mb-4">

                    <select class="form-select form--select" data-instance='searchPlan' data-clear='true'>
                        <option value=""></option>

                        @foreach ($plans as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>




            {{-- 3: status --}}
            <div class="col-3" wire:ignore>
                <label class="form-label form--label">Status</label>
                <div class="select--single-wrapper mb-4">
                    <select class="form-select form--select" data-instance='searchStatus' data-clear='true'>
                        <option value=""></option>

                        <option value="Active">Active</option>
                        <option value="Expired">Expired</option>

                    </select>
                </div>
            </div>







            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}






            {{-- newButton --}}
            <div class="col-3 text-end">
                <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    type="button" data-bs-target="#new-bundle" data-bs-toggle="modal"><svg
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-plus-circle-dotted fs-5 me-2">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Customer
                </button>
            </div>






            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}







            {{-- overviewBoxes --}}


            {{-- total --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="800"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6>Total</h6>
                    <p class="truncate-text-1l">{{ $customers->count() }}</p>
                </div>
            </div>



            {{-- active --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="800"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6>Active</h6>
                    <p class="truncate-text-1l">-</p>
                </div>
            </div>




            {{-- paused --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="800"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6>Paused</h6>
                    <p class="truncate-text-1l">-</p>
                </div>
            </div>




            {{-- males --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="800"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6>Males</h6>
                    <p class="truncate-text-1l">{{ $customers->where('gender', 'Male')->count() }}</p>
                </div>
            </div>






            {{-- females --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="800"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6>Females</h6>
                    <p class="truncate-text-1l">{{ $customers->where('gender', 'Female')->count() }}</p>
                </div>
            </div>



        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------------------- --}}
        {{-- ----------------------------------------------------- --}}






        {{-- customersRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 mt-zone-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">





                    {{-- loop - customers --}}
                    @foreach ($customers as $customer)




                    <div class="col-4 col-xl-3 col-xxl-3">
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">



                                {{-- genderPicture --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo"
                                        src="{{ asset('assets/img/Customers/' . $customer->gender . '.png') }}">
                                </div>




                                {{-- :: midCol --}}
                                <div class="col-12">


                                    {{-- status --}}
                                    <p class="text-center mb-0 fs-13 mt-1">
                                        <span class="fw-bold badge badge--scheme-3 text-dark fs-12 py-1">Active</span>
                                    </p>




                                    {{-- name --}}
                                    <h5 class="text-center fw-bold mt-2 mb-2
                                    truncate-text-1l">{{ $customer->name }}</h5>



                                    {{-- currentPackage --}}
                                    <p class="text-center fs-13 fw-bold text-danger mb-0">
                                        <button
                                            class="btn btn--raw-icon fs-15 text-warning d-flex align-items-center justify-content-center fw-bold"
                                            type="button">{{ $customer->latestSubscription()->plan->name }}</button>
                                    </p>



                                </div>
                                {{-- end midCol --}}










                                {{-- -------------- --}}
                                {{-- -------------- --}}





                                {{-- actionButtons --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">



                                        {{-- 1: manage --}}
                                        <a wire:navigate
                                            class="btn btn--scheme btn--theme fs-12 px-2 mx-2 scale--self-05 h-32"
                                            href="{{ route('dashboard.singleCustomer', [$customer->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil fs-5">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </a>





                                        {{-- 2: information tooltip --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                class="bi bi-info-circle fs-5">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path
                                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                                </path>
                                            </svg>
                                        </button>






                                        {{-- 3: pause / freeze --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            type="button" title="Pause / Freeze"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                class="bi bi-stop-circle fs-5">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path
                                                    d="M5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3z">
                                                </path>
                                            </svg>
                                        </button>






                                        {{-- 4: re-new --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            type="button" title="Re-New"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                class="bi bi-arrow-counterclockwise fs-5">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z">
                                                </path>
                                                <path
                                                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                {{-- end actionButtons --}}



                            </div>
                        </div>
                    </div>
                    {{-- endCard --}}


                    @endforeach
                    {{-- end loop --}}



                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}













    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select, .form--select").on("change", function(event) {



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