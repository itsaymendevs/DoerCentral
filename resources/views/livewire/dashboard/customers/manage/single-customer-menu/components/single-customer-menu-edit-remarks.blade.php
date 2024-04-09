{{-- mealRemarks --}}
<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="meal-remarks" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Remarks</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>





                {{-- -------------------------------- --}}
                {{-- -------------------------------- --}}





                {{-- form --}}
                <form wire:submit='update' class="px-4">
                    <div class="row align-items-end row pt-2 mb-4">



                        {{-- mealName --}}
                        <div class="col-4">
                            <input class="form-control form--input mb-4 readonly" type="text"
                                value="{{$scheduleMeal?->meal?->name }}" readonly="" />
                        </div>




                        {{-- remarks --}}
                        <div class="col-9">
                            <textarea class="form-control form--input form--textarea" placeholder="Kitchen's Remarks"
                                wire:model='remarks'></textarea>
                        </div>





                        {{-- submitButton --}}
                        <div class="col-3 text-center">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-4 py-1 d-inline-flex align-items-center mx-1 scale--self-05 w-100 justify-content-center"
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