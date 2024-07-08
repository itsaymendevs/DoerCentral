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
                                <div class="collapse  collapse--content" id="collapse-1">
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
                                                <i class="bi bi-link-45deg"></i>Twitter</label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.twitterURL' />
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
                                    id="collapse-2">
                                    <form class="row align-items-end pt-2">






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
                                        <div class="col-4">
                                            <label class="form-label form--label">Blog Card</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.cardAlignment' />
                                        </div>






                                        {{-- heroTextAlignment --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Hero Text</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.heroTextAlignment' />
                                        </div>





                                        {{-- singleBlogHeroAlignment --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Blog Hero</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.singleBlogHeroAlignment' />
                                        </div>






                                        {{-- singleBlogSectionTitleAlignment --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Section Title</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.singleBlogSectionTitleAlignment' />
                                        </div>





                                        {{-- singleBlogSectionContentAlignment --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Section Content</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.singleBlogSectionContentAlignment' />
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








                                        {{-- heroText --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Hero Text</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.heroText' />
                                        </div>





                                        {{-- footerCopyrightsText --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Footer Copyrights</label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instanceBlog.footerCopyrightsText' />
                                        </div>








                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}
                                        {{-- --------------------------------------- --}}









                                        {{-- :: submitButton --}}
                                        <div class="col-12 text-center mt-3">
                                            <button wire:loading.attr='disabled'
                                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                                type='button'>
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
</section>
{{-- endSection --}}