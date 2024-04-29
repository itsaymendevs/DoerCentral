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


                <livewire:dashboard.extra.components.sub-menu />


            </div>
        </div>
        {{-- end topRow --}}











        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}













        {{-- createForm --}}
        <form wire:submit='update' class="row mt-5 mb-5">



            {{-- hr --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <hr class="w-75" />
                    <label class="form-label form--label px-3 w-25 justify-content-center mb-0">General
                        Information</label>
                </div>
            </div>






            {{-- headerImage --}}
            <div class="col-8 mb-4">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    title="Click To Upload" for="blog--file-1">


                    {{-- size --}}
                    <span class="upload--caption badge">2:1 Header</span>


                    {{-- input --}}
                    <input type="file" id="blog--file-1" class="d-none file--input" data-preview="blog--preview-1"
                        wire:model='instance.headerImageFile' />


                    {{-- preview --}}
                    <img id="blog--preview-1" wire:ignore.self class="inventory--image-frame"
                        src="{{ asset('assets/img/placeholder.png') }}" width="512" height="250"
                        style="aspect-ratio: 2/1" />
                </label>
            </div>







            {{-- imageFile --}}
            <div class="col-4 mb-4">
                <label class="col-form-label upload--wrap mb-2" data-bs-toggle="tooltip" data-bss-tooltip=""
                    title="Click To Upload" for="blog--file-2">


                    {{-- size --}}
                    <span class="upload--caption badge">1:1 Card</span>


                    {{-- input --}}
                    <input type="file" id="blog--file-2" class="d-none file--input" data-preview="blog--preview-2"
                        wire:model='instance.imageFile' />


                    <img id="blog--preview-2" wire:ignore.self class="inventory--image-frame"
                        src="{{ asset('assets/img/placeholder.png') }}" width="512" height="250" />
                </label>
            </div>







            {{-- midRow --}}
            <div class="col-12">
                <div class="row align-items-center">


                    {{-- title --}}
                    <div class="col-5">
                        <label class="form-label form--label">Blog Title</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.title' />
                    </div>





                    {{-- tags --}}
                    <div class="col-4" wire:ignore>
                        <label class="form-label form--label">Tags</label>
                        <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                            <select class="form-select form--select form--tag-select-2" id='tags-select-2'
                                data-instance='instance.tags' data-trigget='true' data-tags='true' multiple=''>


                                {{-- loop - tags --}}
                                @foreach ($blog?->tags ?? [] as $blogTag)

                                <option value="{{ $blogTag->tag }}" selected>{{ $blogTag->tag }}</option>

                                @endforeach
                                {{-- end loop --}}



                            </select>
                        </div>
                    </div>




                    {{-- author --}}
                    <div class="col-3">
                        <label class="form-label form--label">Author</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.author' />
                    </div>


                    {{-- subtitle --}}
                    <div class="col-9">
                        <label class="form-label form--label">Subtitle</label>
                        <input type="text" class="form--input mb-4" required wire:model='instance.subtitle' />
                    </div>




                    {{-- submitButton --}}
                    <div class="col-3 text-center">
                        <button wire:loading.attr='disabled'
                            wire:target='instance.imageFile, instance.headerImageFile, store'
                            class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                            style="border: 1px dashed var(--color-theme-secondary)">Update</button>
                    </div>
                </div>


            </div>
        </form>
        {{-- endForm --}}










        {{-- --------------------------------------------- --}}
        {{-- --------------------------------------------- --}}










        {{-- blogSections --}}
        <div class="row mt-5 mb-5">



            {{-- title --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mb-4 mt-4">
                    <hr class="w-75" />
                    <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Sections
                        Information</label>
                </div>
            </div>





            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}







            {{-- tableCol --}}
            <div class="col-9">
                <div class="table-responsive memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">



                        {{-- thead --}}
                        <thead>
                            <tr>
                                <th class="th--xl">Section</th>
                                <th class="th--sm"></th>
                            </tr>
                        </thead>






                        {{-- tbody --}}
                        <tbody>




                            {{-- loop - sections --}}
                            @foreach ($sections as $section)

                            <tr key='blog-sections-{{ $section->id }}'>


                                {{-- title --}}
                                <td class="fw-normal fs-13">{{ $section->title }}</td>





                                {{-- actions --}}
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">


                                        {{-- 1: edit --}}
                                        <button type='button' class="btn btn--raw-icon inline edit scale--3"
                                            data-bs-toggle="modal" data-bs-target='#edit-section'
                                            wire:click='editSection({{ $section->id }})'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-fill">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                                                </path>
                                            </svg>
                                        </button>





                                        {{-- 2: remove --}}
                                        <button wire:click='remove({{ $section->id }})' wire:loading.attr='disabled'
                                            class="btn btn--raw-icon inline remove scale--3" type="button"
                                            wire:target='remove'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash-fill">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                {{-- endActions --}}




                            </tr>
                            @endforeach
                            {{-- end loop - sections --}}




                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endCol --}}











            {{-- newButtonCol --}}
            <div class="col-3 text-center">
                <button
                    class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center mt-2"
                    type="button" data-bs-target="#new-section" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-plus-circle-dotted fs-5 me-2">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Section
                </button>
            </div>
        </div>
        {{-- endCol --}}



    </div>
    {{-- endContainer --}}















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(document).ready(function() {
            $(".form--tag-select-2").on("change", function(event) {

                // 1.1: getValue - instance
                selectValue = $(this).select2('val');
                instance = $(this).attr('data-instance');


                @this.set(instance, selectValue);

            }); //end function
        });
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









    @section('modals')


    {{-- 1: createSection --}}
    <livewire:dashboard.extra.blogs.blogs-view.components.blogs-view-create-section key='create-section-{{ $blog->id }}'
        id='{{ $blog->id }}' />




    {{-- 1: editSection --}}
    <livewire:dashboard.extra.blogs.blogs-view.components.blogs-view-edit-section key='edit-section-{{ $blog->id }}' />



    @endsection








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</section>
{{-- endSection --}}