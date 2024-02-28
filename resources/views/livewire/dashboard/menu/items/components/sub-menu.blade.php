{{-- sub-menu --}}
<div class="btn-group submenu--group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800" data-aos-once="true"
   role="group">


   {{-- 1: sub-recipes --}}
   <a class="btn fs-13 @if (Request::is('dashboard/menu/sub-recipes')) active @endif" href="{{ route('dashboard.menuSubRecipes') }}"
      role="button">Sub-recipes</a>


   {{-- 2: sauces --}}
   <a class="btn fs-13 @if (Request::is('dashboard/menu/sauces')) active @endif" href="{{ route('dashboard.menuSauces') }}"
      role="button">Sauces</a>


   {{-- 3: snacks --}}
   <a class="btn fs-13 @if (Request::is('dashboard/menu/snacks')) active @endif" href="{{ route('dashboard.menuSnacks') }}"
      role="button">Snacks</a>



   {{-- 4: sides --}}
   <a class="btn fs-13 @if (Request::is('dashboard/menu/sides')) active @endif" href="{{ route('dashboard.menuSides') }}"
      role="button">Sides</a>



   {{-- 5: drinks --}}
   <a class="btn fs-13 @if (Request::is('dashboard/menu/drinks')) active @endif" href="{{ route('dashboard.menuDrinks') }}"
      role="button">Drinks</a>



   <a class="btn fs-13" href="javascript:void(0);" role="button">Meals</a>

</div>
{{-- end div --}}
