<section id="content--section" class="content--section">
    <div class="container">
        <div class="row align-items-end mb-submenu">




            {{-- topCol --}}
            <div class="col-12 mb-4 pb-3">
                <div class="d-flex justify-content-start align-items-center">


                    {{-- imageFile --}}
                    <div data-aos="zoom-out" data-aos-duration="800" data-aos-once="true"
                        class="position-relative driver--profile-cover d-inline-flex" wire:ignore.self>


                        {{-- image --}}
                        <img class="of-cover rounded-circle"
                            src="{{ asset('storage/delivery/drivers/profiles/'. $driver->imageFile) }}"
                            style="width: 110px; aspect-ratio: 1/1" />





                        {{-- editButton --}}
                        <a wire:navigate class="btn btn--raw-icon" role="button"
                            href="{{ route('portals.driver.editProfile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-gear rotateInfinite">
                                <path
                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z">
                                </path>
                                <path
                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    {{-- endLeftWrap --}}




                    {{-- rightWrap --}}
                    <div class="text-center ms-3 w-100" data-aos="fade" data-aos-duration="800" data-aos-once="true"
                        wire:ignore.self>




                        {{-- 1: morningShift --}}
                        @if ($driver->shift->name == 'Morning Shift')



                        <h6 class="fw-semibold mb-3 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-sun-fill fs-3 me-2 rotateInfinite"
                                style="fill: #dba400">
                                <path
                                    d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                            </svg>{{ $driver->shift->name }}
                        </h6>




                        {{-- 2: eveningShift --}}
                        @else



                        <h6 class="fw-semibold mb-3 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-moon-fill fs-3 me-2 scaleInfinite"
                                style="fill: #dba400">
                                <path
                                    d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
                                </path>
                            </svg>{{ $driver->shift->name }}
                        </h6>




                        @endif
                        {{-- end if --}}





                        {{-- name --}}
                        <h3 class="fw-semibold mb-0 px-2">{{ $driver->name }}</h3>
                    </div>
                </div>
            </div>
            {{-- end topCol --}}










            {{-- ------------------------------------------- --}}
            {{-- ------------------------------------------- --}}






            {{-- information --}}


            {{-- subheading --}}
            <div class="col-12" data-aos="fade-up" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label
                        class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">Information</label>
                </div>
            </div>




            {{-- content --}}
            <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <div class="profile--wrap">



                    {{-- phone --}}
                    <div class="d-flex align-items-center justify-content-start mb-3 profile--wrap-section">


                        {{-- icon --}}
                        <a class="btn" href="tel:+971{{ $driver->phone }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-telephone fs-5">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                </path>
                            </svg>
                        </a>

                        {{-- text --}}
                        <p class="mb-0 ms-3 fw-normal fs-14 w-100">+971 <span class='init--link'>{{ $driver->phone
                                }}</span>
                        </p>
                    </div>








                    {{-- license --}}
                    <div class="d-flex align-items-center justify-content-start mb-3 profile--wrap-section">

                        {{-- icon --}}
                        <button type='button' class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-credit-card-2-front fs-5">
                                <path
                                    d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z">
                                </path>
                                <path
                                    d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z">
                                </path>
                            </svg>
                        </button>


                        {{-- text --}}
                        <p class="mb-0 ms-3 fw-normal fs-14 w-100">License - <span class='init--link'>{{
                                $driver->license }}</span></p>
                    </div>













                    {{-- plate --}}
                    <div class="d-flex align-items-center justify-content-start mb-3 profile--wrap-section d-none">

                        {{-- icon --}}
                        <button class="btn" type='button'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-car-front fs-5" viewBox="0 0 16 16">
                                <path
                                    d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276" />
                                <path
                                    d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z" />
                            </svg>
                        </button>


                        {{-- text --}}
                        <p class="mb-0 ms-3 fw-normal fs-14">Plate - {{ $driver?->plate ?? 'Empty' }}</p>
                    </div>








                    {{-- Zones --}}
                    <div class="d-flex align-items-center justify-content-start mb-0 profile--wrap-section">

                        {{-- icon --}}
                        <button type='button' class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-pin-map-fill fs-5">
                                <path fill-rule="evenodd"
                                    d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"></path>
                            </svg>
                        </button>


                        {{-- text --}}
                        <p class="mb-0 ms-3 fw-normal fs-14">{{ implode(' - ', $driver?->zonesInArray()) }}</p>
                    </div>




                </div>
            </div>
            {{-- end midCol --}}







            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}





            {{-- license picture --}}
            <div class="col-12 mb-4">

                <form wire:submit='updateLicense'>


                    {{-- subheading --}}
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <hr style="width: 65%" />
                        <label
                            class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">License</label>
                    </div>




                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}







                    {{-- imageFile --}}
                    <div class='flip--front' style="transition: unset" wire:ignore.self>
                        <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                            for="license--file-1" title="Click To Upload">





                            {{-- caption --}}
                            <span class="upload--caption badge" style="width: 80px;">Front</span>





                            {{-- input --}}
                            <input class="form-control d-none file--input" id="license--file-1"
                                data-preview="license--preview-1" type="file" wire:model='licenseFile' />



                            {{-- preview --}}
                            <img class="inventory--image-frame" id="license--preview-1" wire:ignore
                                src="{{ asset('storage/delivery/drivers/licenses/' . $driver->licenseFile) }}" />



                            {{-- icon --}}
                            <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                </path>
                            </svg>
                        </label>
                    </div>






                    {{-- ------------------------------ --}}







                    {{-- imageFile --}}
                    <div class='flip--rear' style="display:none; transition: unset" wire:ignore.self>
                        <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                            for="license--file-2" title="Click To Upload">




                            {{-- caption --}}
                            <span class="upload--caption badge" style="width: 80px;">Rear</span>




                            {{-- input --}}
                            <input class="form-control d-none file--input" id="license--file-2"
                                data-preview="license--preview-2" type="file" wire:model='licenseRearFile' />



                            {{-- preview --}}
                            <img class="inventory--image-frame" id="license--preview-2" wire:ignore
                                src="{{ asset('storage/delivery/drivers/licenses/' . $driver->licenseRearFile) }}" />



                            {{-- icon --}}
                            <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                </path>
                            </svg>
                        </label>
                    </div>






                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}






                    {{-- submitButton --}}
                    <div class="text-center mb-5 mt-4 d-flex align-items-center justify-content-center">



                        {{-- flipButton --}}
                        <button
                            class="btn btn--scheme btn-outline-warning px-3 py-1 d-inline-flex align-items-center scale--self-05 mx-2 flip--button"
                            type='button'>
                            <svg class="bi bi-arrow-repeat fs-4" xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                </path>
                            </svg>
                        </button>





                        {{-- :: update --}}
                        <button
                            class="btn btn--scheme btn--scheme-2 px-4 py-1 d-inline-flex align-items-center mx-2 scale--self-05"
                            wire:loading.attr='disabled' wire:target='licenseFile, licenseRearFile, updateLicense'
                            style="border: 1px dashed var(--color-scheme-3)">
                            Update
                        </button>
                    </div>




                </form>
            </div>
            {{-- endCol --}}



        </div>
    </div>
</section>
{{-- endSection --}}