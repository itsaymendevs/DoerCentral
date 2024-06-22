<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Manage Items' key='kitchen-submenu' />








        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}







        {{-- contentRow --}}
        <div class="row row pt-2 mb-5">




            {{-- 1: leftCol --}}
            <div class="col-8">



                {{-- subtitle --}}
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <hr class="w-50">
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Extra Costs</label>
                </div>






                {{-- ------------------------- --}}
                {{-- ------------------------- --}}




                {{-- row --}}
                <div class="row">



                    {{-- 1: cutlery --}}
                    <div class="col-6">
                        <div class="input--with-label">
                            <label class="form-label form--label mb-0">Cutlery</label>
                            <input type="number" step="0.01" class="form--input" placeholder="Cost"
                                wire:model='instanceServing.cutleryPrice' wire:change='updateServings'>
                        </div>
                    </div>



                </div>
                {{-- endRow --}}





            </div>
            {{-- end leftCol --}}











            {{-- ----------------------------------------------- --}}
            {{-- ----------------------------------------------- --}}






            {{-- rightCol --}}
            <form wire:submit='update' class="col-4">


                {{-- coolerBag --}}
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <hr class="w-50">
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Cool Bag</label>
                </div>






                {{-- 1: imageFile --}}
                <div class="mb-4">


                    <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                        for="bag--file-1" title="Click To Upload">


                        {{-- input --}}
                        <input class="form-control d-none file--input" id="bag--file-1" data-preview="bag--preview-1"
                            type="file" wire:model='instance.imageFile' />

                        {{-- preview --}}
                        <img class="inventory--image-frame" id="bag--preview-1"
                            src="{{ asset('assets/img/placeholder.png') }}" wire:ignore />

                        {{-- icon --}}
                        <svg class="bi bi-cloud-upload" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z">
                            </path>
                        </svg>
                    </label>
                </div>




                {{-- ------------------------------------- --}}
                {{-- ------------------------------------- --}}






                {{-- bottomRow --}}
                <div class="row justify-content-center align-items-center">


                    {{-- price --}}
                    <div class="col-8">
                        <input type="number" step='0.01' class="form--input text-center" placeholder="Price" required
                            wire:model='instance.price' min='0'>
                    </div>



                    {{-- submitButton --}}
                    <div class="col-4">
                        <button
                            class="btn btn--scheme btn--scheme-3  w-100 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                            wire:loading.attr="disabled" wire:target="instance.imageFile, update">Update</button>
                    </div>

                </div>
                {{-- endRow --}}

            </form>
        </div>
        {{-- endRow --}}









</section>
{{-- endSection --}}