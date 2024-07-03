{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">



        {{-- topRow --}}
        <div class="row align-items-center">



            {{-- backButton --}}
            <div class="col-4" wire:ignore>
                <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
                    data-aos-delay="800" data-aos-once="true">
                    <a wire:navigate href="{{ route('dashboard.blogs') }}"
                        class="btn submenu--group btn--scheme-2 d-flex align-items-center" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-arrow-up-left me-2">
                            <path fill-rule="evenodd"
                                d="M2 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H3.707l10.147 10.146a.5.5 0 0 1-.708.708L3 3.707V8.5a.5.5 0 0 1-1 0v-6z">
                            </path>
                        </svg>Back
                    </a>
                </div>
            </div>





            {{-- title --}}
            <div class="col-4 text-center">
                <h4 class="mb-0 fw-bold">Blog Details</h4>
            </div>







            {{-- sub-menu --}}
            <div class="col-4 text-end">


                <livewire:dashboard.extra.web-apps.components.sub-menu key='submenu' />


            </div>
        </div>
        {{-- end topRow --}}











        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}













        {{-- createForm --}}
        <form wire:submit='store' class="row mt-5 mb-5">



            {{-- hr --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <hr class="w-75" />
                    <label class="form-label form--label px-3 w-25 justify-content-center mb-0">General
                        Information</label>
                </div>
            </div>






            {{-- headerImage --}}
            <div class="col-4 mb-4">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    title="Click To Upload" for="blog--file-1">


                    {{-- size --}}
                    <span class="upload--caption badge" style="max-width: 250px">1920 x 1080</span>


                    {{-- input --}}
                    <input type="file" id="blog--file-1" class="d-none file--input" data-preview="blog--preview-1"
                        wire:model='instance.headerImageFile' required />


                    {{-- preview --}}
                    <img id="blog--preview-1" wire:ignore.self class="inventory--image-frame"
                        src="{{ asset('assets/img/placeholder.png') }}" width="512" height="250"
                        style="aspect-ratio: 2/1" />
                </label>
            </div>








            {{-- mobileImageFile --}}
            <div class="col-4 mb-4">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    title="Click To Upload" for="blog--file-0">


                    {{-- size --}}
                    <span class="upload--caption badge" style="max-width: 250px">640 x 960</span>



                    {{-- input --}}
                    <input type="file" id="blog--file-0" class="d-none file--input" data-preview="blog--preview-0"
                        wire:model='instance.mobileImageFile' required />


                    {{-- preview --}}
                    <img id="blog--preview-0" wire:ignore.self class="inventory--image-frame"
                        src="{{ asset('assets/img/placeholder.png') }}" width="512" height="250"
                        style="aspect-ratio: 2/1" />
                </label>
            </div>








            {{-- imageFile --}}
            <div class="col-4 mb-4">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    title="Click To Upload" for="blog--file-2">


                    {{-- size --}}
                    <span class="upload--caption badge">Card</span>


                    {{-- input --}}
                    <input type="file" id="blog--file-2" class="d-none file--input" data-preview="blog--preview-2"
                        wire:model='instance.imageFile' required />


                    <img id="blog--preview-2" wire:ignore.self class="inventory--image-frame"
                        src="{{ asset('assets/img/placeholder.png') }}" width="512" height="250" />
                </label>
            </div>







            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}








            {{-- midRow --}}
            <div class="col-12">
                <div class="row align-items-center">


                    {{-- title --}}
                    <div class="col-6">
                        <label class="form-label form--label">Blog Title</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.title' />
                    </div>





                    {{-- tags --}}
                    <div class="col-3" wire:ignore>
                        <label class="form-label form--label">Tags</label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--tag-select" id='tags-select-1'
                                data-instance='instance.tags' data-tags='true' multiple=''>
                            </select>
                        </div>
                    </div>




                    {{-- author --}}
                    <div class="col-3">
                        <label class="form-label form--label">Author</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.author' />
                    </div>






                    {{-- --------------------------- --}}
                    {{-- --------------------------- --}}






                    {{-- subtitle --}}
                    <div class="col-9">
                        <label class="form-label form--label">Subtitle</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.subtitle' />
                    </div>




                    <div class="col-3">

                    </div>





                    {{-- --------------------------- --}}
                    {{-- --------------------------- --}}







                    {{-- summary --}}
                    <div class="col-9">
                        <label class="form-label form--label">Summary</label>
                        <textarea class="form-control form--input form--textarea mb-4" wire:model='instance.summary'
                            maxlength="200"></textarea>
                    </div>







                    {{-- togglers --}}
                    <div class="col-3">



                        {{-- 1: darkMode --}}
                        <div class="form-check form-switch mb-0 mealType--checkbox justify-content-center mb-3">


                            <input class="form-check-input pointer" id="isDarkMode-checkbox" type="checkbox"
                                wire:model="instance.isDarkMode" wire:loading.attr="disabled">


                            <label class="form-check-label d-flex w-50 justify-content-center"
                                wire:loading.attr="disabled" for="isDarkMode-checkbox">Dark
                                Mode</label>

                        </div>



                        {{-- 2: centerSlider --}}
                        <div class="form-check form-switch mb-0 mealType--checkbox justify-content-center">


                            <input class="form-check-input pointer" id="centerize-checkbox" type="checkbox"
                                wire:model="instance.isCenter" wire:loading.attr="disabled">


                            <label class="form-check-label d-flex w-50 justify-content-center"
                                wire:loading.attr="disabled" for="centerize-checkbox">Center
                                Slider</label>

                        </div>

                    </div>
                    {{-- end togglers --}}










                    {{-- submitButton --}}
                    <div class="col-9 text-center d-flex justify-content-center align-items-end">
                        <button wire:loading.attr='disabled'
                            wire:target='instance.imageFile, instance.headerImageFile, instance.mobileImageFile, store'
                            class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                            style="border: 1px dashed var(--color-theme-secondary)">Create</button>
                    </div>
                </div>


            </div>
        </form>
        {{-- endForm --}}







    </div>
    {{-- endContainer --}}











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(document).ready(function() {
            $(".form--tag-select").on("change", function(event) {

                // 1.1: getValue - instance
                selectValue = $(this).select2('val');
                instance = $(this).attr('data-instance');


                @this.set(instance, selectValue);

            }); //end function
        });
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</section>
{{-- endSection --}}