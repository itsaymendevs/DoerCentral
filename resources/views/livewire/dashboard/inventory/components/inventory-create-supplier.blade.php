{{-- newSupplier --}}
<div class="modal fade modal--shadow" id="new-supplier" role="dialog" tabindex="-1" wire:ignore.self>
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body py-0 px-0">



            {{-- header --}}
            <header class="modal--header px-4">
               <h5 class="mb-0 fw-bold text-white">New Supplier</h5>
               <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                  data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                  <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                  </svg>
               </button>
            </header>





            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}






            {{-- form --}}
            <form class="px-4">
               <div class="row row pt-2 mb-4">


                  {{-- name --}}
                  <div class="col-4">
                     <label class="form-label form--label">Name</label>
                     <input class="form-control form--input mb-4" type="text" />
                  </div>


                  {{-- phone --}}
                  <div class="col-4">
                     <label class="form-label form--label">Phone Number</label>
                     <input class="form-control form--input mb-4" type="text" />
                  </div>


                  {{-- email --}}
                  <div class="col-4">
                     <label class="form-label form--label">Email Address</label>
                     <input class="form-control form--input mb-4" type="text" />
                  </div>



                  {{-- address --}}
                  <div class="col-12">
                     <label class="form-label form--label">Address</label>
                     <input class="form-control form--input mb-4" type="text" />
                  </div>



                  {{-- submitButton --}}
                  <div class="col-12 text-end mt-3">
                     <button
                        class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                        Save
                     </button>
                  </div>

               </div>
            </form>
            {{-- endForm --}}



         </div>
      </div>
   </div>
</div>
{{-- endModal --}}
