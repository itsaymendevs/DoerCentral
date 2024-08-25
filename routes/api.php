<?php

use App\Http\Controllers\Api\ClientSubscriptionController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\InventoryExtraController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;











// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** -------------------------- DASHBOARD ------------------------------- **







// 1: login
Route::post('/checkUser', [LoginController::class, 'checkUser']);









// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------




// 2: inventory





// 2: inventory - ingredients - storeIngredient - update - remove
Route::post('/dashboard/inventory/ingredients/store', [InventoryController::class, 'storeIngredient']);
Route::post('/dashboard/inventory/ingredients/update', [InventoryController::class, 'updateIngredient']);


Route::post('/dashboard/inventory/ingredients/remove', [InventoryController::class, 'removeIngredient']);








// ---------------------------------
// ---------------------------------






// 2.1: inventory - settings - storeConversion - update - remove
Route::post('/dashboard/inventory/settings/conversions/store', [InventoryExtraController::class, 'storeConversion']);
Route::post('/dashboard/inventory/settings/conversions/update', [InventoryExtraController::class, 'updateConversion']);

Route::post('/dashboard/inventory/settings/conversions/remove', [InventoryExtraController::class, 'removeConversion']);








// 2.2: inventory - settings - conversions - ingredients - store - update - remove
Route::post('/dashboard/inventory/settings/conversions/ingredients/store', [InventoryExtraController::class, 'storeConversionIngredient']);

Route::post('/dashboard/inventory/settings/conversions/ingredients/update', [InventoryExtraController::class, 'updateConversionIngredient']);

Route::post('/dashboard/inventory/settings/conversions/ingredients/remove', [InventoryExtraController::class, 'removeConversionIngredient']);


















// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ------------------------ WEBSITE - CLIENT -------------------------- **







// 1: website - subscription - customer - store
Route::post('/subscription/clients/store', [ClientSubscriptionController::class, 'storeLead']);




