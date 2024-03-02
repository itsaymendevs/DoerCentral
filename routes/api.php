<?php

use App\Http\Controllers\Api\BuilderController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PromoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API ROUTES ONLY HAS THE ABILITY TO ADD / UPDATE / DELETE
| FETCHING DATA IS DONE BY CLIENT SIDE - LIVEWIRE
*/







// 1: login
Route::post('/checkUser', [LoginController::class, 'checkUser']);







// ----------------------------------------------------------------------------




// Route::middleware(['auth:sanctum', 'auth.userApi'])->group(function () {





// 1: store deliveryTimes - update - toggleActive - remove
Route::post('/dashboard/delivery/times/store', [DeliveryController::class, 'storeDeliveryTime']);
Route::post('/dashboard/delivery/times/update', [DeliveryController::class, 'updateDeliveryTime']);
Route::post('/dashboard/delivery/times/toggle', [DeliveryController::class, 'toggleDeliveryTime']);

Route::post('/dashboard/delivery/times/remove', [DeliveryController::class, 'removeDeliveryTime']);





// ---------------------------------
// ---------------------------------






// 1.2: update holidays - toggleActive
Route::post('/dashboard/delivery/holidays/update', [DeliveryController::class, 'updateHoliday']);
Route::post('/dashboard/delivery/holidays/toggle', [DeliveryController::class, 'toggleHoliday']);






// ---------------------------------
// ---------------------------------






// 1.3: store zones - update - toggleActive - remove
Route::post('/dashboard/delivery/zones/store', [DeliveryController::class, 'storeZone']);
Route::post('/dashboard/delivery/zones/update', [DeliveryController::class, 'updateZone']);
Route::post('/dashboard/delivery/zones/toggle', [DeliveryController::class, 'toggleZone']);

Route::post('/dashboard/delivery/zones/remove', [DeliveryController::class, 'removeZone']);







// ---------------------------------
// ---------------------------------






// 1.4: store drivers - update - toggleActive - remove
Route::post('/dashboard/delivery/drivers/store', [DeliveryController::class, 'storeDriver']);
Route::post('/dashboard/delivery/drivers/update', [DeliveryController::class, 'updateDriver']);
Route::post('/dashboard/delivery/drivers/toggle', [DeliveryController::class, 'toggleDriver']);

Route::post('/dashboard/delivery/drivers/remove', [DeliveryController::class, 'removeDriver']);













// ------------------------------------------------------------------------------------------







// 2: store promoCodes - update - toggleActive - remove
Route::post('/dashboard/promo/promoCodes/store', [PromoController::class, 'storePromoCode']);
Route::post('/dashboard/promo/promoCodes/update', [PromoController::class, 'updatePromoCode']);

Route::post('/dashboard/promo/promoCodes/toggle', [PromoController::class, 'togglePromoCode']);
Route::post('/dashboard/promo/promoCodes/toggleForWebsite', [PromoController::class, 'togglePromoCodeForWebsite']);



Route::post('/dashboard/promo/promoCodes/remove', [PromoController::class, 'removePromoCode']);








// ------------------------------------------------------------------------------------------







// 3.5: inventory - configurations - storeCategory - update - remove
Route::post('/dashboard/inventory/configurations/categories/store', [InventoryController::class, 'storeCategory']);
Route::post('/dashboard/inventory/configurations/categories/update', [InventoryController::class, 'updateCategory']);


Route::post('/dashboard/inventory/configurations/categories/remove', [InventoryController::class, 'removeCategory']);







// ---------------------------------
// ---------------------------------






// 3.6: inventory - configurations - storeGroup - update - remove
Route::post('/dashboard/inventory/configurations/groups/store', [InventoryController::class, 'storeGroup']);
Route::post('/dashboard/inventory/configurations/groups/update', [InventoryController::class, 'updateGroup']);


Route::post('/dashboard/inventory/configurations/groups/remove', [InventoryController::class, 'removeGroup']);








// ---------------------------------
// ---------------------------------






// 3.7: inventory - configurations - storeExclude - update - remove
Route::post('/dashboard/inventory/configurations/excludes/store', [InventoryController::class, 'storeExclude']);
Route::post('/dashboard/inventory/configurations/excludes/update', [InventoryController::class, 'updateExclude']);


Route::post('/dashboard/inventory/configurations/excludes/remove', [InventoryController::class, 'removeExclude']);











// ---------------------------------
// ---------------------------------






// 3.8: inventory - configurations - storeAllergy - update - remove
Route::post('/dashboard/inventory/configurations/allergies/store', [InventoryController::class, 'storeAllergy']);
Route::post('/dashboard/inventory/configurations/allergies/update', [InventoryController::class, 'updateAllergy']);


Route::post('/dashboard/inventory/configurations/allergies/remove', [InventoryController::class, 'removeAllergy']);














// ------------------------------------------------------------------------------------------





// 5: store plan - update - toggleActive - remove
Route::post('/dashboard/menu/plans/store', [PlanController::class, 'storePlan']);
Route::post('/dashboard/menu/plans/update', [PlanController::class, 'updatePlan']);
Route::post('/dashboard/menu/plans/toggle', [PlanController::class, 'togglePlan']);

Route::post('/dashboard/menu/plans/remove', [PlanController::class, 'removePlan']);




// ---------------------------------
// ---------------------------------





// 6: store planRanges - update - toggleActive - remove
Route::post('/dashboard/menu/plans/ranges/store', [PlanController::class, 'storeRange']);
Route::post('/dashboard/menu/plans/ranges/update', [PlanController::class, 'updateRange']);
Route::post('/dashboard/menu/plans/ranges/toggle', [PlanController::class, 'toggleRange']);

Route::post('/dashboard/menu/plans/ranges/remove', [PlanController::class, 'removeRange']);











// ------------------------------------------------------------------------------------------





// 9: builder - general - store
Route::post('/dashboard/menu/builder/general/store', [BuilderController::class, 'storeBuilderGeneral']);







// ---------------------------------
// ---------------------------------





// 9.2: builder - general - update
Route::post('/dashboard/menu/builder/general/update', [BuilderController::class, 'updateBuilderGeneral']);





// 9.3: builder - ingredients - itemTypes / mealTypes update
Route::post('/dashboard/menu/builder/meal-types/update', [BuilderController::class, 'updateBuilderMealTypes']);




// 9.4: builder - ingredients - storeSizes
Route::post('/dashboard/menu/builder/sizes/store', [BuilderController::class, 'storeBuilderSize']);






// 9.5: builder - containers - updateContainer
Route::post('/dashboard/menu/builder/containers/update', [BuilderController::class, 'updateBuilderContainer']);



// 9.6: builder - instructions - storeInstruction - update - remove
Route::post('/dashboard/menu/builder/instructions/store', [BuilderController::class, 'storeBuilderInstruction']);
Route::post('/dashboard/menu/builder/instructions/update', [BuilderController::class, 'updateBuilderInstruction']);

Route::post('/dashboard/menu/builder/instructions/remove', [BuilderController::class, 'removeBuilderInstruction']);







// }); // end middleware


