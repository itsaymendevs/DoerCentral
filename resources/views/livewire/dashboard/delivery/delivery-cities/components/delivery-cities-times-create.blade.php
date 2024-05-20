<div class="modal fade modal--shadow" id="new-timing" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Timing</h5>

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




                {{-- -------------------------------- --}}





                <form class="px-4" wire:submit='store'>
                    <div class="row row pt-2 mb-4">


                        {{-- city --}}
                        <div class="col-4">
                            <label class="form-label form--label">City</label>
                            <input class="form-control form--input mb-4 readonly" type="text" value='{{ $city?->name }}'
                                readonly="" />
                        </div>


                        {{-- empty --}}
                        <div class="col-8"></div>


                        {{-- title --}}
                        <div class="col-4">
                            <label class="form-label form--label">Title</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.title' />
                        </div>


                        {{-- deliveryFrom --}}
                        <div class="col-4">
                            <label class="form-label form--label">From</label>
                            <input class="form-control form--input mb-4" type="time" required
                                wire:model='instance.deliveryFrom' />
                        </div>


                        {{-- deliveryUntil --}}
                        <div class="col-4">
                            <label class="form-label form--label">Until</label>
                            <input class="form-control form--input mb-4" type="time" required
                                wire:model='instance.deliveryUntil' />
                        </div>





                        {{-- errorMessage --}}
                        <div class="col-6 mt-3">
                            @error('instanceError')
                            {{ $message }}
                            @enderror
                        </div>



                        {{-- submitButton --}}
                        <div class="col-6 text-end mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>
                                Save
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