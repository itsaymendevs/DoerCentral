<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="edit-bundle" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">




                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Edit Bundle</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- end header --}}











                {{-- ----------------------------------- --}}
                {{-- ----------------------------------- --}}








                <form wire:submit='update' class="px-4">
                    <div class="row align-items-start row pt-2 mb-4">
                        <div class="col-12">
                            <div class="row justify-content-center">


                                {{-- overview --}}
                                <div class="col-12 text-center align-self-center">


                                    {{-- loop - mealTypesCounter by Type --}}
                                    @foreach ($types as $type)

                                    <h4 data-bs-toggle="tooltip" data-bss-tooltip=""
                                        class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1 me-1"
                                        title="{{ $type->name }}">
                                        {{ $requiredTypes[$type->id] ?? 0 }}
                                    </h4>


                                    @endforeach
                                    {{-- end loop --}}



                                </div>
                                {{-- end overview --}}











                                {{-- -------------------------- --}}
                                {{-- -------------------------- --}}







                                {{-- hr --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <hr class="w-75 mx-auto mt-2 mb-2" />
                                    </div>
                                </div>










                                {{-- mealTypes --}}
                                @foreach ($mealTypes as $mealType)



                                <div class="col-6 col-sm-4">



                                    {{-- name --}}
                                    <label class="form-label form--label justify-content-center fs-12">{{
                                        $mealType->name }}</label>






                                    {{-- rangeWrapper --}}
                                    <div class="range--input-wrapper mb-4">


                                        {{-- minus --}}
                                        <button class="btn btn--scheme px-2 range--button minus" type="button"
                                            data-type="minus" data-target="{{ $mealType->id }}-range-2">
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
                                            min="0" data-input="{{ $mealType->id }}-range-2"
                                            wire:model='currentBundleTypes.{{ $mealType->id }}'
                                            data-instance='currentBundleTypes.{{ $mealType->id }}' required />




                                        {{-- plus --}}
                                        <button class="btn btn--scheme px-2 range--button plus" type="button"
                                            data-type="plus" data-target="{{ $mealType->id }}-range-2">
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
                        {{-- endCol --}}








                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 disabled">
                                Update
                            </button>
                        </div>


                    </div>
                </form>
                {{-- endForm --}}






            </div>
        </div>
    </div>
    {{-- endContainer --}}










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