{{-- mainSection --}}
<section id="content--section" class="content--section">
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


                    <livewire:dashboard.extra.web-apps.settings.components.settings-socials key='settings-socials' />


                </div>
                {{-- endTab --}}













                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}








                {{-- 2: general --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">


                    <livewire:dashboard.extra.web-apps.settings.components.settings-general key='settings-general' />


                </div>
                {{-- endTab --}}









                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}








                {{-- 3: mailConfiguration --}}
                <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">


                    <livewire:dashboard.extra.web-apps.settings.components.settings-mail-configuration
                        key='settings-mail-configuration' />

                </div>
                {{-- endTab --}}











                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}






                {{-- ** BLOG ONLY STAYS IN THIS PAGE ** --}}





                {{-- title --}}
                <div class="d-block text-end mt-5">
                    <h6 class="text-center mb-0 fw-500 fs-6 pb-2 d-inline-block"
                        style="border-bottom: 1px solid var(--bs-warning);">Blogs</h6>
                </div>








                {{-- 4: blogDesign --}}
                <div class="tab-pane-like mt-3" style="border: 1px solid var(--color-theme-secondary)">
                    <div class="row settings--row">
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
                                <div class="collapse collapsed collapse--content"
                                    style="border-top: 1px solid transparent" id="collapse-2" wire:ignore.self>
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
                                                <label class="form-label form--label mb-0" style="width: 80%">Body
                                                    BG</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.bodyColor">
                                            </div>
                                        </div>





                                        {{-- textColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Body
                                                    Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.textColor">
                                            </div>
                                        </div>








                                        {{-- hrColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0"
                                                    style="width: 80%">Separator</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.hrColor">
                                            </div>
                                        </div>









                                        {{-- cursorColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0"
                                                    style="width: 80%">Cursor</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cursorColor">
                                            </div>
                                        </div>




                                        {{-- cursorSecondaryColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Cursor<i
                                                        class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Hover"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cursorSecondaryColor">
                                            </div>
                                        </div>












                                        {{-- mobileMenuTextColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Mobile
                                                    Menu Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.mobileMenuTextColor">
                                            </div>
                                        </div>









                                        {{-- mobileMenuBackgroundColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Mobile
                                                    Menu BG</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.mobileMenuBackgroundColor">
                                            </div>
                                        </div>









                                        {{-- heroBackgroundColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Hero
                                                    BG</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.heroBackgroundColor">
                                            </div>
                                        </div>










                                        {{-- heroTextColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Hero
                                                    Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.heroTextColor">
                                            </div>
                                        </div>





                                        {{-- sliderIndicatorColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Slider
                                                    Indicators</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.sliderIndicatorColor">
                                            </div>
                                        </div>








                                        {{-- cardTitleColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Title</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardTitleColor">
                                            </div>
                                        </div>






                                        {{-- cardSubtitleColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Subtitle</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardSubtitleColor">
                                            </div>
                                        </div>





                                        {{-- cardAuthorColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Author</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardAuthorColor">
                                            </div>
                                        </div>





                                        {{-- cardDateColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Date</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardDateColor">
                                            </div>
                                        </div>








                                        {{-- cardButtonColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Button Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardButtonColor">
                                            </div>
                                        </div>







                                        {{-- cardButtonHoverColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Button
                                                    Text<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Hover"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardButtonHoverColor">
                                            </div>
                                        </div>








                                        {{-- cardButtonBorderColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Button Border</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardButtonBorderColor">
                                            </div>
                                        </div>







                                        {{-- cardButtonBorderHoverColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Button
                                                    Border<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Hover"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardButtonBorderHoverColor">
                                            </div>
                                        </div>









                                        {{-- cardButtonShadowColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Card
                                                    Button Shadow</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardButtonShadowColor">
                                            </div>
                                        </div>







                                        {{-- cardButtonShadowHoverColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Button
                                                    Shadow<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Hover"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.cardButtonShadowHoverColor">
                                            </div>
                                        </div>







                                        {{-- ----------------------- --}}
                                        {{-- ----------------------- --}}
                                        {{-- ----------------------- --}}
                                        {{-- ----------------------- --}}
                                        {{-- ----------------------- --}}





                                        {{-- blog --}}
                                        <div class="col-12 mb-3">
                                            <hr>
                                        </div>








                                        {{-- singleBlogNavbarBackgroundColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Menu
                                                    BG<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Visible in Single Blog"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogNavbarBackgroundColor">
                                            </div>
                                        </div>






                                        {{-- singleBlogNavbarTextColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Menu
                                                    Text<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Visible in Single Blog"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogNavbarTextColor">
                                            </div>
                                        </div>









                                        {{-- singleBlogAuthorColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Author
                                                    Text<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Visible in Single Blog"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogAuthorColor">
                                            </div>
                                        </div>












                                        {{-- singleBlogTagColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Tags
                                                    BG</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogTagColor">
                                            </div>
                                        </div>









                                        {{-- singleBlogTagHoverColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Tags
                                                    BG<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Hover"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogTagHoverColor">
                                            </div>
                                        </div>








                                        {{-- singleBlogTagTextColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Tags
                                                    Text</label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogTagTextColor">
                                            </div>
                                        </div>










                                        {{-- singleBlogTagTextHoverColor --}}
                                        <div class="col-4">
                                            <div class="input--with-label mb-3">
                                                <label class="form-label form--label mb-0" style="width: 80%">Tags
                                                    Text<i class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Hover"></i></label>
                                                <input type="color" class="form--input py-1 pointer" required=""
                                                    wire:model="instance.singleBlogTagTextHoverColor">
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
                                                <select class="form-select form--select form--blog-select"
                                                    data-instance='instance.cardAlignment'
                                                    value='{{ $instance?->cardAlignment }}'>
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
                                                <select class="form-select form--select form--blog-select"
                                                    data-instance='instance.heroTextAlignment'
                                                    value='{{ $instance?->heroTextAlignment }}'>
                                                    <option value=""></option>

                                                    @foreach ($alignments ?? [] as $alignment)
                                                    <option value="{{ $alignment }}">{{ ucwords($alignment) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>









                                        {{-- singleBlogHeroAlignment --}}
                                        <div class="col-4" wire:ignore>
                                            <label class="form-label form--label">Blog Header<i
                                                    class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                    data-bss-tooltip="" title="Includes: Title - Subtitle"></i></label>
                                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                                <select class="form-select form--select form--blog-select"
                                                    data-instance='instance.singleBlogHeroAlignment'
                                                    value='{{ $instance?->singleBlogHeroAlignment }}'>
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
                                                <select class="form-select form--select form--blog-select"
                                                    data-instance='instance.singleBlogSectionTitleAlignment'
                                                    value='{{ $instance?->singleBlogSectionTitleAlignment }}'>
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
                                                <select class="form-select form--select form--blog-select"
                                                    data-instance='instance.singleBlogSectionContentAlignment'
                                                    value='{{ $instance?->singleBlogSectionContentAlignment }}'>
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
                                            <label class="form-label form--label">Hero Picture Radius<i
                                                    class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                    data-bss-tooltip="" title="Pixels"></i></label>
                                            <input class="form-control form--input mb-4" type="number" step='0.1'
                                                wire:model='instance.heroPictureRadius' />
                                        </div>






                                        {{-- numberOfColumns --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Card Columns<i
                                                    class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                    data-bss-tooltip="" title="ex. 2 - 3 - 4"></i></label>
                                            <input class="form-control form--input mb-4" type="number" step='1' min='2'
                                                max='4' wire:model='instance.numberOfColumns' />
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

                                            <label class="form-label form--label">Hero Text<i class="bi bi-info-circle"
                                                    data-bs-toggle="tooltip" data-bss-tooltip=""
                                                    title="Between 4-5 Lines"></i></label>


                                            <livewire:dashboard.components.editor-toolbar key='quill-editor-toolbar-1'
                                                id='quill-editor-toolbar-1' />
                                            <div id='quill-editor-1' class="quill-editor"
                                                data-toolbar='#quill-editor-toolbar-1'
                                                data-value="{{ $instance->heroText ?? '' }}"
                                                data-instance='instance.heroText'></div>

                                        </div>








                                        {{-- contentTitleText --}}
                                        <div class="col-8">
                                            <label class="form-label form--label">Section Header<i
                                                    class="bi bi-info-circle" data-bs-toggle="tooltip"
                                                    data-bss-tooltip="" title="ex. Our Blogs"></i></label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instance.contentTitleText' />
                                        </div>








                                        {{-- footerCopyrightsText --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Copyrights</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instance.footerCopyrightsText' />
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












                {{-- 4: blogAttachments --}}
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
                                                            wire:model='instance.heroImageFile' />



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
                                                            wire:model='instance.heroSecondImageFile' />



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
                                                            wire:model='instance.heroThirdImageFile' />



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
                                                            wire:model='instance.heroFourthImageFile' />



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







                                        {{-- 2: logo - footer --}}
                                        <div class="col-6">





                                            {{-- 2.1: footer --}}
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <hr class="w-75" />
                                                <label
                                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Footer
                                                </label>
                                            </div>





                                            {{-- imageFile --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip"
                                                        data-bss-tooltip="" title="Click To Upload"
                                                        for="footer--file-1">


                                                        {{-- size --}}
                                                        <span class="upload--caption badge">1920 x 1080</span>



                                                        {{-- input --}}
                                                        <input class="form-control d-none file--input" type="file"
                                                            id="footer--file-1" data-preview="footer--preview-1"
                                                            wire:model='instance.footerImageFile' readonly />



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
                                                wire:target='instance.heroImageFile, instance.logoImageFile, instance.heroSecondImageFile, instance.heroThirdImageFile, instance.heroFourthImageFile, instance.footerImageFile'>
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
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}










                {{-- title --}}
                <div class="d-block text-end mt-5">
                    <h6 class="text-center mb-0 fw-500 fs-6 pb-2 d-inline-block"
                        style="border-bottom: 1px solid var(--bs-warning);">Plans</h6>
                </div>










                {{-- 5: subscriptionDesign --}}
                <div class="tab-pane-like mt-3" style="border: 1px solid var(--color-theme-secondary)">


                    <livewire:dashboard.extra.web-apps.settings.components.settings-plans key='settings-plans' />


                </div>
                {{-- endTab --}}












                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}










                {{-- title --}}
                <div class="d-block text-end mt-5">
                    <h6 class="text-center mb-0 fw-500 fs-6 pb-2 d-inline-block"
                        style="border-bottom: 1px solid var(--bs-warning);">Plan Customization</h6>
                </div>










                {{-- 6: planFormSettings --}}
                <div class="tab-pane-like mt-3" style="border: 1px solid var(--color-theme-secondary)">


                    <livewire:dashboard.extra.web-apps.settings.components.settings-plan-form
                        key='settings-plan-form' />


                </div>
                {{-- endTab --}}







            </div>
        </div>
    </div>
    {{-- endContainer --}}











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    @section('scripts')



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
        $(".form--blog-select").on("change", function(event) {

         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');

         @this.set(instance, selectValue);

      }); //end function
    </script>





    @endsection






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</section>
{{-- endSection --}}