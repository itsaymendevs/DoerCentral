<section id="content--section" class="content--section">
    <div class="container">



        {{-- form --}}
        <form wire:submit='update' class="row align-items-end mb-submenu">




            {{-- profile --}}
            <div class="col-12 mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-once="true" wire:ignore.self>


                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label
                        class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">Profile</label>
                </div>







                {{-- imageFile --}}
                <div>
                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                        title="Click To Upload" for="profile--file-1">

                        <input type="file" id="profile--file-1" class="d-none file--input"
                            data-preview="profile--preview-1" wire:model='instance.imageFile' />

                        <img id="profile--preview-1" class="inventory--image-frame" wire:ignore.self
                            src="{{ asset('storage/delivery/drivers/profiles/' . $driver?->imageFile) }}" />



                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-cloud-upload">
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





            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}






            {{-- information --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label
                        class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">Information</label>
                </div>
            </div>



            {{-- name --}}
            <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <label class="form-label form--label">Name</label>
                <input type="text" class="form--input mb-4" required wire:model='instance.name' />
            </div>




            {{-- phone --}}
            <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <label class="form-label form--label">Phone</label>
                <input type="text" class="form--input mb-4" required wire:model='instance.phone' pattern="[0-9]+"
                    minlength='9' maxlength='9' />
            </div>




            {{-- email --}}
            <div class="col-12" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <label class="form-label form--label">Email</label>
                <input type="email" class="form--input mb-4" required wire:model='instance.email' />
            </div>





            {{-- license --}}
            <div class="col-6" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 45%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">License</label>
                </div>
                <input type="text" class="form--input mb-4" required wire:model='instance.license' />
            </div>




            {{-- plate --}}
            <div class="col-6" data-aos="fade" data-aos-duration="800" data-aos-once="true" wire:ignore.self>
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 45%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Plate</label>
                </div>
                <input type="text" class="form--input mb-4" required wire:model='instance.plate' />
            </div>







            {{-- license --}}
            <div class="col-12 mb-4">



                {{-- subtitle --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label
                        class="form-label form--label px-3 w-50 justify-content-center mb-0 text-uppercase">license</label>
                </div>




                <div>
                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                        title="Click To Upload" for="license--file-1">

                        {{-- input --}}
                        <input type="file" id="license--file-1" class="d-none file--input"
                            data-preview="license--preview-1" wire:model='instance.licenseFile' />


                        {{-- img --}}
                        <img id="license--preview-1" class="inventory--image-frame"
                            src="{{ asset('storage/delivery/drivers/licenses/' . $driver?->licenseFile) }}"
                            wire:ignore.self />



                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-cloud-upload">
                            <path fill-rule="evenodd"
                                d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                            </path>
                        </svg>
                    </label>
                </div>





                {{-- :: update --}}
                <div class="text-center mb-5 mt-4">
                    <button wire:loading.attr='disabled'
                        class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                        style="border: 1px dashed var(--color-scheme-3)">
                        Update
                    </button>
                </div>
            </div>
        </form>



    </div>
    {{-- endContainer --}}







</section>
{{-- endSection --}}