<div id='information--modal' class="izi--modal" data-width='800px' wire:ignore>
    <div class="container">




        {{-- header --}}
        <div class="row mb-4 pb-2 align-items-center">
            <div class="col-10">
                <h5 class='my-0 fw-bold fs-4'>Personal Information</h5>
            </div>

            {{-- close --}}
            <div class="col-2">
                <a data-izimodal-close="" data-izimodal-transitionout="bounceOutDown" class='modal--close'>
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </div>
        {{-- endHeader --}}






        {{-- -------------------------------------------------------- --}}
        {{-- -------------------------------------------------------- --}}
        {{-- -------------------------------------------------------- --}}
        {{-- -------------------------------------------------------- --}}








        {{-- content --}}
        <form wire:submit='continue' class="row mb-5 justify-content-center justify-content-md-start">



            {{-- firstName --}}
            <div class="col-6 col-sm-6">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm '>
                        <span>First Name</span>
                    </label>

                    <input type="text" class='form--input text-center' wire:model='instance.firstName' required>
                </div>
            </div>






            {{-- lastName --}}
            <div class="col-6 col-sm-6">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Last Name</span>
                    </label>

                    <input type="text" class='form--input text-center' wire:model='instance.lastName' required>
                </div>
            </div>










            {{-- -------------------------- --}}
            {{-- -------------------------- --}}







            {{-- phone --}}
            <div class="col-12 col-md-6">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Phone</span>
                    </label>





                    {{-- inputWithSelect --}}
                    <div class="form--input-with-select">


                        {{-- select --}}
                        <div class="form--select-wrapper side--left text-center" style="width: 30% !important">
                            <select class='form--select init--select' data-instance='instance.phoneKey' value='+971'
                                required>

                                @foreach ($countryCodes as $countryCode)
                                <option value="{{ $countryCode->code }}">{{ $countryCode->code }}</option>
                                @endforeach

                            </select>
                        </div>



                        {{-- input --}}
                        <input type="text" pattern="[0-9]+" class='form--input side--right text-center'
                            style="width: 70% !important" wire:model='instance.phone' minlength="9" maxlength="9"
                            required>



                    </div>
                    {{-- endInputWithWrapper --}}


                </div>
            </div>
            {{-- endCol --}}















            {{-- whatsapp --}}
            <div class="col-12 col-md-6">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Whatsapp</span>
                    </label>





                    {{-- inputWithSelect --}}
                    <div class="form--input-with-select">


                        {{-- select --}}
                        <div class="form--select-wrapper side--left text-center" style="width: 30% !important">
                            <select class='form--select init--select' data-instance='instance.whatsappKey' value='+971'
                                required>

                                @foreach ($countryCodes as $countryCode)
                                <option value="{{ $countryCode->code }}">{{ $countryCode->code }}</option>
                                @endforeach

                            </select>
                        </div>



                        {{-- input --}}
                        <input type="text" pattern="[0-9]+" class='form--input side--right text-center'
                            style="width: 70% !important" wire:model='instance.whatsapp' minlength="9" maxlength="9"
                            required>



                    </div>
                    {{-- endInputWithWrapper --}}


                </div>
            </div>
            {{-- endCol --}}









            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}






            {{-- email --}}
            <div class="col-12 col-md-12">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Email Address</span>
                    </label>



                    {{-- inputWithSelect --}}
                    <div class="form--input-with-select">

                        {{-- input --}}
                        <input type="text" class='form--input side--left text-center' style="width: 60% !important"
                            wire:model='instance.email' required>


                        {{-- select --}}
                        <div class="form--select-wrapper side--right text-center" style="width: 40% !important">
                            <select class='init--select form--select' value="@gmail.com"
                                data-instance='instance.emailProvider' required>

                                @foreach ($providers as $provier)
                                <option value="{{ $provier }}">
                                    {{ $provier }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    {{-- endWithSelect --}}

                </div>
            </div>
            {{-- endCol --}}










            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}




            {{-- submitButton --}}
            <div class="col-12">
                <div class="d-flex form--input-wrapper justify-content-center mb-4 mt-1
                @if (!$settings?->showButtonMotion) no--button-motion @endif"
                    wire:loading.class='processing--button-wrap' wire:target='continue'>

                    <livewire:website.components.items.button-blob title='Continue' type="submit" />

                </div>
            </div>




        </form>
    </div>
    {{-- endWrapper --}}















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- selectHandle --}}
    <script>
        $(document).on('change', "#information--modal .form--select", function(event) {



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
{{-- endModal --}}