{{-- loginSection --}}
<section class="min-vh-100 h-100 bg-body">
   <div class="container-fluid">


      {{-- row --}}
      <div class="row align-items-center min-vh-100" wire:ignore>



         {{-- loginForm --}}
         <div class="col-5 col-xxl-5">
            <form class="login--form" data-aos="fade-right" data-aos-duration="600" data-aos-once="true"
               wire:submit='checkUser'>


               <div class="text-end"></div>

               {{-- title --}}
               <h1 class="display-4 text-center fw-bold mb-4 pb-1 mt-2" data-aos="flip-up" data-aos-delay="600"
                  data-aos-once="true">DOer.</h1>


               {{-- email / password --}}
               <input class="form-control form--input mb-4" data-aos="flip-up" data-aos-delay="600" data-aos-once="true"
                  type="email" wire:model.live='email' placeholder="Email Address">

               <input class="form-control form--input mb-3" data-aos="flip-up" data-aos-delay="600" data-aos-once="true"
                  type="password" placeholder="Password" wire:model.live='password'>





               {{-- keep logging --}}
               <div class="form-check d-flex align-items-center ms-1 pt-2 mb-4" data-aos="flip-up" data-aos-delay="600"
                  data-aos-once="true">

                  <input class="form-check-input mt-0 checkbox--rounded" id="formCheck-1" type="checkbox">
                  <label class="form-check-label fs-14 ms-3 checkbox--login" for="formCheck-1">Keep me
                     logged-In</label>
               </div>



               {{-- submit --}}
               <button class="btn w-100 btn--theme mb-1 scale--self-05" data-aos="flip-up" data-aos-delay="600"
                  data-aos-once="true" href="#!" wire:loading.attr='disabled'>Sign In</button>



               {{-- forgotPassword --}}
               <button class="btn w-100 btn--outline-theme-link mb-0 scale--self-05" data-aos="flip-up"
                  data-aos-delay="600" data-aos-once="true" type="button">Forgot
                  Password?</button>
            </form>
         </div>
         {{-- end loginForm --}}





         {{-- coverImage --}}
         <div class="col-7">
            <div class="d-block text-center" data-aos="zoom-in" data-aos-duration="600" data-aos-once="true">
               <img class="w-100 of-cover vh-100" src="{{ asset('assets/img/Login/login-background.png') }}">
            </div>
         </div>

      </div>
   </div>
</section>
{{-- end section --}}
