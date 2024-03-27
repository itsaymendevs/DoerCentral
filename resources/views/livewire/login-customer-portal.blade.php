{{-- loginSection --}}
<section class="min-vh-100 h-100 bg-body">
    <div class="container-fluid">


        {{-- row --}}
        <div class="row align-items-center min-vh-100" wire:ignore>



            {{-- loginForm --}}
            <div class="col-12 col-lg-6 col-xl-5">
                <form class="login--form" data-aos="fade-right" data-aos-duration="600" data-aos-once="true"
                    wire:submit='checkUser'>


                    <div class="text-end"></div>

                    {{-- title --}}
                    <img data-aos="fade-down" data-aos-duration="800" data-aos-delay="600" data-aos-once="true"
                        class="w-100 of-contain pb-1 mt-2" src="{{ asset('assets/img/Logo/doer.png') }}"
                        style="height: 80px" />


                    {{-- email / password --}}
                    <input class="form-control form--input mb-4" data-aos="flip-up" data-aos-delay="600"
                        data-aos-once="true" type="email" wire:model='email' placeholder="Email Address" required>

                    <input class="form-control form--input mb-3" data-aos="flip-up" data-aos-delay="600"
                        data-aos-once="true" type="password" placeholder="Password" wire:model='password' required>





                    {{-- keep logging --}}
                    <div class="form-check d-flex align-items-center ms-1 pt-2 mb-4" data-aos="flip-up"
                        data-aos-delay="600" data-aos-once="true">

                        <input class="form-check-input mt-0 checkbox--rounded" id="formCheck-1" type="checkbox"
                            style="border-color: var(--input-border-color-hover)">
                        <label class="form-check-label fs-14 ms-3 checkbox--login" for="formCheck-1">Keep me
                            logged-In</label>
                    </div>



                    {{-- submit --}}
                    <a class="btn w-100 btn--theme mb-1 scale--self-05" data-aos="flip-up" data-aos-delay="600"
                        data-aos-once="true" href="{{ route('portals.customer.general') }}"
                        wire:loading.attr='disabled'>Sign In</a>



                    {{-- forgotPassword --}}
                    <button class="btn w-100 btn--outline-theme-link mb-0 scale--self-05" data-aos="flip-up"
                        data-aos-delay="600" data-aos-once="true" type="button">Forgot
                        Password?</button>
                </form>
            </div>
            {{-- end loginForm --}}





            {{-- coverImage --}}
            <div class="col-12 col-lg-6 col-xl-7 d-none d-lg-block">
                <div class="d-block text-center" data-aos="zoom-in" data-aos-duration="600" data-aos-once="true">
                    <img class="w-100 of-cover vh-100 login--logo" src="{{ asset('assets/img/Login/cover.jpg') }}">
                </div>
            </div>

        </div>
    </div>
</section>
{{-- end section --}}