<div class="row">
   <div class="col-12">
      <div>


         {{-- collapseButton --}}
         <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-3" role="button"
            aria-expanded="false" aria-controls="collapse-3">Tags<svg class="bi bi-chevron-expand"
               xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
               <path fill-rule="evenodd"
                  d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
               </path>
            </svg></a>




         {{-- collapseContent --}}
         <div class="collapse collapse--content" id="collapse-3">


            {{-- form --}}
            <form class="row align-items-end pt-2">


               {{-- imageFile --}}
               <div class="col-5 text-center">

                  {{-- label --}}
                  <div>
                     <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                        for="tag--file-1" title="Click To Upload">

                        {{-- file --}}
                        <input class="form-control d-none file--input" id="tag--file-1" data-preview="tag--preview-1"
                           type="file" required />

                        {{-- preview --}}
                        <img class="inventory--image-frame" id="tag--preview-1"
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
               </div>







               {{-- name --}}
               <div class="col-4">
                  <label class="form-label form--label">Tag Name</label>
                  <input class="form-control form--input" type="text" required />
               </div>


               {{-- submitButton --}}
               <div class="col-3 text-center">
                  <button
                     class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center">
                     Save
                  </button>
               </div>



            </form>



            {{-- ----------------------------------------- --}}
            {{-- ----------------------------------------- --}}




            {{-- viewTable --}}
            <div class='row align-items-end'>
               <div class="col-12 mt-5" data-view="table">
                  <div class="table-responsive memoir--table w-100">
                     <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                           <tr>
                              <th class="th--md" s=""></th>
                              <th class="th--md">Tag</th>
                              <th class="th--md">No. of Meals</th>
                              <th class="th--md"></th>
                           </tr>
                        </thead>


                        {{-- tbody --}}
                        <tbody>



                           {{-- loop - tags --}}
                           @foreach ($tags as $tag)
                              <livewire:dashboard.menu.settings.components.settings-view-tag />
                           @endforeach
                           {{-- end loop --}}


                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            {{-- end viewTable --}}

         </div>
         {{-- end collapseContent --}}
      </div>
   </div>
</div>
{{-- endRow --}}
