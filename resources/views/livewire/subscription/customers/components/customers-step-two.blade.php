<div class="row row pt-2 align-items-center mb-5">



    {{-- 1: standardView --}}
    <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
        <div class="row pt-2 row align-items-center mb-4">



            {{-- loop - plans --}}
            @foreach ($plans as $plan)
            <div class="col-4 col-xl-3 col-xxl-3">
                <div class="overview--card client-version scale--self-05 mb-floating">
                    <div class="row">


                        {{-- image --}}
                        <div class="col-12 text-center position-relative">
                            <img class="client--card-logo of-cover"
                                src="{{ asset('storage/menu/plans/' . $plan->imageFile) }}" />
                        </div>




                        {{-- information --}}
                        <div class="col-12">


                            {{-- name - desc --}}
                            <h5 class="text-center fw-bold mt-3 mb-1 truncate-text-1l">{{ $plan->name }}</h5>
                            <p class="text-center fs-13 mb-1 truncate-text-3l height-3l">{{ $plan->desc }}</p>





                            {{-- ranges --}}
                            <p class="text-center fs-13 fw-bold text-danger">
                                <button
                                    class="btn btn--raw-icon fs-14 text-warning d-flex align-items-center justify-content-center scale--3"
                                    type="button">
                                    Starting From<strong class='ms-2 fs-5 fw-bold d-inline-block'>{{
                                        $plan->startingPrice
                                        }}</strong>
                                </button>
                            </p>
                        </div>
                        {{-- endCol --}}







                        {{-- actionsCol --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-center mb-1 mt-1">


                                {{-- 1: manage --}}
                                <a wire:navigate href="{{ route('dashboard.menuPlanBundles', [$plan->id]) }}"
                                    class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-2 scale--self-05"
                                    type="button">Select</a>




                                {{-- 2: isForWebsite --}}
                                @if ($plan->isForWebsite)
                                <button class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                    data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Hide Plan"
                                    wire:click='toggleForWebsite({{ $plan->id }})' wire:loading.attr='disabled'
                                    wire:target='toggleForWebsite, remove'>
                                    <svg class="bi bi-eye fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                        </path>
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                        </path>
                                    </svg>
                                </button>



                                {{-- isNot --}}
                                @else
                                <button class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                    data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Show Plan"
                                    wire:click='toggleForWebsite({{ $plan->id }})' wire:loading.attr='disabled'
                                    wire:target='toggleForWebsite, remove'>
                                    <svg class="bi bi-eye-slash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z">
                                        </path>
                                        <path
                                            d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z">
                                        </path>
                                        <path
                                            d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z">
                                        </path>
                                    </svg>
                                </button>
                                @endif
                                {{-- end if --}}








                                {{-- 3: remove --}}
                                <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32"
                                    type="button" wire:click='remove({{ $plan->id }})' wire:loading.attr='disabled'
                                    wire:target='toggleForWebsite, remove'>
                                    <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                        </path>
                                    </svg>
                                </button>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- end loop --}}


        </div>
    </div>
    {{-- endView --}}





</div>