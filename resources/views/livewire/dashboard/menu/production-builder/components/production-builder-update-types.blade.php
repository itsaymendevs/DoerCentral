{{-- wrapper --}}
<div class="d-block">


   {{-- meal - name --}}
   <h3 class="fw-semibold text-center">
      {{ $meal->name }}
   </h3>





   {{-- --------------------------------------------- --}}
   {{-- --------------------------------------------- --}}





   {{-- 1: mealTypes for Meal --}}
   @if ($meal->type == 'Meal')
      <div class="mt-4 w-75 mx-auto" id="for-meal">


         @foreach ($mealTypes as $mealType)
            <div class="form-check form-switch mb-3 mealType--checkbox">
               <input class="form-check-input pointer" id="mealType-{{ $mealType->id }}" type="checkbox"
                  @if (true) checked @endif wire:change.live='instance.mealTypes' />
               <label class="form-check-label" for="mealType-{{ $mealType->id }}"></label>
            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}






   {{-- 2: snackTypes for Snack --}}
   @if ($meal->type == 'Snack')
      <div class="mt-4 w-75 mx-auto" id="for-snack">


         @foreach ($snackTypes as $snackType)
            <div class="form-check mb-3 itemType--radio">
               <input class="form-check-input" id="snackType-{{ $snackType }}" name="snackType" type="radio"
                  @if ($meal->itemType == $snackType) checked @endif wire:change.live='instance.itemType' />
               <label class="form-check-label" for="snackType-{{ $snackType }}">{{ $snackType }}</label>
            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}








   {{-- 3: sauceTypes for Sauce --}}
   @if ($meal->type == 'Sauce')
      <div class="mt-4 w-75 mx-auto" id="for-sauce">


         @foreach ($sauceTypes as $sauceType)
            <div class="form-check mb-3 itemType--radio">
               <input class="form-check-input" id="sauceType-{{ $sauceType }}" name="sauceType" type="radio"
                  @if ($meal->itemType == $sauceType) checked @endif wire:change.live='instance.itemType' />
               <label class="form-check-label" for="sauceType-{{ $sauceType }}">{{ $sauceType }}</label>
            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}





   {{-- 4: drinkTypes for Drink --}}
   @if ($meal->type == 'Drink')
      <div class="mt-4 w-75 mx-auto" id="for-drink">


         @foreach ($drinkTypes as $drinkType)
            <div class="form-check mb-3 itemType--radio">
               <input class="form-check-input" id="drinkType-{{ $drinkType }}" name="drinkType" type="radio"
                  @if ($meal->itemType == $drinkType) checked @endif wire:change.live='instance.itemType' />
               <label class="form-check-label" for="drinkType-{{ $drinkType }}">{{ $drinkType }}</label>
            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}





</div>
{{-- endWrapper --}}
