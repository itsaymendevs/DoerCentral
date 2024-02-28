<div class="row">
   <div class="col-12">
      <div>


         {{-- collapseButton --}}
         <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-4" role="button"
            aria-expanded="false" aria-controls="collapse-4">Cuisines<svg class="bi bi-chevron-expand"
               xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
               <path fill-rule="evenodd"
                  d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
               </path>
            </svg></a>



         {{-- collapseContent --}}
         <div class="collapse collapse--content" id="collapse-4">


            {{-- form --}}
            <form class="row align-items-end pt-2">


               {{-- cover --}}
               <div class="col-5 text-center">
                  <img class="w-100 inventory--image-frame sm of-cover rounded-1"
                     src="{{ asset('assets/img/Diets/cuisines.jpg') }}" style="object-position: center bottom" />
               </div>


               {{-- name --}}
               <div class="col-4">
                  <label class="form-label form--label">Name</label>
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
            {{-- end form --}}




            {{-- ------------------------------------------- --}}
            {{-- ------------------------------------------- --}}





            {{-- viewTable --}}
            <div class="row align-items-end">
               <div class="col-12 mt-5" data-view="table">
                  <div class="table-responsive memoir--table w-100">
                     <table class="table table-bordered" id="memoir--table">

                        {{-- headers --}}
                        <thead>
                           <tr>
                              <th class="th--xs"></th>
                              <th class="th--md" s="">Cuisine</th>
                              <th class="th--xs"></th>
                           </tr>
                        </thead>

                        {{-- tbody --}}
                        <tbody>


                           {{-- loop - cuisines --}}
                           @foreach ($cuisines as $cuisine)
                              <livewire:dashboard.menu.settings.components.settings-view-cuisine />
                           @endforeach
                           {{-- end loop --}}

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            {{-- end viewTable --}}


         </div>
      </div>
   </div>
</div>
{{-- endRow --}}
