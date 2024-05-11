<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="purchase-ingredients" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">




                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Purchase Ingredients</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}








                {{-- form --}}
                <form class="px-4" wire:submit='store'>
                    <div class="row row pt-2 mb-4">


                        {{-- supplier --}}
                        <div class="col-4">
                            <label class="form-label form--label">Supplier</label>
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value='{{ $purchase?->supplier->name }}' />
                        </div>





                        {{-- empty --}}
                        <div class="col-4"></div>



                        {{-- po. --}}
                        <div class="col-4">
                            <label class="form-label form--label">P.O Number</label>
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value='{{ $purchase?->PONumber }}' />
                        </div>







                        {{-- newIngredient --}}
                        <div class="col-12">
                            <div class="row align-items-center">



                                {{-- ingredients --}}
                                <div class="col-4">
                                    <label class="form-label form--label">Ingredient</label>
                                    <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                        <select
                                            class="form-select form--modal-select form--modal-filter-ingredient-select"
                                            data-modal='#purchase-ingredients' id='purchase-ingredient-select-2'
                                            data-instance='instance.ingredientId' required>
                                            <option value=""></option>

                                            @foreach ($supplierIngredients as $supplierIngredients)
                                            <option value="{{ $supplierIngredients->ingredient->id }}">{{
                                                $supplierIngredients->ingredient->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>





                                {{-- unit --}}
                                <div class="col-3">
                                    <label class="form-label form--label">Unit</label>
                                    <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                        wire:model='instance.unitName' />
                                </div>



                                {{-- quantity --}}
                                <div class="col-2">
                                    <label class="form-label form--label">Quantity</label>
                                    <input class="form-control form--input mb-4" type="number" step='0.1' required
                                        wire:model='instance.quantity' />
                                </div>





                                {{-- submitButton --}}
                                <div class="col-3 text-center">
                                    <button
                                        class="btn btn--scheme btn--scheme-2 px-4 scalemix--3 py-1 d-inline-flex align-items-center fs-13"
                                        wire:loading.attr='disabled' @if ($purchase?->isConfirmed) disabled @endif>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16"
                                            class="bi bi-plus-circle-dotted fs-6 me-2">
                                            <path
                                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                                            </path>
                                        </svg>Append
                                    </button>
                                </div>








                                {{-- ----------------------------------------- --}}
                                {{-- ----------------------------------------- --}}












                                {{-- view purchaseIngredients --}}
                                <div class="col-12 mt-3">
                                    <div class="table-responsive memoir--table">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- head --}}
                                            <thead>
                                                <tr>
                                                    <th>Ingredient</th>
                                                    <th>Unit</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th></th>
                                                </tr>
                                            </thead>



                                            {{-- tbody --}}
                                            <tbody>


                                                {{-- loop - purchaseIngredients --}}
                                                @foreach ($purchaseIngredients as $purchaseIngredient)



                                                {{-- :: view purchaseIngredient --}}
                                                <livewire:dashboard.inventory.components.inventory-view-purchase-ingredient
                                                    :id='$purchaseIngredient->id' key='{{ $purchaseIngredient->id }}' />


                                                @endforeach
                                                {{-- end loop --}}


                                            </tbody>
                                            {{-- end tbody --}}



                                        </table>
                                    </div>
                                </div>
                                {{-- end viewCol --}}


                            </div>
                        </div>
                    </div>
                </form>
                {{-- endForm --}}



            </div>
        </div>
    </div>
    {{-- end modalBody --}}














    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--modal-filter-ingredient-select").on("change", function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');


            @this.set(instance, selectValue);
            @this.getUnit();

       }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





</div>
{{-- endModal --}}