<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-section" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Section</h5>
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






                {{-- form --}}
                <form wire:submit='store' class="px-4">
                    <div class="row align-items-start row pt-2 mb-4">


                        {{-- leftSection --}}
                        <div class="col-8">
                            <div class="row align-items-center">



                                {{-- title --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Section Title</label>
                                    <textarea class="form-control form--input form--textarea mb-4" style="height: 80px"
                                        wire:model='instance.title'></textarea>
                                </div>






                                {{-- content --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Content</label>
                                    <textarea class="form-control form--input form--textarea mb-4" style="height: 350px"
                                        required wire:model='instance.content'></textarea>
                                </div>



                                {{-- append --}}
                                <div class="col-12 text-center">
                                    <button wire:loading.attr='disabled'
                                        wire:target='store, instance.sideImageFile, instance.bottomImageFile'
                                        class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                                        Append Section
                                    </button>
                                </div>
                                {{-- endButton --}}



                            </div>
                        </div>
                        {{-- endCol --}}





                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}







                        {{-- rightSection --}}
                        <div class="col-4">






                            {{-- centerSection --}}
                            <div class="form-check form-switch mb-4 mealType--checkbox justify-content-center">
                                <input class="form-check-input pointer" id="centerize-section-checkbox" type="checkbox"
                                    wire:model="instance.isCenter" wire:loading.attr="disabled">

                                <label class="form-check-label d-flex justify-content-center"
                                    wire:loading.attr="disabled" for="centerize-section-checkbox">Center
                                    Section</label>
                            </div>







                            {{-- A: sideImageFile --}}
                            <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Click To Upload" for="blog--file-3">


                                {{-- size --}}
                                <span class="upload--caption badge">Picture</span>



                                {{-- input --}}
                                <input class="form-control d-none file--input" type="file" id="blog--file-3"
                                    data-preview="blog--preview-3" wire:model='instance.sideImageFile' />



                                {{-- image --}}
                                <img id="blog--preview-3" class="inventory--image-frame"
                                    src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                    width="512" height="250" wire:ignore />

                            </label>







                            {{-- B: bottomImageFile --}}
                            <label class="form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Click To Upload" for="blog--file-4">

                                {{-- size --}}
                                <span class="upload--caption badge">Picture</span>



                                {{-- input --}}
                                <input class="form-control d-none file--input" type="file" id="blog--file-4"
                                    data-preview="blog--preview-4" wire:model='instance.bottomImageFile' />


                                <img id="blog--preview-4" class="inventory--image-frame"
                                    src="{{ asset('assets/img/placeholder.png') }}" width="512" height="250"
                                    style="aspect-ratio: 1/2;" wire:ignore />

                            </label>
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- endBody --}}




</div>
{{-- endModal --}}