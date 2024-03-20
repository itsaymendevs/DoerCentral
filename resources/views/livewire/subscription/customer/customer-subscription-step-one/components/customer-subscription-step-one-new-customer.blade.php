<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-customer" wire:ignore>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Subscriber</h5>
                    <button class="btn btn--raw-icon w-auto" data-bs-toggle="modal" data-bss-tooltip=""
                        data-bs-placement="right" type="button" title="Previous" data-bs-target="#determine-customer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-arrow-return-left fs-1 px-1">
                            <path fill-rule="evenodd"
                                d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- end header --}}






                {{-- ---------------------------------- --}}
                {{-- ---------------------------------- --}}







                {{-- form --}}
                <form class="px-4" wire:submit='continue'>
                    <div class="row align-items-center row pt-2 mb-4">




                        {{-- name --}}
                        <div class="col-6">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.name' />
                        </div>




                        {{-- gender --}}
                        <div class="col-6">
                            <div class="mx-auto text-center">


                                {{-- male --}}
                                <div class="form-check itemType--radio d-inline-flex me-4">

                                    <input class="form-check-input" type="radio" id="formCheck-1" name="gender"
                                        style="width: 16px; height: 16px" value='Male' wire:model='instance.gender' />

                                    <label class="form-check-label fs-14 ms-2" for="formCheck-1">Male</label>
                                </div>



                                {{-- female --}}
                                <div class="form-check itemType--radio d-inline-flex">

                                    <input class="form-check-input" type="radio" id="formCheck-2" name="gender"
                                        style="width: 16px; height: 16px" value='Female' wire:model='instance.gender' />

                                    <label class="form-check-label fs-14 ms-2" for="formCheck-2">Female</label>

                                </div>
                            </div>
                        </div>
                        {{-- end gender --}}





                        {{-- email --}}
                        <div class="col-12">
                            <label class="form-label form--label">Email</label>
                            <input class="form-control form--input mb-4" type="email" required
                                wire:model='instance.email' />
                        </div>



                        {{-- phone --}}
                        <div class="col-6">
                            <label class="form-label form--label">Phone</label>
                            <div class="form--phone-input">
                                <input class="form-control form--input mb-4" type="text" required
                                    wire:model='instance.phone' />
                                <span>+971</span>
                            </div>
                        </div>





                        {{-- whatsapp --}}
                        <div class="col-6">
                            <label class="form-label form--label">Whatsapp</label>
                            <div class="form--phone-input">
                                <input class="form-control form--input mb-4" type="text" required
                                    wire:model='instance.whatsapp' />
                                <span>+971</span>
                            </div>
                        </div>






                        {{-- skip - HIDEEN --}}
                        <div class="col-7 col-sm-6 text-center d-none">
                            <button wire:click='skip'
                                class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-0 w-100 fw-semibold justify-content-center"
                                type="button" style="border: 1px dashed var(--color-scheme-3)">
                                Skip &amp; Continue
                            </button>
                        </div>





                        {{-- submit --}}
                        <div class="col-sm-6 offset-3 text-center">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-0 w-100 fw-semibold justify-content-center"
                                type="submit">
                                Continue
                            </button>
                        </div>


                    </div>
                </form>
                {{-- endForm --}}




            </div>
        </div>
    </div>
</div>
{{-- endModal --}}