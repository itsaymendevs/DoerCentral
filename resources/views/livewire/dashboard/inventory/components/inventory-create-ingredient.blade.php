<div class="modal fade modal--shadow" id="new-ingredient" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Ingredient</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                        <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                <form class="px-4" wire:submit='store'>
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
                                    for="ingredient--file-1" title="Click To Upload">


                                    {{-- input --}}
                                    <input class="form-control d-none file--input" id="ingredient--file-1"
                                        data-preview="ingredient--preview-1" type="file" wire:model='instance.imageFile'
                                        required />


                                    {{-- preview --}}
                                    <img class="inventory--image-frame" id="ingredient--preview-1"
                                        src="{{ asset('assets/img/placeholder.png') }}" wire:ignore />

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


                            {{-- decrement --}}
                            <div>
                                <label class="form-label form--label">Decrement %</label>
                                <input class="form-control form--input mb-4" type="number" step='0.01'
                                    wire:model='instance.decrement' />
                            </div>

                            {{-- wastage --}}
                            <div>
                                <label class="form-label form--label">Wastage %</label>
                                <input class="form-control form--input mb-4" type="number" step='0.01'
                                    wire:model='instance.wastage' />
                            </div>
                        </div>






                        {{-- rightCol --}}
                        <div class="col-3 align-self-start">


                            {{-- unit --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Measuring Unit</label>
                                <div class="select--single-wrapper mb-4">
                                    <select class="form-select form--modal-select" data-modal='#new-ingredient'
                                        data-instance='instance.unitId' required>
                                        <option value=""></option>

                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            {{-- category --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Category</label>
                                <div class="select--single-wrapper mb-4">
                                    <select class="form-select form--modal-select" data-modal='#new-ingredient'
                                        data-instance='instance.categoryId' required>
                                        <option value=""></option>

                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>



                            {{-- exclude --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Exclude</label>
                                <div class="select--single-wrapper mb-4">
                                    <select class="form-select form--modal-select" data-modal='#new-ingredient'
                                        data-instance='instance.excludeId'>
                                        <option value=""></option>

                                        @foreach ($excludes as $exclude)
                                        <option value="{{ $exclude->id }}">{{ $exclude->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>




                            {{-- usage --}}
                            <div>
                                <label class="form-label form--label">Usage</label>
                                <textarea class="form-control form--input form--textarea mb-4"
                                    wire:model='instance.usage'></textarea>
                            </div>
                        </div>
                        {{-- endCol --}}







                        {{-- 2nd leftCol --}}
                        <div class="col-3 align-self-start">


                            {{-- purchaseUnit --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Purchase Unit</label>
                                <div class="select--single-wrapper mb-4">
                                    <select class="form-select form--modal-select" data-modal='#new-ingredient'
                                        data-instance='instance.purchaseUnitId' required>
                                        <option value=""></option>

                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            {{-- group --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Group</label>
                                <div class="select--single-wrapper mb-4">
                                    <select class="form-select form--modal-select" data-modal='#new-ingredient'
                                        data-instance='instance.groupId' required>
                                        <option value=""></option>

                                        @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>





                            {{-- allergy --}}
                            <div wire:ignore>
                                <label class="form-label form--label">Alllergy</label>
                                <div class="select--single-wrapper mb-4">
                                    <select class="form-select form--modal-select" data-modal='#new-ingredient'
                                        data-instance='instance.allergyId'>
                                        <option value=""></option>

                                        @foreach ($allergies as $allergy)
                                        <option value="{{ $allergy->id }}">{{ $allergy->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            {{-- breif - Desc --}}
                            <div>
                                <label class="form-label form--label">Breif</label>
                                <textarea class="form-control form--input form--textarea mb-4"
                                    wire:model='instance.desc'></textarea>
                            </div>


                        </div>
                        {{-- endCol --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled' wire:target='instance.imageFile, store'>
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
        $(".form--select, .form--modal-select").on("change", function(event) {



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