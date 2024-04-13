<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="meal-replacement" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0" style="background-color: var(--color-scheme-2)">



                {{-- header --}}
                <header class="modal--header px-4" style="border-bottom: 1px solid var(--input-border-color)">
                    <h5 class="mb-0 fw-bold text-white">Replacement</h5>
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






                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}






                {{-- wrapper --}}
                <div class="px-4">
                    <div class="row justify-content-center align-items-center">





                        {{-- search --}}
                        <div class="col-4">
                            <input wire:model.live='searchMeal'
                                class="form-control form--input main-version mx-auto mb-5" type="search"
                                placeholder="Search By Name" />
                        </div>




                        {{-- empty --}}
                        <div class="col-12"></div>










                        {{-- loop - meals --}}
                        @foreach ($meals ?? [] as $meal)


                        <div class="col-12 col-sm-9 col-lg-5 col-xl-3" key='meal-replacement-{{ $meal->id }}'>
                            <div class="overview--card client-version scale--self-05 mb-floating mb-5">
                                <div class="row">


                                    {{-- imageFile --}}
                                    <div class="col-12 text-center position-relative">
                                        <img class="client--card-logo mt-0"
                                            src="{{ asset('storage/menu/meals/' . ($meal->imageFile ?? $defaultPlate)) }}" />
                                    </div>


                                    {{-- name --}}
                                    <div class="col-12">
                                        <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                            $meal->name }}</h6>
                                    </div>







                                    {{-- ------------------------ --}}
                                    {{-- ------------------------ --}}




                                    {{-- -------------------- --}}
                                    @php


                                    // :: check allergy - exclude
                                    $combine =
                                    $customer->checkMealCompatibility($meal->id);


                                    $isNotAllergy = $combine?->allergies->count() == 0;
                                    $isNotExclude = $combine?->excludes->count() == 0;


                                    @endphp
                                    {{-- -------------------- --}}











                                    {{-- midCol --}}
                                    <div class="col-12">




                                        {{-- size --}}
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            <button
                                                class="btn btn--raw-icon fs-13 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                type="button">
                                                {{ $meal?->diet?->name }}
                                            </button>
                                        </div>







                                        {{-- Actions --}}
                                        <div class="d-flex align-items-center justify-content-center mb-2 mt-1">


                                            {{-- 1: checkExclude / checkAllergy --}}
                                            <button class="btn btn--scheme btn--remove fs-11 px-3 mx-1 py-1"
                                                @if($isNotAllergy && $isNotExclude) disabled @endif type="button"
                                                data-bs-toggle='modal' data-bs-target='#replacement-excludes'
                                                wire:click='viewReplacementExcludes({{ $meal->id
                                                }})'>Excludes</button>

                                        </div>
                                    </div>
                                    {{-- end midCol --}}











                                    {{-- ------------------------ --}}
                                    {{-- ------------------------ --}}








                                    {{-- replaceButton --}}
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="btn btn--scheme btn--scheme-2 fs-12 mx-1  h-32 w-75
                                                @if (!$isNotAllergy) disabled @endif" type="button"
                                                wire:click='replace({{ $meal->id }})' wire:loading.attr='disabled'>
                                                Replace
                                            </button>
                                        </div>
                                    </div>
                                    {{-- endButton --}}



                                </div>
                            </div>
                        </div>


                        @endforeach
                        {{-- end loop - meals --}}









                        {{-- paginaions --}}
                        <diiv class="col-12">
                            {{ $meals?->links() }}
                        </diiv>








                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}





                        {{-- fallback --}}
                        @if ($meals?->count() == 0)



                        <div class="col-12 col-sm-9 col-lg-5 col-xl-3">
                            <div class="overview--card client-version scale--self-05 mb-floating mb-5">
                                <div class="row">

                                    {{-- imageFile --}}
                                    <div class="col-12 text-center position-relative"><img
                                            class="client--card-logo mt-0" src="{{ asset('assets/img/plate.png') }}" />
                                    </div>


                                    {{-- caption --}}
                                    <div class="col-12">
                                        <h6 class="text-center fw-bold
                                        mt-3 mb-2 truncate-text-2l height-2l">No Replacements<br />Available</h6>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endif
                        {{-- end if --}}




                    </div>
                </div>
                {{-- endWrapper --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}