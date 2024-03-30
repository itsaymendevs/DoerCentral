<section id="content--section" class="content--section">
    <div class="container">



        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Label Builder' />









        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- mainRow --}}
        <div class="row align-items-end pt-2 mb-5">



            {{-- labelCol --}}
            <div class="col-7">
                <div class="row justify-content-center">


                    {{-- backgroundContainer --}}
                    <div class="col-12">
                        <div class="sticker--label-layout sticky--div mb-4"
                            style="background-image: url({{ asset('storage/kitchen/containers/' . $containers?->first()?->imageFile) }});">


                            {{-- sticker - label --}}
                            <div class="sticker--label mx-auto"></div>

                        </div>
                    </div>






                    {{-- width --}}
                    <div class="col-5">
                        <label class="form-label form--label">Width
                            <small class="ms-1 fw-semibold text-gold fs-9">(CM)</small>
                        </label>
                        <input type="text" class="form--input mb-4" />
                    </div>




                    {{-- height --}}
                    <div class="col-5">
                        <label class="form-label form--label">Height
                            <small class="ms-1 fw-semibold text-gold fs-9">(CM)</small>
                        </label>
                        <input type="text" class="form--input mb-4" />
                    </div>






                    {{-- colors --}}
                    <div class="col-10">


                        {{-- 1: background --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Background</label>
                            <input type="color" class="form--input py-1 pointer" />
                        </div>


                        {{-- labelBackground --}}
                        <div class="input--with-label mb-3">
                            <label class="form-label form--label mb-0" style="width: 45%">Label Background</label>
                            <input type="color" class="form--input py-1 pointer" />
                        </div>


                        {{-- fontColor --}}
                        <div class="input--with-label">
                            <label class="form-label form--label mb-0" style="width: 45%">Font Color</label>
                            <input type="color" class="form--input py-1 pointer" />
                        </div>
                    </div>





                </div>
            </div>
            {{-- endRightCol --}}








            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}





            {{-- customisationCol --}}
            <div class="col-5">
                <div class="row">


                    {{-- name --}}
                    <div class="col-12">
                        <label class="form-label form--label">Name</label>
                        <input type="text" class="form--input mb-4" />
                    </div>




                    {{-- containers --}}
                    <div class="col-12" wire:ignore>
                        <label class="form-label form--label">Containers</label>
                        <div class="select--single-wrapper mb-4">
                            <select class="form-select form--select" multiple="" required>
                                @foreach ($containers as $container)
                                <option value="{{ $container->id }}">{{ $container->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>






                    {{-- descritpion --}}
                    <div class="col-12">
                        <label class="form-label form--label">Description</label>
                        <textarea class="form--input form--textarea mb-4" style="height: 70px"></textarea>
                    </div>








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
                                Logo
                            </label>
                        </div>
                    </div>






                    {{-- Tags --}}
                    <div class="col-12 mb-2">
                        <div class="row">


                            {{-- QR --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-1" />
                                    <label class="form-check-label fs-14" for="formCheck-1">QR Code</label>
                                </div>
                            </div>




                            {{-- price --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-2" />
                                    <label class="form-check-label fs-14" for="formCheck-2">Price</label>
                                </div>
                            </div>






                            {{-- productionDate --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-3" />
                                    <label class="form-check-label fs-14" for="formCheck-3">Production Date</label>
                                </div>
                            </div>





                            {{-- customerName --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-4" />
                                    <label class="form-check-label fs-14" for="formCheck-4">Customer Name</label>
                                </div>
                            </div>





                            {{-- allergy - excludes --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-5" />
                                    <label class="form-check-label fs-14" for="formCheck-5">Allergy & Exclude</label>
                                </div>
                            </div>




                            {{-- servingInstructions --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-6" />
                                    <label class="form-check-label fs-14" for="formCheck-6">Serving Instructions</label>
                                </div>
                            </div>





                            {{-- mealRemarks --}}
                            <div class="col-6">
                                <div class="form-check form-switch mb-3 mealType--checkbox">
                                    <input class="form-check-input pointer sm" type="checkbox" id="formCheck-7" />
                                    <label class="form-check-label fs-14" for="formCheck-7">Meal Remarks</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- endTags --}}











                    {{-- -------------------------------- --}}
                    {{-- -------------------------------- --}}







                    {{-- imageFile - remarks --}}
                    <div class="col-12">
                        <div>


                            {{-- label --}}
                            <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                title="Click To Upload" for="label--file-1">


                                {{-- input --}}
                                <input type="file" id="label--file-1" class="d-none file--input"
                                    data-preview="label--preview-1" />


                                {{-- preview --}}
                                <img id="label--preview-1" class="inventory--image-frame"
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
                                height values fall within the range of 20 centimeters.
                            </p>
                        </div>
                    </div>
                    {{-- endCol --}}





                </div>
            </div>
            {{-- end rightCol --}}




        </div>
    </div>
    {{-- endContainer --}}












    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







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