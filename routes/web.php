<?php


use App\Livewire\Dashboard\Brands;
use App\Livewire\Dashboard\Inventory\Configurations;
use App\Livewire\Dashboard\Inventory\Ingredients;
use App\Livewire\Dashboard\Inventory\Settings\ConversionIngredients;
use App\Livewire\Dashboard\Inventory\Settings as InventorySettings;
use App\Livewire\Login;
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






// :: clearCache
Route::get('/clear-cache', function () {

    $return = Artisan::call('cache:clear');

});






// :: LivewireServerDeployment in subRoute
if (env('APP_ENV') == 'production') {

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post(env('LIVEWIRE_UPDATE_PATH'), $handle);
    });


    Livewire::setScriptRoute(function ($handle) {
        return Route::get(env('LIVEWIRE_JAVASCRIPT_PATH'), $handle);
    });

} // end if












// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ----------------------------- ADMIN -----------------------------------







// 1: Login
Route::get('/', Login::class)->name('dashboard.login');
Route::get('login', Login::class)->name('dashboard.login');








Route::middleware(['auth.user'])->group(function () {






    // 1: home
    Route::get('brands', Brands::class)->name('dashboard.brands');







    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------






    // 4: inventory - ingredients - store - update - remove
    Route::get('dashboard/inventory/ingredients', Ingredients::class)->name('dashboard.inventory.ingredients');






    // ---------




    // 4.5: inventory - config - store - update - remove
    Route::get('dashboard/inventory/configurations', Configurations::class)->name('dashboard.inventory.configurations');





    // ---------





    // 4.6: inventory - settings - store - update - remove
    Route::get('dashboard/inventory/settings', InventorySettings::class)->name('dashboard.inventory.settings');





    // 4.6.1: inventory - settings - conversions - ingredients
    Route::get('dashboard/inventory/settings/conversions/{id}', ConversionIngredients::class)->name('dashboard.inventory.settings.conversionIngredients');







    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------








}); // end Authentication
