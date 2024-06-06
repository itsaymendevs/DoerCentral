{{-- wrapper --}}
<div class="d-block">





    {{-- meal - name --}}
    <h3 class="fw-semibold text-center fs-4">
        {{ $instance->name }}
    </h3>





    {{-- --------------------------------------------- --}}
    {{-- --------------------------------------------- --}}





    {{-- 1: mealTypes for Recipe --}}
    @if ($meal->type->name == 'Recipe')
    <div class="mt-4 w-75 mx-auto" id="for-recipe">


        @foreach ($mealTypes as $mealType)
        <div class="form-check form-switch mb-3 mealType--checkbox">

            {{-- input --}}
            <input class="form-check-input pointer" id="mealType-{{ $mealType->id }}" type="checkbox"
                value='{{ $mealType->id }}' @if (in_array($mealType->id, $instance->mealTypes)) checked @endif
            wire:model='instance.mealTypes' wire:change='update' wire:loading.attr='disabled' wire:target='update' />


            {{-- label --}}
            <label class="form-check-label" wire:loading.attr='disabled' wire:target='update'
                for="mealType-{{ $mealType->id }}">{{
                $mealType->name }}</label>

        </div>
        @endforeach

    </div>
    @endif
    {{-- end if --}}






    {{-- --------------------------------------------- --}}






    {{-- 2: snackTypes for Snack --}}
    @if ($meal->type->name == 'Snack')
    <div class="mt-4 w-75 mx-auto" id="for-snack">


        @foreach ($snackTypes as $snackType)
        <div class="form-check mb-3 itemType--radio">

            {{-- input --}}
            <input class="form-check-input" id="snackType-{{ $snackType }}" name="snackType" type="radio"
                value='{{ $snackType }}' @if ($instance->partType == $snackType) checked='checked' @endif
            wire:model='instance.partType' wire:change='update' wire:loading.attr='disabled' wire:target='update' />


            {{-- label --}}
            <label class="form-check-label" wire:loading.attr='disabled' wire:target='update'
                for="snackType-{{ $snackType }}">{{ $snackType }}</label>

        </div>
        @endforeach

    </div>
    @endif
    {{-- end if --}}






    {{-- --------------------------------------------- --}}






    {{-- 3: sauceTypes for Sauce --}}
    @if ($meal->type->name == 'Sauce')
    <div class="mt-4 w-75 mx-auto" id="for-sauce">


        @foreach ($sauceTypes as $sauceType)
        <div class="form-check mb-3 itemType--radio">

            {{-- input --}}
            <input class="form-check-input" id="sauceType-{{ $sauceType }}" name="sauceType" type="radio"
                value='{{ $sauceType }}' @if ($instance->partType == $sauceType) checked @endif
            wire:model='instance.partType' wire:change='update' wire:loading.attr='disabled' wire:target='update' />


            {{-- label --}}
            <label class="form-check-label" wire:loading.attr='disabled' wire:target='update'
                for="sauceType-{{ $sauceType }}">{{ $sauceType }}</label>

        </div>
        @endforeach

    </div>
    @endif
    {{-- end if --}}






    {{-- --------------------------------------------- --}}






    {{-- 4: drinkTypes for Drink --}}
    @if ($meal->type->name == 'Drink')
    <div class="mt-4 w-75 mx-auto" id="for-drink">


        @foreach ($drinkTypes as $drinkType)
        <div class="form-check mb-3 itemType--radio">

            {{-- input --}}
            <input class="form-check-input" id="drinkType-{{ $drinkType }}" name="drinkType" type="radio"
                value='{{ $drinkType }}' @if ($instance->partType == $drinkType) checked @endif
            wire:model='instance.partType' wire:change='update' wire:loading.attr='disabled' wire:target='update' />


            {{-- label --}}
            <label class="form-check-label" wire:loading.attr='disabled' wire:target='update'
                for="drinkType-{{ $drinkType }}">{{ $drinkType }}</label>

        </div>
        @endforeach

    </div>
    @endif
    {{-- end if --}}












    {{-- --------------------------------------------- --}}






    {{-- 4: subRecipeTypes for Drink --}}
    @if ($meal->type->name == 'Sub-recipe')
    <div class="mt-4 w-75 mx-auto" id="for-subRecipe">


        @foreach ($subRecipeTypes as $subRecipeType)
        <div class="form-check mb-3 itemType--radio">

            {{-- input --}}
            <input class="form-check-input" id="subRecipeType-{{ $subRecipeType }}" name="subRecipeType" type="radio"
                value='{{ $subRecipeType }}' @if ($instance->partType == $subRecipeType) checked @endif
            wire:model='instance.partType' wire:change='update' wire:loading.attr='disabled' wire:target='update' />


            {{-- label --}}
            <label class="form-check-label" wire:loading.attr='disabled' wire:target='update'
                for="subRecipeType-{{ $subRecipeType }}">{{ $subRecipeType }}</label>

        </div>
        @endforeach

    </div>
    @endif
    {{-- end if --}}







</div>
{{-- endWrapper --}}