<div class="modal fade login--modal dark--modal p-0" role="dialog" tabindex="-1" id="login--modal"
    style="z-index: 1000000;" wire:ignore>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">


            {{-- body --}}
            <div class="modal-body p-0">
                <div class="container">
                    <div class="row align-items-lg-center w-login--row">


                        {{-- overlay --}}
                        <div class="col-12 col-lg-6 w-login--left"
                            style="background-image: url({{ url('assets/plugins/website/img/helpers/meal-plan.jpg') }})">
                            <div class="overlay"></div>
                        </div>




                        {{-- -------------------------------------- --}}
                        {{-- -------------------------------------- --}}






                        {{-- content --}}
                        <div class="col-12 col-lg-6 w-login--right">



                            {{-- form --}}
                            <form wire:submit='check' class="row justify-content-center align-items-end">

                                {{-- title --}}
                                <div class="col-11 text-center">
                                    <h1 class="w-login--title mb-1">Login.</h1>
                                    <hr class="w-login--title-hr">
                                </div>




                                {{-- inputs --}}
                                <div class="col-11">
                                    <input type="email" class="form--input for-login" placeholder="Email Address"
                                        required wire:model='instance.email'>

                                    <input type="password" class="form--input for-login" placeholder="Password"
                                        wire:model='instance.password' required>
                                </div>





                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}




                                {{-- logged-in --}}
                                <div class="col-11">
                                    <div>
                                        <div class="form-check w-login--checkbox">
                                            <input class="form-check-input" type="checkbox" id="login--checkbox-1">
                                            <label class="form-check-label" for="login--checkbox-1">Keep me logged
                                                in</label>
                                        </div>
                                    </div>
                                </div>




                                {{-- submitButton --}}
                                <div class="col-11 text-center mt-4 mb-3">
                                    <button class="btn w-login--button fs-sm-15">confirm</button>
                                </div>

                            </form>
                            {{-- endForm --}}




                            {{-- -------------------------------------- --}}
                            {{-- -------------------------------------- --}}




                            {{-- footer --}}
                            <div class="w-login--footer">
                                <p class="w-login--forgot">Forgot your password?</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            {{-- endBody --}}






        </div>
    </div>
</div>
{{-- endModal --}}