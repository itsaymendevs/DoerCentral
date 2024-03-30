<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-address" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Address</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>








                {{-- ------------------------------ --}}
                {{-- ------------------------------ --}}







                <form wire:submit='store' class="px-4">
                    <div class="row align-items-center row pt-2 mb-4">



                        {{-- name --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.name'
                                required>
                        </div>




                        {{-- city --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label form--label">City</label>

                            {{-- select --}}
                            <div class="select--single-wrapper mb-4" wire:ignore>

                                <select class="form-select form--modal-select parent-select parent-select-2"
                                    id='city-modal-select-2' data-instance='instance.cityId' data-modal='#new-address'
                                    data-child='#district-modal-select-2'
                                    data-second-child='#deliveryTime-modal-select-2' required>
                                    <option value=""></option>

                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>








                        {{-- district --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label form--label">District</label>

                            {{-- select --}}
                            <div class="select--single-wrapper mb-4" wire:ignore>
                                <select class="form-select form--modal-select" id='district-modal-select-2'
                                    data-instance='instance.cityDistrictId' data-modal='#new-address' required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>









                        {{-- deliveryTime --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label form--label">Timing</label>

                            {{-- select --}}
                            <div class="select--single-wrapper mb-4" wire:ignore>
                                <select class="form-select form--modal-select" id='deliveryTime-modal-select-2'
                                    data-instance='instance.deliveryTimeId' data-modal='#new-address' required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>










                        {{-- locationAddress --}}
                        <div class="col-12 col-md-8">
                            <label class="form-label form--label">Address</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.locationAddress'>
                        </div>




                        {{-- apartment --}}
                        <div class="col-6 col-md-4">
                            <label class="form-label form--label">Apartment</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.apartment'>
                        </div>



                        {{-- floor --}}
                        <div class="col-6 col-md-4">
                            <label class="form-label form--label">Floor</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.floor'>
                        </div>







                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}










                        {{-- deliveryDays --}}
                        <div class="col-12">



                            {{-- title --}}
                            <div class="d-flex align-items-center justify-content-between mb-2 hr--title">
                                <hr class="w-100" />
                                <label class="form-label form--label px-2 mb-0
                                    w-50 justify-content-center fs-12">Delivery Days</label>
                            </div>






                            {{-- wrapper --}}
                            <div class="submenu--group text-start " wire:ignore.self>





                                {{-- loop - deliveryDays --}}
                                @foreach ($weekDays as $key => $weekDay)


                                {{-- :: notReserved --}}
                                @if (!in_array($weekDay, $reservedWeekDays))



                                {{-- label --}}
                                <label class="form-check button--checkbox btn fs-14 p-0 "
                                    for="formCheck-modal-{{ $key }}">
                                    {{ $weekDay }}
                                </label>


                                {{-- input --}}
                                <input class="form-check-input d-none" value='{{ $weekDay }}' type="checkbox"
                                    id="formCheck-modal-{{ $key }}" wire:model='instance.deliveryDays.{{ $weekDay }}' />




                                @endif
                                {{-- end if --}}


                                @endforeach
                                {{-- end loop --}}



                            </div>
                        </div>
                        {{-- end deliveryDays --}}









                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}








                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-2">
                            <button wire:loading.attr='disabled'
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                                Save
                            </button>
                        </div>



                    </div>
                </form>
                {{-- endForm --}}




            </div>
        </div>
    </div>
    {{-- endBody --}}














    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--modal-select").on("change", function(event) {



            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');


            @this.set(instance, selectValue);







            //  -----------------------------------
            //  -----------------------------------







            //  1.2: refreshChild to defaultValue
            if ($(this).hasClass('parent-select-2')) {

                childSelect = $(this).attr('data-child');
                childSecondSelect = $(this).attr('data-second-child');


                // :: inHelper
                @this.refreshSelect(childSelect, 'city', 'district', selectValue, true);
                @this.refreshSelect(childSecondSelect, 'city', 'deliveryTime', selectValue, true);


            } // end if





        }); //end function



    </script>





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





</div>
{{-- endModal --}}