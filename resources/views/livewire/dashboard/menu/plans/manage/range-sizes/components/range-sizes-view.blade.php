<div class="col-4 mt-2 mb-5" data-view="table">
    <div class="row align-items-center">


        {{-- mealType - subtitle --}}
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-2 hr--title">
                <hr class="w-100">
                <label class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">{{
                    $instance->mealTypeName }}</label>
            </div>
        </div>





        {{-- calories - price --}}
        <div class="col-6 text-center">

            {{-- price --}}
            <input type="number" step='0.01' class="form--input mb-3 text-center" placeholder="Price"
                wire:model='instance.price' data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                title="{{ $instance->mealTypeName }} Price" wire:change='update' wire:loading.attr='readonly'
                wire:target='updateSize, update' required>


            {{-- caloriesFromSize --}}
            <div class="overview--box shrink--self macros-version">
                <h6>Calories</h6>
                <p>
                    <input type="number" step='0.01' class="form--input form--table-input-xs text-center"
                        wire:model='instance.calories' wire:change='update' wire:loading.attr='readonly'
                        wire:target='updateSize, update' required>
                </p>
            </div>
        </div>





        {{-- sizes - radioButtons --}}
        <div class="col-6">
            <div class="ms-3">


                {{-- loop - sizes --}}
                @foreach ($sizes as $size)

                <div class="form-check mb-2 itemType--radio">


                    {{-- input --}}
                    <input class="form-check-input fs-15 pointer" type="radio" value="{{ $size->id }}"
                        id="bundle-sizes-{{ $instance->id }}-{{ $size->id }}"
                        name="bundle-sizes-{{ $instance->id }}-{{ $size->id }}" wire:model='instance.sizeId'
                        wire:change='updateSize' wire:loading.attr='disabled' wire:target='updateSize, update'>



                    {{-- label --}}
                    <label class="form-check-label fs-14 ms-2 pointer"
                        for="bundle-sizes-{{ $instance->id }}-{{ $size->id }}">
                        {{ $size->name }}
                    </label>
                </div>

                @endforeach
                {{-- end loop - sizes --}}


            </div>
        </div>
    </div>
</div>