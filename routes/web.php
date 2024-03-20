<?php

use App\Livewire\Dashboard\Delivery;
use App\Livewire\Dashboard\Inventory;
use App\Livewire\Dashboard\Menu\Builder;
use App\Livewire\Dashboard\Menu\Calendars;
use App\Livewire\Dashboard\Menu\Calendars\SingleCalendar;
use App\Livewire\Dashboard\Menu\Items\Drinks;
use App\Livewire\Dashboard\Menu\Items\Sauces;
use App\Livewire\Dashboard\Menu\Items\Sides;
use App\Livewire\Dashboard\Menu\Items\Snacks;
use App\Livewire\Dashboard\Menu\Items\SubRecipes;
use App\Livewire\Dashboard\Menu\Plans;
use App\Livewire\Dashboard\Menu\Plans\Manage\Bundles;
use App\Livewire\Dashboard\Menu\Plans\Manage\RangeSizes;
use App\Livewire\Dashboard\Menu\Plans\Manage\Calendars as PlanCalendars;
use App\Livewire\Dashboard\Menu\ProductionBuilder;
use App\Livewire\Dashboard\Menu\Recipes;
use App\Livewire\Dashboard\Menu\Settings;
use App\Livewire\Dashboard\Promos;
use App\Livewire\Login;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepFive;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepFour;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepOne;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepThree;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepTwo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;




// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ----------------------------- GENERAL ---------------------------------








// :: linkStorage
Route::get('/storage-link', function () {

    $return = Artisan::call('storage:link');

});



// ::LivewireServerDeployment in subRoute
// Livewire::setUpdateRoute(function ($handle) {
//     return Route::post('/doer-client/public/livewire/update', $handle);
// });


// Livewire::setScriptRoute(function ($handle) {
//     return Route::get('/doer-client/public/livewire/livewire.js', $handle);
// });








// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ----------------------------- ADMIN -----------------------------------








// 1: Login
Route::get('/', Login::class)->name('dashboard.login');
Route::get('login', Login::class)->name('dashboard.login');







// ----------------------------------------------------------------------------







// :: Authenticated
Route::middleware(['auth.user'])->group(function () {






    // 2: PromoCodes
    Route::get('dashboard/promo', Promos::class)->name('dashboard.promos');







    // ----------------------------------------------------------------------------






    // 3: Delivery
    Route::get('dashboard/delivery', Delivery::class)->name('dashboard.delivery');







    // ----------------------------------------------------------------------------






    // 4: Inventory
    Route::get('dashboard/inventory', Inventory::class)->name('dashboard.inventory');







    // ----------------------------------------------------------------------------





    // 5: Plans
    Route::get('dashboard/menu/plans', Plans::class)->name('dashboard.menuPlans');





    // ---------



    // 5.1: PlanBundles
    Route::get('dashboard/menu/plans/{id}/bundles', Bundles::class)->name('dashboard.menuPlanBundles');




    // ---------



    // 5.2: planRangeSizes
    Route::get('dashboard/menu/plans/{id}/range-sizes', RangeSizes::class)->name('dashboard.menuPlanRangeSizes');




    // ---------



    // 5.3: planCalendars
    Route::get('dashboard/menu/plans/{id}/calendars', PlanCalendars::class)->name('dashboard.menuPlanCalendars');








    // ----------------------------------------------------------------------------





    // 6: Recipes
    Route::get('dashboard/menu/recipes', Recipes::class)->name('dashboard.menuRecipes');



    // ---------



    // 6.1: Sub-recipes
    Route::get('dashboard/menu/sub-recipes', SubRecipes::class)->name('dashboard.menuSubRecipes');



    // ---------




    // 6.2: Snacks
    Route::get('dashboard/menu/snacks', Snacks::class)->name('dashboard.menuSnacks');




    // ---------




    // 6.3: Sides
    Route::get('dashboard/menu/sides', Sides::class)->name('dashboard.menuSides');




    // ---------





    // 6.4: Sauces
    Route::get('dashboard/menu/sauces', Sauces::class)->name('dashboard.menuSauces');




    // ---------




    // 6.5: Drinks
    Route::get('dashboard/menu/drinks', Drinks::class)->name('dashboard.menuDrinks');





    // ---------







    // 6.6: builder - productionBuilder
    Route::get('dashboard/menu/builder', Builder::class)->name('dashboard.menuBuilder');
    Route::get('dashboard/menu/production-builder/{id}', ProductionBuilder::class)->name('dashboard.menuProductionBuilder');





    // ---------





    // 6.7: calendars
    Route::get('dashboard/menu/calendars', Calendars::class)->name('dashboard.menuCalendars');
    Route::get('dashboard/menu/calendars/{id}', SingleCalendar::class)->name('dashboard.menuSingleCalendar');





    // ---------






    // 6.8: Settings
    Route::get('dashboard/menu/settings', Settings::class)->name('dashboard.menuSettings');











}); // end Authentication














// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** --------------------------- CUSTOMER ----------------------------------









// 1: Subscription - customer - StepOne
Route::get('subscription/customer', CustomerSubscriptionStepOne::class)->name('subscription.customerStepOne');




// 1.2: Subscription - customer - stepTwo
Route::get('subscription/customer/{id}', CustomerSubscriptionStepTwo::class)->name('subscription.customerStepTwo');





// 1.3: Subscription - customer - stepThree (preferences)
Route::get('subscription/customer/{id}/preferences', CustomerSubscriptionStepThree::class)->name('subscription.customerStepThree');






// 1.4: Subscription - customer - stepFour (delivery-information)
Route::get('subscription/customer/{id}/delivery-information', CustomerSubscriptionStepFour::class)->name('subscription.customerStepFour');







// 1.4: Subscription - customer - stepFive (checkout-information)
Route::get('subscription/customer/{id}/checkout-information', CustomerSubscriptionStepFive::class)->name('subscription.customerStepFive');



