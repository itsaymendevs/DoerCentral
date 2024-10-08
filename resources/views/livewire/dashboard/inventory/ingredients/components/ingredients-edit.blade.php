<div class="modal fade modal--shadow" id="edit-ingredient" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Edit Ingredient</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                        <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                <form class="px-4" wire:submit='update'>
                    <div class="row row pt-2 mb-4">


                        {{-- leftCol --}}
                        <div class="col-3 align-self-start">



                            {{-- name --}}
                            <div>
                                <label class="form-label form--label">Name</label>
                                <input class="form-control form--input mb-4" type="text" wire:model='instance.name'
                                    required />
                            </div>




                            {{-- imageFile --}}
                            <div>
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    for="ingredient--file-2" style="height: 240px" title="Click To Upload">


                                    {{-- input --}}
                                    <input class="form-control d-none file--input" id="ingredient--file-2"
                                        data-preview="ingredient--preview-2" type="file"
                                        wire:model='instance.imageFile' />


                                    {{-- preview --}}
                                    <img class="inventory--image-frame h-100" id="ingredient--preview-2"
                                        src="{{ url('assets/img/placeholder.png') }}" style="height: 240px"
                                        wire:ignore />

                                    {{-- icon --}}
                                    <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                        </div>








                        {{-- midCol --}}
                        <div class="col-3 align-self-start">


                            {{-- reference --}}
                            <div>
                                <label class="form-label form--label">Reference ID</label>
                                <input class="form-control form--input mb-4" type="text"
                                    wire:model='instance.referenceID' />
                            </div>


                            {{-- increment --}}
                            <div>
                                <label class="form-label form--label">Increment %</label>
                                <input class="form-control form--input mb-4" type="number" step='0.01'
                                    wire:model='instance.increment' />
                            </div>





                            {{-- usage --}}
                            <div>
                                <label class="form-label form--label">Usage</label>
                                <textarea class="form-control form--input form--textarea mb-4"
                                    wire:model='instance.usage' style="height:126px"></textarea>
                            </div>

                        </div>
                        {{-- endCol --}}




                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}






                        {{-- rightCol --}}
                        <div class="col-3 align-self-start">


                            {{-- unit --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Measuring Unit</label>
                                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                    <select class="form-select form--modal-select form--modal-edit-ingredient-select"
                                        data-modal='#edit-ingredient' id='unit-select-2' data-instance='instance.unitId'
                                        data-trigger='true' required>
                                        <option value=""></option>

                                        @foreach ($units->where('isForPurchase', false) ?? [] as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>





                            {{-- decrement --}}
                            <div>
                                <label class="form-label form--label">Decrement %</label>
                                <input class="form-control form--input mb-4" type="number" step='0.01'
                                    wire:model='instance.decrement' />
                            </div>





                            {{-- breif - Desc --}}
                            <div>
                                <label class="form-label form--label">Breif</label>
                                <textarea class="form-control form--input form--textarea mb-4"
                                    wire:model='instance.desc' style="height:126px"></textarea>
                            </div>



                        </div>
                        {{-- endCol --}}








                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}








                        {{-- 2nd leftCol --}}
                        <div class="col-3 align-self-start">


                            {{-- purchaseUnit --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Purchase Unit</label>
                                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                    <select class="form-select form--modal-select form--modal-edit-ingredient-select"
                                        data-modal='#edit-ingredient' id='purchaseUnit-select-2' data-trigger='true'
                                        data-instance='instance.purchaseUnitId' required>
                                        <option value=""></option>

                                        @foreach ($units->where('isForPurchase', true) ?? [] as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>





                            {{-- wastage --}}
                            <div>
                                <label class="form-label form--label">Wastage %</label>
                                <input class="form-control form--input mb-4" type="number" step='0.01'
                                    wire:model='instance.wastage' />
                            </div>




                        </div>
                        {{-- endCol --}}








                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled' wire:target='instance.imageFile, update'>
                                Update
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
        $(".form--modal-edit-ingredient-select").on("change", function(event) {



          // 1.1: getValue - instance
          selectValue = $(this).select2('val');
          instance = $(this).attr('data-instance');


          @this.set(instance, selectValue);


       }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</div>
{{-- endModal --}}