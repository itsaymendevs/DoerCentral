{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:central.dashboard.inventory.components.sub-menu title='Manage Settings' key='sub-menu' />









        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}











        {{-- contentRow --}}
        <div class="row align-items-center mb-4">
            <div class="col-12">



                {{-- wrapper --}}
                <div class="d-block">




                    {{-- 1: conversions --}}
                    <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">


                        <div class="row">
                            <div class="col-12">
                                <div>


                                    {{-- collapseButton --}}
                                    <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                        href="#collapse-5" role="button" aria-expanded="false"
                                        aria-controls="collapse-5">Conversions<svg class="bi bi-chevron-expand"
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                            </path>
                                        </svg>
                                    </a>









                                    {{-- collapseContent --}}
                                    <div class="collapse show collapse--content" id="collapse-5">




                                        {{-- :: conversions - manage --}}
                                        <livewire:central.dashboard.inventory.settings.components.settings-conversions />



                                    </div>
                                    {{-- end collapseContent --}}



                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- endTabLike --}}


                </div>
                {{-- endWrap --}}


            </div>
        </div>
        {{-- endRow --}}



    </div>
    {{-- endContainer --}}






</section>
{{-- endContent --}}