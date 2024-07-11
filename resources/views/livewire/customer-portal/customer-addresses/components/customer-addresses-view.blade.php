<form wire:submit='update'>





    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}






    {{-- styles --}}
    @section('styles')



    <style>
        @media (min-width: 992px) {

            .form--input-address {
                width: 83% !important;
            }

            .form--label-address {
                width: 17% !important;
            }
        }
    </style>



    @endsection
    {{-- endSection --}}









    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}








    {{-- row --}}
    <div class="row align-items-center">





        {{-- city --}}
        <div class="col-12 col-lg-4">


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
                <hr style="width: 65%" />
                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">City</label>
            </div>


            {{-- select --}}
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

                <select class="form-select form--select parent-select" id='city-select-{{ $address->id }}'
                    data-instance='instance.cityId' data-child='#district-select-{{ $address->id }}'
                    data-second-child='#deliveryTime-select-{{ $address->id }}' data-trigger='true'
                    value='{{ $address->cityId }}'>
                    <option value=""></option>

                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach

                </select>

            </div>
        </div>







        {{-- district --}}
        <div class="col-12 col-lg-4">


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
                <hr style="width: 65%" />
                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">District</label>
            </div>


            {{-- select --}}
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>
                <select class="form-select form--select" id='district-select-{{ $address->id }}'
                    data-instance='instance.cityDistrictId' required value='{{ $instance->cityDistrictId }}'
                    data-trigger='true'>
                    <option value=""></option>
                </select>
            </div>
        </div>







        {{-- deliveryTime --}}
        <div class="col-12 col-lg-4">


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
                <hr style="width: 65%" />
                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Timing</label>
            </div>


            {{-- select --}}
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>
                <select class="form-select form--select" id='deliveryTime-select-{{ $address->id }}'
                    data-instance='instance.deliveryTimeId' value='{{ $instance->deliveryTimeId }}' required
                    data-trigger='true'>
                    <option value=""></option>
                </select>
            </div>
        </div>










        {{-- ------------------- --}}
        {{-- ------------------- --}}






        {{-- title / name --}}
        <div class="col-12 col-lg-4">
            <div class="input--with-label journey mb-4">
                <label class="form-label form--label mb-0">Name</label>
                <input class="form-control form--input text-start" type="text" required wire:model='instance.name' />
            </div>
        </div>







        {{-- locationAddress --}}
        <div class="col-12 col-lg-8">
            <div class="input--with-label journey mb-4">
                <label class="form-label form--label mb-0 form--label-address">Address</label>
                <input class="form-control form--input text-start form--input-address" type="text" required
                    wire:model='instance.locationAddress' />
            </div>
        </div>











        {{-- ------------------- --}}
        {{-- ------------------- --}}











        {{-- apartment --}}
        <div class="col-12 col-lg-4">
            <div class="input--with-label journey mb-4">
                <label class="form-label form--label mb-0">Apartment</label>
                <input class="form-control form--input text-start" type="text" wire:model='instance.apartment' />
            </div>
        </div>





        {{-- floor --}}
        <div class="col-12 col-lg-4">
            <div class="input--with-label journey mb-4">
                <label class="form-label form--label mb-0">Floor</label>
                <input class="form-control form--input text-start" type="text" wire:model='instance.floor' />
            </div>
        </div>










        {{-- ------------------------ --}}
        {{-- ------------------------ --}}











        {{-- deliveryDays --}}
        <div class="col-12 mt-3 mt-lg-0">



            {{-- title --}}
            <div class="d-flex align-items-center justify-content-between mb-3 hr--title">
                <hr class="w-100" />
                <label class="form-label form--label px-3 mb-0 mx-auto justify-content-center fs-14"
                    style="width: 330px !important;">
                    Delivery Days
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-info-circle fs-5 ms-2 pointer" viewBox="0 0 16 16" data-bs-toggle="tooltip"
                        data-bss-tooltip="" data-bs-placement="top" style="fill: var(--bs-warning);"
                        title="Changing delivery days will set your menu picks to default!">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0">
                        </path>
                    </svg>
                </label>
            </div>






            {{-- wrapper --}}
            <div class="mb-4 submenu--group text-center text-sm-start d-block d-lg-flex align-items-center justify-content-between"
                wire:ignore>





                {{-- loop - deliveryDays --}}
                @foreach ($weekDays ?? [] as $key => $weekDay)





                {{-- label --}}
                <label class="form-check button--checkbox address-checkbox btn fs-14 p-0 @if (in_array($weekDay,
                $address->deliveryDaysInArray())) active @endif" for="formCheck-{{ $key }}-{{ $address->id }}">
                    {{ $weekDay }}
                </label>


                {{-- input --}}
                <input class="form-check-input d-none" type="checkbox" value='{{ $weekDay }}'
                    wire:model='instance.deliveryDays.{{ $weekDay }}' @if (in_array($weekDay,
                    $address->deliveryDaysInArray())) checked @endif id="formCheck-{{ $key }}-{{ $address->id }}" />






                @endforeach
                {{-- end loop --}}





            </div>
        </div>
        {{-- end deliveryDays --}}










        {{-- ------------------------ --}}
        {{-- ------------------------ --}}







        {{-- remove --}}
        <div class="col-2 col-md-4">
            <button class="btn btn--scheme btn--remove fs-12 px-2
            @if ($counter == 0) disabled @endif" type="button" wire:click='remove({{ $address->id }})'
                wire:loading.attr='disabled' wire:target='remove, update'>
                <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                    </path>
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                    </path>
                </svg>
            </button>
        </div>






        {{-- submitButton --}}
        <div class="col-8 col-md-4 text-center">
            <button wire:loading.attr='disabled'
                class="btn btn--scheme btn--scheme-outline-1 px-5 mx-1 py-2 d-inline-flex align-items-center fs-14 fw-semibold justify-content-center disabled">
                Update
            </button>
        </div>







    </div>
    {{-- endRow --}}
















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');


            @this.set(instance, selectValue);






            //  -----------------------------------
            //  -----------------------------------






            //  1.2: refreshChild to defaultValue
            if ($(this).hasClass('parent-select')) {



                childSelect = $(this).attr('data-child');
                childSecondSelect = $(this).attr('data-second-child');


                // :: inHelper
                @this.refreshSelect(childSelect, 'city', 'district', selectValue);
                @this.refreshSelect(childSecondSelect, 'city', 'deliveryTime', selectValue);



            } // end if





        }); //end function



    </script>





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</form>
{{-- endForm --}}