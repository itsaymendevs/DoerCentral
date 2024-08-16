<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-section" wire:ignore.self>
   <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body py-0 px-0">



            {{-- modalHeader --}}
            <header class="modal--header px-4">
               <h5 class="mb-0 fw-bold text-white">New Section</h5>
               <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                  data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                     <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                     </path>
                  </svg>
               </button>
            </header>
            {{-- endHeader --}}








            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}






            {{-- form --}}
            <form wire:submit='store' class="px-4">
               <div class="row align-items-start row pt-2 mb-4">





                  {{-- content --}}
                  <div class="col-12">
                     <div class="row align-items-center">



                        {{-- title --}}
                        <div class="col-12">
                           <label class="form-label form--label">Section Title</label>
                           <textarea class="form-control form--input form--textarea mb-4" style="height: 80px"
                              wire:model='instance.title'></textarea>
                        </div>






                        {{-- content --}}
                        <div class="col-12" wire:ignore>
                           <label class="form-label form--label">Section Content</label>


                           <livewire:dashboard.components.editor-toolbar key='quill-editor-toolbar-1'
                              id='quill-editor-toolbar-1' />
                           <div id='quill-editor-1' class="quill-editor-modal" data-toolbar='#quill-editor-toolbar-1'
                              data-value="" data-instance='instance.content'></div>
                        </div>





                     </div>
                  </div>
                  {{-- endCol --}}







                  {{-- ----------------------------------- --}}
                  {{-- ----------------------------------- --}}







                  {{-- bottomCol --}}
                  <div class="col-12">
                     <div class="row">





                        {{-- type --}}
                        <div class="col-12 mt-4 mb-3 d-flex justify-content-around align-items-center">



                           {{-- loop - types --}}
                           @foreach ($types ?? [] as $key => $type)


                           <div class="form-check mb-3 itemType--radio" key='section-type-{{ $key }}'>

                              {{-- input --}}
                              <input class="form-check-input" id="section-type-checkbox-{{ $key }}" type="radio"
                                 value='{{ $type }}' wire:model='instance.type' wire:loading.attr='disabled' />


                              {{-- label --}}
                              <label class="form-check-label" wire:loading.attr='disabled'
                                 for="section-type-checkbox-{{ $key }}">{{ $type }}</label>

                           </div>


                           @endforeach
                           {{-- end loop --}}



                        </div>
                        {{-- endCol --}}












                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}






                        {{-- 1: imageFile --}}
                        <div class="col-3">
                           <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                              title="Click To Upload" for="section--file-1">


                              {{-- size --}}
                              <span class="upload--caption badge">1st</span>



                              {{-- input --}}
                              <input class="form-control d-none file--input" type="file" id="section--file-1"
                                 data-preview="section--preview-1" wire:model='instance.imageFile' />



                              {{-- image --}}
                              <img id="section--preview-1" class="inventory--image-frame"
                                 src="{{ url('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;" width="512"
                                 height="250" wire:ignore />

                           </label>
                        </div>









                        {{-- 2: secondImageFile --}}
                        <div class="col-3">
                           <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                              title="Click To Upload" for="section--file-2">


                              {{-- size --}}
                              <span class="upload--caption badge">2nd</span>



                              {{-- input --}}
                              <input class="form-control d-none file--input" type="file" id="section--file-2"
                                 data-preview="section--preview-2" wire:model='instance.secondImageFile' />



                              {{-- image --}}
                              <img id="section--preview-2" class="inventory--image-frame"
                                 src="{{ url('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;" width="512"
                                 height="250" wire:ignore />

                           </label>
                        </div>









                        {{-- 3: thirdImageFile --}}
                        <div class="col-3">
                           <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                              title="Click To Upload" for="section--file-3">


                              {{-- size --}}
                              <span class="upload--caption badge">3rd</span>



                              {{-- input --}}
                              <input class="form-control d-none file--input" type="file" id="section--file-3"
                                 data-preview="section--preview-3" wire:model='instance.thirdImageFile' />



                              {{-- image --}}
                              <img id="section--preview-3" class="inventory--image-frame"
                                 src="{{ url('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;" width="512"
                                 height="250" wire:ignore />

                           </label>
                        </div>










                        {{-- 4: fourthImageFile --}}
                        <div class="col-3">
                           <label class="form-label upload--wrap mb-3" data-bs-toggle="tooltip" data-bss-tooltip=""
                              title="Click To Upload" for="section--file-4">


                              {{-- size --}}
                              <span class="upload--caption badge">4th</span>



                              {{-- input --}}
                              <input class="form-control d-none file--input" type="file" id="section--file-4"
                                 data-preview="section--preview-4" wire:model='instance.fourthImageFile' />



                              {{-- image --}}
                              <img id="section--preview-4" class="inventory--image-frame"
                                 src="{{ url('assets/img/placeholder.png') }}" style="aspect-ratio: 1/2;" width="512"
                                 height="250" wire:ignore />

                           </label>
                        </div>





                     </div>
                  </div>
                  {{-- endCol --}}







                  {{-- ----------------------------------- --}}
                  {{-- ----------------------------------- --}}






                  {{-- submitButton --}}
                  <div class="col-12 text-center mt-3">
                     <button wire:loading.attr='disabled'
                        wire:target='store, instance.imageFile, instance.secondImageFile, instance.thirdImageFile, instance.fourthImageFile'
                        class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                        Append Section
                     </button>
                  </div>
                  {{-- endButton --}}



               </div>
            </form>
         </div>
      </div>
   </div>
   {{-- endBody --}}


















   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}









   <script>
      $('#new-section .quill-editor-modal').each(function() {

            console.log('33333');
            var toolbar = $(this).attr('data-toolbar');
            let instance = $(this).attr('data-instance');
            var value = $(this).attr('data-value');

            var quill = new Quill(this, {
                modules: {
                syntax: true,
                toolbar: toolbar,
                },
                theme: 'snow',
            });





            // 1.2: checkValue
            if (value) {

                var delta = quill.clipboard.convert({html: value});
                quill.setContents(delta, "api");

            } // end if






            // 1.3: update - reset
            quill.on('editor-change', (eventName, ...args) => {
                @this.set(instance, quill.getSemanticHTML());
            });


            window.addEventListener("resetEditorContent", (event) => {
                quill.setContents([]);
            });



        });
   </script>








   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}








</div>
{{-- endModal --}}