{{-- newVehicle --}}
<div class="modal fade modal--shadow" id="new-vehicle" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Vehicle</h5>

                    {{-- closeButton --}}
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                        <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}






                {{-- ------------------------------------------------------ --}}
                {{-- ------------------------------------------------------ --}}







                {{-- form --}}
                <form class="px-4" wire:submit='store'>
                    <div class="row align-items-start pt-2 mb-4">




                        {{-- name --}}
                        <div class="col-4">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.name' />
                        </div>





                        {{-- empty --}}
                        <div class="col-4"></div>





                        {{-- type --}}
                        <div class="col-4" wire:ignore>
                            <label class="form-label form--label">Type</label>
                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                <select class="form-select form--modal-select form--modal-vehicle-select-1"
                                    data-modal='#new-vehicle' data-instance='instance.type' required>
                                    <option value=""></option>

                                    @foreach ($vehicleTypes as $vehicleType)
                                    <option value="{{ $vehicleType }}">{{ $vehicleType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>










                        {{-- plate --}}
                        <div class="col-4">

                            {{-- label --}}
                            <div class="d-flex align-items-center justify-content-between mb-1 invisible">
                                <hr style="width: 70%">
                                <label
                                    class="form-label form--label px-3 w-50 justify-content-center mb-0">plate</label>
                            </div>


                            {{-- input --}}
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.plate' placeholder="Plate Number" />
                        </div>









                        {{-- issueDate --}}
                        <div class="col-4">


                            {{-- label --}}
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 70%">
                                <label
                                    class="form-label form--label px-3 w-50 justify-content-center mb-0">Issue</label>
                            </div>


                            <input class="form-control form--input mb-4" type="date" required
                                wire:model='instance.issueDate' />

                        </div>











                        {{-- expiryDate --}}
                        <div class="col-4">


                            {{-- label --}}
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 70%">
                                <label
                                    class="form-label form--label px-3 w-50 justify-content-center mb-0">Expiry</label>
                            </div>


                            {{-- input --}}
                            <input class="form-control form--input mb-4" type="date" required
                                wire:model='instance.expiryDate' />
                        </div>













                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- attachments --}}



                        {{-- hr --}}
                        <div class="col-12 mb-2">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 70%">
                                <label
                                    class="form-label form--label px-3 w-50 justify-content-center mb-0">Attachments</label>
                            </div>
                        </div>








                        {{-- imageFile --}}
                        <div class="col-3">


                            {{-- label --}}
                            <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                for="vehicle--file-1" title="Click To Upload">




                                {{-- caption --}}
                                <span class="upload--caption badge">Profile</span>




                                {{-- input --}}
                                <input class="form-control d-none file--input" id="vehicle--file-1"
                                    data-preview="vehicle--preview-1" type="file" wire:model='instance.imageFile'
                                    required />


                                {{-- preview --}}
                                <img class="inventory--image-frame" id="vehicle--preview-1"
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
                        {{-- endCol --}}








                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}





                        {{-- plateFile --}}
                        <div class="col-3">


                            {{-- label --}}
                            <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                for="plate--file-1" title="Click To Upload">




                                {{-- caption --}}
                                <span class="upload--caption badge">Plate</span>





                                {{-- input --}}
                                <input class="form-control d-none file--input" id="plate--file-1"
                                    data-preview="plate--preview-1" type="file" wire:model='instance.plateFile'
                                    required />


                                {{-- preview --}}
                                <img class="inventory--image-frame" id="plate--preview-1"
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
                        {{-- endCol --}}









                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}






                        {{-- insurance --}}
                        <div class="col-3">


                            {{-- label --}}
                            <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                for="insurance--file-1" title="Click To Upload">



                                {{-- caption --}}
                                <span class="upload--caption badge">Insurance</span>



                                {{-- input --}}
                                <input class="form-control d-none file--input" id="insurance--file-1"
                                    data-preview="insurance--preview-1" type="file"
                                    wire:model='instance.insuranceFile' />






                                {{-- preview --}}
                                <img class="inventory--image-frame" id="insurance--preview-1"
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
                        {{-- endCol --}}







                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}








                        {{-- Ownership --}}
                        <div class="col-3">




                            {{-- ownershipFile --}}
                            <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                for="ownership--file-1" title="Click To Upload">



                                {{-- caption --}}
                                <span class="upload--caption badge">Ownership</span>




                                {{-- input --}}
                                <input class="form-control d-none file--input" id="ownership--file-1"
                                    data-preview="ownership--preview-1" type="file"
                                    wire:model='instance.ownershipFile' />


                                {{-- preview --}}
                                <img class="inventory--image-frame" id="ownership--preview-1"
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
                        {{-- endCol --}}











                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-4">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'
                                wire:target='store, instance.imageFile, instance.plateFile, instance.insuranceFile, instance.ownershipFile'>
                                Save
                            </button>
                        </div>


                    </div>
                </form>
                {{-- endForm --}}




            </div>
        </div>
    </div>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--modal-vehicle-select-1").on("change", function(event) {



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