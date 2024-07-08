{{-- mainSection --}}
<section id="content--section" class="content--section">




    {{-- --------------------------------------- --}}
    {{-- --------------------------------------- --}}





    {{-- Head --}}
    @section('head')



    {{-- quill --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />


    @endsection
    {{-- endSection --}}






    {{-- --------------------------------------- --}}
    {{-- --------------------------------------- --}}











    {{-- container --}}
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-center">


            {{-- empty --}}
            <div class="col-4"></div>




            {{-- title --}}
            <div class="col-4">
                <h4 class="text-center mb-0 fw-bold">General Settings</h4>
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



                        {{-- content --}}
                        <div class="col-12">
                            <div>


                                {{-- togglerButton --}}
                                <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"
                                    role="button">Social Links<svg xmlns="http://www.w3.org/2000/svg" width="1em"
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
                                <div class="collapse  collapse--content" id="collapse-1" wire:ignore.self>
                                    <form wire:submit='updateSocials' class="row align-items-end pt-2">








                                        {{-- empty --}}
                                        <div class="col-12"></div>







                                        {{-- 1: instagram --}}
                                        <div class="col-4">
                                            <label class="form-label form--label with-icon">
                                                <i class="bi bi-link-45deg"></i>Instagram</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.instagramURL' />
                                        </div>






                                        {{-- 2: facebook URL --}}
                                        <div class="col-4">
                                            <label class="form-label form--label with-icon">
                                                <i class="bi bi-link-45deg"></i>Facebook</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.facebookURL' />
                                        </div>







                                        {{-- 3: twitterURL --}}
                                        <div class="col-4">
                                            <label class="form-label form--label with-icon">
                                                <i class="bi bi-link-45deg"></i>X</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.twitterURL' />
                                        </div>







                                        {{-- 4: tiktokURL --}}
                                        <div class="col-4">
                                            <label class="form-label form--label with-icon">
                                                <i class="bi bi-link-45deg"></i>TikTok</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.tiktokURL' />
                                        </div>





                                        {{-- 5: snachchat --}}
                                        <div class="col-4">
                                            <label class="form-label form--label with-icon">
                                                <i class="bi bi-link-45deg"></i>Snapchat</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.snapchatURL' />
                                        </div>






                                        {{-- 6: linkedIn --}}
                                        <div class="col-4">
                                            <label class="form-label form--label with-icon">
                                                <i class="bi bi-link-45deg"></i>LinkedIn</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.linkedInURL' />
                                        </div>











                                        {{-- :: submitButton --}}
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
                </div>
                {{-- endTab --}}








                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}












                {{-- 2: blogDesign --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">
                    <div class="row">
                        <div class="col-12">
                            <div>


                                {{-- togglerButton --}}
                                <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-2" href="#collapse-2"
                                    role="button">Design & Colors<svg xmlns="http://www.w3.org/2000/svg" width="1em"
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
                                <div class="collapse collapse--content" style="border-top: 1px solid transparent"
                                    id="collapse-2" wire:ignore.self>
                                    <form wire:submit='updateBlogSettings' class="row align-items-end pt-2">






                                        {{-- 1: colors & backgrounds --}}
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Colors
                                                    <i class="bi bi-dash-lg mx-2 text-gold"></i>Backgrounds
                                                </label>
                                            </div>
                                        </div>







                                        {{-- bodyColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0"
                                                    style="width: 80%">Body</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.bodyColor">
                                            </div>
                                        </div>







                                        {{-- cursorColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0"
                                                    style="width: 80%">Cursor</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cursorColor">
                                            </div>
                                        </div>






                                        {{-- textColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Theme
                                                    Main</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.textColor">
                                            </div>
                                        </div>







                                        {{-- textSecondaryColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Theme
                                                    Secondary</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.textSecondaryColor">
                                            </div>
                                        </div>






                                        {{-- heroBackgroundColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Hero
                                                    Background</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.heroBackgroundColor">
                                            </div>
                                        </div>







                                        {{-- heroTextColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Hero
                                                    Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.heroTextColor">
                                            </div>
                                        </div>







                                        {{-- cardTitleColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Title</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cardTitleColor">
                                            </div>
                                        </div>






                                        {{-- cardSubtitleColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Subtitle</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cardSubtitleColor">
                                            </div>
                                        </div>





                                        {{-- cardAuthorColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Author</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cardAuthorColor">
                                            </div>
                                        </div>






                                        {{-- cardButtonColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Button Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cardButtonColor">
                                            </div>
                                        </div>








                                        {{-- cardButtonBorderColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Button
                                                    Border</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cardButtonBorderColor">
                                            </div>
                                        </div>







                                        {{-- cardButtonBorderHoverColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Button
                                                    Border<small
                                                        class="ms-1 fw-semibold text-gold fs-9">(Hover)</small></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.cardButtonBorderHoverColor">
                                            </div>
                                        </div>






                                        {{-- hrColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0"
                                                    style="width: 80%">Separator</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instanceBlog.hrColor">
                                            </div>
                                        </div>














                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}










                                        {{-- 2: alignments --}}
                                        <div class="col-12 mt-4">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Adjust
                                                    Alignments</label>
                                            </div>
                                        </div>







                                        {{-- cardAlignment --}}
                                        <div class="col-4" wire:ignore>
                                            <label class="form-label form--label">Blog Card</label>
                                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                                <select class="form-select form--select"
                                                    data-instance='instanceBlog.cardAlignment'
                                                    value='{{ $instanceBlog?->cardAlignment }}'>
                                                    <option value=""></option>

                                                    @foreach ($alignments ?? [] as $alignment)
                                                    <option value="{{ $alignment }}">{{ ucwords($alignment) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>






                                        {{-- heroTextAlignment --}}
                                        <div class="col-4" wire:ignore>
                                            <label class="form-label form--label">Hero Text</label>
                                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                                <select class="form-select form--select"
                                                    data-instance='instanceBlog.heroTextAlignment'
                                                    value='{{ $instanceBlog?->heroTextAlignment }}'>
                                                    <option value=""></option>

                                                    @foreach ($alignments ?? [] as $alignment)
                                                    <option value="{{ $alignment }}">{{ ucwords($alignment) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>





                                        {{-- singleBlogHeroAlignment --}}
                                        <div class="col-4" wire:ignore>
                                            <label class="form-label form--label">Blog Hero</label>
                                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                                <select class="form-select form--select"
                                                    data-instance='instanceBlog.singleBlogHeroAlignment'
                                                    value='{{ $instanceBlog?->singleBlogHeroAlignment }}'>
                                                    <option value=""></option>

                                                    @foreach ($alignments ?? [] as $alignment)
                                                    <option value="{{ $alignment }}">{{ ucwords($alignment) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>








                                        {{-- singleBlogSectionTitleAlignment --}}
                                        <div class="col-4" wire:ignore>
                                            <label class="form-label form--label">Section Title</label>
                                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                                <select class="form-select form--select"
                                                    data-instance='instanceBlog.singleBlogSectionTitleAlignment'
                                                    value='{{ $instanceBlog?->singleBlogSectionTitleAlignment }}'>
                                                    <option value=""></option>

                                                    @foreach ($alignments ?? [] as $alignment)
                                                    <option value="{{ $alignment }}">{{ ucwords($alignment) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>





                                        {{-- singleBlogSectionContentAlignment --}}
                                        <div class="col-4" wire:ignore>
                                            <label class="form-label form--label">Section Content</label>
                                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                                <select class="form-select form--select"
                                                    data-instance='instanceBlog.singleBlogSectionContentAlignment'
                                                    value='{{ $instanceBlog?->singleBlogSectionContentAlignment }}'>
                                                    <option value=""></option>

                                                    @foreach ($alignments ?? [] as $alignment)
                                                    <option value="{{ $alignment }}">{{ ucwords($alignment) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>












                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}










                                        {{-- 3: features --}}
                                        <div class="col-12 mt-4">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Extra
                                                    Features</label>
                                            </div>
                                        </div>








                                        {{-- heroPictureRadius --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Hero Picture Radius<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(PX)</small></label>
                                            <input class="form-control form--input mb-4" type="number" step='0.1'
                                                wire:model='instanceBlog.heroPictureRadius' />
                                        </div>






                                        {{-- numberOfColumns --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Card Columns<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(2-3)</small></label>
                                            <input class="form-control form--input mb-4" type="number" step='1' min='2'
                                                max='3' wire:model='instanceBlog.numberOfColumns' />
                                        </div>










                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}










                                        {{-- 4: content --}}
                                        <div class="col-12 mt-4">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Dynamic
                                                    Content</label>
                                            </div>
                                        </div>








                                        {{-- heroText--}}
                                        <div class="col-12 mb-4" wire:ignore>

                                            <label class="form-label form--label">Hero Text<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(4-5 Lines)</small></label>


                                            <livewire:dashboard.components.editor-toolbar key='quill-editor-toolbar-1'
                                                id='quill-editor-toolbar-1' />
                                            <div id='quill-editor-1' class="quill-editor"
                                                data-toolbar='#quill-editor-toolbar-1'
                                                data-value="{{ $instanceBlog->heroText ?? '' }}"
                                                data-instance='instanceBlog.heroText'></div>

                                        </div>








                                        {{-- contentTitleText --}}
                                        <div class="col-8">
                                            <label class="form-label form--label">Section Header<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(ex. Our
                                                    Blogs)</small></label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.contentTitleText' />
                                        </div>








                                        {{-- footerCopyrightsText --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Copyrights</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.footerCopyrightsText' />
                                        </div>









                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}









                                        {{-- :: submitButton --}}
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
                </div>
                {{-- endTab --}}












                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}












                {{-- 3: blogAttachments --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">
                    <div class="row">
                        <div class="col-12">
                            <div>


                                {{-- togglerButton --}}
                                <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-3" href="#collapse-3"
                                    role="button">Attachments<svg xmlns="http://www.w3.org/2000/svg" width="1em"
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
                                <div class="collapse collapse--content" style="border-top: 1px solid transparent"
                                    id="collapse-3" wire:ignore.self>
                                    <form wire:submit='updateBlogAttachments' class="row pt-2">






                                        {{-- 1: hero --}}
                                        <div class="col-6">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Hero
                                                </label>
                                            </div>






                                            {{-- ------------------------- --}}
                                            {{-- ------------------------- --}}






                                            {{-- imageFiles - Hero --}}
                                            <div class="row">






                                                {{-- 1: imageFile --}}
                                                <div class="col-6">
                                                    <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Click To Upload" for="hero--file-1">


                                                        {{-- size --}}
                                                        <span class="upload--caption badge">1st</span>



                                                        {{-- input --}}
                                                        <input class="form-control d-none file--input" type="file"
                                                            id="hero--file-1" data-preview="hero--preview-1"
                                                            wire:model='instanceBlog.heroImageFile' />



                                                        {{-- image --}}
                                                        <img id="hero--preview-1" class="inventory--image-frame"
                                                            src="{{ asset('assets/img/placeholder.png') }}"
                                                            style="aspect-ratio: 1/2;" width="512" height="250"
                                                            wire:ignore />

                                                    </label>
                                                </div>









                                                {{-- 2: secondImageFile --}}
                                                <div class="col-6">
                                                    <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Click To Upload" for="hero--file-2">


                                                        {{-- size --}}
                                                        <span class="upload--caption badge">2nd</span>



                                                        {{-- input --}}
                                                        <input class="form-control d-none file--input" type="file"
                                                            id="hero--file-2" data-preview="hero--preview-2"
                                                            wire:model='instanceBlog.heroSecondImageFile' />



                                                        {{-- image --}}
                                                        <img id="hero--preview-2" class="inventory--image-frame"
                                                            src="{{ asset('assets/img/placeholder.png') }}"
                                                            style="aspect-ratio: 1/2;" width="512" height="250"
                                                            wire:ignore />

                                                    </label>
                                                </div>









                                                {{-- 3: thirdImageFile --}}
                                                <div class="col-6">
                                                    <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Click To Upload" for="hero--file-3">


                                                        {{-- size --}}
                                                        <span class="upload--caption badge">3rd</span>



                                                        {{-- input --}}
                                                        <input class="form-control d-none file--input" type="file"
                                                            id="hero--file-3" data-preview="hero--preview-3"
                                                            wire:model='instanceBlog.heroThirdImageFile' />



                                                        {{-- image --}}
                                                        <img id="hero--preview-3" class="inventory--image-frame"
                                                            src="{{ asset('assets/img/placeholder.png') }}"
                                                            style="aspect-ratio: 1/2;" width="512" height="250"
                                                            wire:ignore />

                                                    </label>
                                                </div>










                                                {{-- 4: fourthImageFile --}}
                                                <div class="col-6">
                                                    <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Click To Upload" for="hero--file-4">


                                                        {{-- size --}}
                                                        <span class="upload--caption badge">4th</span>



                                                        {{-- input --}}
                                                        <input class="form-control d-none file--input" type="file"
                                                            id="hero--file-4" data-preview="hero--preview-4"
                                                            wire:model='instanceBlog.heroFourthImageFile' />



                                                        {{-- image --}}
                                                        <img id="hero--preview-4" class="inventory--image-frame"
                                                            src="{{ asset('assets/img/placeholder.png') }}"
                                                            style="aspect-ratio: 1/2;" width="512" height="250"
                                                            wire:ignore />

                                                    </label>
                                                </div>





                                            </div>
                                        </div>
                                        {{-- endCol --}}








                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}







                                        {{-- 2: footer --}}
                                        <div class="col-6">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Footer
                                                </label>
                                            </div>






                                            {{-- ------------------------- --}}
                                            {{-- ------------------------- --}}





                                            {{-- imageFiles - Hero --}}
                                            <div class="row">






                                                {{-- 1: imageFile --}}
                                                <div class="col-12">
                                                    <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Click To Upload"
                                                        for="footer--file-1">


                                                        {{-- size --}}
                                                        <span class="upload--caption badge">1920 x 1080</span>



                                                        {{-- input --}}
                                                        <input class="form-control d-none file--input" type="file"
                                                            id="footer--file-1" data-preview="footer--preview-1"
                                                            wire:model='instanceBlog.footerImageFile' readonly />



                                                        {{-- image --}}
                                                        <img id="footer--preview-1" class="inventory--image-frame"
                                                            src="{{ asset('assets/img/placeholder.png') }}"
                                                            style="aspect-ratio: 1/2;" width="512" height="250"
                                                            wire:ignore />

                                                    </label>
                                                </div>





                                            </div>
                                        </div>
                                        {{-- endCol --}}














                                        {{-- :: submitButton --}}
                                        <div class="col-12 text-center mt-3">
                                            <button wire:loading.attr='disabled'
                                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                                wire:target='instanceBlog.heroImageFile, instanceBlog.heroSecondImageFile, instanceBlog.heroThirdImageFile, instanceBlog.heroFourthImageFile, instanceBlog.footerImageFile'>
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





            </div>
        </div>
    </div>
    {{-- endContainer --}}




















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- quill --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>



    <script>
        $('.quill-editor').each(function() {

            let toolbar = $(this).attr('data-toolbar');
            let instance = $(this).attr('data-instance');
            let value = $(this).attr('data-value');


            quill = new Quill(this, {
                modules: {
                syntax: true,
                toolbar: toolbar,
                },
                theme: 'snow',
            });





            // 1.2: checkValue
            if (value) {


                const delta = quill.clipboard.convert({html: value});
                quill.setContents(delta, "api");

            } // end if




            // 1.4: getHTML
            quill.on('editor-change', (eventName, ...args) => {

                @this.set(instance, quill.getSemanticHTML());

            });


        });
    </script>









    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







    {{-- selectHandle --}}
    <script>
        $(".form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);

      }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





</section>
{{-- endSection --}}