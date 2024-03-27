<form wire:submit='update'>
    <div class="row align-items-end">







        {{-- city --}}
        <div class="col-12 col-sm-4">


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
                <hr style="width: 65%" />
                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">City</label>
            </div>


            {{-- select --}}
            <div class="select--single-wrapper mb-4" wire:ignore>

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
        <div class="col-12 col-sm-4">


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
                <hr style="width: 65%" />
                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">District</label>
            </div>


            {{-- select --}}
            <div class="select--single-wrapper mb-4" wire:ignore>
                <select class="form-select form--select" id='district-select-{{ $address->id }}'
                    data-instance='instance.cityDistrictId' required value='{{ $instance->cityDistrictId }}'
                    data-trigger='true'>
                    <option value=""></option>
                </select>
            </div>
        </div>







        {{-- deliveryTime --}}
        <div class="col-12 col-sm-4">


            {{-- hr --}}
            <div class="d-flex align-items-center justify-content-between mb-1">
                <hr style="width: 65%" />
                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Timing</label>
            </div>


            {{-- select --}}
            <div class="select--single-wrapper mb-4" wire:ignore>
                <select class="form-select form--select" id='deliveryTime-select-{{ $address->id }}'
                    data-instance='instance.deliveryTimeId' value='{{ $instance->deliveryTimeId }}' required
                    data-trigger='true'>
                    <option value=""></option>
                </select>
            </div>
        </div>










        {{-- ------------------- --}}
        {{-- ------------------- --}}








        {{-- locationAddress --}}
        <div class="col-12">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Address</label>
                <input class="form-control form--input text-start" type="text" required
                    wire:model='instance.locationAddress' />
            </div>
        </div>










        {{-- title / name --}}
        <div class="col-12 col-md-4">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Name</label>
                <input class="form-control form--input text-start" type="text" required wire:model='instance.name' />
            </div>
        </div>










        {{-- apartment --}}
        <div class="col-12 col-md-4">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Apartment</label>
                <input class="form-control form--input text-start" type="text" wire:model='instance.apartment' />
            </div>
        </div>





        {{-- floor --}}
        <div class="col-12 col-md-4">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Floor</label>
                <input class="form-control form--input text-start" type="text" wire:model='instance.floor' />
            </div>
        </div>












        {{-- ------------------------ --}}
        {{-- ------------------------ --}}











        {{-- deliveryDays --}}
        <div class="col-12 mt-3 mt-lg-0">



            {{-- title --}}
            <div class="d-flex align-items-center justify-content-between mb-2 hr--title">
                <hr class="w-100" />
                <label class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-14">Delivery Days</label>
            </div>






            {{-- wrapper --}}
            <div class="mb-4 submenu--group text-center text-sm-start d-block d-lg-flex align-items-center justify-content-between"
                wire:ignore>





                {{-- loop - deliveryDays --}}
                @foreach ($weekDays as $key => $weekDay)




                {{-- label --}}
                <label class="form-check button--checkbox btn fs-14 p-0 @if (in_array($weekDay,
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








        {{-- submitButton --}}
        <div class="col-12 text-center">
            <button wire:loading.attr='disabled'
                class="btn btn--scheme btn--scheme-2 px-5 mx-1 py-2 d-inline-flex align-items-center fs-14 fw-semibold justify-content-center"
                style="border: 1px dashed var(--color-scheme-3)">
                Save Changes
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