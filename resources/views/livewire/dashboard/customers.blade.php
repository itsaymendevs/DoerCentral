{{-- sectionContainer --}}
<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.components.sub-menu key='1' />




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
                <a href="{{ route('subscription.customerStepOne') }}" target="_blank"
                    class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"><svg
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-plus-circle-dotted fs-5 me-2">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Customer
                </a>
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



            {{-- CardView --}}



            {{-- :: hasCardView --}}
            @if ($versionPermission->hasCardView)




            <div class="col-12 mt-zone-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">





                    {{-- loop - customers --}}
                    @foreach ($customers as $customer)




                    <div class="col-4 col-xl-3 col-xxl-3" key='{{ $customer->id }}'>
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


                                        {{-- 1: active --}}
                                        @if ($customer->latestSubscription()->untilDate >= $globalTodayDate)

                                        <span class="fw-bold badge badge--scheme-3 text-dark fs-12 py-1">Active</span>



                                        {{-- 2: expired --}}
                                        @else


                                        <span class="fw-bold badge badge--remove fs-12 py-1">Expired</span>

                                        @endif
                                        {{-- end if --}}

                                    </p>




                                    {{-- name --}}
                                    <h5 class="text-center fw-bold mt-2 mb-2
                                    truncate-text-1l">{{ $customer->fullName() }}</h5>



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
                                            class="btn btn--scheme btn--theme fs-12 px-2 mx-1 scale--self-05 h-32"
                                            href="{{ route('dashboard.singleCustomer', [$customer->id]) }}">
                                            Manage
                                        </a>







                                        {{-- 2: re-new --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32 disabled"
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









                                        {{-- 3: pause --}}
                                        <div data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            title="Pause">


                                            <button
                                                class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32
                                                @if ($customer->latestSubscription()->untilDate < $globalPauseDate) disabled @endif"
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target='#pause-subscription'
                                                wire:click='pause({{ $customer->latestSubscription()->id }})'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" class="bi bi-stopwatch fs-5"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                                                    <path
                                                        d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                                                </svg>
                                            </button>


                                        </div>
                                        {{-- endPause --}}









                                        {{-- 4: remove --}}
                                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32"
                                            type="button" wire:click='remove({{ $customer->id }})'
                                            wire:loading.attr='disabled' wire:target='remove'>
                                            <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
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



            @endif
            {{-- end if - hasCardView --}}









            {{-- --------------------------------------------- --}}
            {{-- --------------------------------------------- --}}

















            {{-- tableView --}}



            {{-- :: hasCardView is False --}}
            @if ($versionPermission->hasCardView == false)



            <div class="col-12 mt-4">
                <div class="table-responsive memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- thead --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--md">Customer</th>
                                <th class="th--md">Plan</th>
                                <th class="th--sm">Status</th>
                                <th class="th--sm"></th>
                            </tr>
                        </thead>




                        {{-- ---------------------------- --}}
                        {{-- ---------------------------- --}}





                        {{-- tbody --}}
                        <tbody>




                            {{-- loop - customers --}}
                            @foreach ($customers as $customer)



                            <tr>


                                {{-- SN - name - plan --}}
                                <td class="fw-bold">{{ $globalSNCounter++ }}</td>
                                <td class="fw-bold fs-14">{{ $customer->fullName() }}</td>
                                <td class="text-gold fs-14">{{ $customer?->latestSubscription()?->plan?->name }}</td>






                                {{-- status --}}
                                <td class="fs-14">


                                    {{-- 1: active --}}
                                    @if ($customer->latestSubscription()->untilDate >= $globalTodayDate)

                                    <span class="badge fs-13 badge--scheme-3 fw-semibold">Active</span>


                                    {{-- 2: expired --}}
                                    @else


                                    <span class="badge fs-13 badge--remove fw-semibold">Expired</span>


                                    @endif
                                    {{-- end if --}}


                                </td>







                                {{-- ------------------------- --}}
                                {{-- ------------------------- --}}





                                {{-- actions --}}
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">



                                        {{-- 1: manage --}}
                                        <a wire:navigate
                                            class="btn btn--scheme btn--theme fs-12 px-2 mx-1 scale--self-05 h-32"
                                            href="{{ route('dashboard.singleCustomer', [$customer->id]) }}">
                                            Manage
                                        </a>







                                        {{-- 2: re-new --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32 disabled"
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









                                        {{-- 3: pause --}}
                                        <div data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            title="Pause">


                                            <button
                                                class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32
                                                @if ($customer->latestSubscription()->untilDate < $globalPauseDate) disabled @endif"
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target='#pause-subscription'
                                                wire:click='pause({{ $customer->latestSubscription()->id }})'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" class="bi bi-stopwatch fs-5"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                                                    <path
                                                        d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                                                </svg>
                                            </button>


                                        </div>
                                        {{-- endPause --}}









                                        {{-- 4: remove --}}
                                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32"
                                            type="button" wire:click='remove({{ $customer->id }})'
                                            wire:loading.attr='disabled' wire:target='remove'>
                                            <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                </path>
                                            </svg>
                                        </button>



                                    </div>
                                </td>
                                {{-- endActions --}}




                            </tr>
                            @endforeach
                            {{-- end loop - customers --}}







                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endTable --}}





            @endif
            {{-- end if - hasCardView False --}}



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




    {{-- 1: pauseSubscription --}}
    <livewire:dashboard.customers.components.customers-pause-subscription />






    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









</section>
{{-- endSection --}}