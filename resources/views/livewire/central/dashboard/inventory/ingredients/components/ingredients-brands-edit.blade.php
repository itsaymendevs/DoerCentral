<form wire:submit='update'>
    <div class="row pt-2 mb-4">



        {{-- brand --}}
        <div class="col-3">
            <input class="form-control form--input mb-4" type="text" required wire:model='instance.brand' />
        </div>




        <div class="col-9 text-end">
            <button class="btn btn--scheme btn--remove fs-12 px-2 mx-1 scale--self-05 h-32
                @if ($instance->brand == 'Regular') disabled @endif" type="button"
                wire:click="remove({{ $instance?->id }})" wire:loading.attr="disabled" wire:target="update, remove">
                <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                    </path>
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                    </path>
                </svg>
            </button>
        </div>







        {{-- --------------------------------------------- --}}
        {{-- --------------------------------------------- --}}







        {{-- macros --}}
        <div class="col-12 mb-2">
            <div class="row">




                {{-- 1: calories --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Cal</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.calories' />
                    </div>
                </div>



                {{-- proteins --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Protein</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.proteins' />
                    </div>
                </div>




                {{-- carbs --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Carb</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.carbs' />
                    </div>
                </div>





                {{-- fats --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Fat</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.fats' />
                    </div>
                </div>





                {{-- cholesterol --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Cholest</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.cholesterol' />
                    </div>
                </div>





                {{-- sodium --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Sodium</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.sodium' />
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
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.fiber' />
                    </div>
                </div>




                {{-- sugar --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Sugar</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.sugar' />
                    </div>
                </div>



                {{-- vitaminA --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Vitamin A</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.vitaminA' />
                    </div>
                </div>




                {{-- vitaminC --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Vitamin C</label><input class="form-control form--input"
                            type="number" step='0.01' required min='0' wire:model='instance.vitaminC' />
                    </div>
                </div>





                {{-- calcium --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Calcium</label>
                        <input class="form-control form--input" type="number" step='0.01' required min='0'
                            wire:model='instance.calcium' />
                    </div>
                </div>


                {{-- iron --}}
                <div class="col">
                    <div class="macro--wrap">
                        <label class="form-label form--label">Iron</label><input class="form-control form--input"
                            type="number" step='0.01' required min='0' wire:model='instance.iron' />
                    </div>
                </div>
            </div>
        </div>
        {{-- endRow --}}







        {{-- submitButton --}}
        <div class="col-12 text-center mt-4">
            <button
                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                Update
            </button>
        </div>



    </div>
</form>
{{-- endForm --}}