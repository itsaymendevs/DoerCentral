<div class="row">
   <div class="col-12">
      <div>



         {{-- collapseButton --}}
         <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-2" role="button"
            aria-expanded="false" aria-controls="collapse-2">Sizes<svg class="bi bi-chevron-expand"
               xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
               <path fill-rule="evenodd"
                  d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
               </path>
            </svg></a>




         {{-- collapseContent --}}
         <div class="collapse collapse--content" id="collapse-2">
            <div class="row align-items-end pt-2">


               {{-- cover --}}
               <div class="col-5 text-center">
                  <img class="w-100 inventory--image-frame of-cover rounded-1"
                     src="{{ asset('assets/img/Diets/sizes-2.jpg') }}" />
               </div>




               <form class="col-7">
                  <div class="row">


                     {{-- name --}}
                     <div class="col-6 text-end">
                        <label class="form-label form--label">Name</label>
                        <input class="form-control form--input mb-4" type="text" required />
                     </div>


                     {{-- price --}}
                     <div class="col-6 text-end">
                        <label class="form-label form--label">Price</label>
                        <input class="form-control form--input mb-4" type="text" required />
                     </div>


                     {{-- calories --}}
                     <div class="col text-end">
                        <div class="overview--box shrink--self macros-version">
                           <h6>Calories</h6>
                           <p>
                              <input class="form-control form--input form--table-input-xs" type="number" required />
                           </p>
                        </div>
                     </div>


                     {{-- proteins --}}
                     <div class="col text-end">
                        <div class="overview--box shrink--self macros-version">
                           <h6>Proteins</h6>
                           <p>
                              <input class="form-control form--input form--table-input-xs" type="number" required />
                           </p>
                        </div>
                     </div>


                     {{-- carbs --}}
                     <div class="col text-end">
                        <div class="overview--box shrink--self macros-version">
                           <h6>Carbs</h6>
                           <p>
                              <input class="form-control form--input form--table-input-xs" type="number" required />
                           </p>
                        </div>
                     </div>


                     {{-- fats --}}
                     <div class="col text-end">
                        <div class="overview--box shrink--self macros-version">
                           <h6>Fats</h6>
                           <p>
                              <input class="form-control form--input form--table-input-xs" type="number" required />
                           </p>
                        </div>
                     </div>



                     {{-- submitButton --}}
                     <div class="col-12 text-center mt-3">
                        <button
                           class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center">
                           Save
                        </button>
                     </div>
                  </div>
               </form>
               {{-- endForm --}}







               {{-- -------------------------------------------- --}}
               {{-- -------------------------------------------- --}}





               {{-- viewTable --}}
               <div class="col-12 mt-5" data-view="table">
                  <div class="table-responsive memoir--table w-100">
                     <table class="table table-bordered" id="memoir--table">

                        {{-- headers --}}
                        <thead>
                           <tr>
                              <th class="th--md" s="">Size</th>
                              <th class="th--md">Calories</th>
                              <th class="th--md">Proteins</th>
                              <th class="th--md">Carbs</th>
                              <th class="th--md">Fats</th>
                              <th class="th--xs"></th>
                           </tr>
                        </thead>


                        {{-- tbody --}}
                        <tbody>



                           {{-- loop - sizes --}}
                           @foreach ($sizes as $size)
                              <livewire:dashboard.menu.settings.components.settings-view-sizes />
                           @endforeach
                           {{-- end loop --}}


                        </tbody>
                     </table>
                  </div>
               </div>
               {{-- end viewTable --}}


            </div>
         </div>
      </div>
   </div>
</div>
{{-- endRow --}}
