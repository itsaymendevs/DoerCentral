<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="map-location" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Map Location</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}




                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}





                {{-- wrapper --}}
                <div class="px-4">
                    <div class="row align-items-center row pt-2 mb-4">
                        <div class="col-12 text-center">


                            {{-- subHeader --}}
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr class="w-50" />
                                <label
                                    class="form-label text-center text-sm-start form--label px-3 mb-0 w-50 justify-content-center fs-12 text-uppercase">Delivery
                                    Location</label>
                            </div>





                            {{-- ----------------------------- --}}
                            {{-- ----------------------------- --}}





                            {{-- map --}}
                            <div class="mb-5 position-relative d-inline-block"></div>





                            {{-- ----------------------------- --}}
                            {{-- ----------------------------- --}}





                            {{-- helpers --}}
                            <div class="mt-4 d-flex align-items-center justify-content-center">


                                {{-- phone --}}
                                <a href='tel:+971{{ $delivery?->customer?->phone }}'
                                    class="btn btn--scheme btn--scheme-outline-1 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white mx-2">
                                    Phone Call</a>



                                {{-- whatsapp --}}
                                <a href='https://api.whatsapp.com/send?phone=971{{ $delivery?->customer?->whatsapp }}&text=Hello%2C%20I%20have%20your%20delivery%20ready%20%F0%9F%91%8B'
                                    target="_blank"
                                    class="btn btn--scheme btn--scheme-outline-3 py-1 d-inline-flex align-items-center justify-content-center shrink--self fs-12 text-white mx-2">
                                    Whatsapp
                                </a>
                            </div>
                            {{-- endHelpers --}}


                        </div>
                    </div>
                </div>
                {{-- endWrapper --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}