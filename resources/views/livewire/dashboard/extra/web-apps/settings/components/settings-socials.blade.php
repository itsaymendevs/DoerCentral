<div class="row">



    {{-- content --}}
    <div class="col-12">
        <div>


            {{-- togglerButton --}}
            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" aria-expanded="true"
                aria-controls="collapse-socials" href="#collapse-socials" role="button">Social Links<svg
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
            <div class="collapse  collapse--content" id="collapse-socials" wire:ignore.self>
                <form wire:submit='update' class="row align-items-end pt-2">








                    {{-- empty --}}
                    <div class="col-12"></div>







                    {{-- 1: instagram --}}
                    <div class="col-4">
                        <label class="form-label form--label with-icon">
                            <i class="bi bi-link-45deg"></i>Instagram</label>
                        <input class="form-control form--input mb-4" type="url" wire:model='instance.instagramURL' />
                    </div>






                    {{-- 2: facebook URL --}}
                    <div class="col-4">
                        <label class="form-label form--label with-icon">
                            <i class="bi bi-link-45deg"></i>Facebook</label>
                        <input class="form-control form--input mb-4" type="url" wire:model='instance.facebookURL' />
                    </div>







                    {{-- 3: twitterURL --}}
                    <div class="col-4">
                        <label class="form-label form--label with-icon">
                            <i class="bi bi-link-45deg"></i>X</label>
                        <input class="form-control form--input mb-4" type="url" wire:model='instance.twitterURL' />
                    </div>







                    {{-- 4: tiktokURL --}}
                    <div class="col-4">
                        <label class="form-label form--label with-icon">
                            <i class="bi bi-link-45deg"></i>TikTok</label>
                        <input class="form-control form--input mb-4" type="url" wire:model='instance.tiktokURL' />
                    </div>





                    {{-- 5: snachchat --}}
                    <div class="col-4">
                        <label class="form-label form--label with-icon">
                            <i class="bi bi-link-45deg"></i>Snapchat</label>
                        <input class="form-control form--input mb-4" type="url" wire:model='instance.snapchatURL' />
                    </div>






                    {{-- 6: linkedIn --}}
                    <div class="col-4">
                        <label class="form-label form--label with-icon">
                            <i class="bi bi-link-45deg"></i>LinkedIn</label>
                        <input class="form-control form--input mb-4" type="url" wire:model='instance.linkedInURL' />
                    </div>








                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}







                    {{-- submitButton --}}
                    <div class="col-12 text-center mt-3">
                        <button wire:loading.attr='disabled'
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