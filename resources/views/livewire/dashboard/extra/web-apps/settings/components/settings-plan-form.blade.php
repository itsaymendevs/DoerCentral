<div class="row">
    <div class="col-12">
        <div>


            {{-- togglerButton --}}
            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" aria-expanded="true"
                aria-controls="collapse-plan-customization" href="#collapse-plan-customization" role="button">Design &
                Colors<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    viewBox="0 0 16 16" class="bi bi-chevron-expand">
                    <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                    </path>
                </svg>
            </a>





            {{-- ------------------------ --}}
            {{-- ------------------------ --}}






            {{-- collapse --}}
            <div class="collapse collapsed collapse--content" style="border-top: 1px solid transparent"
                id="collapse-plan-customization" wire:ignore.self>
                <form wire:submit='update' class="row align-items-end pt-2 settings--row">






                    {{-- 1: colors --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75 hr--sub-section" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Colors</label>
                        </div>
                    </div>




                    {{-- body - preloader --}}


                    {{-- textColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body
                                Text</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.textColor">
                        </div>
                    </div>




                    {{-- textActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body
                                Text<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Active (ex: Bundle, Days, Weekdays)"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.textActiveColor">
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
                            <label class="form-label form--label mb-0" style="width: 80%">Cursor<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Hover"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.cursorHoverColor">
                        </div>
                    </div>






                    {{-- navbar --}}






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
                                Icon<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Active"></i></label>
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
                                Links<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Hover"></i></label>
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



                    {{-- 2nd --}}

                    <div class="col-12 mb-3">
                        <hr>
                    </div>




                    {{-- brand --}}

                    {{-- brandColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Brand</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.brandColor">
                        </div>
                    </div>





                    {{-- brandActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Brand<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Active"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.brandActiveColor">
                        </div>
                    </div>






                    {{-- heading --}}


                    {{-- headingHrColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Headers HR</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.headingHrColor">
                        </div>
                    </div>




                    {{-- input --}}


                    {{-- inputBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Input Border</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.inputBorderColor">
                        </div>
                    </div>





                    {{-- inputBorderHoverColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Input Border<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Hover"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.inputBorderHoverColor">
                        </div>
                    </div>







                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- plan --}}


                    {{-- planTitleColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan
                                Title</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planTitleColor">
                        </div>
                    </div>








                    {{-- planHrColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan HR</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planHrColor">
                        </div>
                    </div>







                    {{-- planCarbsBoxColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan Carbs</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planCarbsBoxColor">
                        </div>
                    </div>





                    {{-- planProteinsBoxColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan Proteins</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planProteinsBoxColor">
                        </div>
                    </div>




                    {{-- planFatsBoxColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan Fats</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planFatsBoxColor">
                        </div>
                    </div>









                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}



                    {{-- 3rd --}}

                    <div class="col-12 mb-3">
                        <hr>
                    </div>








                    {{-- bundle --}}


                    {{-- bundleBoxColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Box</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundleBoxColor">
                        </div>
                    </div>






                    {{-- bundleBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Border</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundleBorderColor">
                        </div>
                    </div>






                    {{-- bundleMotionColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Motion</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundleMotionColor">
                        </div>
                    </div>





                    {{-- bundlePickColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Pick</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundlePickColor">
                        </div>
                    </div>




                    {{-- bundlePickActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Pick<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Active"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundlePickActiveColor">
                        </div>
                    </div>






                    {{-- bundlePickShadowColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Pick<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Shadow"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundlePickShadowColor">
                        </div>
                    </div>





                    {{-- bundlePickShadowActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Bundle Pick<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Active Shadow"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bundlePickShadowActiveColor">
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}



                    {{-- planRanges --}}



                    {{-- planRangeBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Range Border</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planRangeBorderColor">
                        </div>
                    </div>








                    {{-- planRangeBorderActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Range Border<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Extended to Background (Active)"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planRangeBorderActiveColor">
                        </div>
                    </div>









                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}



                    {{-- planDays --}}



                    {{-- planDaysBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Duration Border</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planDaysBorderColor">
                        </div>
                    </div>








                    {{-- planDaysBorderActiveColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Duration Border<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Extended to Background (Active)"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planDaysBorderActiveColor">
                        </div>
                    </div>









                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}



                    {{-- preference --}}




                    {{-- preferenceLineColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Preference Line</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.preferenceLineColor">
                        </div>
                    </div>






                    {{-- preferenceInfoColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Preference Icon</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.preferenceInfoColor">
                        </div>
                    </div>











                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}



                    {{-- 4th --}}

                    <div class="col-12 mb-3">
                        <hr>
                    </div>



                    {{-- pickPreference --}}




                    {{-- pickPreferenceTextColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Switch Plans<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Plan Name"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.pickPreferenceTextColor">
                        </div>
                    </div>







                    {{-- summary --}}




                    {{-- summaryBundleColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Summary Bundle</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.summaryBundleColor">
                        </div>
                    </div>







                    {{-- summaryBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Summary Border</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.summaryBorderColor">
                        </div>
                    </div>







                    {{-- summarySpecialBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Summary Border<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Between Plan & Start Date"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.summarySpecialBorderColor">
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- address --}}



                    {{-- addressMotionColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Address Motion</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.addressMotionColor">
                        </div>
                    </div>




                    {{-- addressActiveMotionColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Address Motion<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Active"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.addressActiveMotionColor">
                        </div>
                    </div>







                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- invoice --}}



                    {{-- invoiceMotionColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Invoice Motion</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.invoiceMotionColor">
                        </div>
                    </div>






                    {{-- invoiceTableBorderColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Invoice Table<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Table / Section Border Color"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.invoiceTableBorderColor">
                        </div>
                    </div>







                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}










                    {{-- 2: backgrounds --}}
                    <div class="col-12 mt-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75 hr--sub-section" />
                            <label
                                class="form-label form--label px-3 w-25 justify-content-center mb-0">Background</label>
                        </div>
                    </div>








                    {{-- body --}}



                    {{-- bodyBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bodyBackgroundColor">
                        </div>
                    </div>









                    {{-- bodyBackgroundFirstColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body Bubbles<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="1st"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bodyBackgroundFirstColor">
                        </div>
                    </div>






                    {{-- bodyBackgroundSecondColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body Bubbles<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="2nd"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bodyBackgroundSecondColor">
                        </div>
                    </div>






                    {{-- bodyBackgroundThirdColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body Bubbles<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="3rd"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bodyBackgroundThirdColor">
                        </div>
                    </div>





                    {{-- bodyBackgroundFourthColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Body Bubbles<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="4th"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.bodyBackgroundFourthColor">
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- navbar --}}


                    {{-- navbarBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Navbar</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.navbarBackgroundColor">
                        </div>
                    </div>






                    {{-- planMacro --}}

                    {{-- planMacroBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Plan Macro</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planMacroBackgroundColor">
                        </div>
                    </div>







                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- daysDiscount --}}

                    {{-- planDaysDiscountBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Discount Box<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Plan Days Discount"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.planDaysDiscountBackgroundColor">
                        </div>
                    </div>






                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}




                    {{-- input --}}

                    {{-- inputBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Input</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.inputBackgroundColor">
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}








                    {{-- button --}}





                    {{-- buttonBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Button</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.buttonBackgroundColor">
                        </div>
                    </div>





                    {{-- buttonHoverBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Button<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Hover"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.buttonHoverBackgroundColor">
                        </div>
                    </div>









                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- modal --}}





                    {{-- modalBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Popups</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.modalBackgroundColor">
                        </div>
                    </div>







                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}



                    {{-- 2nd --}}
                    <div class="col-12 mb-3">
                        <hr>
                    </div>






                    {{-- preference --}}


                    {{-- preferenceBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Preference</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.preferenceBackgroundColor">
                        </div>
                    </div>




                    {{-- preferenceBagBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Preference Bag</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.preferenceBagBackgroundColor">
                        </div>
                    </div>







                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- pickPreference --}}






                    {{-- pickPreferenceBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Pick Preference</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.pickPreferenceBackgroundColor">
                        </div>
                    </div>







                    {{-- pickPreferenceHoverBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Pick Preference<i
                                    class="bi bi-info-circle" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Backrground Shadow on Hover"></i></label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.pickPreferenceHoverBackgroundColor">
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- summary --}}





                    {{-- summaryBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Summary</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.summaryBackgroundColor">
                        </div>
                    </div>







                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- address --}}



                    {{-- addressBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Address</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.addressBackgroundColor">
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- invoice --}}



                    {{-- invoiceBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Invoice</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.invoiceBackgroundColor">
                        </div>
                    </div>





                    {{-- invoiceMidSectionBackgroundColor --}}
                    <div class="col-4">
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 80%">Invoice Mid-Section</label>
                            <input type="color" class="form--input py-1 pointer" required=""
                                wire:model="instance.invoiceMidSectionBackgroundColor">
                        </div>
                    </div>












                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}










                    {{-- 3: features --}}
                    <div class="col-12 mt-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <hr class="w-75 hr--sub-section" />
                            <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Features</label>
                        </div>
                    </div>






                    {{-- plans --}}




                    {{-- showPlanMacros --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Plan Macros<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Macro Boxes"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showPlanMacros' value='{{ $instance?->showPlanMacros }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>









                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- bundle --}}






                    {{-- showBundlePicture --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Bundle Picture<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Hover or Select"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showBundlePicture' value='{{ $instance?->showBundlePicture }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>











                    {{-- showBundleMotion --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Bundle Motion<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Border Animation"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showBundleMotion' value='{{ $instance?->showBundleMotion }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>




                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}




                    {{-- planDays --}}



                    {{-- showPlanDaysDiscount --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Discount Box<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Plan Days Discount"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showPlanDaysDiscount'
                                value='{{ $instance?->showPlanDaysDiscount }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>








                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- preference - button --}}




                    {{-- showPreferenceBag --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Preference Bag<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Cooler-Bag Picture"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showPreferenceBag' value='{{ $instance?->showPreferenceBag }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>







                    {{-- showButtonMotion --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Button Motion<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Blob Animation"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showButtonMotion' value='{{ $instance?->showButtonMotion }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>












                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- pickPreference - summaryBundle --}}





                    {{-- showPickPreference --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Pick Preference<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Switch Plans Section"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showPickPreference'
                                value='{{ $instance?->showPickPreference }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>






                    {{-- showSummaryBundlePicture --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Summary Bundle<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Bundle Picture"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showSummaryBundlePicture'
                                value='{{ $instance?->showSummaryBundlePicture }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>













                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- showAddressMotion - showReferral --}}





                    {{-- showAddressMotion --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Address Motion<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Border Animation"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showAddressMotion' value='{{ $instance?->showAddressMotion }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>






                    {{-- showSummaryBundlePicture --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Referral Code</label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showSummaryBundlePicture'
                                value='{{ $instance?->showSummaryBundlePicture }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>









                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}






                    {{-- showInvoiceText - showInvoiceMotion --}}






                    {{-- showInvoiceText --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Invoice Caption<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Top Caption Before Invoice"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showInvoiceText' value='{{ $instance?->showInvoiceText }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>








                    {{-- showInvoiceMotion --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Invoice Motion<i class="bi bi-info-circle"
                                data-bs-toggle="tooltip" data-bss-tooltip="" title="Border Animation"></i></label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--plan-form-select"
                                data-instance='instance.showInvoiceMotion' value='{{ $instance?->showInvoiceMotion }}'>
                                <option value=""></option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>







                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}
                    {{-- --------------------------------------- --}}









                    {{-- :: submitButton --}}
                    <div class="col-12 text-center mt-3">
                        <button wire:loading.attr='disabled'
                            class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                            wire:target='update'>
                            Save
                        </button>
                    </div>



                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
    {{-- endCol --}}

































    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- selectHandle --}}
    <script>
        $(".form--plan-form-select").on("change", function(event) {

         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');

         @this.set(instance, selectValue);

      }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</div>
{{-- endRow --}}