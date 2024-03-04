{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">


    {{-- 1: sub-recipes --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/menu/sub-recipes')) active @endif"
        href="{{ route('dashboard.menuSubRecipes') }}" role="button">Sub-recipes</a>


    {{-- 2: sauces --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/menu/sauces')) active @endif"
        href="{{ route('dashboard.menuSauces') }}" role="button">Sauces</a>


    {{-- 3: snacks --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/menu/snacks')) active @endif"
        href="{{ route('dashboard.menuSnacks') }}" role="button">Snacks</a>



    {{-- 4: sides --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/menu/sides')) active @endif"
        href="{{ route('dashboard.menuSides') }}" role="button">Sides</a>



    {{-- 5: drinks --}}
    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/menu/drinks')) active @endif"
        href="{{ route('dashboard.menuDrinks') }}" role="button">Drinks</a>



    <a wire:navigate class="btn fs-13" href="#!" role="button">Meals</a>

</div>
{{-- end div --}}