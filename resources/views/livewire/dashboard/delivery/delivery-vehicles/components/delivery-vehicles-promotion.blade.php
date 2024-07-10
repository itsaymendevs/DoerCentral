{{-- editVehicle --}}
<div class="modal fade modal--shadow" id="vehicle-promotion" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Vehicle Promotion</h5>


                    {{-- closeButton --}}
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-dismiss="modal" data-bs-toggle="tooltip"
                        data-bss-tooltip="" data-bs-placement="right" type="button" title="Close Modal">
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
                    <div class="row align-items-center row pt-2 mb-4">




                        {{-- promotionURL --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.promotionURL' placeholder="Promotion URL">
                        </div>





                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}








                        {{-- QR --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <div
                                    class='promotion--wrap mt-2 w-100 d-flex justify-content-center align-items-center'>
                                    {!! QrCode::size(180)
                                    ->backgroundColor(255,255,255, 0)
                                    ->generate($instance->promotionURL ?? 'https://doer.ae') !!}
                                </div>
                            </div>
                        </div>








                        {{-- QR - PrintOnly --}}
                        <div class="col-12 print--only">
                            <div class="mb-4">
                                <div id='promotion--qr'
                                    class='promotion--wrap w-100 d-flex justify-content-center align-items-center'>
                                    {!! QrCode::size($instance?->width ? $instance?->width * 37.8 : 180)
                                    ->backgroundColor(255,255,255, 0)
                                    ->generate($instance->promotionURL ?? 'https://doer.ae') !!}
                                </div>
                            </div>
                        </div>






                        {{-- -------------------------------- --}}
                        {{-- -------------------------------- --}}






                        {{-- dimenstions --}}
                        <div class="col-6">
                            <div class="row">



                                {{-- width --}}
                                <div class="col-12">


                                    {{-- label --}}
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <hr style="width: 45%">
                                        <label
                                            class="form-label form--label px-3 w-50 justify-content-center mb-0">Width
                                            <small class="ms-1 fw-semibold text-gold fs-9">(CM)</small>
                                        </label>
                                    </div>

                                    {{-- input --}}
                                    <input class="form-control text-center form--input mb-4" type="number" step='0.01'
                                        required wire:model='instance.width'>

                                </div>









                                {{-- height --}}
                                <div class="col-12">


                                    {{-- label --}}
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <hr style="width: 45%">
                                        <label
                                            class="form-label form--label px-3 w-50 justify-content-center mb-0">Height
                                            <small class="ms-1 fw-semibold text-gold fs-9">(CM)</small>
                                        </label>
                                    </div>

                                    {{-- input --}}
                                    <input class="form-control  text-center form--input mb-4 readonly" readonly
                                        type="number" step='0.01' required wire:model='instance.width'>

                                </div>





                            </div>
                        </div>
                        {{-- endCol --}}






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- actionButtons --}}
                        <div class="col-12 text-center mt-3">



                            {{-- 1: submit --}}
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-2 scale--self-05">Save</button>





                            {{-- 2: print --}}
                            <button
                                class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold mx-2 print--labels"
                                data-print='promotion--qr' type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                                    class="bi bi-printer fs-6 me-2">
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