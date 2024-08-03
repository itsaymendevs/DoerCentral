<div class="row">
    <div class="col-12">
        <div>


            {{-- togglerButton --}}
            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" aria-expanded="true"
                aria-controls="collapse-plans" href="#collapse-plans" role="button">Design & Colors<svg
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
            <div class="collapse collapsed collapse--content" style="border-top: 1px solid transparent"
                id="collapse-plans" wire:ignore.self>
                <form wire:submit='update' class="row align-items-end pt-2">






                    {{-- 0: design --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Layouts
                            </label>
                        </div>
                    </div>






                    {{-- ----------------------------- --}}
                    {{-- ----------------------------- --}}





                    {{-- 1: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-cover"
                                        src="{{ asset('storage/extra/plans/option-1.png') }}" />
                                </div>



                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>





                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Grid Slider</h6>
                                </div>






                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Grid Slider')

                                    <button wire:click="updateTemplate('Grid Slider')" class="btn btn--scheme btn--scheme-2 disabled
                                            fs-12 px-4 mx-2 scale--self-05" type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Grid Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}



                                </div>
                            </div>
                        </div>
                    </div>









                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}







                    {{-- 2: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-contain"
                                        src="{{ asset('storage/extra/plans/option-2.png') }}" />
                                </div>




                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>




                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Grid Fully Slider</h6>
                                </div>



                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Grid Fully Slider')

                                    <button wire:click="updateTemplate('Grid Fully Slider')"
                                        class="btn btn--scheme btn--scheme-2 disabled fs-12 px-4 mx-2 scale--self-05"
                                        type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Grid Fully Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}


                                </div>
                            </div>
                        </div>
                    </div>









                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}







                    {{-- 3: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-contain"
                                        src="{{ asset('storage/extra/plans/option-3.png') }}" />
                                </div>




                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>





                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Motion Slider</h6>
                                </div>



                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Motion Slider')

                                    <button wire:click="updateTemplate('Motion Slider')"
                                        class="btn btn--scheme btn--scheme-2 disabled fs-12 px-4 mx-2 scale--self-05"
                                        type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Motion Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}


                                </div>
                            </div>
                        </div>
                    </div>






                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}








                    {{-- 4: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-contain"
                                        src="{{ asset('storage/extra/plans/option-4.png') }}" />
                                </div>




                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>




                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Half Slider</h6>
                                </div>



                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Half Slider')

                                    <button wire:click="updateTemplate('Half Slider')"
                                        class="btn btn--scheme btn--scheme-2 disabled fs-12 px-4 mx-2 scale--self-05"
                                        type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Half Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}


                                </div>
                            </div>
                        </div>
                    </div>







                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}









                    {{-- 5: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-contain"
                                        src="{{ asset('storage/extra/plans/option-5.png') }}" />
                                </div>





                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>




                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Parallax Slider</h6>
                                </div>



                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Parallax Slider')

                                    <button wire:click="updateTemplate('Parallax Slider')"
                                        class="btn btn--scheme btn--scheme-2 disabled fs-12 px-4 mx-2 scale--self-05"
                                        type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Parallax Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}


                                </div>
                            </div>
                        </div>
                    </div>







                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}









                    {{-- 6: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-contain"
                                        src="{{ asset('storage/extra/plans/option-6.png') }}" />
                                </div>





                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>




                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Two Columns Slider
                                    </h6>
                                </div>



                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Two Columns Slider')

                                    <button wire:click="updateTemplate('Two Columns Slider')"
                                        class="btn btn--scheme btn--scheme-2 disabled fs-12 px-4 mx-2 scale--self-05"
                                        type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Two Columns Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}


                                </div>
                            </div>
                        </div>
                    </div>











                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}









                    {{-- 7: option --}}
                    <div class="col-4 col-xl-3 mt-5 pt-4">
                        <div class="overview--card client-version scale--self-05 mb-5"
                            style="box-shadow: 0px 0px 8px var(--color-body)">
                            <div class="row">



                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-contain"
                                        src="{{ asset('storage/extra/plans/option-7.png') }}" />
                                </div>






                                {{-- preview --}}
                                <div class="col-12">
                                    <p class="text-center fw-bold text-danger mb-0">
                                        <a herf="#"
                                            class="btn btn--raw-icon fs-13 text-warning d-inline-flex align-items-center justify-content-center scale--self-05 w-auto rounded-0"
                                            style="border-bottom: 2px dashed var(--color-theme-secondary) !important;">
                                            Preview
                                        </a>
                                    </p>
                                </div>



                                {{-- midCol --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-3 mb-2">Three Columns Slider
                                    </h6>
                                </div>



                                {{-- confirm --}}
                                <div class="col-12 text-center mt-3">


                                    {{-- selected --}}
                                    @if ($instance->template == 'Three Columns Slider')

                                    <button wire:click="updateTemplate('Three Columns Slider')"
                                        class="btn btn--scheme btn--scheme-2 disabled fs-12 px-4 mx-2 scale--self-05"
                                        type="button">Selected</button>



                                    {{-- notSelected --}}
                                    @else

                                    <button wire:click="updateTemplate('Three Columns Slider')"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                        wire:loading.class='disabled' type="button">Choose</button>

                                    @endif
                                    {{-- end if --}}


                                </div>
                            </div>
                        </div>
                    </div>








                    {{-- ------------------------------------- --}}
                    {{-- ------------------------------------- --}}
                    {{-- ------------------------------------- --}}
                    {{-- ------------------------------------- --}}
                    {{-- ------------------------------------- --}}











                    {{-- 1: colors & backgrounds --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Colors
                                <i class="bi bi-dash-lg mx-2 text-gold"></i>Backgrounds
                            </label>
                        </div>
                    </div>







                    {{-- subheading --}}
                    <div class="col-12 text-center">
                        <h6 class='fs-15 mb-3 d-inline-block' style="border-bottom: 2px dashed white;">Plans
                        </h6>
                    </div>







                    {{-- body - preloader --}}


                    {{-- bodyColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body
                                BG</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bodyBackgroundColor">
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






                    {{-- preloaderLineColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Preloader
                                Line</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.preloaderLineColor">
                        </div>
                    </div>





                    {{-- cursor --}}




                    {{-- cursorColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Cursor</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.cursorColor">
                        </div>
                    </div>





                    {{-- cursorHoverColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Cursor<small
                                    class="ms-1 fw-semibold text-gold fs-9">(Hover)</small></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.cursorHoverColor">
                        </div>
                    </div>






                    {{-- navbar --}}





                    {{-- navbarBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Menu
                                BG</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarBackgroundColor">
                        </div>
                    </div>





                    {{-- navbarMenuColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Menu
                                Icon</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarMenuColor">
                        </div>
                    </div>






                    {{-- navbarMenuActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Menu
                                Icon<small class="ms-1 fw-semibold text-gold fs-9">(Active)</small></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarMenuActiveColor">
                        </div>
                    </div>







                    {{-- navbarLinksColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Menu
                                Links</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarLinksColor">
                        </div>
                    </div>



                    {{-- navbarLinksHoverColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Menu
                                Links<small class="ms-1 fw-semibold text-gold fs-9">(Hover)</small></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarLinksHoverColor">
                        </div>
                    </div>




                    {{-- navbarSocialLinksColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Menu
                                Socials</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarSocialLinksColor">
                        </div>
                    </div>






                    {{-- slider --}}


                    {{-- sliderLineColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Slider
                                Line</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.sliderLineColor">
                        </div>
                    </div>





                    {{-- sliderBulletsColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Slider
                                Indicators</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.sliderBulletsColor">
                        </div>
                    </div>







                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}





                    {{-- plans --}}
                    <div class="col-12 mb-3">
                        <hr>
                    </div>



                    {{-- planCardBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                BG</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardBackgroundColor">
                        </div>
                    </div>





                    {{-- planCardTitleColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Title</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardTitleColor">
                        </div>
                    </div>



                    {{-- planCardSubtitleColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Subtitle</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardSubtitleColor">
                        </div>
                    </div>


                    {{-- planCardCaptionColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Caption</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardCaptionColor">
                        </div>
                    </div>


                    {{-- planCardHrColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Line</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardHrColor">
                        </div>
                    </div>





                    {{-- planCardButtonBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Button BG</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardButtonBackgroundColor">
                        </div>
                    </div>






                    {{-- planCardButtonColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Button</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardButtonColor">
                        </div>
                    </div>



                    {{-- planCardButtonHoverColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Button<small class="ms-1 fw-semibold text-gold fs-9">(Hover)</small></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCardButtonHoverColor">
                        </div>
                    </div>










                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}







                    {{-- singlePlan --}}
                    <div class="col-12 mb-3">
                        <hr>
                    </div>



                    {{-- subheading --}}
                    <div class="col-12 text-center">
                        <h6 class='fs-15 mb-3 d-inline-block' style="border-bottom: 2px dashed white;">Plan Details
                        </h6>
                    </div>





                    {{-- planSideTitleColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Side
                                Titles</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planSideTitleColor">
                        </div>
                    </div>





                    {{-- planFilterLinksColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Filter
                                Links</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planFilterLinksColor">
                        </div>
                    </div>



                    {{-- planFilterLinksHoverBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Filter
                                Links Border<small class="ms-1 fw-semibold text-gold fs-9">(Hover)</small></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planFilterLinksHoverBorderColor">
                        </div>
                    </div>








                    {{-- planListNumbersColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">List
                                Numbers</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planListNumbersColor">
                        </div>
                    </div>






                    {{-- planMealDietColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Meal
                                Caption</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planMealDietColor">
                        </div>
                    </div>





                    {{-- planMealsBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Meals
                                Border</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planMealsBorderColor">
                        </div>
                    </div>





                    {{-- planMealsHoverBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Meals
                                Border<small class="ms-1 fw-semibold text-gold fs-9">(Hover)</small></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planMealsHoverBorderColor">
                        </div>
                    </div>






                    {{-- planReviewsTitleColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Testimonials Title</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planReviewsTitleColor">
                        </div>
                    </div>







                    {{-- planActionButtonColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Action Button</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planActionButtonColor">
                        </div>
                    </div>




                    {{-- planActionButtonBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Action Button BG</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planActionButtonBackgroundColor">
                        </div>
                    </div>












                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}










                    {{-- 2: alignments --}}
                    <div class="col-12 mt-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Adjust
                                Alignments</label>
                        </div>
                    </div>







                    {{-- planCardAlignment --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Plan Card Content</label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select" data-instance='instance.planCardAlignment'
                                value='{{ $instance?->planCardAlignment }}'>
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
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Extra
                                Features</label>
                        </div>
                    </div>








                    {{-- planCardRadius --}}
                    <div class="col-4">
                        <label class="form-label form--label">Plan Card Radius<small
                                class="ms-1 fw-semibold text-gold fs-9">(PX)</small></label>
                        <input class="form-control form--input mb-4" type="number" step='0.1'
                            wire:model='instance.planCardRadius' />
                    </div>










                    {{-- sliderArrows --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Plan Slider Arrows<small
                                class="ms-1 fw-semibold text-gold fs-9">(V5)</small></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select" data-instance='instance.planSliderArrows'
                                value='{{ $instance?->planSliderArrows }}'>
                                <option value=""></option>
                                <option value="light">Light Color</option>
                                <option value="dark">Dark Color</option>
                            </select>
                        </div>
                    </div>





                    {{-- empty --}}
                    <div class="col-12"></div>






                    {{-- --------------------------------- --}}
                    {{-- --------------------------------- --}}
                    {{-- --------------------------------- --}}
                    {{-- --------------------------------- --}}
                    {{-- --------------------------------- --}}




                    {{-- singlePlan --}}



                    {{-- planSideTitleDisplay --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Sub-Headings<small
                                class="ms-1 fw-semibold text-gold fs-9">(Single
                                Plan)</small></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select" data-instance='instance.planSideTitleDisplay'
                                value='{{ $instance?->planSideTitleDisplay }}' required>
                                <option value=""></option>
                                <option value="inline">Same Line</option>
                                <option value="block">Full Line</option>
                            </select>
                        </div>
                    </div>











                    {{-- showPlanCustomSection --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Custom Section<small
                                class="ms-1 fw-semibold text-gold fs-9">(Single
                                Plan)</small></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select" data-instance='instance.showPlanCustomSection'
                                value='{{ $instance?->showPlanCustomSection }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>










                    {{-- showPlanMealsTypeFilter --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Plan Meals Filters<small
                                class="ms-1 fw-semibold text-gold fs-9">(Single
                                Plan)</small></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select" data-instance='instance.showPlanMealsTypeFilter'
                                value='{{ $instance?->showPlanMealsTypeFilter }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>











                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}





                    {{-- dynamicContent --}}




                    {{-- title --}}
                    <div class="col-12 mt-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Custom
                                Section</label>
                        </div>
                    </div>








                    {{-- planCustomSectionTitle --}}
                    <div class="col-4">
                        <label class="form-label form--label">Section Title</label>
                        <input class="form-control form--input mb-4" type="text"
                            wire:model='instance.planCustomSectionTitle' />
                    </div>







                    {{-- planCustomSectionVideoURL --}}
                    <div class="col-8">
                        <label class="form-label form--label">Section Video<small
                                class="ms-1 fw-semibold text-gold fs-9">(URL)</small></label>
                        <input class="form-control form--input mb-4" type="text"
                            wire:model='instance.planCustomSectionVideoURL' />
                    </div>








                    {{-- ------------------------------------- --}}
                    {{-- ------------------------------------- --}}






                    {{-- imageFiles --}}
                    <div class="col-12">
                        <div class="row">





                            {{-- 1: 1st --}}
                            <div class="col-4">


                                {{-- imageFile --}}
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="custom--file-1">


                                    {{-- size --}}
                                    <span class="upload--caption badge">1st</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="custom--file-1"
                                        data-preview="custom--preview-1"
                                        wire:model='instance.planCustomSectionImageFile' />



                                    {{-- image --}}
                                    <img id="custom--preview-1" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>




                                {{-- subtitle --}}
                                <input class="form-control form--input text-center mb-2" type="text"
                                    wire:model='instance.planCustomSectionSubtitle' placeholder="Subtitle" />



                                {{-- caption --}}
                                <input class="form-control form--input text-center mb-4" type="text"
                                    wire:model='instance.planCustomSectionCaption' placeholder="Caption" />
                            </div>









                            {{-- ------------------------- --}}
                            {{-- ------------------------- --}}





                            {{-- 2nd --}}
                            <div class="col-4">
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="custom--file-2">


                                    {{-- size --}}
                                    <span class="upload--caption badge">2nd</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="custom--file-2"
                                        data-preview="custom--preview-2"
                                        wire:model='instance.planCustomSectionSecondImageFile' />



                                    {{-- image --}}
                                    <img id="custom--preview-2" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>




                                {{-- subtitle --}}
                                <input class="form-control form--input text-center mb-2" type="text"
                                    wire:model='instance.planCustomSectionSecondSubtitle' placeholder="Subtitle" />



                                {{-- caption --}}
                                <input class="form-control form--input text-center mb-4" type="text"
                                    wire:model='instance.planCustomSectionSecondCaption' placeholder="Caption" />


                            </div>







                            {{-- ------------------------- --}}
                            {{-- ------------------------- --}}






                            {{-- 3rd --}}
                            <div class="col-4">

                                {{-- imageFile --}}
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="custom--file-3">


                                    {{-- size --}}
                                    <span class="upload--caption badge">3rd</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="custom--file-3"
                                        data-preview="custom--preview-3"
                                        wire:model='instance.planCustomSectionThirdImageFile' />



                                    {{-- image --}}
                                    <img id="custom--preview-3" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>




                                {{-- subtitle --}}
                                <input class="form-control form--input text-center mb-2" type="text"
                                    wire:model='instance.planCustomSectionThirdSubtitle' placeholder="Subtitle" />



                                {{-- caption --}}
                                <input class="form-control form--input text-center mb-4" type="text"
                                    wire:model='instance.planCustomSectionThirdCaption' placeholder="Caption" />

                            </div>







                            {{-- ------------------------- --}}
                            {{-- ------------------------- --}}




                            {{-- 4th --}}
                            <div class="col-4">


                                {{-- imageFile --}}
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="custom--file-4">


                                    {{-- size --}}
                                    <span class="upload--caption badge">4th</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="custom--file-4"
                                        data-preview="custom--preview-4"
                                        wire:model='instance.planCustomSectionFourthImageFile' />



                                    {{-- image --}}
                                    <img id="custom--preview-4" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>




                                {{-- subtitle --}}
                                <input class="form-control form--input text-center mb-2" type="text"
                                    wire:model='instance.planCustomSectionFourthSubtitle' placeholder="Subtitle" />



                                {{-- caption --}}
                                <input class="form-control form--input text-center mb-4" type="text"
                                    wire:model='instance.planCustomSectionFourthCaption' placeholder="Caption" />

                            </div>






                            {{-- ------------------------- --}}
                            {{-- ------------------------- --}}




                            {{-- 5th --}}
                            <div class="col-4">

                                {{-- imageFile --}}
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="custom--file-5">


                                    {{-- size --}}
                                    <span class="upload--caption badge">5th</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="custom--file-5"
                                        data-preview="custom--preview-5"
                                        wire:model='instance.planCustomSectionFifthImageFile' />



                                    {{-- image --}}
                                    <img id="custom--preview-5" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>




                                {{-- subtitle --}}
                                <input class="form-control form--input text-center mb-2" type="text"
                                    wire:model='instance.planCustomSectionFifthSubtitle' placeholder="Subtitle" />



                                {{-- caption --}}
                                <input class="form-control form--input text-center mb-4" type="text"
                                    wire:model='instance.planCustomSectionFifthCaption' placeholder="Caption" />

                            </div>








                            {{-- ------------------------- --}}
                            {{-- ------------------------- --}}





                            {{-- 6th --}}
                            <div class="col-4">


                                {{-- imageFile --}}
                                <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="custom--file-6">


                                    {{-- size --}}
                                    <span class="upload--caption badge">6th</span>



                                    {{-- input --}}
                                    <input class="form-control d-none file--input" type="file" id="custom--file-6"
                                        data-preview="custom--preview-6"
                                        wire:model='instance.planCustomSectionSixthImageFile' />



                                    {{-- image --}}
                                    <img id="custom--preview-6" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;"
                                        width="512" height="250" wire:ignore />

                                </label>



                                {{-- subtitle --}}
                                <input class="form-control form--input text-center mb-2" type="text"
                                    wire:model='instance.planCustomSectionSixthSubtitle' placeholder="Subtitle" />



                                {{-- caption --}}
                                <input class="form-control form--input text-center mb-4" type="text"
                                    wire:model='instance.planCustomSectionSixthCaption' placeholder="Caption" />

                            </div>





                        </div>
                    </div>
                    {{-- endRow --}}














                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}








                    {{-- :: submitButton --}}
                    <div class="col-12 text-center mt-3">
                        <button wire:loading.attr='disabled'
                            class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                            wire:target='instance.planCustomSectionImageFile, instance.planCustomSectionSecondImageFile, instance.planCustomSectionThirdImageFile, instance.planCustomSectionFourthImageFile, instance.planCustomSectionFifthImageFile, instance.planCustomSectionSixthImageFile'>
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