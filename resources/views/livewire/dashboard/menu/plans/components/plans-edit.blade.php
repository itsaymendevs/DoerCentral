<div class="modal fade modal--shadow" id="edit-plan" role="dialog" tabindex="-1" wire:ignore>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Edit Plan</h5>
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
                    <div class="row align-items-start justify-content-center pt-2 mb-4">


                        {{-- imageFile --}}
                        <div class="col-4">



                            {{-- 1: imageFile --}}
                            <div class='mb-3'>
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    for="plan--file-4" title="Click To Upload">


                                    {{-- input --}}
                                    <input class="form-control d-none file--input" id="plan--file-4"
                                        data-preview="plan--preview-4" type="file" wire:model='instance.imageFile' />

                                    {{-- preview --}}
                                    <img class="inventory--image-frame" id="plan--preview-4"
                                        src="{{ asset('assets/img/placeholder.png') }}" wire:ignore />

                                    {{-- icon --}}
                                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                        </path>
                                    </svg>
                                </label>
                            </div>







                            {{-- ------------------------------------ --}}
                            {{-- ------------------------------------ --}}







                            {{-- 2: secondImageFile --}}
                            <div>
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    for="plan--file-5" title="Click To Upload">


                                    {{-- input --}}
                                    <input class="form-control d-none file--input" id="plan--file-5"
                                        data-preview="plan--preview-5" type="file"
                                        wire:model='instance.secondImageFile' />



                                    {{-- preview --}}
                                    <img class="inventory--image-frame" id="plan--preview-5"
                                        src="{{ asset('assets/img/placeholder.png') }}" wire:ignore />

                                    {{-- icon --}}
                                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
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











                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}









                        {{-- rightCol --}}
                        <div class="col-8">
                            <div class="row justify-content-center">




                                {{-- themeColor --}}
                                <div class="col-8">

                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <hr style="width: 20%" />
                                        <label
                                            class="form-label form--label px-3 w-50 justify-content-center mb-0">Theme
                                            Color</label>


                                        <hr style="width: 20%" />

                                    </div>


                                    <input type="color" class="form--input mb-5 pointer" required
                                        wire:model.live='instance.themeColor' />
                                </div>




                                {{-- empty --}}
                                <div class="col-12"></div>





                                {{-- ---------------------------- --}}
                                {{-- ---------------------------- --}}







                                {{-- name --}}
                                <div class="col-6">
                                    <label class="form-label form--label">Name</label>
                                    <input class="form-control form--input mb-4" type="text" required
                                        wire:model='instance.name' />
                                </div>






                                {{-- startingPrice --}}
                                <div class="col-6">
                                    <label class="form-label form--label">Starting Price<small
                                            class="ms-1 fw-semibold text-gold fs-9">(AED)</small>
                                    </label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.startingPrice' required />
                                </div>












                                {{-- desc --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Brief</label>
                                    <textarea class="form-control form--input form--textarea mb-4" style="height: 100px"
                                        wire:model='instance.desc' required></textarea>
                                </div>





                                {{-- longDesc --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Description</label>
                                    <textarea class="form-control form--input form--textarea mb-4" style="height: 130px"
                                        wire:model='instance.longDesc' required></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- end rightCol --}}







                        {{-- submit --}}
                        <div class="col-12 text-end mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'
                                wire:target='instance.imageFile, instance.secondImageFile, update'>
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