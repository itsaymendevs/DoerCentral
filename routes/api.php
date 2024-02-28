<?php

use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PlanController;
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








// ------------------------------------------------------------------------------------------





// 2: store zones - update - toggleActive - remove
Route::post('/dashboard/delivery/zones/store', [DeliveryController::class, 'storeZone']);
Route::post('/dashboard/delivery/zones/update', [DeliveryController::class, 'updateZone']);
Route::post('/dashboard/delivery/zones/toggle', [DeliveryController::class, 'toggleZone']);

Route::post('/dashboard/delivery/zones/remove', [DeliveryController::class, 'removeZone']);









// ------------------------------------------------------------------------------------------





// 3: store plan - update - toggleActive - remove
Route::post('/dashboard/menu/plans/store', [PlanController::class, 'storePlan']);
Route::post('/dashboard/menu/plans/update', [PlanController::class, 'updatePlan']);
Route::post('/dashboard/menu/plans/toggle', [PlanController::class, 'togglePlan']);

Route::post('/dashboard/menu/plans/remove', [PlanController::class, 'removePlan']);









// 3: store planRanges - update - toggleActive - remove
Route::post('/dashboard/menu/plans/ranges/store', [PlanController::class, 'storeRange']);
Route::post('/dashboard/menu/plans/ranges/update', [PlanController::class, 'updateRange']);
Route::post('/dashboard/menu/plans/ranges/toggle', [PlanController::class, 'toggleRange']);

Route::post('/dashboard/menu/plans/ranges/remove', [PlanController::class, 'removeRange']);








// }); // end middleware


