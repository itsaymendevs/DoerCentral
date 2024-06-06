{{-- editVehicle --}}
<div class="modal fade modal--shadow" id="vehicle-promotion" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Vehicle Promotion</h5>


                    {{-- closeButton --}}
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                        <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}






                {{-- ------------------------------------------------------ --}}
                {{-- ------------------------------------------------------ --}}







                {{-- form --}}
                <form class="px-4" wire:submit='update'>
                    <div class="row align-items-start row pt-2 mb-4">




                        {{-- promotionURL --}}
                        <div class="col-12">
                            <label class="form-label form--label">Promotion Link</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.promotionURL'>
                        </div>





                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}





                        {{-- QR --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip="">
                                    <img class="inventory--image-frame" src="../assets/img/Untitled.png"
                                        style="height: 180px;">
                                </label>
                            </div>
                        </div>








                        {{-- dimenstions --}}
                        <div class="col-6">
                            <div class="row">



                                {{-- width --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Width<small
                                            class="ms-1 fw-semibold text-gold fs-10">(CM)</small>
                                    </label>

                                    <input class="form-control form--input mb-4" type="number" step='0.01' required
                                        wire:model='instance.width'>
                                </div>




                                {{-- height --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Height<small
                                            class="ms-1 fw-semibold text-gold fs-10">(CM)</small>
                                    </label>
                                    <input class="form-control form--input mb-4" type="number" step='0.01' required
                                        wire:model='instance.height'>
                                </div>

                            </div>
                        </div>





                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}





                        {{-- actionButtons --}}
                        <div class="col-12 text-center mt-3">



                            {{-- 1: submit --}}
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-2 scale--self-05">Save</button>



                            {{-- 2: print --}}
                            <button
                                class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold mx-2"
                                type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                    </path>
                                </svg>Print
                            </button>
                        </div>
                        {{-- endActions --}}


                    </div>
                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}