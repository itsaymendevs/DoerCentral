<div class="modal fade modal--shadow" id="edit-payment" role="dialog" tabindex="-1" wire:ignore>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white"></h5>
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







                {{-- ---------------------------------------------------- --}}
                {{-- ---------------------------------------------------- --}}







                {{-- form --}}
                <form class="px-4" wire:submit='update'>



                    {{-- name --}}
                    <div class="row mx-0 justify-content-center">
                        <div class="col-6 text-center">
                            <input class="form-control form--input mb-4 readonly" type="text" wire:model='instance.name'
                                required readonly />
                        </div>
                    </div>





                    {{-- --------------------------------- --}}
                    {{-- --------------------------------- --}}




                    {{-- content --}}
                    <div class="row mx-0 align-items-center row pt-2 mb-4">



                        {{-- 1: liveKeys --}}
                        <div class="col-6">
                            <div class="row">




                                {{-- subtitle --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                                        <hr style="width: 65%" />
                                        <label class="form-label form--label px-3 w-50
                                        justify-content-center mb-0">Live Keys</label>
                                    </div>
                                </div>






                                {{-- public Key --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Public Key</label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.envKey' />
                                </div>





                                {{-- SecretKey --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Secret Key</label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.envSecondKey' />
                                </div>







                                {{-- thirdKey --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Third Key<small
                                            class="ms-1 fw-semibold text-gold fs-10">(Paymennt Key)</small></label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.envThirdKey' />
                                </div>



                            </div>
                        </div>
                        {{-- end LiveKeys --}}







                        {{-- ---------------------------------------- --}}
                        {{-- ---------------------------------------- --}}











                        {{-- 1: testKeys --}}
                        <div class="col-6">
                            <div class="row">




                                {{-- subtitle --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                                        <hr style="width: 65%" />
                                        <label class="form-label form--label px-3 w-50
                                        justify-content-center mb-0">Test Keys</label>
                                    </div>
                                </div>






                                {{-- public Key --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Public Key</label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.envTestKey' />
                                </div>





                                {{-- SecretKey --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Secret Key</label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.envTestSecondKey' />
                                </div>







                                {{-- thirdKey --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Third Key<small
                                            class="ms-1 fw-semibold text-gold fs-10">(Paymennt Key)</small></label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.envTestThirdKey' />
                                </div>



                            </div>
                        </div>
                        {{-- end LiveKeys --}}





                    </div>
                    {{-- endRow --}}










                    {{-- --------------------------------- --}}
                    {{-- --------------------------------- --}}







                    {{-- submit --}}
                    <div class="row  mx-0 mb-4">
                        <div class="col-12 text-center ">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled' wire:target='instance.imageFile, store'>
                                Update
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