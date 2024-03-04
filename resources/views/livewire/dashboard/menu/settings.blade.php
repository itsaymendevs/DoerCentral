<section class="content--section" id="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}




        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12">




                {{-- 1: dietsTab --}}
                <div class="tab-pane-like mt-2" style="border: 1px solid var(--color-theme-secondary)">



                    {{-- row --}}
                    <div class="row">
                        <div class="col-12">


                            {{-- collapseButton --}}
                            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-1"
                                role="button" aria-expanded="false" aria-controls="collapse-1">Diets<svg
                                    class="bi bi-chevron-expand" xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                    </path>
                                </svg>
                            </a>




                            {{-- collapseContent --}}
                            <div class="collapse collapse--content" id="collapse-1">


                                <livewire:dashboard.menu.settings.components.settings-manage-diets />


                            </div>
                            {{-- end collapseContent --}}



                        </div>
                    </div>
                </div>
                {{-- end tab --}}








                {{-- ----------------------------------------------------------- --}}
                {{-- ----------------------------------------------------------- --}}







                {{-- 2: sizesTab --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">




                    <div class="row">
                        <div class="col-12">
                            <div>



                                {{-- collapseButton --}}
                                <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    href="#collapse-2" role="button" aria-expanded="false"
                                    aria-controls="collapse-2">Sizes<svg class="bi bi-chevron-expand"
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                        </path>
                                    </svg></a>




                                {{-- collapseContent --}}
                                <div class="collapse collapse--content" id="collapse-2">

                                    <livewire:dashboard.menu.settings.components.settings-manage-sizes />

                                </div>
                                {{-- end collapseContent --}}


                            </div>
                        </div>
                    </div>
                </div>
                {{-- end tab --}}







                {{-- ----------------------------------------------------------- --}}
                {{-- ----------------------------------------------------------- --}}







                {{-- 3: tagsTab --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">

                    <livewire:dashboard.menu.settings.components.settings-manage-tags />

                </div>
                {{-- end tab --}}





                {{-- ----------------------------------------------------------- --}}
                {{-- ----------------------------------------------------------- --}}





                {{-- 4: cuisinesTab --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">


                    <livewire:dashboard.menu.settings.components.settings-manage-cuisines />


                </div>
                {{-- end tab --}}




            </div>
        </div>
    </div>
</section>
{{-- endSection --}}