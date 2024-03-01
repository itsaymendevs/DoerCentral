<?php

use App\Http\Controllers\Api\BuilderController;
use App\Http\Controllers\Api\DeliveryController;
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







// 1.2: update holidays - toggleActive
Route::post('/dashboard/delivery/holidays/update', [DeliveryController::class, 'updateHoliday']);
Route::post('/dashboard/delivery/holidays/toggle', [DeliveryController::class, 'toggleHoliday']);











// 1.3: store zones - update - toggleActive - remove
Route::post('/dashboard/delivery/zones/store', [DeliveryController::class, 'storeZone']);
Route::post('/dashboard/delivery/zones/update', [DeliveryController::class, 'updateZone']);
Route::post('/dashboard/delivery/zones/toggle', [DeliveryController::class, 'toggleZone']);

Route::post('/dashboard/delivery/zones/remove', [DeliveryController::class, 'removeZone']);













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





// 5: store plan - update - toggleActive - remove
Route::post('/dashboard/menu/plans/store', [PlanController::class, 'storePlan']);
Route::post('/dashboard/menu/plans/update', [PlanController::class, 'updatePlan']);
Route::post('/dashboard/menu/plans/toggle', [PlanController::class, 'togglePlan']);

Route::post('/dashboard/menu/plans/remove', [PlanController::class, 'removePlan']);









// 6: store planRanges - update - toggleActive - remove
Route::post('/dashboard/menu/plans/ranges/store', [PlanController::class, 'storeRange']);
Route::post('/dashboard/menu/plans/ranges/update', [PlanController::class, 'updateRange']);
Route::post('/dashboard/menu/plans/ranges/toggle', [PlanController::class, 'toggleRange']);

Route::post('/dashboard/menu/plans/ranges/remove', [PlanController::class, 'removeRange']);











// ------------------------------------------------------------------------------------------





// 9: store builder - update
Route::post('/dashboard/menu/builder/general/store', [BuilderController::class, 'storeBuilderGeneral']);




// 9.2: general - update
Route::post('/dashboard/menu/builder/general/update', [BuilderController::class, 'updateBuilderGeneral']);






// }); // end middleware


