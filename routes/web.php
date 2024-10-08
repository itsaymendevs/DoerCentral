<?php


use App\Livewire\Dashboard\Brands;
use App\Livewire\Dashboard\Brands\BrandsBackup;
use App\Livewire\Dashboard\Brands\BrandsConfigurations;
use App\Livewire\Dashboard\Brands\BrandsDetails;
use App\Livewire\Dashboard\Brands\BrandsLicense;
use App\Livewire\Dashboard\Inventory\Configurations;
use App\Livewire\Dashboard\Inventory\Ingredients;
use App\Livewire\Dashboard\Inventory\Settings\ConversionIngredients;
use App\Livewire\Dashboard\Inventory\Settings as InventorySettings;
use App\Livewire\Dashboard\ManagePlans\Bundles;
use App\Livewire\Dashboard\ManagePlans\Features;
use App\Livewire\Dashboard\ManagePlans\Plans;
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




    // 1: brands
    Route::get('dashboard/brands', Brands::class)->name('dashboard.brands');




    // 1.2: brands - profile
    Route::get('dashboard/brands/{id}', BrandsDetails::class)->name('dashboard.singleBrand');





    // 1.3: brands- setup - license
    Route::get('dashboard/brands/{id}/setup', BrandsConfigurations::class)->name('dashboard.singleBrandSetup');
    Route::get('dashboard/brands/{id}/license', BrandsLicense::class)->name('dashboard.singleBrandLicense');
    Route::get('dashboard/brands/{id}/backup', BrandsBackup::class)->name('dashboard.singleBrandBackup');









    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------








    // 2: inventory - ingredients - store - update - remove
    Route::get('dashboard/inventory/ingredients', Ingredients::class)->name('dashboard.inventory.ingredients');




    // ---------




    // 2.1: inventory - settings - store - update - remove
    Route::get('dashboard/inventory/settings', InventorySettings::class)->name('dashboard.inventory.settings');





    // 2.1.2: inventory - settings - conversions - ingredients
    Route::get('dashboard/inventory/settings/conversions/{id}', ConversionIngredients::class)->name('dashboard.inventory.settings.conversionIngredients');












    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------








    // 3: manage - plans - bundles - features
    Route::get('dashboard/manage-plans', action: Plans::class)->name('dashboard.manage-plans.plans');

    Route::get('dashboard/manage-plans/bundles', action: Bundles::class)->name('dashboard.manage-plans.bundles');
    Route::get('dashboard/manage-plans/features', action: Features::class)->name('dashboard.manage-plans.features');










}); // end Authentication
