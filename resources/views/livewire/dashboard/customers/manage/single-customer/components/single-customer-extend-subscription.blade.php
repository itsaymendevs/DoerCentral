{{-- extendModal --}}
<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="extend-subscription" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">




                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Extend Subscription</h5>
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







                {{-- ------------------------------------- --}}
                {{-- ------------------------------------- --}}








                <form wire:submit='store' class="px-4">
                    <div class="row row pt-2 mb-4">



                        {{-- imageFile --}}
                        <div class="col-4">
                            <div>


                                {{-- label --}}
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="extend--file-1">


                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="extend--file-1"
                                        data-preview="extend--preview-1" wire:model='instance.imageFile' />




                                    {{-- image --}}
                                    <img id="extend--preview-1" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" wire:ignore />



                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 16 16" class="bi bi-cloud-upload">
                                        <path fill-rule="evenodd"
                                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                        </div>
                        {{-- endCol --}}









                        {{-- --------------------- --}}
                        {{-- --------------------- --}}







                        {{-- rightCol --}}
                        <div class="col-8">
                            <div class="row row pt-2 mb-4">



                                {{-- extendDate --}}
                                <div class="col-5">
                                    <label class="form-label form--label">Extend Until</label>
                                    <input class="form-control form--input mb-4" type="date" required
                                        wire:model='instance.untilDate' />
                                </div>



                                {{-- remarks --}}
                                <div class="col-7">
                                    <label class="form-label form--label">Remarks</label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.remarks' />
                                </div>






                                {{-- reason --}}
                                <div class="col-12">



                                    {{-- title --}}
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <hr class="w-100" />
                                        <label class="form-label form--label px-3 mb-0">Reason</label>
                                        <hr class="w-100" />
                                    </div>





                                    {{-- radio-options --}}
                                    <div class="w-100 mx-auto d-flex justify-content-around">


                                        {{-- loop - reasons --}}
                                        @foreach ($reasons as $key => $reason)



                                        <div class="form-check itemType--radio d-inline-flex mb-3">


                                            {{-- input --}}
                                            <input class="form-check-input" type="radio" name="extendReason"
                                                id="reason-option-{{ $key }}" value='{{ $reason }}'
                                                wire:model='instance.reason' />


                                            {{-- label --}}
                                            <label class="form-check-label fs-13 ms-2" for="reason-option-{{ $key }}">
                                                {{ $reason }}
                                            </label>

                                        </div>



                                        @endforeach
                                        {{-- end loop --}}



                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endCol --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-3">
                            <button wire:loading.attr='disabled, instance.imageFile' wire:target='store'
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                                Confirm
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