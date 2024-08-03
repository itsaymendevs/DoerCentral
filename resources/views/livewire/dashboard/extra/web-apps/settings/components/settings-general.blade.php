<div class="row">



    {{-- content --}}
    <div class="col-12">
        <div>


            {{-- togglerButton --}}
            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" aria-expanded="true"
                aria-controls="collapse-general" href="#collapse-general" role="button">Fonts & Logo<svg
                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-chevron-expand">
                    <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                    </path>
                </svg>
            </a>





            {{-- ------------------------ --}}
            {{-- ------------------------ --}}





            {{-- collapse --}}
            <div class="collapse  collapse--content" id="collapse-general" wire:ignore.self>
                <form wire:submit='update' class="row align-items-end pt-2">







                    {{-- textFont --}}
                    <div class="col-6">

                        <label class="form-label form--label">Body</label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.textFont'
                            placeholder='"Poppins"' />

                    </div>








                    {{-- headingFont --}}
                    <div class="col-6">

                        <label class="form-label form--label">Headers</label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.headingFont'
                            placeholder='"Courgette"' />

                    </div>







                    {{-- fontLinks --}}
                    <div class="col-12">
                        <label class="form-label form--label">Embed Links<small
                                class="ms-1 fw-semibold text-gold fs-9">(Google
                                Fonts)</small></label>
                        <textarea class="form-control form--input form--textarea mb-4" wire:model='instance.fontLinks'
                            style="height: 190px"></textarea>
                    </div>







                    {{-- ------------------------------------ --}}
                    {{-- ------------------------------------ --}}







                    {{-- 2.1: logo --}}
                    <div class="col-6">



                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Light
                                Logo
                            </label>
                        </div>





                        {{-- imageFile --}}
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="profile--file-1">


                                    {{-- size --}}
                                    <span class="upload--caption badge">250 x 150</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="profile--file-1"
                                        data-preview="profile--preview-1" wire:model='instance.imageFile' readonly
                                        required />



                                    {{-- image --}}
                                    <img id="profile--preview-1" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- endCol --}}






                    {{-- ---------------------------- --}}
                    {{-- ---------------------------- --}}







                    {{-- 2.1: logoDark --}}
                    <div class="col-6">



                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Dark
                                Logo
                            </label>
                        </div>





                        {{-- imageFile --}}
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="profile--file-2">


                                    {{-- size --}}
                                    <span class="upload--caption badge">250 x 150</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="profile--file-2"
                                        data-preview="profile--preview-2" wire:model='instance.imageFileDark' readonly
                                        required />



                                    {{-- image --}}
                                    <img id="profile--preview-2" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- endCol --}}






                    {{-- ---------------------------- --}}
                    {{-- ---------------------------- --}}








                    {{-- submitButton --}}
                    <div class="col-12 text-center mt-3">
                        <button wire:loading.attr='disabled'
                            wire:target='instance.imageFile, instance.imageFileDark, update'
                            class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center">
                            Save
                        </button>
                    </div>



                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
</div>
{{-- endRow --}}