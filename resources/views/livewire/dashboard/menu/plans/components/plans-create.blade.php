<div class="modal fade modal--shadow" id="new-plan" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Plan</h5>
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







                {{-- ---------------------------------------------------- --}}
                {{-- ---------------------------------------------------- --}}







                {{-- form --}}
                <form class="px-4" wire:submit='store'>
                    <div class="row align-items-start justify-content-center pt-2 mb-4">




                        {{-- topCol --}}
                        <div class="col-12">
                            <div class="row justify-content-center">




                                {{-- imageFiles --}}
                                <div class="col-4">



                                    {{-- 1: imageFile --}}
                                    <div class="d-flex mb-3">
                                        <label class="form-label upload--wrap w-100" data-bs-toggle="tooltip"
                                            data-bss-tooltip="" for="plan--file-1" title="Click To Upload">


                                            {{-- input --}}
                                            <input class="form-control d-none file--input" id="plan--file-1"
                                                data-preview="plan--preview-1" type="file"
                                                wire:model='instance.imageFile' required />

                                            {{-- preview --}}
                                            <img class="inventory--image-frame" style="height: 293px;"
                                                id="plan--preview-1" src="{{ asset('assets/img/placeholder.png') }}"
                                                wire:ignore />

                                            {{-- icon --}}
                                            <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                                                </path>
                                            </svg>
                                        </label>
                                    </div>





                                    {{-- --------------- --}}
                                    {{-- --------------- --}}





                                    {{-- 2: secondImageFile --}}
                                    <div class='d-flex'>
                                        <label class="form-label upload--wrap w-100" data-bs-toggle="tooltip"
                                            data-bss-tooltip="" for="plan--file-2" title="Click To Upload">


                                            {{-- input --}}
                                            <input class="form-control d-none file--input" id="plan--file-2"
                                                data-preview="plan--preview-2" type="file"
                                                wire:model='instance.secondImageFile' />



                                            {{-- preview --}}
                                            <img class="inventory--image-frame" id="plan--preview-2"
                                                style="height: 293px;" src="{{ asset('assets/img/placeholder.png') }}"
                                                wire:ignore />

                                            {{-- icon --}}
                                            <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
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
                                {{-- endCol --}}







                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}







                                {{-- rightCol --}}
                                <div class="col-8">
                                    <div class="row">




                                        {{-- name --}}
                                        <div class="col-7">
                                            <label class="form-label form--label">Name</label>
                                            <input class="form-control form--input mb-4" type="text" required
                                                wire:model='instance.name' />
                                        </div>






                                        {{-- startingPrice --}}
                                        <div class="col-5">
                                            <label class="form-label form--label">Starting Price<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(AED)</small>
                                            </label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instance.startingPrice' required />
                                        </div>






                                        {{-- caption --}}
                                        <div class="col-12">
                                            <label class="form-label form--label">Caption<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(Optional)</small></label>
                                            <input class="form-control form--input mb-4" type="text"
                                                wire:model='instance.caption' />
                                        </div>





                                        {{-- videoURL --}}
                                        <div class="col-12">
                                            <label class="form-label form--label">Video URL<small
                                                    class="ms-1 fw-semibold text-gold fs-9">(Embed)</small></label>
                                            <input class="form-control form--input mb-4" type="url"
                                                wire:model='instance.videoURL' />
                                        </div>







                                        {{-- desc --}}
                                        <div class="col-12">
                                            <label class="form-label form--label">Short Brief</label>
                                            <textarea class="form-control form--input form--textarea mb-4"
                                                style="height: 120px" wire:model='instance.desc' required></textarea>
                                        </div>







                                        {{-- longDesc --}}
                                        <div class="col-12">
                                            <label class="form-label form--label">Long Description</label>
                                            <textarea class="form-control form--input form--textarea mb-4"
                                                style="height: 170px" wire:model='instance.longDesc'
                                                required></textarea>
                                        </div>

                                    </div>
                                </div>
                                {{-- endCol --}}




                            </div>
                        </div>
                        {{-- end topCol --}}










                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}











                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}





                        {{-- planPictures --}}


                        {{-- title --}}
                        <div class="col-12 mt-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <hr class="w-75">
                                <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Extra
                                    Pictures</label>
                            </div>
                        </div>






                        {{-- extraFiles --}}
                        <div class="col-12">
                            <div class="row">



                                {{-- 3: thirdImageFile --}}
                                <div class='col-6 mb-4'>
                                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                        for="plan--file-3" title="Click To Upload">


                                        {{-- caption --}}
                                        <span class="upload--caption badge">900 x 1170</span>




                                        {{-- input --}}
                                        <input class="form-control d-none file--input" id="plan--file-3"
                                            data-preview="plan--preview-3" type="file"
                                            wire:model='instance.thirdImageFile' />


                                        {{-- preview --}}
                                        <img class="inventory--image-frame" id="plan--preview-3"
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







                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}







                                {{-- 4: fourthImageFile --}}
                                <div class='col-6 mb-4'>
                                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                        for="plan--file-4" title="Click To Upload">


                                        {{-- caption --}}
                                        <span class="upload--caption badge">900 x 900</span>




                                        {{-- input --}}
                                        <input class="form-control d-none file--input" id="plan--file-4"
                                            data-preview="plan--preview-4" type="file"
                                            wire:model='instance.fourthImageFile' />



                                        {{-- preview --}}
                                        <img class="inventory--image-frame" id="plan--preview-4"
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







                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}







                                {{-- 6: sixthImageFile --}}
                                <div class='col-6'>
                                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                        for="plan--file-6" title="Click To Upload">



                                        {{-- caption --}}
                                        <span class="upload--caption badge">1080 x 1080</span>




                                        {{-- input --}}
                                        <input class="form-control d-none file--input" id="plan--file-6"
                                            data-preview="plan--preview-6" type="file"
                                            wire:model='instance.sixthImageFile' />

                                        {{-- preview --}}
                                        <img class="inventory--image-frame" id="plan--preview-6"
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










                                {{-- ------------------------------- --}}
                                {{-- ------------------------------- --}}








                                {{-- 5: fifthImageFile --}}
                                <div class='col-6'>
                                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                        for="plan--file-5" title="Click To Upload">



                                        {{-- caption --}}
                                        <span class="upload--caption badge">1920 x 1080</span>




                                        {{-- input --}}
                                        <input class="form-control d-none file--input" id="plan--file-5"
                                            data-preview="plan--preview-5" type="file"
                                            wire:model='instance.fifthImageFile' />

                                        {{-- preview --}}
                                        <img class="inventory--image-frame" id="plan--preview-5"
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
                        </div>
                        {{-- endCol --}}










                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}
                        {{-- ----------------------------- --}}




                        {{-- sectionPoint --}}





                        {{-- wrapper --}}
                        <div class="col-12 mt-5">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <hr class="w-75">
                                <label class="form-label form--label px-3 w-25 justify-content-center mb-0">Custom
                                    Section</label>
                            </div>
                        </div>






                        {{-- points --}}
                        <div class="col-12">
                            <div class="row align-items-center">


                                {{-- sectionTitle --}}
                                <div class="col-9">
                                    <label class="form-label form--label">Section Title</label>
                                    <input class="form-control form--input mb-4" type="text"
                                        wire:model='instance.sectionTitle' />
                                </div>




                                {{-- sectionPoint --}}
                                <div class="col-9">
                                    <input class="form-control form--input mb-4" type="text" wire:model='sectionPoint'
                                        placeholder="Section Point" />
                                </div>





                                {{-- appendButton --}}
                                <div class="col-3 text-center mb-4 mt-1">
                                    <button
                                        class="btn btn--scheme btn--scheme-2 px-4 scalemix--3 py-1 d-inline-flex align-items-center fs-13"
                                        wire:click='append' type='button' wire:loading.attr="disabled">
                                        <svg class="bi bi-plus-circle-dotted fs-6 me-2"
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                                            </path>
                                        </svg>Append
                                    </button>
                                </div>







                                {{-- ----------------------------------------- --}}
                                {{-- ----------------------------------------- --}}





                                {{-- points --}}
                                <div class="col-12 points--wrapper mt-3">
                                    <div class="table-responsive memoir--table">
                                        <table class="table table-bordered" id="memoir--table">



                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xl">Point</th>
                                                    <th class="th--xs"></th>
                                                </tr>
                                            </thead>







                                            {{-- --------------------------- --}}
                                            {{-- --------------------------- --}}







                                            {{-- tbody --}}
                                            <tbody>


                                                {{-- loop - points --}}
                                                @foreach ($instance?->points ?? [] as $key => $point)



                                                <tr key='single-plan-point-{{ $key }}'>

                                                    {{-- 1: point --}}
                                                    <td>{{ $point }}</td>



                                                    {{-- 2: remove --}}
                                                    <td>
                                                        <button class="btn btn--raw-icon scale--3" type="button"
                                                            wire:click='remove({{ $key }})' wire:loading.attr='disabled'
                                                            wire:target='remove, store'>
                                                            <svg class="bi bi-trash fs-5"
                                                                style="fill: var(--delete-color)"
                                                                xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                                </path>
                                                                <path fill-rule="evenodd"
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </td>

                                                </tr>

                                                @endforeach
                                                {{-- end loop --}}



                                            </tbody>
                                            {{-- end tbody --}}


                                        </table>
                                    </div>

                                </div>
                                {{-- endWrapper --}}


                            </div>
                        </div>
                        {{-- endCol --}}













                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}







                        {{-- submit --}}
                        <div class="col-12 text-center mt-4">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'
                                wire:target='instance.imageFile, instance.secondImageFile, instance.thirdImageFile, instance.fourthImageFile, instance.fifthImageFile, instance.sixthImageFile, store'>
                                Save
                            </button>
                        </div>


                    </div>
                </form>
                {{-- endForm --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}