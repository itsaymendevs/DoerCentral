<div class="modal fade modal--inverse" role="dialog" tabindex="-1" id='plan--features-modal' wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            {{-- header --}}
            <div class="modal-header modal--header">
                <button class="btn-close btn--close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>



            {{-- ------------------------------ --}}
            {{-- ------------------------------ --}}




            {{-- body --}}
            @if ($plan)

            <div class="modal-body">
                <div class="section--group section--modal-group">
                    <div class="row">
                        <div class="col-12">


                            {{-- plan --}}
                            <h5 class="fw-bold mb-3 fs-sm-16 ">{{ $plan?->name }}</h5>


                            {{-- description --}}
                            <p class="service--subtitle mb-2 fst-italic
                                fs-sm-14 fs-15 truncate--3l h-72">{{$plan?->desc}}</p>





                            {{-- ----------------------------------------- --}}
                            {{-- ----------------------------------------- --}}





                            {{-- wrapper --}}
                            <div class="d-flex flex-column">


                                {{-- bottom --}}
                                <div class="d-block">

                                    {{-- price --}}
                                    <h3 class="fw-bold mt-2 mb-2 ls--price">
                                        <span class="currency--span sm me-1 fw-700 fs-sm-12">$</span>{{
                                        number_format($plan?->price, 1) }}<span
                                            class="fs-15 ms-1 text--per fw-600 fst-italic">/
                                            month</span>
                                    </h3>


                                    {{-- select --}}
                                    <button wire:click="confirmPlan('{{ $plan->id }}')" type='button'
                                        class="btn button--continue mb-3" role="button"
                                        wire:loading.attr='disabled'>Choose
                                        this plan</button>
                                </div>
                                {{-- endBottom --}}





                                {{-- ---------------------------- --}}
                                {{-- ---------------------------- --}}
                                {{-- ---------------------------- --}}




                                {{-- bundlesWrapper --}}
                                @if ($plan->bundles)




                                {{-- subheading --}}
                                <div class='fw-500 fs-15 key-features--title mt-4'>
                                    <h6>Essentials</h6>
                                    <hr>
                                </div>




                                {{-- wrapper --}}
                                <div class='key-features--wrapper'>


                                    {{-- loop - planBundles --}}
                                    @foreach ($plan?->bundles?->sortBy('bundleId')?? [] as $planBundle)


                                    <div class="service--checkbox-wrapper"
                                        key='plan-bundle-{{ $plan?->id }}-{{ $planBundle->id }}'>
                                        <div class="form-check form--checkbox-with-label mb-0"
                                            style="pointer-events: none !important;">

                                            {{-- input --}}
                                            <input class="form-check-input" type="checkbox"
                                                id="plan-bundle-checkbox-{{ $plan?->id }}-{{ $planBundle->id }}"
                                                checked="">

                                            {{-- label --}}
                                            <label class="form-check-label  no-events"
                                                for="plan-bundle-checkbox-{{ $plan?->id }}-{{ $planBundle->id }}">{{
                                                $planBundle->bundle?->name }}</label>
                                        </div>
                                    </div>


                                    @endforeach
                                    {{-- end loop --}}


                                </div>
                                {{-- endWrapper --}}




                                @endif
                                {{-- endWrapper --}}



                            </div>
                            {{-- endWrapper --}}

                        </div>
                    </div>
                </div>
            </div>


            @endif
            {{-- endModalBody --}}



        </div>
    </div>
</div>
{{-- endModal --}}