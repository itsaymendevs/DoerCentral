<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="edit-feature" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Edit Feature</h5>
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







                {{-- ----------------------------------------- --}}
                {{-- ----------------------------------------- --}}







                {{-- form --}}
                <form wire:submit='update' class="px-4">
                    <div class="row align-items-center row pt-2 mb-4">



                        {{-- name --}}
                        <div class="col-12">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.name' />
                        </div>





                        {{-- price --}}
                        <div class="col-6">
                            <label class="form-label form--label">Price<small
                                    class="ms-1 fw-semibold text-gold fs-9">($)</small></label>
                            <input class="form-control form--input mb-4" type="number" step='0.01' min='0' required
                                wire:model='instance.price' />
                        </div>




                        {{-- nameURL --}}
                        <div class="col-6">
                            <label class="form-label form--label">Module</label>

                            <input class="form-control form--input mb-4" type="text"
                                wire:model='instance.featureModuleName' readonly />
                        </div>








                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>
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