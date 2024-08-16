<section id="content--section" class="content--section">
   <div class="container">



      {{-- form --}}
      <form wire:submit='update' class="row align-items-end mb-submenu">




         {{-- profile --}}
         <div class="col-12 mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-once="true" wire:ignore.self>


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
               <hr style="width: 65%" />
               <label
                  class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">Profile</label>
            </div>







            {{-- imageFile --}}
            <div>
               <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                  title="Click To Upload" for="profile--file-1">

                  <input type="file" id="profile--file-1" class="d-none file--input" data-preview="profile--preview-1"
                     wire:model='instance.imageFile' />

                  <img id="profile--preview-1" class="inventory--image-frame" wire:ignore.self
                     src="{{ url('storage/delivery/drivers/profiles/' . $driver?->imageFile) }}" />



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
         </div>





         {{-- ---------------------------- --}}
         {{-- ---------------------------- --}}






         {{-- information --}}
         <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-1">
               <hr style="width: 65%" />
               <label
                  class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">Information</label>
            </div>
         </div>



         {{-- name --}}
         <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
            <input type="text" class="form--input mb-4" required wire:model='instance.name' placeholder="Full Name" />
         </div>




         {{-- phone --}}
         <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
            <input type="text" class="form--input mb-4" required wire:model='instance.phone' pattern="[0-9]+"
               minlength='9' maxlength='9' placeholder="Phone Number" />
         </div>






         {{-- email --}}
         <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
            <input type="email" class="form--input mb-4" required wire:model='instance.email'
               placeholder="Email Address" />
         </div>









         {{-- license --}}
         <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>

            {{-- title --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
               <hr style="width: 65%" />
               <label
                  class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">License</label>
            </div>


            {{-- input --}}
            <input type="text" class="form--input mb-4" required wire:model='instance.license'
               placeholder="License Number" />
         </div>











         {{-- ------------------------------ --}}
         {{-- ------------------------------ --}}




         <div class="col-12">



            {{-- imageFile --}}
            <div class='flip--front' style="transition: unset" wire:ignore.self>
               <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip="" for="license--file-1"
                  title="Click To Upload">





                  {{-- caption --}}
                  <span class="upload--caption badge" style="width: 80px;">Front</span>





                  {{-- input --}}
                  <input class="form-control d-none file--input" id="license--file-1" data-preview="license--preview-1"
                     type="file" wire:model='licenseFile' />



                  {{-- preview --}}
                  <img class="inventory--image-frame" id="license--preview-1" wire:ignore
                     src="{{ url('storage/delivery/drivers/licenses/' . $driver->licenseFile) }}" />



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






            {{-- ------------------------------ --}}







            {{-- imageFile --}}
            <div class='flip--rear' style="display:none; transition: unset" wire:ignore.self>
               <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip="" for="license--file-2"
                  title="Click To Upload">




                  {{-- caption --}}
                  <span class="upload--caption badge" style="width: 80px;">Rear</span>




                  {{-- input --}}
                  <input class="form-control d-none file--input" id="license--file-2" data-preview="license--preview-2"
                     type="file" wire:model='licenseRearFile' />



                  {{-- preview --}}
                  <img class="inventory--image-frame" id="license--preview-2" wire:ignore
                     src="{{ url('storage/delivery/drivers/licenses/' . $driver->licenseRearFile) }}" />



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











            {{-- ------------------------------ --}}
            {{-- ------------------------------ --}}




            {{-- submitButton --}}
            <div class="text-center mb-5 mt-4 d-flex align-items-center justify-content-center">



               {{-- flipButton --}}
               <button
                  class="btn btn--scheme btn-outline-warning px-3 py-1 d-inline-flex align-items-center scale--self-05 mx-2 flip--button"
                  type='button'>
                  <svg class="bi bi-arrow-repeat fs-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path
                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                     </path>
                     <path fill-rule="evenodd"
                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                     </path>
                  </svg>
               </button>





               {{-- :: update --}}
               <button
                  class="btn btn--scheme btn--scheme-2 px-4 py-1 d-inline-flex align-items-center mx-2 scale--self-05"
                  wire:loading.attr='disabled' wire:target='licenseFile, licenseRearFile, updateLicense'
                  style="border: 1px dashed var(--color-scheme-3)">
                  Update
               </button>
            </div>



         </div>




         {{-- ------------------------------ --}}
         {{-- ------------------------------ --}}






      </form>



   </div>
   {{-- endContainer --}}







</section>
{{-- endSection --}}