<div id='address--modal' class="izi--modal" data-width='920px' wire:ignore>
    <div class="container">






        {{-- header --}}
        <div class="row align-items-center mt-2 mb-4 pb-2">
            <div class="col-10">
                <h5 class='my-0 fw-bold fs-4'>Address Information</h5>
            </div>

            {{-- close --}}
            <div class="col-2">
                <a data-izimodal-close="" data-izimodal-transitionout="bounceOutDown" class='modal--close btn--close'>
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
        <form wire:submit='confirm' class="row mb-5 justify-content-center justify-content-md-start">





            {{-- city --}}
            <div class="col-12 col-md-7">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>City</span>
                    </label>


                    {{-- select --}}
                    <div class="form--select-wrapper">
                        <select class='init--select form--select level--select level--one' data-level='city' data-id='1'
                            data-instance='instance.cityId' required>

                            <option value=""></option>

                            @foreach ($cities ?? [] as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            {{-- endCol --}}









            {{-- district --}}
            <div class="col-12 col-md-5" wire:ignore>
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>District</span>
                    </label>


                    {{-- select --}}
                    <div class="form--select-wrapper" wire:ignore>
                        <select class='init--select form--select level--select level--two' data-id='1' required
                            data-instance='instance.cityDistrictId'>
                        </select>
                    </div>
                </div>
            </div>
            {{-- endCol --}}









            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}











            {{-- address --}}
            <div class="col-12 col-md-7">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm '>
                        <span>Location Address</span>
                    </label>

                    <input type="text" class='form--input' wire:model='instance.locationAddress' required>
                </div>
            </div>












            {{-- deliveryTime --}}
            <div class="col-12 col-md-5" wire:ignore>
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Delivery Time</span>
                    </label>


                    {{-- select --}}
                    <div class="form--select-wrapper" wire:ignore>
                        <select class='init--select form--select level--select level--two-second' data-id='1'
                            data-instance='instance.cityDeliveryTimeId' required>
                        </select>
                    </div>
                </div>
            </div>
            {{-- endCol --}}









            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}






            {{-- Apartment --}}
            <div class="col-12 col-md-7">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Apartment <span class='span--price'>/</span> Villa</span>
                    </label>

                    <input type="text" class='form--input' wire:model='instance.apartment' required>
                </div>
            </div>





            {{-- Floor --}}
            <div class="col-12 col-md-5">
                <div class="d-flex form--input-wrapper flex-column mb-4">

                    <label class='w-100 d-flex align-items-center sm'>
                        <span>Floor Number</span>
                    </label>

                    <input type="text" class='form--input' wire:model='instance.floor' required>
                </div>
            </div>









            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}






            {{-- weekdays --}}
            <div class="col-12 col-md-12">
                <div class="d-flex align-items-center weekdays--wrapper flex-wrap mb-4">



                    {{-- loop - weekDays --}}
                    @foreach ($weekDays ?? [] as $key => $weekDay)


                    {{-- checkWeekDay --}}

                    <input type="checkbox" id="plan-weekdays-checkbox-{{ $key }}" class='d-none plan--weekdays-checkbox'
                        name='weekdays--checkbox' value='{{ $weekDay }}'
                        wire:model='instance.deliveryDays.{{ $weekDay }}'>


                    <label class='pointer plan--weekdays motion--slow mb-3' key='plan-weekdays-{{ $key }}'
                        wire:loading.class='processing--button' wire:target='instance.deliveryDays'
                        for='plan-weekdays-checkbox-{{ $key }}'>
                        {{ $weekDay }}</label>



                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>







            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}







            {{-- map --}}
            <div class="col-12">

                <div id="map"></div>

            </div>
            {{-- endMap --}}










            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}








            {{-- submitButton --}}
            <div class="col-12">
                <div class="d-flex form--input-wrapper justify-content-center mb-4 mt-1
                @if (!$settings?->showButtonMotion) no--button-motion @endif"
                    wire:loading.class='processing--button-wrap' wire:target='confirm'>

                    <livewire:website.components.items.button-blob title='Confirm' type="submit" />

                </div>
            </div>








        </form>
        {{-- endContent --}}



    </div>
    {{-- endWrapper --}}





















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $("#address--modal .level--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>















    {{-- levelSelectHandle --}}
    <script>
        $("#address--modal .level--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         levelType = $(this).attr('data-level');
         levelId = $(this).attr('data-id');


         @this.levelSelect(levelType, null, selectValue, levelId);


      }); //end function
    </script>











    {{-- map --}}
    <script>
        $(document).ready(function () {
        let map, infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 6,
            });
            infoWindow = new google.maps.InfoWindow();
            const locationButton = document.createElement("button");

            locationButton.textContent = "Get Your Current Location";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                locationButton
            );
            locationButton.addEventListener("click", () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Okay Got It!");
                            infoWindow.open(map);
                            map.setCenter(pos);

                            // 1: updateVariables
                            @this.set('instance.latitude', pos.lat);
                            @this.set('instance.longitude', pos.lng);
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    handleLocationError(false, infoWindow, map.getCenter());
                } // end else
            });
        } // end function






        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------




        // 2: handleError
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        } // end function



        // 2.5: initMap
        window.initMap = initMap;
    });
    </script>





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










</div>
{{-- endModal --}}