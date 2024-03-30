<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-bundle" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Bundle</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}










                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}





                {{-- form --}}
                <form class="px-4" wire:submit='store'>
                    <div class="row align-items-start  pt-2 mb-4">





                        {{-- leftCol --}}
                        <div class="col-4">


                            {{-- name --}}
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.name'>



                            {{-- remarks --}}
                            <label class="form-label form--label">Remarks</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.remarks'>








                            {{-- imageFile --}}
                            <div>


                                {{-- label --}}
                                <label class="form-label upload--wrap" data-bs-toggle="tooltip" data-bss-tooltip=""
                                    title="Click To Upload" for="bundle--file-1">

                                    {{-- input --}}
                                    <input wire:model='instance.imageFile' class="form-control d-none file--input"
                                        type="file" id="bundle--file-1" data-preview="bundle--preview-1" required>

                                    {{-- image --}}
                                    <img id="bundle--preview-1" class="inventory--image-frame"
                                        src="{{ asset('assets/img/placeholder.png') }}" wire:ignore>



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
                        {{-- endCol --}}









                        {{-- rightCol --}}
                        <div class="col-8">
                            <div class="row">








                                {{-- overview --}}
                                <div class="col-12 text-center align-self-center mt-3 mb-2">


                                    {{-- loop - mealTypesCounter by Type --}}
                                    @foreach ($types as $type)

                                    <h4 data-bs-toggle="tooltip" data-bss-tooltip=""
                                        class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1 me-1"
                                        title="{{ $type->name }}">
                                        {{ $mealTypesCounter[$type->id] }}
                                    </h4>


                                    @endforeach
                                    {{-- end loop --}}



                                </div>
                                {{-- end overview --}}







                                {{-- hr --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <hr class="w-75 mx-auto mt-2 mb-3">
                                    </div>
                                </div>







                                {{-- mealTypes --}}
                                @foreach ($mealTypes as $key => $mealType)

                                <div class="col-4">



                                    {{-- name --}}
                                    <label class="form-label form--label justify-content-center fs-12">{{
                                        $mealType->name }}</label>



                                    {{-- rangeWrapper --}}
                                    <div class="range--input-wrapper mb-4">


                                        {{-- minus --}}
                                        <button class="btn btn--scheme px-2 range--button minus" type="button"
                                            data-type="minus" data-target="{{ $mealType->id }}-range-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-dash-circle">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z">
                                                </path>
                                            </svg>
                                        </button>




                                        {{-- input --}}
                                        <input class="form-control form--input range--input" type="number" step="1"
                                            min="0" data-input="{{ $mealType->id }}-range-1"
                                            wire:model='instance.mealTypes.{{ $mealType->id }}'
                                            data-instance='instance.mealTypes.{{ $mealType->id }}' required />




                                        {{-- plus --}}
                                        <button class="btn btn--scheme px-2 range--button plus" type="button"
                                            data-type="plus" data-target="{{ $mealType->id }}-range-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-circle">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>


                                @endforeach
                                {{-- end loop --}}



                            </div>
                        </div>
                        {{-- end rightCol --}}




                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-3">
                            <button wire:loading.attr='disabled' wire:target='store, instance.imageFile'
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">Save</button>
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







    {{-- rangeHandle --}}
    <script>
        $(".range--input").on("change", function(event) {



         // 1.1: getValue - instance
         rangeValue = $(this).val();
         instance = $(this).attr('data-instance');


         @this.set(instance, rangeValue);



      }); //end function
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</div>
{{-- endModal --}}