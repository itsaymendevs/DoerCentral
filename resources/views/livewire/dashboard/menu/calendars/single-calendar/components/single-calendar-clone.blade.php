<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="clone-calendar" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Duplicate</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ----------------------------------------------- --}}





                {{-- form --}}
                <form wire:submit='clone' class="px-4">
                    <div class="row pt-2 mb-4 align-items-end">




                        {{-- fromPeriod --}}
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 50%" />
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">
                                    Source Period</label>
                            </div>


                            {{-- from --}}
                            <div class="d-flex">
                                <input class="form-control form--input mb-4" type="date"
                                    wire:model='instance.cloneFromDate' required />
                            </div>



                            {{-- until --}}
                            <div class="d-flex">
                                <input class="form-control form--input mb-4" type="date"
                                    wire:model='instance.cloneUntilDate' required />
                            </div>

                        </div>









                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}






                        {{-- toPeriod --}}
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 50%" />
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">
                                    Target Period</label>
                            </div>

                            <div class="d-flex">
                                <input class="form-control form--input mb-4" min="{{ $globalCurrentDate }}" type="date"
                                    wire:model='instance.fromDate' required />
                            </div>
                        </div>






                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button wire:loading.attr='disabled' wire:target='clone'
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 ">Confirm</button>
                        </div>




                    </div>
                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
    {{-- endBody --}}





















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- runQueue --}}
    <script>
        window.addEventListener("runQueue", (event) => {

            @this.runQueue();

        });
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</div>
{{-- endModal --}}