<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="migrate-bundle" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Migrate Bundle</h5>
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









                {{-- ---------------------------- --}}
                {{-- ---------------------------- --}}





                {{-- form --}}
                <form wire:submit='migrate' class="px-4">
                    <div class="row align-items-start row pt-2 mb-4">


                        {{-- bundle --}}
                        <div class="col-4">
                            <input class="form-control form--input mb-4 readonly" type="text"
                                value="{{ $bundle?->name }}" readonly="" />
                        </div>




                        {{-- rightCol --}}
                        <div class="col-8">
                            <div class="row mt-2">


                                {{-- loop - plans --}}
                                @foreach ($plans as $key => $plan)

                                <div class="col-6">
                                    <div class="form-check form-switch mb-3 mealType--checkbox">


                                        {{-- input --}}
                                        <input class="form-check-input pointer sm" type="checkbox"
                                            id="migrate-plan-{{ $plan->id }}"
                                            wire:model='selectedPlans.{{ $plan->id }}' />


                                        {{-- label --}}
                                        <label class="form-check-label fs-14" for="migrate-plan-{{ $plan->id }}">
                                            {{ $plan->name }}
                                        </label>


                                    </div>
                                </div>

                                @endforeach
                                {{-- end loop --}}




                            </div>
                        </div>
                        {{-- endCol --}}






                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button wire:loading.attr='disabled' wire:target='migrate'
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                                Migrate
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