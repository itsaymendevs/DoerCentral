<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-bundle" wire:ignore.self>
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Bundle</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}







                {{-- ----------------------------------------- --}}
                {{-- ----------------------------------------- --}}







                {{-- form --}}
                <form wire:submit='store' class="px-4">
                    <div class="row align-items-center justify-content-center row pt-2 mb-4">



                        {{-- imageFile --}}
                        <div class="col-5 mb-4">
                            <div>

                                {{-- label --}}
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="bundle--file-1" style="height: 235px">


                                    {{-- input --}}
                                    <input class="form-control  file--input" type="file" id="bundle--file-1"
                                        data-preview="bundle--preview-1" wire:model='instance.imageFile' required />



                                    {{-- image --}}
                                    <img id="bundle--preview-1" class="inventory--image-frame h-100"
                                        src="{{ url('assets/img/placeholder.png') }}" wire:ignore />


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
                        {{-- endLeftCol --}}










                        {{-- --------------------------- --}}
                        {{-- --------------------------- --}}






                        {{-- midContent --}}
                        <div class="col-7">
                            <div class="row align-items-center">



                                {{-- name --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Name</label>
                                    <input class="form-control form--input mb-4" type="text" required
                                        wire:model='instance.name' />
                                </div>






                                {{-- price --}}
                                <div class="col-12">
                                    <label class="form-label form--label">Price<small
                                            class="ms-1 fw-semibold text-gold fs-9">($)</small></label>
                                    <input class="form-control form--input mb-4" type="number" step='0.01' min='0'
                                        required wire:model='instance.price' />
                                </div>





                                {{-- module --}}
                                <div class="col-12" wire:ignore>
                                    <label class="form-label form--label">Module</label>
                                    <div class="select--single-wrapper mb-4" wire:loading.class='no-events-loading'>
                                        <select class="form-select form--modal-select form--modal-group-select-1"
                                            data-modal='#new-bundle' data-instance='instance.featureModuleId' required>
                                            <option value=""></option>

                                            @foreach ($featureModules as $featureModule)
                                            <option value="{{ $featureModule?->id }}">{{ $featureModule?->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                            </div>
                        </div>
                        {{-- endRow --}}





                        {{-- ---------------------------------------- --}}
                        {{-- ---------------------------------------- --}}






                        {{-- features --}}
                        <div class="col-12">
                            <div class="table-responsive memoir--table inline--table w-100">
                                <table class="table table-bordered" id="memoir--table">

                                    {{-- headers --}}
                                    <thead>
                                        <tr>
                                            <th class="th--lg"></th>
                                            <th class="th--sm text-center">Select</th>
                                        </tr>
                                    </thead>





                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}




                                    {{-- tbody --}}
                                    <tbody>


                                        {{-- loop - features --}}
                                        @foreach ($features ?? [] as $key => $feature)



                                        <tr key='single-bundle-feature-{{ $feature?->id }}'>



                                            {{-- feature --}}
                                            <td class="fs-14 fw-semibold">{{ $feature->name }}</td>

                                            {{-- select --}}
                                            <td class="fw-bold">
                                                <div class="form-check form-switch form-check-inline input--switch">
                                                    <input class="form-check-input pointer"
                                                        style='width: 55px; height: 18px'
                                                        id="bundle-feature-checkbox-{{ $feature->id }}" type="checkbox"
                                                        wire:model='instance.features.{{ $feature->id }}'>
                                                    <label class="form-check-label d-none"
                                                        for="bundle-feature-checkbox-{{ $feature->id }}">Label</label>
                                                </div>
                                            </td>

                                        </tr>



                                        @endforeach
                                        {{-- end loop --}}


                                    </tbody>
                                    {{-- end tbody --}}


                                </table>
                            </div>
                        </div>
                        {{-- end Features --}}






                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>Save</button>
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
        $(".form--modal-group-select-1").on("change", function(event) {



       // 1.1: getValue - instance
       selectValue = $(this).select2('val');
       instance = $(this).attr('data-instance');


       @this.set(instance, selectValue);
       @this.set('instance.features', []);


    }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</div>
{{-- endModal --}}