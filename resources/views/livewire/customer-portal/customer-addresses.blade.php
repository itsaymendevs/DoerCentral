<section id="content--section" class="content--section">
    <div class="container">
        <div class="row align-items-end mb-submenu">
            <div class="col-12 text-center">
                <div class="btn-group submenu--group mobile" role="group" data-aos="fade-down" data-aos-duration="600"
                    data-aos-delay="800" data-aos-once="true">
                    <a class="btn fs-13 px-3" role="button" href="javascript:void(0);">Overview</a><a wire:navigate
                        class="btn fs-13 px-3" role="button"
                        href="{{ route('portals.customer.general') }}">General</a><a class="btn fs-13 px-3"
                        role="button" href="javascript:void(0);">Plans</a><a class="btn fs-13 px-3" role="button"
                        href="javascript:void(0);">Delivery</a><a class="btn fs-13 px-3" role="button"
                        href="javascript:void(0);">History</a><a class="btn fs-13 px-3 active" role="button"
                        href="javascript:void(0);">Address</a>
                </div>
            </div>
        </div>
        <div class="row align-items-center pt-3 mb-3">
            <div class="col-8">
                <button
                    class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center fs-xs-13"
                    type="button" data-bs-target="#new-address" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-plus-circle-dotted fs-5 me-2">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Address
                </button>
            </div>
            <div class="col-4 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Addresses">
                    2
                </h3>
            </div>
        </div>
        <div class="row align-items-start mb-4">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="tabs--wrap">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Home</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active no--card px-1" role="tabpanel" id="tab-1">
                                    <form>
                                        <div class="row align-items-center">
                                            <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <hr style="width: 65%" />
                                                    <label
                                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">City</label>
                                                </div>
                                                <div class="select--single-wrapper mb-4">
                                                    <select class="form-select form--select2">
                                                        <option value=""></option>
                                                        <option value="1">FIrst Option</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-xl-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <hr style="width: 65%" />
                                                    <label
                                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">District</label>
                                                </div>
                                                <div class="select--single-wrapper mb-4">
                                                    <select class="form-select form--select2">
                                                        <option value=""></option>
                                                        <option value="1">FIrst Option</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <hr style="width: 65%" />
                                                    <label
                                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Timing</label>
                                                </div>
                                                <div class="select--single-wrapper mb-4">
                                                    <select class="form-select form--select2">
                                                        <option value=""></option>
                                                        <option value="1">FIrst Option</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input--with-label mb-4">
                                                    <label class="form-label form--label mb-0"
                                                        style="/*width: 20%;*/">Address</label><input
                                                        class="form-control form--input" type="text" step="1"
                                                        value="Churchill Tower" style="/*width: 80%;*/" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="input--with-label mb-4">
                                                    <label class="form-label form--label mb-0">Title</label><input
                                                        class="form-control form--input" type="text" step="1"
                                                        value="Home" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="input--with-label mb-4">
                                                    <label class="form-label form--label mb-0">Apartment</label><input
                                                        class="form-control form--input" type="text" step="1"
                                                        value="4" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="input--with-label mb-4">
                                                    <label class="form-label form--label mb-0">Villa</label><input
                                                        class="form-control form--input" type="text" step="1"
                                                        value="4" />
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 mt-lg-0">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <hr class="w-100" />
                                                    <label
                                                        class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-14">Delivery
                                                        Days</label>
                                                </div>
                                                <div
                                                    class="mb-4 flex submenu--group text-center text-sm-start d-lg-flex align-items-center justify-content-between">
                                                    <div class="form-check button--checkbox btn fs-14 darker">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-1" /><label class="form-check-label"
                                                            for="formCheck-1">Sunday</label>
                                                    </div>
                                                    <div class="form-check button--checkbox btn fs-14">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-8" /><label class="form-check-label"
                                                            for="formCheck-8">Monday</label>
                                                    </div>
                                                    <div class="form-check button--checkbox btn fs-14">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-3" /><label class="form-check-label"
                                                            for="formCheck-3">Tuesday</label>
                                                    </div>
                                                    <div class="form-check button--checkbox btn fs-14">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-4" /><label class="form-check-label"
                                                            for="formCheck-4">Wednesday</label>
                                                    </div>
                                                    <div class="form-check button--checkbox btn fs-14">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-5" /><label class="form-check-label"
                                                            for="formCheck-5">Thursday</label>
                                                    </div>
                                                    <div class="form-check button--checkbox btn fs-14">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-6" /><label class="form-check-label"
                                                            for="formCheck-6">Friday</label>
                                                    </div>
                                                    <div class="form-check button--checkbox btn fs-14">
                                                        <input class="form-check-input d-none" type="checkbox"
                                                            id="formCheck-7" /><label class="form-check-label"
                                                            for="formCheck-7">Saturday</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button
                                                    class="btn btn--scheme btn--scheme-2 px-5 mx-1 py-2 d-inline-flex align-items-center fs-14 fw-semibold justify-content-center"
                                                    type="button" style="border: 1px dashed var(--color-scheme-3)">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>