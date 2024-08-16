{{-- newZone --}}
<div class="modal fade modal--shadow" id="edit-zone" role="dialog" tabindex="-1" wire:ignore.self>
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body py-0 px-0">


            {{-- header --}}
            <header class="modal--header px-4">
               <h5 class="mb-0 fw-bold text-white">Edit Zone</h5>

               {{-- closeButton --}}
               <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                  data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                  <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                     </path>
                  </svg>
               </button>
            </header>





            {{-- ------------------------------------------------------ --}}
            {{-- ------------------------------------------------------ --}}






            <form class="px-4" wire:submit='update'>
               <div class="row align-items-start pt-2 mb-4">


                  {{-- imageFile --}}
                  <div class="col-5">
                     <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                        for="zone--file-2" title="Click To Upload">
                        <input class="form-control d-none file--input" id="zone--file-2" data-preview="zone--preview-2"
                           type="file" wire:model='instance.imageFile' />



                        {{-- preview --}}
                        <img class="inventory--image-frame" id="zone--preview-2"
                           src="{{ url('assets/img/placeholder.png') }}" wire:ignore />



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
                  {{-- end imageFile --}}












                  {{-- column --}}
                  <div class="col-7">
                     <div class="row">



                        {{-- name --}}
                        <div class="col-6">
                           <label class="form-label form--label">Name</label>
                           <input class="form-control form--input mb-4" type="text" wire:model.live='instance.name'
                              required />
                        </div>






                        {{-- city --}}
                        <div class="col-6" wire:ignore>
                           <label class="form-label form--label">City</label>
                           <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                              <select
                                 class="form-select form--modal-select form--modal-zone-select-2 parent-select parent-select-2"
                                 id='city-select-2' data-modal='#edit-zone' data-instance='instance.cityId'
                                 data-child='#district-select-2' data-trigger='true' required>
                                 <option value=""></option>

                                 @foreach ($cities as $city)
                                 <option value="{{ $city->id }}">{{ $city->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>






                        {{-- districts --}}
                        <div class="col-12" wire:ignore>
                           <label class="form-label form--label">Districts</label>
                           <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                              <select class="form-select form--modal-select form--modal-zone-select-2"
                                 id='district-select-2' data-modal='#edit-zone' data-instance='instance.cityDistricts'
                                 multiple='' data-trigger='true' required>

                              </select>
                           </div>
                        </div>






                        {{-- description --}}
                        <div class="col-12">
                           <label class="form-label form--label">Description</label>
                           <input class="form-control form--input" type="text" wire:model.live='instance.desc'
                              required />
                        </div>



                     </div>
                  </div>
                  {{-- endCol --}}








                  {{-- submitButon --}}
                  <div class="col-12 text-end mt-4">
                     <button
                        class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                        wire:loading.attr='disabled' wire:target='update, instance.imageFile'>
                        Update
                     </button>
                  </div>



               </div>
            </form>
            {{-- endForm --}}



         </div>
      </div>
   </div>








   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}







   {{-- select-handle --}}
   <script>
      var skipReset = 0;



      // 1: handleSelect
      $(".form--modal-zone-select-2").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');

         @this.set(instance, selectValue);







         //  1.2: refreshChild to defaultValue - setChildDefault
         if ($(this).hasClass('parent-select-2')) {

            childSelect = $(this).attr('data-child');
            @this.refreshSelect(childSelect, 'city', 'district', selectValue);
            @this.setChildSelect();

         } // end if






         // 1.3 incReset
         skipReset++;


      }); //end function








      // 2: handle ChildSelect
      $(".child-modal-select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');

         @this.set(instance, selectValue);



      }); //end function
   </script>







   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}





</div>
{{-- endModal --}}