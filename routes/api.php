<?php

use App\Http\Controllers\Api\BuilderController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MenuCalendarController;
use App\Http\Controllers\Api\MenuSettingController;
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







// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------






// Route::middleware(['auth:sanctum', 'auth.userApi'])->group(function () {








// 1: delivery - storeDeliveryTimes - update - toggleActive - remove
Route::post('/dashboard/delivery/times/store', [DeliveryController::class, 'storeDeliveryTime']);
Route::post('/dashboard/delivery/times/update', [DeliveryController::class, 'updateDeliveryTime']);
Route::post('/dashboard/delivery/times/toggle', [DeliveryController::class, 'toggleDeliveryTime']);

Route::post('/dashboard/delivery/times/remove', [DeliveryController::class, 'removeDeliveryTime']);





// ---------------------------------
// ---------------------------------






Route::post('/dashboard/delivery/holidays/update', [DeliveryController::class, 'updateHoliday']);
Route::post('/dashboard/delivery/holidays/toggle', [DeliveryController::class, 'toggleHoliday']);




// 1.2: delivery - updateCharge - updateHolidays - toggleActive
Route::post('/dashboard/delivery/charges/update', [DeliveryController::class, 'updateCharge']);

Route::post('/dashboard/delivery/holidays/update', [DeliveryController::class, 'updateHoliday']);
Route::post('/dashboard/delivery/holidays/toggle', [DeliveryController::class, 'toggleHoliday']);






// ---------------------------------
// ---------------------------------






// 1.3: delivery - storeZones - update - toggleActive - remove
Route::post('/dashboard/delivery/zones/store', [DeliveryController::class, 'storeZone']);
Route::post('/dashboard/delivery/zones/update', [DeliveryController::class, 'updateZone']);
Route::post('/dashboard/delivery/zones/toggle', [DeliveryController::class, 'toggleZone']);

Route::post('/dashboard/delivery/zones/remove', [DeliveryController::class, 'removeZone']);







// ---------------------------------
// ---------------------------------






// 1.4: delivery - storeDrivers - update - toggleActive - remove
Route::post('/dashboard/delivery/drivers/store', [DeliveryController::class, 'storeDriver']);
Route::post('/dashboard/delivery/drivers/update', [DeliveryController::class, 'updateDriver']);
Route::post('/dashboard/delivery/drivers/toggle', [DeliveryController::class, 'toggleDriver']);

Route::post('/dashboard/delivery/drivers/remove', [DeliveryController::class, 'removeDriver']);













// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------










// 2: promo - storePromoCodes - update - toggleActive - remove
Route::post('/dashboard/promo/promoCodes/store', [PromoController::class, 'storePromoCode']);
Route::post('/dashboard/promo/promoCodes/update', [PromoController::class, 'updatePromoCode']);

Route::post('/dashboard/promo/promoCodes/toggle', [PromoController::class, 'togglePromoCode']);
Route::post('/dashboard/promo/promoCodes/toggleForWebsite', [PromoController::class, 'togglePromoCodeForWebsite']);



Route::post('/dashboard/promo/promoCodes/remove', [PromoController::class, 'removePromoCode']);










// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------












// 3: inventory - ingredients - storeIngredient - update - remove
Route::post('/dashboard/inventory/ingredients/store', [InventoryController::class, 'storeIngredient']);
Route::post('/dashboard/inventory/ingredients/update', [InventoryController::class, 'updateIngredient']);


Route::post('/dashboard/inventory/ingredients/remove', [InventoryController::class, 'removeIngredient']);









// ---------------------------------
// ---------------------------------







// 3.2: inventory - suppliers - storeSupplier - update - remove
Route::post('/dashboard/inventory/suppliers/store', [InventoryController::class, 'storeSupplier']);
Route::post('/dashboard/inventory/suppliers/update', [InventoryController::class, 'updateSupplier']);


Route::post('/dashboard/inventory/suppliers/remove', [InventoryController::class, 'removeSupplier']);






// 3.2.2: inventory - suppliers - storeIngredients - update - remove
Route::post('/dashboard/inventory/suppliers/ingredients/store', [InventoryController::class, 'storeSupplierIngredient']);
Route::post('/dashboard/inventory/suppliers/ingredients/update', [InventoryController::class, 'updateSupplierIngredient']);


Route::post('/dashboard/inventory/suppliers/ingredients/remove', [InventoryController::class, 'removeSupplierIngredient']);









