<section id="footer--section" class='mt-0'>
    <div class="container position-relative" data-aos="fade" data-aos-duration="500" wire:ignore.self>



        {{-- content --}}
        <div class="row">


            {{-- slogan --}}
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-md-start">
                <img class="mb-3 mb-sm-2 mb-md-0" src="{{url('assets/plugins/website/img/logo/eat-healthy-1.png')}}">
            </div>




            {{-- 1: companyList --}}
            <div class="col-6 col-md-3 col-lg-2 align-self-center align-self-sm-start d-none d-md-block">
                <h6 class="footer--subtitle fw-semibold mb-3 fs-sm-15 fs-md-15">Company</h6>
                <a class="btn footer--link fs-sm-13 fs-md-13" role="button">Contact us</a>
            </div>





            {{-- 2: servicesList --}}
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div>
                    <h6 class="footer--subtitle fw-semibold mb-3 fs-sm-15 fs-md-15">Services</h6>
                    <a class="btn footer--link mb-2 fs-sm-13 fs-md-13" role="button">Meal Plans</a>
                    <a class="btn footer--link mb-2 fs-sm-13 fs-md-13" role="button">Restaurant Menu</a>
                    <a class="btn footer--link fs-sm-13 fs-md-13" role="button">Restaurant Location</a>
                </div>
            </div>







            {{-- 3: legalList --}}
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <h6 class="footer--subtitle fw-semibold mb-3 fs-sm-15 fs-md-15">Legal</h6>
                <a class="btn footer--link mb-2 fs-sm-13 fs-md-13" role="button">Privacy Policy</a>
                <a class="btn footer--link mb-2 fs-sm-13 fs-md-13" role="button">Terms &amp; Conditions</a>
                <a class="btn footer--link mb-2 fs-sm-13 fs-md-13" role="button">FAQs</a>
            </div>






            {{-- 4: socials --}}
            <div class="col-12 col-sm-4 col-md-6 col-lg-3 mt-3 mt-sm-0">
                <h6 class="footer--subtitle fw-semibold mb-3 fs-md-15">Follow us on</h6>


                <div class="footer--socials-wrapper mb-4">


                    {{-- 1: insta --}}
                    <button class="btn footer--socials-button" type="button">
                        <i class='bi bi-instagram'></i>
                    </button>


                    <button class="btn footer--socials-button" type="button">
                        <i class='bi bi-facebook'></i>
                    </button>



                    <button class="btn footer--socials-button" type="button">
                        <i class='bi bi-tiktok'></i>
                    </button>

                    <button class="btn footer--socials-button" type="button">
                        <i class='bi bi-youtube'></i>
                    </button>

                </div>




                {{-- ---------------------------------- --}}
                {{-- ---------------------------------- --}}




                {{-- donwloa --}}
                <h6 class="footer--subtitle fw-semibold mb-3 d-none">Download the App</h6>
            </div>






            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}




            {{-- hr --}}
            <div class="col-12">
                <hr class="footer--hr mt-3 mb-4">
            </div>



            <div class="col-12">
                <div class="row align-items-end">

                    <div class="col-12 col-sm-7 col-md-6 order-last order-sm-first">
                        <p class="d-flex align-items-center justify-content-center justify-content-sm-start fs-12 mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-c-circle me-1">
                                <path
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z">
                                </path>
                            </svg>{{ date('Y') }} Doer Restaurant LLC. All rights reserved.
                        </p>
                    </div>


                    {{-- ---------------------------------- --}}
                    {{-- ---------------------------------- --}}





                    {{-- payments --}}
                    <div class="col-12 col-sm-5 col-md-6 order-first order-sm-last">
                        <div
                            class="d-flex align-items-center justify-content-center justify-content-sm-end mb-2 mb-sm-0">



                            {{-- 1: applePay --}}
                            <span class="footer--payments">
                                <img class="w-100 h-100 of--contain"
                                    src="{{url('assets/plugins/website/img/helpers/apple-pay.png')}}">
                            </span>


                            {{-- 2: visa --}}
                            <span class="footer--payments">
                                <img class="w-100 h-100 of--contain"
                                    src="{{url('assets/plugins/website/img/helpers/visa.png')}}">
                            </span>


                            {{-- money --}}
                            <span class="footer--payments">
                                <img class="w-100 h-100 of--contain"
                                    src="{{url('assets/plugins/website/img/helpers/money.png')}}">
                            </span>
                        </div>
                    </div>
                    {{-- endPayments --}}



                </div>
            </div>
            {{-- endCol --}}




        </div>
    </div>
</section>
{{-- endFooter --}}