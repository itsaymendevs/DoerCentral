{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-center">


            {{-- empty --}}
            <div class="col-4"></div>




            {{-- title --}}
            <div class="col-4">
                <h4 class="text-center mb-0 fw-bold">Social Links</h4>
            </div>






            {{-- sub-menu --}}
            <div class="col-4 text-end">


                <livewire:dashboard.extra.web-apps.components.sub-menu key='submenu' />


            </div>
        </div>
        {{-- end topRow --}}










        {{-- ---------------------------------------------- --}}
        {{-- ---------------------------------------------- --}}






        {{-- mainRow --}}
        <div class="row pt-2 align-items-center my-5">
            <div class="col-12">



                {{-- 1: social Media --}}
                <div class="tab-pane-like mt-2" style="border: 1px solid var(--color-theme-secondary)">
                    <div class="row">
                        <div class="col-12">
                            <div>


                                {{-- togglerButton --}}
                                <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"
                                    role="button">Social Media<svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16"
                                        class="bi bi-chevron-expand">
                                        <path fill-rule="evenodd"
                                            d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                        </path>
                                    </svg>
                                </a>





                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}




                                {{-- collapse --}}
                                <div class="collapse show collapse--content" id="collapse-1">
                                    <form wire:submit='update' class="row align-items-end pt-2">




                                        {{-- 1: instagram --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Instagram URL</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.instagramURL' />
                                        </div>






                                        {{-- 2: facebook URL --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Facebook URL</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.facebookURL' />
                                        </div>







                                        {{-- 3: twitterURL --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Twitter URL</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.twitterURL' />
                                        </div>







                                        {{-- :: submitButton --}}
                                        <div class="col-12 text-end">
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
                </div>
                {{-- endTab --}}








                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}




            </div>
        </div>
    </div>
</section>
{{-- endSection --}}