// ---------------------------------
// ---------------------------------







// 3.3: inventory - purchases - storePurchase - toggleConfirm - remove
Route::post('/dashboard/inventory/purchases/store', [InventoryController::class, 'storePurchase']);
Route::post('/dashboard/inventory/purchases/update', [InventoryController::class, 'updatePurchase']);
Route::post('/dashboard/inventory/purchases/confirm', [InventoryController::class, 'confirmPurchase']);

Route::post('/dashboard/inventory/purchases/remove', [InventoryController::class, 'removePurchase']);




// 3.3.2: storePurchaseIngredient - update - remove
Route::post('/dashboard/inventory/purchases/ingredients/store', [InventoryController::class, 'storePurchaseIngredient']);


Route::post('/dashboard/inventory/purchases/ingredients/update', [InventoryController::class, 'updatePurchaseIngredient']);


Route::post('/dashboard/inventory/purchases/ingredients/remove', [InventoryController::class, 'removePurchaseIngredient']);





// ---------------------------------
// ---------------------------------











// ---------------------------------
// ---------------------------------









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
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------










// 5: menu - plans - storePlan - update - toggleActive - remove
Route::post('/dashboard/menu/plans/store', [PlanController::class, 'storePlan']);
Route::post('/dashboard/menu/plans/update', [PlanController::class, 'updatePlan']);
Route::post('/dashboard/menu/plans/toggle', [PlanController::class, 'togglePlan']);

Route::post('/dashboard/menu/plans/remove', [PlanController::class, 'removePlan']);




// ---------------------------------
// ---------------------------------





// 5.2: menu - plans - ranges - storePlanRanges - update - toggleActive - remove
Route::post('/dashboard/menu/plans/ranges/store', [PlanController::class, 'storeRange']);
Route::post('/dashboard/menu/plans/ranges/update', [PlanController::class, 'updateRange']);
Route::post('/dashboard/menu/plans/ranges/toggle', [PlanController::class, 'toggleRange']);

Route::post('/dashboard/menu/plans/ranges/remove', [PlanController::class, 'removeRange']);










// ---------------------------------
// ---------------------------------





// 5.3: menu - plans - bundles - storePlanBundle - update - toggleActive - remove
Route::post('/dashboard/menu/plans/bundles/store', [PlanController::class, 'storeBundle']);
Route::post('/dashboard/menu/plans/bundles/update', [PlanController::class, 'updateBundle']);
Route::post('/dashboard/menu/plans/bundles/toggle', [PlanController::class, 'toggleBundle']);

Route::post('/dashboard/menu/plans/bundles/remove', [PlanController::class, 'removeBundle']);



// 5.3.2: menu - plans - bundles - updateBundleRanges
Route::post('/dashboard/menu/plans/bundles/ranges/update', [PlanController::class, 'updateBundleRange']);



// 5.3.3: menu - plans - bundles - storeBundleDays - update
Route::post('/dashboard/menu/plans/bundles/days/store', [PlanController::class, 'storeBundleDay']);
Route::post('/dashboard/menu/plans/bundles/days/update', [PlanController::class, 'updateBundleDay']);
Route::post('/dashboard/menu/plans/bundles/days/remove', [PlanController::class, 'removeBundleDay']);











// ---------------------------------
// ---------------------------------




// 5.4: menu - plans - calendars - toggleDefault
Route::post('/dashboard/menu/plans/calendars/toggle-default', [PlanController::class, 'toggleCalendarDefault']);








// ------------------------------------------------------------------------------------------









// 8: menu - settings - storeDiet - update  - remove
Route::post('/dashboard/menu/settings/diets/store', [MenuSettingController::class, 'storeDiet']);
Route::post('/dashboard/menu/settings/diets/update', [MenuSettingController::class, 'updateDiet']);

Route::post('/dashboard/menu/settings/diets/remove', [MenuSettingController::class, 'removeDiet']);






// 8.2: menu - settings - storeSize - update - remove
Route::post('/dashboard/menu/settings/sizes/store', [MenuSettingController::class, 'storeSize']);
Route::post('/dashboard/menu/settings/sizes/update', [MenuSettingController::class, 'updateSize']);

Route::post('/dashboard/menu/settings/sizes/remove', [MenuSettingController::class, 'removeSize']);






