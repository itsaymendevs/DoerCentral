<section id="content--section" class="content--section">
    <div class="container">



        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Label Builder' />





        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- form --}}
        <form wire:submit='store' class="row align-items-start pt-2 mb-5">



            {{-- labelCol --}}
            <div class="col-7">
                <div class="row justify-content-center">



                    {{-- submitButton --}}
                    <div class="col-12 text-center mb-4">

                        <button
                            class="btn btn--scheme btn--scheme-1 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 fs-5 fw-semibold"
                            wire:loading.attr='disabled'
                            wire:target='store, instance.imageFile, instance.footerImageFile'>Save</button>
                    </div>











                    {{-- backgroundContainer --}}
                    <div class="col-12">
                        <div class="sticker--label-layout sticky--div mb-4"
                            style="
                            background-image: url({{ asset('storage/kitchen/containers/' . $containers?->first()?->imageFile) }});">



                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}



                            {{-- sticker - label --}}
                            <div class="sticker--label mx-auto position-relative
                            @if ($instance->isVertical) vertical @endif" style="width: {{ $instance->width ?? 100 }}mm;
                                height: {{ $instance->height ?? 70 }}mm;
                                border-radius: {{ $instance->radius ?? 0 }}px;
                                padding-top: {{ $instance->paddingTop  ?? 0 }}mm;
                                padding-bottom: {{ $instance->paddingBottom  ?? 0 }}mm;
                                background-color: {{ $instance->backgroundColor ?? '#fff' }};
                                border-color: {{ $instance->borderColor ?? '#fff' }};
                                color: {{ $instance->fontColor ?? '#000' }};
                                ">









                                {{-- TEXT ONLY --}}


                                {{-- 1.5: top --}}
                                <div class='sticker--label-header d-flex justify-content-around align-items-center'
                                    style="padding-left: {{ $instance->paddingLeft  ?? 0 }}mm;
                                        padding-right: {{ $instance->paddingRight  ?? 0 }}mm;
                                        border-color: {{ $instance->borderColor  ?? '#c2c3c5' }}">




                                    {{-- leftSection --}}
                                    <div style="border-color: {{ $instance->borderColor  ?? '#c2c3c5' }}">


                                        {{-- customerName --}}

                                        @if ($instance->showCustomerName)

                                        <h4 class='fw-semibold sticker--label-customer mb-1'>Richard Branson
                                        </h4>

                                        @endif
                                        {{-- end if - showHide --}}






                                        {{-- mealName --}}

                                        @if ($instance->showMealName)

                                        <h4 class='fw-normal sticker--label-meal mb-2'>{{ ($instance->isVertical) ?
                                            'Chocolate Cookies' : 'Grilled chicken with mashed potato' }}
                                        </h4>

                                        @endif
                                        {{-- end if - showHide --}}



                                    </div>
                                    {{-- endLeftSection --}}











                                    {{-- rightSection / bottomSection --}}
                                    <div class='text-start @if (!$instance->isVertical) ps-3 @endif'>
                                        <h4 class='fw-normal sticker--label-general-tag mb-1 fs-10'>Your Nutritious {{
                                            ($instance->isVertical) ? 'Snack' : 'Breakfast' }}
                                        </h4>




                                        {{-- servingInstructions --}}

                                        @if ($instance->showServingInstructions)

                                        <h4 class='fw-normal sticker--label-tags mb-2 fs-10'>
                                            <span class='fw-normal me-1 fs-10'>{{ ($instance->isVertical) ?
                                                $servingInstructions[0] :$servingInstructions[1] }}
                                            </span>
                                        </h4>

                                        @endif
                                        {{-- end if - showHide --}}


                                    </div>



                                </div>
                                {{-- endTop --}}







                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}











                                {{-- 2: middle --}}
                                <div class='sticker--label-content d-flex justify-content-around align-items-center '
                                    style="padding-left: {{ $instance->paddingLeft  ?? 0 }}mm;
                                        padding-right: {{ $instance->paddingRight  ?? 0 }}mm;">




                                    {{-- leftSection --}}
                                    <div
                                        class='text-start smaller-section
                                        @if(!$instance->showProductionDate && !$instance->showExpiryDate) d-none @endif'>




                                        {{-- 1: production --}}

                                        @if($instance->showProductionDate)

                                        <div>
                                            <h4 class='fw-normal sticker--label-production mb-1'>
                                                {{ $instance->isVertical ? 'Prod.' : 'Prod. Date' }}
                                            </h4>

                                            <h4 class='fw-semibold sticker--label-production mb-3'>
                                                {{ $instance->isVertical ?
                                                date('d.m.Y', strtotime($globalCurrentDate)) :
                                                date('d . m . Y', strtotime($globalCurrentDate)) }}
                                            </h4>
                                        </div>

                                        @endif
                                        {{-- end if - showHide --}}









                                        {{-- 2: expiry --}}

                                        @if($instance->showExpiryDate)

                                        <div>
                                            <h4 class='fw-normal sticker--label-expiry mb-1'>
                                                {{ $instance->isVertical ? 'Expiry.' : 'Expiry Date' }}
                                            </h4>
                                            <h4 class='fw-semibold sticker--label-expiry mb-0'>
                                                {{ $instance->isVertical ?
                                                date('d.m.Y', strtotime($globalNextDate)) :
                                                date('d . m . Y', strtotime($globalNextDate)) }}
                                            </h4>
                                        </div>



                                        @endif
                                        {{-- end if - showHide --}}



                                    </div>
                                    {{-- endLeftSection --}}













                                    {{-- rightSection --}}
                                    <div
                                        class='text-center larger-section d-flex justify-content-evenly h-100 align-items-center'>





                                        {{-- :: mealMacros --}}

                                        @if ($instance->showMealMacros)



                                        {{-- :: cals --}}
                                        <h4 class='sticker--label-macro calories'
                                            style="border-color: {{ $instance->caloriesColor ?? 'revert-layer' }}; color: {{ $instance->caloriesColor ?? 'revert-layer' }}">
                                            <span class='sticker--label-macro-caption fw-semibold'>KCAL</span>
                                            <span class='sticker--label-macro-value'
                                                style="color: {{ $instance->fontColor }}">240</span>
                                        </h4>





                                        {{-- :: carbs --}}
                                        <h4 class='sticker--label-macro carbs'
                                            style="border-color: {{ $instance->carbsColor ?? 'revert-layer' }}; color: {{ $instance->carbsColor ?? 'revert-layer' }}">
                                            <span class='sticker--label-macro-caption fw-semibold'>Carbs</span>
                                            <span class='sticker--label-macro-value'
                                                style="color: {{ $instance->fontColor }}">70</span>
                                        </h4>






                                        {{-- :: proteins --}}
                                        <h4 class='sticker--label-macro proteins'
                                            style="border-color: {{ $instance->proteinsColor ?? 'revert-layer' }}; color: {{ $instance->proteinsColor ?? 'revert-layer' }}">
                                            <span class='sticker--label-macro-caption fw-semibold'>Prot</span>
                                            <span class='sticker--label-macro-value'
                                                style="color: {{ $instance->fontColor }}">30</span>
                                        </h4>





                                        {{-- :: fats --}}
                                        <h4 class='sticker--label-macro fats'
                                            style="border-color: {{ $instance->fatsColor ?? 'revert-layer' }}; color: {{ $instance->fatsColor ?? 'revert-layer' }}">
                                            <span class='sticker--label-macro-caption fw-semibold'>Fat</span>
                                            <span class='sticker--label-macro-value'
                                                style="color: {{ $instance->fontColor }}">12</span>
                                        </h4>




                                        @endif
                                        {{-- end if - showHide --}}



                                    </div>
                                    {{-- endSection --}}







                                </div>
                                {{-- endMiddle --}}









                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}






                                {{-- 3: bottom --}}

                                @if ($instance->showFooterImageFile)


                                <div class='sticker--label-footer d-flex flex-column'>

                                    <img id='footer--preview-2' class='of-cover w-100 h-100'
                                        src=" {{ asset('assets/img/Labels/placeholder.png') }}" wire:ignore.self>

                                </div>
                                {{-- endBottom --}}



                                @endif
                                {{-- end if - showHide --}}





                            </div>
                            {{-- endSticker --}}



                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}




                        </div>
                    </div>
                    {{-- end backgroundContainer --}}













                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}
                    {{-- ------------------------------------------- --}}











                    {{-- width --}}
                    <div class=" col-4">
                        <label class="form-label form--label">Width
                            <small class="ms-1 fw-semibold text-gold fs-9">(MM)</small>
                        </label>
                        <input type="number" step='0.1' class="form--input mb-4" required
                            wire:model.live='instance.width' />
                    </div>




                    {{-- height --}}
                    <div class="col-4">
                        <label class="form-label form--label">Height
                            <small class="ms-1 fw-semibold text-gold fs-9">(MM)</small>
                        </label>
                        <input type="number" step='0.1' class="form--input mb-4" required
                            wire:model.live='instance.height' />
                    </div>







                    {{-- radius --}}
                    <div class="col-2">
                        <label class="form-label form--label">Radius
                            <small class="ms-1 fw-semibold text-gold fs-9">(PX)</small>
                        </label>
                        <input type="number" step='0.1' class="form--input mb-4" wire:model.live='instance.radius' />
                    </div>







                    {{-- ---------------------------- --}}
                    {{-- ---------------------------- --}}








                    {{-- paddingLeft --}}
                    <div class="col-3">
                        <label class="form-label form--label">Padding Left
                            <small class="ms-1 fw-semibold text-gold fs-9">(MM)</small>
                        </label>
                        <input type="number" step='0.1' max='2' class="form--input mb-4"
                            wire:model.live='instance.paddingLeft' />
                    </div>



                    {{-- paddingRight --}}
                    <div class="col-2">
                        <label class="form-label form--label">Right
                            <small class="ms-1 fw-semibold text-gold fs-9">(MM)</small>
                        </label>
                        <input type="number" step='0.1' max='2' class="form--input mb-4"
                            wire:model.live='instance.paddingRight' />
                    </div>




                    {{-- paddingTop --}}
                    <div class="col-2">
                        <label class="form-label form--label">Top
                            <small class="ms-1 fw-semibold text-gold fs-9">(MM)</small>
                        </label>
                        <input type="number" step='0.1' max='2' class="form--input mb-4"
                            wire:model.live='instance.paddingTop' />
                    </div>




                    {{-- paddingBottom --}}
                    <div class="col-3">
                        <label class="form-label form--label">Bottom
                            <small class="ms-1 fw-semibold text-gold fs-9">(MM)</small>
                        </label>
                        <input type="number" step='0.1' max='2' class="form--input mb-4"
                            wire:model.live='instance.paddingBottom' />
                    </div>









                    {{-- ---------------------------- --}}
                    {{-- ---------------------------- --}}








                    {{-- colors --}}
                    <div class="col-10">





                        {{-- fontColor --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Font</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.fontColor' />
                        </div>






                        {{-- border --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Border</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.borderColor' />
                        </div>






                        {{-- background --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Background</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.backgroundColor' />
                        </div>






                        {{-- ----------------------- --}}
                        {{-- ----------------------- --}}





                        {{-- caloriesColor --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">KCal Box</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.caloriesColor' />
                        </div>







                        {{-- carbsColor --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Carbs Box</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.carbsColor' />
                        </div>





                        {{-- proteinsColor --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Protein Box</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.proteinsColor' />
                        </div>







                        {{-- fatsColor --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Fat Box</label>
                            <input type="color" class="form--input py-1 pointer" required
                                wire:model.live='instance.fatsColor' />
                        </div>








                    </div>
                    {{-- endCol --}}



                </div>
            </div>
            {{-- endRightCol --}}








            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}





            {{-- customisationCol --}}
            <div class="col-5">
                <div class="row">


                    {{-- name --}}
                    <div class="col-7">
                        <label class="form-label form--label">Name</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.name' />
                    </div>





                    {{-- charge --}}
                    <div class="col-5">
                        <label class="form-label form--label">Charge
                            <small class="ms-1 fw-semibold text-gold fs-9">(AED)</small>
                        </label>
                        <input type="number" step='0.01' class="form--input mb-4" required
                            wire:model='instance.charge' />
                    </div>





                    {{-- containers --}}
                    <div class="col-12" wire:ignore>
                        <label class="form-label form--label">Containers</label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select" multiple="" data-instance='instance.containers'>
                                @foreach ($containers as $container)
                                <option value="{{ $container->id }}">{{ $container->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>






                    {{-- descritpion --}}
                    <div class="col-12">
                        <label class="form-label form--label">Description</label>
                        <textarea class="form--input form--textarea mb-4" style="height: 70px"
                            wire:model='instance.desc'></textarea>
                    </div>







                    {{-- poster (poster) --}}
                    <div class="col-12 mb-4">
                        <div>


                            {{-- label --}}
                            <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Click To Upload" for="poster--file-1">




                                {{-- caption --}}
                                <span class="upload--caption badge">For Preview Only</span>




                                {{-- input --}}
                                <input type="file" id="poster--file-1" class="d-none file--input"
                                    data-preview="poster--preview-1" wire:model='instance.imageFile' required />


                                {{-- preview --}}
                                <img id="poster--preview-1" class="inventory--image-frame"
                                    src="{{ asset('assets/img/placeholder.png') }}" style="height: 180px" wire:ignore />


                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-cloud-upload">
                                    <path fill-rule="evenodd"
                                        d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                    </path>
                                </svg>
                            </label>
                        </div>


                    </div>
                    {{-- endCol --}}









                    {{-- ------------------------------- --}}
                    {{-- ------------------------------- --}}







                    {{-- heading / title --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 mb-0 w-50 justify-content-center">Tags
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-dot fs-5 mx-1">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                </svg>
                                Footer
                            </label>
                        </div>
                    </div>






                    {{-- Tags --}}
                    <div class="col-12 mb-2">
                        <div class="row">




                            {{-- vertical --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-0"
                                        wire:model.live='instance.isVertical' />
                                    <label class="form-check-label fs-14" for="formCheck-0">Vertical Label</label>
                                </div>
                            </div>






                            {{-- customerName --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-1"
                                        wire:model.live='instance.showCustomerName' />
                                    <label class="form-check-label fs-14" for="formCheck-1">Customer
                                        Name</label>
                                </div>
                            </div>








                            {{-- MealName --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-2"
                                        wire:model.live='instance.showMealName' />
                                    <label class="form-check-label fs-14" for="formCheck-2">Meal Name</label>
                                </div>
                            </div>





                            {{-- instructions --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-6"
                                        wire:model.live='instance.showServingInstructions' />
                                    <label class="form-check-label fs-14" for="formCheck-6">Serving Instructions</label>
                                </div>
                            </div>









                            {{-- productionDate --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-3"
                                        wire:model.live='instance.showProductionDate' />
                                    <label class="form-check-label fs-14" for="formCheck-3">Production
                                        Date</label>
                                </div>
                            </div>




                            {{-- expiryDate --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-4"
                                        wire:model.live='instance.showExpiryDate' />
                                    <label class="form-check-label fs-14" for="formCheck-4">Expiry
                                        Date</label>
                                </div>
                            </div>






                            {{-- mealMacros --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-5"
                                        wire:model.live='instance.showMealMacros' />
                                    <label class="form-check-label fs-14" for="formCheck-5">Meal Macros</label>
                                </div>
                            </div>










                            {{-- footer --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-7"
                                        wire:model.live='instance.showFooterImageFile' />
                                    <label class="form-check-label fs-14" for="formCheck-7">Footer Picture</label>
                                </div>
                            </div>



                        </div>
                    </div>
                    {{-- endTags --}}











                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}







                    {{-- Footer - remarks --}}
                    <div class="col-12">



                        {{-- 1: imageFile - Footer --}}
                        <div>


                            {{-- label --}}
                            <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Click To Upload" for="footer--file-1">


                                {{-- caption --}}
                                <span class="upload--caption badge">Label's Footer</span>




                                {{-- input --}}
                                <input type="file" id="footer--file-1" class="d-none file--input-for-labels"
                                    data-preview="footer--preview-1" data-preview-label='footer--preview-2'
                                    wire:model='instance.footerImageFile' />


                                {{-- preview --}}
                                <img id="footer--preview-1" class="inventory--image-frame"
                                    src="{{ asset('assets/img/placeholder.png') }}" style="height: 180px" wire:ignore />


                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-cloud-upload">
                                    <path fill-rule="evenodd"
                                        d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                    </path>
                                </svg>
                            </label>
                        </div>







                        {{-- remarks --}}
                        <div class="item--box mt-3">
                            <h5 class="fw-semibold d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-chevron-compact-right me-2 fs-13"
                                    style="fill: var(--color-theme-secondary)">
                                    <path fill-rule="evenodd"
                                        d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z">
                                    </path>
                                </svg>Remark
                            </h5>
                            <p class="fs-15 mb-0">For optimal results, ensure that both the width and
                                height values fall within the range of 100 millimeter.
                            </p>
                        </div>
                    </div>
                    {{-- endCol --}}





                </div>
            </div>
            {{-- end rightCol --}}




        </form>
    </div>
    {{-- endContainer --}}












    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    @section('scripts')


    {{-- 1: labelBuilder --}}
    <script src="{{ asset('assets/js/label-builder.js') }}"></script>



    @endsection
    {{-- endSection --}}













    {{-- select-handle --}}
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