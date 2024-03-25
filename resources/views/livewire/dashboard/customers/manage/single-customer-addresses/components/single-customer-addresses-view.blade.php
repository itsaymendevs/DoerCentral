<form wire:submit='update'>
    <div class="row align-items-end">







        {{-- city --}}
        <div class="col-3">


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
        <div class="col-3">


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
        <div class="col-3">


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
        <div class="col-9">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0" style="width: 20%">Address</label>
                <input class="form-control form--input text-start" type="text" style="width: 80%" required
                    wire:model='instance.locationAddress' />
            </div>
        </div>







        {{-- empty --}}
        <div class="col-12"></div>











        {{-- title / name --}}
        <div class="col-3">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Name</label>
                <input class="form-control form--input text-start" type="text" required wire:model='instance.name' />
            </div>
        </div>










        {{-- apartment --}}
        <div class="col-3">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Apart.</label>
                <input class="form-control form--input text-start" type="text" wire:model='instance.apartment' />
            </div>
        </div>





        {{-- floor --}}
        <div class="col-3">
            <div class="input--with-label mb-4">
                <label class="form-label form--label mb-0">Floor</label>
                <input class="form-control form--input text-start" type="text" wire:model='instance.floor' />
            </div>
        </div>








        {{-- ------------------------ --}}
        {{-- ------------------------ --}}










        {{-- submitButton - remove --}}
        <div class="col-3 text-center">
            <button wire:loading.attr='disabled' wire:target='remove, store'
                class="btn btn--scheme btn--scheme-2 px-4 mx-1 mb-4 py-2 d-inline-flex align-items-center fs-14 mb-4 fw-semibold justify-content-center"
                style="border: 1px solid var(--color-scheme-2)">
                Update
            </button>




            {{-- 3: remove --}}
            <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 mb-4 scale--self-05 h-32" type="button"
                wire:click='remove({{ $address->id }})' wire:loading.attr='disabled' wire:target='remove, store'>
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










        {{-- ------------------------ --}}
        {{-- ------------------------ --}}











        {{-- deliveryDays --}}
        <div class="col-12 ">



            {{-- title --}}
            <div class="d-flex align-items-center justify-content-between mb-2 hr--title">
                <hr class="w-100" />
                <label class="form-label form--label px-3 mb-0 w-50 justify-content-center fs-13">Delivery Days</label>
            </div>






            {{-- wrapper --}}
            <div class="flex submenu--group text-start d-flex align-items-center justify-content-between" wire:ignore>





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


                console.log($(this).attr('id'));
                console.log(childSelect)
                console.log(childSecondSelect)


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