// 8.3: menu - settings - storeTag - update - remove
Route::post('/dashboard/menu/settings/tags/store', [MenuSettingController::class, 'storeTag']);
Route::post('/dashboard/menu/settings/tags/update', [MenuSettingController::class, 'updateTag']);

Route::post('/dashboard/menu/settings/tags/remove', [MenuSettingController::class, 'removeTag']);








// 8.4: menu - settings - storeTag - update - remove
Route::post('/dashboard/menu/settings/cuisines/store', [MenuSettingController::class, 'storeCuisine']);
Route::post('/dashboard/menu/settings/cuisines/update', [MenuSettingController::class, 'updateCuisine']);

Route::post('/dashboard/menu/settings/cuisines/remove', [MenuSettingController::class, 'removeCuisine']);













// ------------------------------------------------------------------------------------------





// 9: menu - builder - general - store
Route::post('/dashboard/menu/builder/general/store', [BuilderController::class, 'storeBuilderGeneral']);









// ---------------------------------
// ---------------------------------





// 9.2: menu - builder - general - update
Route::post('/dashboard/menu/builder/general/update', [BuilderController::class, 'updateBuilderGeneral']);




// ---------




// 9.3: menu - builder - ingredients - itemTypes / mealTypes update
Route::post('/dashboard/menu/builder/meal-types/update', [BuilderController::class, 'updateBuilderMealTypes']);





// ---------



// 9.4: menu - builder - ingredients - storeSizes
Route::post('/dashboard/menu/builder/sizes/store', [BuilderController::class, 'storeBuilderSize']);




// ---------



// 9.5: menu - builder - containers - updateContainer
Route::post('/dashboard/menu/builder/containers/update', [BuilderController::class, 'updateBuilderContainer']);




// ---------



// 9.6: menu - builder - ingredients - storeIngredient - update - remove
Route::post('/dashboard/menu/builder/ingredients/store', [BuilderController::class, 'storeBuilderIngredient']);
Route::post('/dashboard/menu/builder/ingredients/update', [BuilderController::class, 'updateBuilderIngredient']);

Route::post('/dashboard/menu/builder/ingredients/remove', [BuilderController::class, 'removeBuilderIngredient']);



// :: updateDetails
Route::post('/dashboard/menu/builder/ingredients/details/update', [BuilderController::class, 'updateBuilderIngredientDetails']);





// 9.6.2: afterCookMacros - update
Route::post('/dashboard/menu/builder/ingredients/macros/update', [BuilderController::class, 'updateBuilderAfterCookMacros']);






// ---------





// 9.8: menu - builder - instructions - storeInstruction - update - remove
Route::post('/dashboard/menu/builder/instructions/store', [BuilderController::class, 'storeBuilderInstruction']);
Route::post('/dashboard/menu/builder/instructions/update', [BuilderController::class, 'updateBuilderInstruction']);

Route::post('/dashboard/menu/builder/instructions/remove', [BuilderController::class, 'removeBuilderInstruction']);







// ---------





// 9.9: menu - builder - packings - storePacking - update - remove
Route::post('/dashboard/menu/builder/packings/store', [BuilderController::class, 'storeBuilderPacking']);
Route::post('/dashboard/menu/builder/packings/update', [BuilderController::class, 'updateBuilderPacking']);

Route::post('/dashboard/menu/builder/packings/remove', [BuilderController::class, 'removeBuilderPacking']);




// ---------





// 9.10: menu - builder - servings - update
Route::post('/dashboard/menu/builder/servings/update', [BuilderController::class, 'updateBuilderServing']);











// ------------------------------------------------------------------------------------------









// 10: menu - calendar - storeCalendar - update  - remove
Route::post('/dashboard/menu/calendars/store', [MenuCalendarController::class, 'storeCalendar']);
Route::post('/dashboard/menu/calendars/update', [MenuCalendarController::class, 'updateCalendar']);

Route::post('/dashboard/menu/calendars/remove', [MenuCalendarController::class, 'removeCalendar']);





// ---------




Route::post('/dashboard/menu/calendars/schedules/store', [MenuCalendarController::class, 'storeCalendarSchedule']);





// ---------




Route::post('/dashboard/menu/calendars/schedules/meals/update', [MenuCalendarController::class, 'updateCalendarScheduleMeal']);



Route::post('/dashboard/menu/calendars/schedules/meals/toggle', [MenuCalendarController::class, 'toggleCalendarScheduleMeal']);








// }); // end middleware


