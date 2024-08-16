{{-- loginSection --}}
<section class="min-vh-100 h-100 bg-body">
   <div class="container-fluid">


      {{-- row --}}
      <div class="row align-items-center justify-content-center justify-content-md-center min-vh-100" wire:ignore>



         {{-- loginForm --}}
         <div class="col-11 col-lg-6 col-xl-5">
            <form class="login--form" data-aos="fade-down" data-aos-duration="600" data-aos-once="true"
               wire:submit='checkDriver'>


               <div class="text-end"></div>

               {{-- title --}}
               <img data-aos="fade-down" data-aos-duration="800" data-aos-delay="600" data-aos-once="true"
                  class="w-100 of-contain pb-1 mt-2" src="{{ url('storage/profile/' . $globalProfile->imageFile) }}"
                  style="height: 80px" />


               {{-- email / password --}}
               <input class="form-control form--input mb-4" data-aos="flip-up" data-aos-delay="600" data-aos-once="true"
                  type="email" wire:model='email' placeholder="Email Address" required>



               <div class="form--password-input w-100">
                  <input id='password' class="form-control form--input mb-3" data-aos="flip-up" data-aos-delay="600"
                     data-bss-tooltip="" data-aos-once="true" type="password" placeholder="Password"
                     wire:model='password' required>

                  {{-- previewPassword --}}
                  <svg class="bi bi-eye preview--password" data-target='#password' xmlns="http://www.w3.org/2000/svg"
                     width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" data-bs-toggle="tooltip"
                     data-bss-tooltip="" data-bs-placement="bottom" title="Show Password">
                     <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                     </path>
                     <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                     </path>
                  </svg>



                  {{-- hidePassword --}}
                  <svg class="bi bi-eye-slash hide--password d-none" data-target='#password'
                     xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                     data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" title="Hide Password">
                     <path
                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z">
                     </path>
                     <path
                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z">
                     </path>
                     <path
                        d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z">
                     </path>
                  </svg>


               </div>





               {{-- keep logging --}}
               <div class="form-check d-flex align-items-center ms-1 pt-2 mb-4" data-aos="flip-up" data-aos-delay="600"
                  data-aos-once="true">

                  <input class="form-check-input mt-0 checkbox--rounded" id="formCheck-1" type="checkbox"
                     style="border-color: var(--input-border-color-hover)">
                  <label class="form-check-label fs-14 ms-3 checkbox--login" for="formCheck-1">Keep me
                     logged-In</label>
               </div>



               {{-- submit --}}
               <button class="btn w-100 btn--theme mb-1 scale--self-05" data-aos="flip-up" data-aos-delay="600"
                  data-aos-once="true" wire:loading.attr='disabled'>Sign
                  In</button>



               {{-- forgotPassword --}}
               <button class="btn w-100 btn--outline-theme-link mb-0 scale--self-05" data-aos="flip-up"
                  data-aos-delay="600" data-aos-once="true" type="button">Forgot
                  Password?</button>
            </form>
         </div>
         {{-- end loginForm --}}





      </div>
   </div>
</section>
{{-- end section --}}