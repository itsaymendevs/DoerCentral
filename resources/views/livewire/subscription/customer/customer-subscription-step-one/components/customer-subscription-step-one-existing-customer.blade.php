<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="existing-customer" wire:ignore>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Existing Subscriber</h5>
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



                        {{-- email --}}
                        <div class="col-12">
                            <label class="form-label form--label">Email</label>
                            <input class="form-control form--input mb-4" type="email" required
                                wire:model='instance.email' />
                        </div>




                        {{-- password --}}
                        <div class="col-12">
                            <label class="form-label form--label">Password</label>
                            <input class="form-control form--input mb-4" type="password" required
                                wire:model='instance.password' />
                        </div>





                        {{-- submit --}}
                        <div class="col-6 offset-3 text-center">
                            <button wire:loading.attr='disabled'
                                class="btn btn--scheme btn--scheme-2 px-2 py-2 d-inline-flex align-items-center fs-14 mb-0 w-100 fw-semibold justify-content-center "
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