<div class="col-12">
    <div class="row">


        {{-- 1: toggleForWebsite --}}
        <div class="col-4 mb-3">
            <div class="form-check form-switch mealType--checkbox py-2 rounded-1 px-4 d-inline-flex"
                style="background-color: var(--color-scheme-2)">


                {{-- input --}}
                <input class="form-check-input pointer" type="checkbox" id="bundle-range-ForWebsite-{{ $instance->id }}"
                    @if ($instance->isForWebsite) checked @endif wire:model='instance.isForWebsite' wire:change='update'
                wire:loading.attr='disabled' />

                {{-- label --}}
                <label class="form-check-label border-0"
                    for="bundle-range-ForWebsite-{{ $instance->id }}">Active</label>

            </div>
        </div>






        {{-- ------------------------------- --}}
        {{-- ------------------------------- --}}







        {{-- totalCalories - Prices --}}
        <div class="col-8 text-end mb-3">


            {{-- calories --}}
            <h4 data-bs-toggle="tooltip" data-bss-tooltip=""
                class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1 me-4"
                title="Total Calories">{{ number_format($instance->totalCalories) }}<small
                    class="fw-semibold text-theme-secondary fs-10 ms-1">(Calorie)</small>
            </h4>



            {{-- price --}}
            <h4 data-bs-toggle="tooltip" data-bss-tooltip=""
                class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                title="Total Price">{{ number_format($instance->totalPrice) }}<small
                    class="fw-semibold text-theme-secondary fs-10 ms-1">(AED)</small>
            </h4>


        </div>
    </div>
</div>
{{-- endRow --}}