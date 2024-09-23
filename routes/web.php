<?php


use App\Livewire\Central\Dashboard\Brands;
use App\Livewire\Central\Dashboard\Brands\BrandsBackup;
use App\Livewire\Central\Dashboard\Brands\BrandsConfigurations;
use App\Livewire\Central\Dashboard\Brands\BrandsDetails;
use App\Livewire\Central\Dashboard\Brands\BrandsLicense;
use App\Livewire\Central\Dashboard\Inventory\Configurations;
use App\Livewire\Central\Dashboard\Inventory\Ingredients;
use App\Livewire\Central\Dashboard\Inventory\Settings\ConversionIngredients;
use App\Livewire\Central\Dashboard\Inventory\Settings as InventorySettings;
use App\Livewire\Central\Dashboard\ManagePlans\Bundles;
use App\Livewire\Central\Dashboard\ManagePlans\Features;
use App\Livewire\Central\Dashboard\ManagePlans\Modules;
use App\Livewire\Central\Dashboard\ManagePlans\Plans;
use App\Livewire\Central\Dashboard\Tech\Brands as TechBrands;
use App\Livewire\Central\Dashboard\Tech\Brands\BrandsDetails as TechBrandsDetails;
use App\Livewire\Central\Login;
use App\Livewire\Home;
use App\Livewire\Leads\LeadsContact;
use App\Livewire\Leads\LeadsSubscribe;
use App\Livewire\Leads\LeadsSubscribeSuccess;
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
// ** --------------------------- WEBSITE -----------------------------------





// 1: home
Route::get('/', Home::class)->name('website.home');




















// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** -------------------------- ON-BOARDING --------------------------------






// 1: leads
Route::get('/subscribe', LeadsSubscribe::class)->name('website.subscribe');
Route::get('/subscribe/success', LeadsSubscribeSuccess::class)->name('website.success');




// 2: reach-us
Route::get('/contact-us', LeadsContact::class)->name('website.contact');





















// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** --------------------------- CENTRAL -----------------------------------







// 1: Login
Route::get('central', Login::class)->name('central.dashboard.login');
Route::get('central/login', Login::class)->name('central.dashboard.login');








Route::middleware(['auth.user'])->group(function () {




    // 1: brands
    Route::get('central/dashboard/brands', Brands::class)->name('central.dashboard.brands');




    // 1.2: brands - details
    Route::get('central/dashboard/brands/{id}', BrandsDetails::class)->name('central.dashboard.singleBrand');




    // 1.3: brands- setup - license
    Route::get('central/dashboard/brands/{id}/setup', BrandsConfigurations::class)->name('central.dashboard.singleBrandSetup');
    Route::get('central/dashboard/brands/{id}/license', BrandsLicense::class)->name('central.dashboard.singleBrandLicense');
    Route::get('central/dashboard/brands/{id}/backup', BrandsBackup::class)->name('central.dashboard.singleBrandBackup');









    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------








    // 2: inventory - ingredients - store - update - remove
    Route::get('central/dashboard/inventory/ingredients', Ingredients::class)->name('central.dashboard.inventory.ingredients');





    // ---------





    // 2.1: inventory - settings - store - update - remove
    Route::get('central/dashboard/inventory/settings', InventorySettings::class)->name('central.dashboard.inventory.settings');





    // 2.1.2: inventory - settings - conversions - ingredients
    Route::get('central/dashboard/inventory/settings/conversions/{id}', ConversionIngredients::class)->name('central.dashboard.inventory.settings.conversionIngredients');












    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------








    // 3: manage - plans - bundles - features - modules
    Route::get('central/dashboard/manage-plans', action: Plans::class)->name('central.dashboard.manage-plans.plans');

    Route::get('central/dashboard/manage-plans/bundles', action: Bundles::class)->name('central.dashboard.manage-plans.bundles');

    Route::get('central/dashboard/manage-plans/features', action: Features::class)->name('central.dashboard.manage-plans.features');

    Route::get('central/dashboard/manage-plans/modules', action: Modules::class)->name('central.dashboard.manage-plans.modules');











    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------








    // 4: tech - brands - details
    Route::get('central/dashboard/tech/brands', action: TechBrands::class)->name('central.dashboard.tech.brands');

    // 4.2: brands - details
    Route::get('central/dashboard/tech/brands/{id}', TechBrandsDetails::class)->name('central.dashboard.tech.singleBrand');




}); // end Authentication
