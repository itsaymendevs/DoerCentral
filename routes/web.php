<?php

use App\Livewire\Dashboard\Delivery;
use App\Livewire\Dashboard\Menu\Items\Drinks;
use App\Livewire\Dashboard\Menu\Items\Sauces;
use App\Livewire\Dashboard\Menu\Items\Sides;
use App\Livewire\Dashboard\Menu\Items\Snacks;
use App\Livewire\Dashboard\Menu\Items\SubRecipes;
use App\Livewire\Dashboard\Menu\Plans;
use App\Livewire\Dashboard\Menu\Recipes;
use App\Livewire\Dashboard\Menu\Settings;
use App\Livewire\Dashboard\Promos;
use App\Livewire\Login;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;




// --------------------------------------------------------------------------
// --------------------------------------------------------------------------




// :: linkStorage
Route::get('/storage-link', function () {

    $return = Artisan::call('storage:link');

});





// --------------------------------------------------------------------------
// --------------------------------------------------------------------------











// 1: Login
Route::get('login', Login::class)->name('dashboard.login');






// ----------------------------------------------------------------------------




// 2: PromoCodes
Route::get('dashboard/promo', Promos::class)->name('dashboard.promos');




// 3: Delivery
Route::get('dashboard/delivery', Delivery::class)->name('dashboard.delivery');






// ----------------------------------------------------------------------------





// 4: Plans
Route::get('dashboard/menu/plans', Plans::class)->name('dashboard.menuPlans');







// ----------------------------------------------------------------------------





// 5: Recipes
Route::get('dashboard/menu/recipes', Recipes::class)->name('dashboard.menuRecipes');



// 5.1: Sub-recipes
Route::get('dashboard/menu/sub-recipes', SubRecipes::class)->name('dashboard.menuSubRecipes');




// 5.2: Snacks
Route::get('dashboard/menu/snacks', Snacks::class)->name('dashboard.menuSnacks');




// 5.3: Sides
Route::get('dashboard/menu/sides', Sides::class)->name('dashboard.menuSides');




// 5.4: Sauces
Route::get('dashboard/menu/sauces', Sauces::class)->name('dashboard.menuSauces');





// 5.5: Drinks
Route::get('dashboard/menu/drinks', Drinks::class)->name('dashboard.menuDrinks');






// 5.6: Settings
Route::get('dashboard/menu/settings', Settings::class)->name('dashboard.menuSettings');













// ::Authenticated
Route::middleware(['auth.user'])->group(function () { }); // end Authentication
