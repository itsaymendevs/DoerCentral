{{-- subMenu --}}
<div class="row mb-submenu" wire:ignore>


    {{-- :: plansButton --}}
    <div class="col-4">
        <div class="btn-group submenu--group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
            data-aos-once="true" role="group">

            {{-- 1: plans --}}
            <a class="btn submenu--group @if (Request::is('dashboard/menu/plans')) active @endif"
                href="{{ route('dashboard.menuPlans') }}" role="button" wire:navigate>Meal Plans</a>
        </div>
    </div>






    {{-- otherMenu --}}
    <div class="col-8 text-end">
        <div class="btn-group submenu--group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
            data-aos-once="true" role="group">


            {{-- 1: recipes --}}
            <a class="btn @if (Request::is('dashboard/menu/recipes')) active @endif"
                href="{{ route('dashboard.menuRecipes') }}" wire:navigate>Recipes</a>



            {{-- 2: items --}}
            <a class="btn @if (Request::is(
                 'dashboard/menu/sub-recipes',
                 'dashboard/menu/snacks',
                 'dashboard/menu/sides',
                 'dashboard/menu/sauces',
                 'dashboard/menu/drinks')) active @endif" href="{{ route('dashboard.menuSubRecipes') }}"
                wire:navigate>Items</a>



            {{-- 3: recipeBuilder --}}
            <a class="btn @if (Request::is('dashboard/menu/builder', 'dashboard/menu/production-builder/*')) active @endif"
                href="{{ route('dashboard.menuBuilder') }}" wire:navigate>Builder</a>




            {{-- 4: calendar --}}
            <a class="btn @if (Request::is('dashboard/menu/calendars', 'dashboard/menu/calendars/*')) active @endif"
                href="{{ route('dashboard.menuCalendars') }}" wire:navigate>Calendar</a>





            {{-- 5: ingredientsList --}}
            <a class="btn @if (Request::is('dashboard/menu/ingredients-list')) active @endif"
                href="{{ route('dashboard.menuIngredientsList') }}" wire:navigate>Ingredients List</a>





            {{-- 6: settings --}}
            <a class="btn @if (Request::is('dashboard/menu/settings')) active @endif"
                href="{{ route('dashboard.menuSettings') }}" wire:navigate>Settings</a>


        </div>
    </div>
</div>
{{-- end subMenu --}}