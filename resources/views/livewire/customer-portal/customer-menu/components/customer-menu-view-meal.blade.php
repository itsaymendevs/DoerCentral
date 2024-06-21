<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="view-meal" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Details</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- -------------------------------------------- --}}
                {{-- -------------------------------------------- --}}






                {{-- wrapper --}}
                <div class="px-4">
                    <div class="row align-items-start row pt-2 mb-4 meal--single-wrapper">



                        {{-- name - imageFile --}}
                        <div class="col-12">



                            {{-- 1: exists --}}
                            @if ($mealSize?->meal?->imageFile)

                            <img src="{{ asset('storage/menu/meals/' . $mealSize?->meal?->imageFile) }}" width="288"
                                height="200">


                            @endif
                            {{-- end if --}}




                            {{-- ----------------------------- --}}
                            {{-- ----------------------------- --}}





                            {{-- name --}}
                            <h5 class="fw-semibold text-center mt-3 mb-2 meal--single-name">
                                {{ $mealSize?->meal?->name }}
                            </h5>

                        </div>




                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}





                        {{-- consistOf --}}
                        <div class="col-12">


                            {{-- subtitle --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <hr style="width: 100%;">
                            </div>



                            {{-- 1: loop - parts --}}
                            @foreach ($mealSize?->parts ?? [] as $mealPart)

                            <h6 class="mb-3 fs-15 fw-normal">{{ $mealPart->part->name }}
                                <small class="ms-1 fw-semibold text-gold fs-11">
                                    ({{ number_format($mealPart->amount) }} G)</small>
                            </h6>

                            @endforeach
                            {{-- end loop --}}






                            {{-- 2: loop - ingredients --}}
                            @foreach ($mealSize?->ingredients ?? [] as $mealIngredient)

                            <h6 class="mb-3 fs-15 fw-normal">{{ $mealIngredient->ingredient->name }}
                                <small class="ms-1 fw-semibold text-gold fs-11">
                                    ({{ number_format($mealIngredient->amount) }} G)</small>
                            </h6>

                            @endforeach
                            {{-- end loop --}}


                        </div>
                        {{-- endCol --}}







                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}





                        {{-- closeModal --}}
                        <div class="col-12 text-center mt-4">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                type="button" data-bs-dismiss="modal">Close</button>
                        </div>



                    </div>
                </div>
                {{-- endWrapper --}}






            </div>
        </div>
    </div>
</div>
{{-- endModal --}}