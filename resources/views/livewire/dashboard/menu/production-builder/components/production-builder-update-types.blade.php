{{-- wrapper --}}
<div class="d-block">


   {{-- meal - name --}}
   <h3 class="fw-semibold text-center">
      {{ $instance->name }}
   </h3>





   {{-- --------------------------------------------- --}}
   {{-- --------------------------------------------- --}}





   {{-- 1: mealTypes for Meal --}}
   @if ($instance->type == 'Meal')
      <div class="mt-4 w-75 mx-auto" id="for-meal">


         @foreach ($mealTypes as $mealType)
            <div class="form-check form-switch mb-3 mealType--checkbox">

               {{-- input --}}
               <input class="form-check-input pointer" id="mealType-{{ $mealType->id }}" type="checkbox"
                  value='{{ $mealType->id }}' @if (in_array($mealType->id, $instance->mealTypes)) checked @endif
                  wire:model='instance.mealTypes' wire:change='update' wire:loading.attr='disabled' />


               {{-- label --}}
               <label class="form-check-label" for="mealType-{{ $mealType->id }}">{{ $mealType->name }}</label>

            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}






   {{-- --------------------------------------------- --}}






   {{-- 2: snackTypes for Snack --}}
   @if ($instance->type == 'Snack')
      <div class="mt-4 w-75 mx-auto" id="for-snack">


         @foreach ($snackTypes as $snackType)
            <div class="form-check mb-3 itemType--radio">

               {{-- input --}}
               <input class="form-check-input" id="snackType-{{ $snackType }}" name="snackType" type="radio"
                  @if ($instance->itemType == $snackType) checked @endif wire:model='instance.itemType'
                  wire:change='update' />


               {{-- label --}}
               <label class="form-check-label" for="snackType-{{ $snackType }}">{{ $snackType }}</label>

            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}






   {{-- --------------------------------------------- --}}






   {{-- 3: sauceTypes for Sauce --}}
   @if ($instance->type == 'Sauce')
      <div class="mt-4 w-75 mx-auto" id="for-sauce">


         @foreach ($sauceTypes as $sauceType)
            <div class="form-check mb-3 itemType--radio">

               {{-- input --}}
               <input class="form-check-input" id="sauceType-{{ $sauceType }}" name="sauceType" type="radio"
                  @if ($instance->itemType == $sauceType) checked @endif wire:model='instance.itemType'
                  wire:change='update' />


               {{-- label --}}
               <label class="form-check-label" for="sauceType-{{ $sauceType }}">{{ $sauceType }}</label>

            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}






   {{-- --------------------------------------------- --}}






   {{-- 4: drinkTypes for Drink --}}
   @if ($instance->type == 'Drink')
      <div class="mt-4 w-75 mx-auto" id="for-drink">


         @foreach ($drinkTypes as $drinkType)
            <div class="form-check mb-3 itemType--radio">

               {{-- input --}}
               <input class="form-check-input" id="drinkType-{{ $drinkType }}" name="drinkType" type="radio"
                  @if ($instance->itemType == $drinkType) checked @endif wire:model='instance.itemType'
                  wire:change='update' />


               {{-- label --}}
               <label class="form-check-label" for="drinkType-{{ $drinkType }}">{{ $drinkType }}</label>

            </div>
         @endforeach

      </div>
   @endif
   {{-- end if --}}





</div>
{{-- endWrapper --}}
