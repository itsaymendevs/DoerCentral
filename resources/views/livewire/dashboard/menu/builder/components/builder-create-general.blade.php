{{-- generalForm --}}
<form class="row pt-2" wire:submit='store' wire:ignore>



    {{-- leftCol --}}
    <div class="col-7 align-self-center">
        <div class="row align-items-end">


            {{-- name --}}
            <div class="col-12">
                <label class="form-label form--label">Name</label>
                <input class="form-control form--input mb-4" type="text" wire:model='instance.name' required />
            </div>






            {{-- type --}}
            <div class="col-4" wire:ignore>
                <label class="form-label form--label">Type</label>
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='instance.typeId' required>
                        <option value=""></option>

                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>







            {{-- dietType --}}
            <div class="col-4" wire:ignore>
                <label class="form-label form--label">Diet</label>
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='instance.dietId' required>
                        <option value=""></option>

                        @foreach ($diets as $diet)
                        <option value="{{ $diet->id }}">{{ $diet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>






            {{-- cuisine --}}
            <div class="col-4" wire:ignore>
                <label class="form-label form--label">Cuisine</label>
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='instance.cuisineId' data-clear='true'>
                        <option value=""></option>

                        @foreach ($cuisines as $cuisine)
                        <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>










            {{-- ------------------------------- --}}
            {{-- ------------------------------- --}}














            {{-- category --}}
            <div class="col-4" wire:ignore>
                <label class="form-label form--label">Category</label>
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='instance.category' data-clear='true'>
                        <option value=""></option>

                        @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach

                    </select>
                </div>
            </div>








            {{-- validity --}}
            <div class="col-4">
                <label class="form-label form--label">Validity</label>
                <input class="form-control form--input mb-4" type="number" step="1" wire:model='instance.validity'
                    required />
            </div>







            {{-- price (Hidden) --}}
            <div class="col-4">
                <label class="form-label form--label">Price<small
                        class="ms-1 fw-semibold text-gold fs-9">(AED)</small></label>
                <input class="form-control form--input mb-4" type="number" wire:model='instance.servingPrice'
                    step="0.01" />
            </div>










            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}







            {{-- HR --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between hr--title">
                    <hr class="w-100" />
                    <label class="form-label form--label px-5 mb-0">Extra</label>
                </div>
            </div>







            {{-- tags --}}
            <div class="col-12" wire:ignore>
                <label class="form-label form--label">Tags</label>
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='instance.tags' multiple="">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>







            {{-- Description --}}
            <div class="col-8">
                <label class="form-label form--label">Description</label>
                <textarea class="form-control form--input form--textarea" wire:model='instance.desc'></textarea>
            </div>




            {{-- submitButton --}}
            <div class="col-4 text-center mt-2">
                <button
                    class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                    style="border: 1px dashed var(--color-scheme-3)" wire:loading.attr='disabled'
                    wire:target='store, instance.imageFile, instance.secondImageFile, instance.thirdImageFile, instance.fourthImageFile, instance.tags, instance.isVegetarian, instance.cuisineId'>
                    Create
                </button>
            </div>




        </div>
    </div>
    {{-- end leftCol --}}








    {{-- --------------------------------------------- --}}
    {{-- --------------------------------------------- --}}






    {{-- rightCol --}}
    <div class="col-5">
        <div class="row">


            {{-- 1: imageFile --}}
            <div class="col-6">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    for="item--file-1" title="Click To Upload">


                    {{-- caption --}}
                    <span class="upload--caption badge">Regular Plate</span>


                    {{-- input --}}
                    <input class="form-control d-none file--input" id="item--file-1" data-preview="item--preview-1"
                        type="file" required accept="image/*" wire:model='instance.imageFile' />


                    {{-- preview --}}
                    <img class="inventory--image-frame" id="item--preview-1"
                        src="{{ asset('assets/img/placeholder.png') }}" />


                    {{-- icon --}}
                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                        </path>
                    </svg>
                </label>
            </div>







            {{-- 2: secondImageFile --}}
            <div class="col-6">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    for="item--file-2" title="Click To Upload">


                    {{-- caption --}}
                    <span class="upload--caption badge">Food Container</span>




                    {{-- input --}}
                    <input class="form-control d-none file--input" id="item--file-2" data-preview="item--preview-2"
                        type="file" required wire:model='instance.secondImageFile' accept="image/*" />


                    {{-- preview --}}
                    <img class="inventory--image-frame" id="item--preview-2"
                        src="{{ asset('assets/img/placeholder.png') }}" />


                    {{-- icon --}}
                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                        </path>
                    </svg>
                </label>
            </div>









            {{-- :: permission - hasExtraPictures --}}
            @if ($versionPermission->menuModuleHasBuilderExtraPictures)





            {{-- thirdImageFile --}}
            <div class="col-6">
                <label class="col-form-label upload--wrap " data-bs-toggle="tooltip" data-bss-tooltip=""
                    for="item--file-3" title="Click To Upload">


                    {{-- input --}}
                    <input class="form-control d-none file--input" id="item--file-3" data-preview="item--preview-3"
                        type="file" wire:model='instance.thirdImageFile' accept="image/*" />


                    {{-- preview --}}
                    <img class="inventory--image-frame" id="item--preview-3"
                        src="{{ asset('assets/img/placeholder.png') }}" />


                    {{-- icon --}}
                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                        </path>
                    </svg>
                </label>
            </div>






            {{-- fourthImageFile --}}
            <div class="col-6">
                <label class="col-form-label upload--wrap " data-bs-toggle="tooltip" data-bss-tooltip=""
                    for="item--file-4" title="Click To Upload">


                    {{-- input --}}
                    <input class="form-control d-none file--input" id="item--file-4" data-preview="item--preview-4"
                        type="file" wire:model='instance.fourthImageFile' accept="image/*" />


                    {{-- preview --}}
                    <img class="inventory--image-frame" id="item--preview-4"
                        src="{{ asset('assets/img/placeholder.png') }}" />


                    {{-- icon --}}
                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                        </path>
                    </svg>
                </label>
            </div>
            {{-- endCol --}}





            @endif
            {{-- end if - permission --}}





        </div>
    </div>
    {{-- endRow --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select, .form--modal-select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}




</form>
{{-- endForm --}}