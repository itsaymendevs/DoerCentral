{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.delivery.components.sub-menu title="Manage Vehicles" />







        {{-- --------------------------------------- --}}
        {{-- --------------------------------------- --}}








        {{-- filtersRow --}}
        <div class="row align-items-end">








            {{-- newButton --}}
            <div class="col-3">
                <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    data-bs-target="#new-vehicle" data-bs-toggle="modal" type="button"><svg
                        class="bi bi-plus-circle-dotted fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Vehicle</button>
            </div>




            {{-- searchBox --}}
            <div class="col-6 text-center">
                <input class="form-control form--input main-version mx-auto" type="search"
                    wire:model.live.debounce.50ms='searchVehicle' placeholder="Search by Vehicle">
            </div>



            {{-- counter --}}
            <div class="col-3 text-end">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Vehicles">{{ $vehicles->total() }}
                </h3>
            </div>






        </div>
        {{-- endRow --}}







        {{-- ---------------------------------- --}}
        {{-- ---------------------------------- --}}












        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-4">







            {{-- vehiclesCol --}}
            <div class="col-12 mt-zone-cards">
                <div class="row pt-4 row align-items-center mb-3">





                    {{-- loop - vehicles --}}
                    @foreach ($vehicles as $vehicle)


                    <div class="col-4 col-xl-3 col-xxl-3">
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- profileImage --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo smaller of-cover"
                                        src="{{ asset('storage/delivery/vehicles/profiles/' . $vehicle->imageFile) }}">
                                </div>





                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}






                                {{-- information --}}
                                <div class="col-12">




                                    {{-- name --}}
                                    <h6 class="text-center fw-bold mt-3 mb-1
                                    truncate-text-1l fs-15">{{ $vehicle->name }}</h6>



                                    {{-- $vehicle->driversForTooltips() --}}

                                    {{-- drivers --}}
                                    <p class="text-center fs-13 fw-bold text-danger">
                                        <span class="fs-12 fw-semibold text-warning pointer" data-bs-toggle="tooltip"
                                            data-bss-tooltip="" data-bs-html='true' data-bs-placement="right"
                                            title="{{ '-' }}">Drivers<svg class="bi bi-eye-fill fs-6 ms-1"
                                                style="fill: var(--bs-warning);" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                                                </path>
                                            </svg>
                                        </span>
                                    </p>

                                </div>
                                {{-- endCol --}}









                                {{-- plate --}}
                                <div class="col-6">
                                    <p class="d-flex align-items-center fs-12 text-scheme-dark-1 mb-1 justify-content-center pointer"
                                        data-bs-toggle="tooltip" data-bss-tooltip="" title="P-018688"><span
                                            class="icon--circle me-2"><svg class="bi bi-credit-card-2-front-fill"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                                                </path>
                                            </svg>
                                        </span>Plate Number
                                    </p>
                                </div>






                                {{-- reference --}}
                                <div class="col-6">
                                    <p class="d-flex align-items-center fs-12 text-scheme-dark-1 mb-1 justify-content-center pointer"
                                        data-bs-toggle="tooltip" data-bss-tooltip="" title="001-208-478"><span
                                            class="icon--circle me-2"><svg class="bi bi-qr-code"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M5 1H1v4h4V1ZM1 11v4h4v-4H1ZM15 1h-4v4h4V1ZM5 0h1v6H0V0h5Zm0 10h1v6H0v-6h5Zm6-10h-1v6h6V0h-5ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Zm-2 4.5V12h1v3h4v1H7v-.5Zm9-1.5v2h-3v-1h2v-1h1ZM2 2h2v2H2V2Zm10 0h2v2h-2V2ZM4 12H2v2h2v-2Z">
                                                </path>
                                            </svg>
                                        </span>Reference ID
                                    </p>
                                </div>








                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}






                                {{-- actions --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">


                                        {{-- 1: edit --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05 h-32 mb-0 "
                                            data-bs-toggle="modal" data-bs-target='#edit-driver' type="button"
                                            wire:click='edit({{ $driver->id }})'>Edit</button>






                                        {{-- 2: remove --}}
                                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32"
                                            type="button" wire:click='remove({{ $driver->id }})'
                                            wire:loading.attr='disabled'>Remove</button>



                                    </div>
                                </div>
                                {{-- endCol --}}



                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}








                    {{-- ----------------------------- --}}
                    {{-- ----------------------------- --}}







                    {{-- paginateLinks --}}
                    <div class="col-12">{{ $vehicles->links() }}</div>



                </div>
            </div>
        </div>
        {{-- endRow --}}





    </div>
    {{-- endContainer --}}


















    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




    @section('modals')


    {{-- 1: createVehicle --}}
    <livewire:dashboard.delivery.delivery-vehicles.components.delivery-vehicles-create />

    {{-- 1.2: editVehicle --}}
    <livewire:dashboard.delivery.delivery-vehicles.components.delivery-vehicles-edit />



    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}















</section>
{{-- endContent --}}