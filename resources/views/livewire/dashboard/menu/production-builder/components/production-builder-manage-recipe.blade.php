{{-- wrapper --}}
<div>






    {{-- topRow --}}
    <div class="row align-items-start pt-2 mb-5 pb-4 ">



        {{-- leftCol --}}
        <div class="col-3">


            {{-- 1: update MealTypes - itemTypes --}}
            <livewire:dashboard.menu.production-builder.components.production-builder-update-types :id='$meal->id'
                key="{{ $meal->id }}" />


        </div>
        {{-- endLeftCol --}}






        {{-- --------------------------------------------- --}}
        {{-- --------------------------------------------- --}}





        {{-- midCol --}}
        <div class="col-6">


            {{-- 2: storeView Sizes --}}
            <livewire:dashboard.menu.production-builder.components.production-builder-create-size :id='$meal->id'
                key="{{ $meal->id }}" />


        </div>
        {{-- endCol --}}








        {{-- --------------------------------------------- --}}
        {{-- --------------------------------------------- --}}






        {{-- rightCol --}}
        <div class="col-3">


            {{-- 3: editContainer --}}
            <livewire:dashboard.menu.production-builder.components.production-builder-edit-container :id='$meal->id'
                key="{{ $meal->id }}" />


        </div>
        {{-- endCol --}}




    </div>
    {{-- end topRow --}}











    {{-- ------------------------------------------------------ --}}
    {{-- ------------------------------------------------------ --}}








    {{-- :: manageIngredients --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-ingredients :id='$meal->id'
        key="{{ $meal->id }}" />








    {{-- ------------------------------------------------------ --}}
    {{-- ------------------------------------------------------ --}}









    {{-- :: manageInstructions --}}
    <livewire:dashboard.menu.production-builder.components.production-builder-manage-instructions :id='$meal->id'
        key="{{ $meal->id }}" />




</div>
{{-- endWrap --}}