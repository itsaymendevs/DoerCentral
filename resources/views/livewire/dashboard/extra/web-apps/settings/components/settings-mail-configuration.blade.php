<div class="row">



    {{-- content --}}
    <div class="col-12">
        <div>

            {{-- togglerButton --}}
            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" aria-expanded="true"
                aria-controls="collapse-2-5" href="#collapse-2-5" role="button">Mail Configuration<svg
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
            <div class="collapse  collapse--content" id="collapse-2-5" wire:ignore.self>
                <form wire:submit='update' class="row align-items-end pt-2 settings--row">






                    {{-- 1: sender --}}
                    <div class="col-5">
                        <label class="form-label form--label">Sender<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="ex. DOer"></i></label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.senderName' />
                    </div>






                    {{-- 2: senderEmail --}}
                    <div class="col-5">
                        <label class="form-label form--label">Email<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                data-bss-tooltip="" title="Sender Email"></i></label>
                        <input class="form-control form--input mb-4" type="email" wire:model='instance.senderEmail' />
                    </div>








                    {{-- ----------------------------------- --}}
                    {{-- ----------------------------------- --}}







                    {{-- 3: Username --}}
                    <div class="col-5">
                        <label class="form-label form--label">Username</label>
                        <input class="form-control form--input mb-4" autocomplete="off" type="text"
                            wire:model='instance.username' />
                    </div>





                    {{-- 4: Password --}}
                    <div class="col-5">
                        <label class="form-label form--label">Password</label>
                        <input class="form-control form--input mb-4" autocomplete="off" type="password"
                            wire:model='instance.password' />
                    </div>





                    {{-- 5: port --}}
                    <div class="col-2">
                        <label class="form-label form--label">Port<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                data-bss-tooltip="" title="ex. 465"></i></label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.port' />
                    </div>








                    {{-- ----------------------------------- --}}
                    {{-- ----------------------------------- --}}






                    {{-- 6: host --}}
                    <div class="col-5">
                        <label class="form-label form--label">Host</label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.host' />
                    </div>






                    {{-- 7: Mailer --}}
                    <div class="col-5">
                        <label class="form-label form--label">Mailer<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="ex. smtp"></i></label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.mailer' />
                    </div>









                    {{-- 8: encryption --}}
                    <div class="col-2">
                        <label class="form-label form--label">Encryption<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="ex. tls"></i></label>
                        <input class="form-control form--input mb-4" type="text" wire:model='instance.encryption' />
                    </div>







                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}








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