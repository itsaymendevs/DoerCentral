<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="ingredient-brands" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Ingredient Brands</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>




                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}




                {{-- wrapper --}}
                <div class="px-4">




                    {{-- storeForm --}}
                    <form wire:submit='store' class="row row pt-2 mb-4">




                        {{-- 1: name --}}
                        <div class="col-3">
                            <label class="form-label form--label">Brand</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.brand' />
                        </div>




                        {{-- empty --}}
                        <div class="col-6"></div>



                        {{-- ingredient --}}
                        <div class="col-3">
                            <label class="form-label form--label invisible">Placeholder</label>
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value="{{ $ingredient?->name }}" />
                        </div>





                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}







                        {{-- subheading --}}
                        <div class="col-12">
                            <h5 class="text-start mb-2 mt-2">Fresh Macros</h5>
                        </div>




                        {{-- macros --}}
                        <div class="col-12 mb-2">
                            <div class="row">




                                {{-- 1: calories --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Cal</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.calories' />
                                    </div>
                                </div>



                                {{-- proteins --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Protein</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.proteins' />
                                    </div>
                                </div>




                                {{-- carbs --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Carb</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.carbs' />
                                    </div>
                                </div>





                                {{-- fats --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Fat</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.fats' />
                                    </div>
                                </div>





                                {{-- cholesterol --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Cholest</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.cholesterol' />
                                    </div>
                                </div>





                                {{-- sodium --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Sodium</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.sodium' />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endRow --}}







                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}






                        {{-- 2nd row --}}
                        <div class="col-12">
                            <div class="row">



                                {{-- fiber --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Fiber</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.fiber' />
                                    </div>
                                </div>




                                {{-- sugar --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Sugar</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.sugar' />
                                    </div>
                                </div>



                                {{-- vitaminA --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Vitamin A</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.vitaminA' />
                                    </div>
                                </div>




                                {{-- vitaminC --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Vitamin C</label><input
                                            class="form-control form--input" type="number" step='0.01' required min='0'
                                            wire:model='instance.vitaminC' />
                                    </div>
                                </div>





                                {{-- calcium --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Calcium</label>
                                        <input class="form-control form--input" type="number" step='0.01' required
                                            min='0' wire:model='instance.calcium' />
                                    </div>
                                </div>


                                {{-- iron --}}
                                <div class="col">
                                    <div class="macro--wrap">
                                        <label class="form-label form--label">Iron</label><input
                                            class="form-control form--input" type="number" step='0.01' required min='0'
                                            wire:model='instance.iron' />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endRow --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-4 mb-5">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                                Save
                            </button>
                        </div>




                    </form>
                    {{-- endForm --}}







                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}











                    {{-- availableBrands --}}
                    @if ($brands)


                    <div class="row">


                        {{-- subheading --}}
                        <div class="col-12 text-end align-self-start brands--wrapper">
                            <h6 class="fw-normal text-gold mb-2 me-3">Available Brands Per 100 (G)</h6>
                        </div>




                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}






                        <div class="col-12 text-center align-self-start brands--wrapper mb-4">


                            {{-- tabsWrap --}}
                            <div class="tabs--wrap">



                                {{-- tabLinks --}}
                                <ul class="nav nav-tabs mb-2" role="tablist"
                                    style="background-color:var(--color-scheme-2)">


                                    {{-- loop - brands --}}
                                    @foreach ($brands ?? [] as $brand)

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" role="tab" data-bs-toggle="tab"
                                            href="#tab-brands-{{ $brand->id }}">{{
                                            $brand->brand }}</a>
                                    </li>


                                    @endforeach
                                    {{-- end loop --}}


                                </ul>
                                {{-- end tabLinks --}}




                                {{-- ------------------------------ --}}
                                {{-- ------------------------------ --}}






                                {{-- tabContent --}}
                                <div class="tab-content">




                                    {{-- loop - brands --}}
                                    @foreach ($brands ?? [] as $brand)


                                    {{-- singleTab --}}
                                    <div class="tab-pane fade no--card" role="tabpanel" id="tab-brands-{{ $brand->id }}"
                                        key='tab-brands-key-{{ $brand->id }}'>


                                        <livewire:dashboard.inventory.ingredients.components.ingredients-brands-edit
                                            :$brand key='tab-brands-content-{{ $brand->id }}'>

                                    </div>

                                    @endforeach
                                    {{-- end loop --}}


                                </div>
                                {{-- end tabContent --}}



                            </div>
                        </div>
                    </div>



                    @endif
                    {{-- end if - brandExists --}}


                    {{-- endRow --}}




                </div>
            </div>
        </div>
    </div>
</div>
{{-- endModal --}}