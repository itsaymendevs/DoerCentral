<div class="wrapper">



    {{-- head --}}
    @section('head')




    {{-- title - description - keywords meta --}}
    <title>DOER Solution - Subscribe</title>

    <meta name="description" content="Meal Plan Solution">




    @endsection
    {{-- endHead --}}
















    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}










    {{-- blobBG --}}
    {{--
    <livewire:leads.components.items.background-blob /> --}}







    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}






    {{-- logo --}}
    <div class="d-flex justify-content-center align-content-center login--logo-wrapper d-none d-xl-flex">
        <img class="of-contain mx-auto login--logo" src='{{ url("assets/img/Logo/doer.png") }}' />
    </div>










    {{-- mainRow --}}
    <div class="section section-inner m-description my-0">





        {{-- navbar --}}
        <livewire:leads.components.leads-navbar />









        {{-- ----------------------------------------------------------------- --}}
        {{-- ----------------------------------------------------------------- --}}





        {{-- content --}}
        <div class="container">
            <div class="login--wrapper position-relative">
                <form wire:submit='store' class="row align-items-start justify-content-start">


                    <div class="col-12 d-xl-none">
                        <img class="of-contain mx-auto login--regular-logo"
                            src='{{ url("assets/img/Logo/doer.png") }}' />
                    </div>







                    {{-- main --}}
                    <div class="col-12 col-xl-12">


                        {{-- heading --}}
                        <h4 class='text-center login--heading'>On-Boarding</h4>





                        {{-- topSection --}}
                        <div class="left--section section--padding">



                            {{-- topRow --}}
                            <div class="row">


                                {{-- 1: name --}}
                                <div class="col-12 col-lg-12">
                                    <div class="d-block">
                                        <div class="login--input form--input-wrapper mb-4">

                                            <label><span>Business Name</span></label>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person-badge"></i>
                                                <input type="text" class='form--input text-center' autocomplete="off"
                                                    placeholder="Company Name LLC." wire:model='instance.name' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                {{-- 2.5: websiteURL --}}
                                <div class="col-12 col-lg-6">
                                    <div class="d-block">
                                        <div class="login--input form--input-wrapper mb-4">

                                            <label><span>Website URL</span></label>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-link-45deg"></i>
                                                <input type="url" class='form--input text-center' autocomplete="off"
                                                    wire:model='instance.websiteURL' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>










                                {{-- 2: email --}}
                                <div class="col-12 col-lg-6">
                                    <div class="d-block">
                                        <div class="login--input form--input-wrapper mb-4">

                                            <label><span>Official Email</span></label>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-envelope"></i>
                                                <input type="emal" class='form--input text-center' autocomplete="off"
                                                    wire:model='instance.email' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>











                                {{-- 3: address --}}
                                <div class="col-12">
                                    <div class="d-block">
                                        <div class="login--input form--input-wrapper mb-4">

                                            <label><span>Full Address</span></label>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-pin-map-fill"></i>
                                                <input type="text" class='form--input text-center' autocomplete="off"
                                                    wire:model='instance.address' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>













                                {{-- ---------------------------------------------- --}}
                                {{-- ---------------------------------------------- --}}
                                {{-- ---------------------------------------------- --}}
                                {{-- ---------------------------------------------- --}}






                                {{-- 4: Landline --}}
                                <div class="col-12 col-lg-4" wire:ignore>

                                    <div class="login--input form--input-wrapper mb-xl-0 mb-4">

                                        <label><span>Landline Number</span></label>


                                        {{-- inputWithSelect --}}
                                        <div class="form--input-with-select">


                                            {{-- select --}}
                                            <div class="form--select-wrapper side--left text-center"
                                                style="min-width: 90px !important; width: 90px !important">
                                                <select class='form--select init--select'
                                                    data-instance='instance.landlineKey' value='+971' required>

                                                    @foreach ($countryCodes as $countryCode)
                                                    <option value="{{ $countryCode->code }}">{{ str_replace('+', '',
                                                        $countryCode->code) }}</option>
                                                    @endforeach

                                                </select>
                                            </div>



                                            {{-- input --}}
                                            <input type="text" pattern="[0-9]+"
                                                class='form--input side--right text-center'
                                                style="width: 100% !important" wire:model='instance.landline'
                                                minlength="9" maxlength="9" required>



                                        </div>
                                        {{-- endInputWithWrapper --}}




                                    </div>

                                </div>
                                {{-- endCol --}}








                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}






                                {{-- 4: mobile --}}
                                <div class="col-12 col-lg-4" wire:ignore>

                                    <div class="login--input form--input-wrapper mb-xl-0 mb-4">

                                        <label><span>Mobile Number</span></label>


                                        {{-- inputWithSelect --}}
                                        <div class="form--input-with-select">


                                            {{-- select --}}
                                            <div class="form--select-wrapper side--left text-center"
                                                style="min-width: 90px !important; width: 90px !important">
                                                <select class='form--select init--select'
                                                    data-instance='instance.phoneKey' value='+971' required>

                                                    @foreach ($countryCodes as $countryCode)
                                                    <option value="{{ $countryCode->code }}">{{ str_replace('+', '',
                                                        $countryCode->code) }}</option>
                                                    @endforeach

                                                </select>
                                            </div>



                                            {{-- input --}}
                                            <input type="text" pattern="[0-9]+"
                                                class='form--input side--right text-center'
                                                style="width: 100% !important" wire:model='instance.phone' minlength="9"
                                                maxlength="9" required>



                                        </div>
                                        {{-- endInputWithWrapper --}}



                                    </div>

                                </div>
                                {{-- endMobile --}}










                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}








                                {{-- 5: name --}}
                                <div class="col-12 col-lg-4">
                                    <div class="d-block">
                                        <div class="login--input form--input-wrapper mb-4">

                                            <label><span>Expected Users</span></label>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-people-fill"></i>
                                                <input type="text" class='form--input text-center' autocomplete="off"
                                                    wire:model='instance.users' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>
                            {{-- endRow --}}

                        </div>
                    </div>
                    {{-- endCredientials --}}









                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}












                    {{-- contactPerson --}}
                    <div class="col-12 col-xl-6 mt-5">

                        <div class="personal--wrapper section--padding">
                            <div class="row">


                                {{-- 1: name --}}
                                <div class="col-12">
                                    <div class="d-block">
                                        <div class="login--input form--input-wrapper mb-4">

                                            <label><span>Contact Person</span></label>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person-badge"></i>
                                                <input type="text" class='form--input text-center' autocomplete="off"
                                                    wire:model='instance.contactPerson' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>














                                {{-- 2: phone --}}
                                <div class="col-12" wire:ignore>
                                    <div class="login--input form--input-wrapper mb-4">

                                        <label><span>Phone Number</span></label>


                                        {{-- inputWithSelect --}}
                                        <div class="form--input-with-select">


                                            {{-- select --}}
                                            <div class="form--select-wrapper side--left text-center"
                                                style="min-width: 90px !important; width: 90px !important">
                                                <select class='form--select init--select'
                                                    data-instance='instance.contactPersonPhoneKey' value='+971'
                                                    required>

                                                    @foreach ($countryCodes as $countryCode)
                                                    <option value="{{ $countryCode->code }}">{{
                                                        str_replace('+', '',
                                                        $countryCode->code) }}</option>
                                                    @endforeach

                                                </select>
                                            </div>



                                            {{-- input --}}
                                            <input type="text" pattern="[0-9]+"
                                                class='form--input side--right text-center'
                                                style="width: 100% !important" wire:model='instance.contactPersonPhone'
                                                minlength="9" maxlength="9" required>



                                        </div>
                                        {{-- endInputWithWrapper --}}




                                    </div>
                                </div>
                                {{-- endCol --}}











                                {{-- 3: Whatsapp --}}
                                <div class="col-12" wire:ignore>
                                    <div class="login--input form--input-wrapper mb-4">

                                        <label><span>Whatsapp Number</span></label>


                                        {{-- inputWithSelect --}}
                                        <div class="form--input-with-select">


                                            {{-- select --}}
                                            <div class="form--select-wrapper side--left text-center"
                                                style="min-width: 90px !important; width: 90px !important">
                                                <select class='form--select init--select'
                                                    data-instance='instance.contactPersonWhatsappKey' value='+971'
                                                    required>

                                                    @foreach ($countryCodes as $countryCode)
                                                    <option value="{{ $countryCode->code }}">{{
                                                        str_replace('+', '',
                                                        $countryCode->code) }}</option>
                                                    @endforeach

                                                </select>
                                            </div>



                                            {{-- input --}}
                                            <input type="text" pattern="[0-9]+"
                                                class='form--input side--right text-center'
                                                style="width: 100% !important"
                                                wire:model='instance.contactPersonWhatsapp' minlength="9" maxlength="9"
                                                required>



                                        </div>
                                        {{-- endInputWithWrapper --}}




                                    </div>
                                </div>
                                {{-- endCol --}}






                            </div>
                        </div>

                    </div>
                    {{-- endWrapper --}}








                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}












                    {{-- tradeLicense --}}
                    <div class="col-12 col-xl-6 mt-5">
                        <div class="section--padding">


                            {{-- heading --}}
                            <h6 class='text-center mt-0 mb-3'>Trade License</h6>



                            {{-- uploadLabel --}}
                            <div class="upload--wrapper">
                                <label for="trade--file" class='upload--label'>


                                    {{-- image --}}
                                    @if ($isUploaded)

                                    <img src="{{ url('assets/plugins/leads/images/complete.png') }}" alt=""
                                        class='of-contain h-100 w-100' style="padding: 70px">


                                    @else

                                    <img src="{{ url('assets/plugins/leads/images/placeholder.png') }}" alt=""
                                        class='of-contain h-100 w-100'>

                                    @endif
                                    {{-- end if --}}



                                    {{-- input --}}
                                    <input type="file" class='hidden' id='trade--file' wire:model='instance.tradeFile'
                                        wire:change='uploaded' required accept="application/pdf, image/*" />

                                </label>

                            </div>


                        </div>
                    </div>
                    {{-- endWrapper --}}






                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}
                    {{-- ---------------------------------------------------- --}}







                    {{-- submit --}}
                    <div class="col-12 col-xl-12">
                        <div class="footer--wrapper px-3">




                            {{-- topRow --}}
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="d-flex justify-content-center mt-5 no--button-motion"
                                        wire:loading.class='processing--button-wrap'
                                        wire:target='store, instance.tradeFile'>

                                        {{-- submitButton --}}
                                        <button class="btn--blob reset--button">
                                            Confirm Order
                                            <span class="btn--blob__inner">
                                                <span class="btn--blob__blobs">
                                                    <span class="btn--blob__blob"></span>
                                                    <span class="btn--blob__blob"></span>
                                                    <span class="btn--blob__blob"></span>
                                                    <span class="btn--blob__blob"></span>
                                                </span>
                                            </span>
                                        </button>


                                    </div>
                                </div>
                            </div>






                            {{-- ----------------------------------------- --}}
                            {{-- ----------------------------------------- --}}






                            {{--bottomRow --}}
                            <div class='row align-items-center justify-content-between login--footer'>


                                <div class="col-5 order-1 order-md-1 col-md-4 px-0">
                                    <div class="d-flex justify-content-start justify-content-lg-start">
                                        <p class='login--forgot'><a class='fw-semibold'
                                                style="color: inherit; text-decoration: none;"
                                                href="{{ route('website.contact') }}">Get in touch</a>
                                        </p>
                                    </div>
                                </div>






                                {{-- logo --}}
                                <div class="col-12 order-3 order-md-2 col-md-4 mt-4 mt-md-0 px-0">
                                    <div class="d-flex align-items-center justify-content-center footer--logo">
                                        <img src="{{ url('assets/plugins/leads/images/innocode.png') }}" alt="">
                                    </div>
                                </div>




                                {{-- copyrights --}}
                                <div class="col-7 order-2 order-md-3 col-md-4 px-0">
                                    <div class="d-flex justify-content-end">
                                        <p class='login--forgot fw-semibold'>@ {{ date('Y') }} Right Reserved</p>
                                    </div>
                                </div>

                            </div>
                            {{-- endRow --}}



                        </div>
                    </div>
                    {{-- endCol --}}






                </form>
                {{-- endWrapper --}}






            </div>
        </div>
    </div>
    {{-- endSection --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- selectHandle --}}
    <script>
        $(document).on('change', ".form--select", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');

         @this.set(instance, selectValue);


      }); //end function
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</div>
{{-- endWrapper --}}
