{{-- newDriver --}}
<div class="modal fade modal--shadow" id="new-driver" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Driver</h5>

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
                    <div class="row align-items-end pt-2 mb-4">


                        {{-- name --}}
                        <div class="col-4">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.name' />
                        </div>

                        {{-- empty --}}
                        <div class="col-4"></div>



                        {{-- license --}}
                        <div class="col-4">
                            <label class="form-label form--label">License</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.license' />
                        </div>




                        {{-- phone --}}
                        <div class="col-4">
                            <label class="form-label form--label">Phone</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.phone' />
                        </div>


                        {{-- email --}}
                        <div class="col-4">
                            <label class="form-label form--label">Email</label>
                            <input class="form-control form--input mb-4" type="email" required
                                wire:model='instance.email' />
                        </div>


                        {{-- password --}}
                        <div class="col-4">
                            <label class="form-label form--label">Password</label>
                            <input class="form-control form--input mb-4" type="password" required
                                wire:model='instance.password' />
                        </div>




                        {{-- shift --}}
                        <div class="col-4" wire:ignore>
                            <label class="form-label form--label">Shift Type</label>
                            <div class="select--single-wrapper mb-4">
                                <select class="form-select form--modal-select" data-modal='#new-driver'
                                    data-instance='instance.shiftTypeId' required>
                                    <option value=""></option>

                                    @foreach ($shiftTypes as $shiftType)
                                    <option value="{{ $shiftType->id }}">{{ $shiftType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>






                        {{-- deliveryZones --}}
                        <div class="col-8" wire:ignore>
                            <label class="form-label form--label">Delivery Zones</label>
                            <div class="select--single-wrapper mb-4">
                                <select class="form-select form--modal-select" data-modal='#new-driver'
                                    data-instance='instance.zones' multiple="">
                                    @foreach ($zones as $zone)
                                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>







                        {{-- imageFile --}}
                        <div class="col-6">


                            {{-- label --}}
                            <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                for="driver--file-1" title="Click To Upload">

                                {{-- input --}}
                                <input class="form-control d-none file--input" id="driver--file-1"
                                    data-preview="driver--preview-1" type="file" wire:model='instance.imageFile'
                                    required />


                                {{-- preview --}}
                                <img class="inventory--image-frame" id="driver--preview-1"
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





                        {{-- licenseFile --}}
                        <div class="col-6">


                            {{-- label --}}
                            <label class="col-form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                for="driver--file-2" title="Click To Upload">


                                {{-- input --}}
                                <input class="form-control d-none file--input" id="driver--file-2"
                                    data-preview="driver--preview-2" type="file" wire:model='instance.licenseFile'
                                    required />


                                {{-- preview --}}
                                <img class="inventory--image-frame" id="driver--preview-2"
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





                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-4">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'
                                wire:target='store, instance.imageFile, instance.licenseFile'>
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