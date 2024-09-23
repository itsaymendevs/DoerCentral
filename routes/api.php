<?php

use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\InventoryExtraController;
use App\Http\Controllers\Api\SyncController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;











// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** -------------------------- DASHBOARD ------------------------------- **






// 1: inventory





// 1: inventory - ingredients - storeIngredient - update - remove
Route::post('central/dashboard/inventory/ingredients/store', [InventoryController::class, 'storeIngredient']);
Route::post('central/dashboard/inventory/ingredients/update', [InventoryController::class, 'updateIngredient']);


Route::post('central/dashboard/inventory/ingredients/remove', [InventoryController::class, 'removeIngredient']);







// ---------------------------------





// 1.2: inventory - ingredients - storeBrand - update - remove
Route::post('central/dashboard/inventory/ingredients/brands/store', [InventoryExtraController::class, 'storeIngredientBrand']);
Route::post('central/dashboard/inventory/ingredients/brands/update', [InventoryExtraController::class, 'updateIngredientBrand']);


Route::post('central/dashboard/inventory/ingredients/brands/remove', [InventoryExtraController::class, 'removeIngredientBrand']);







// ---------------------------------









// 1.3: inventory - settings - storeConversion - update - remove
Route::post('central/dashboard/inventory/settings/conversions/store', [InventoryExtraController::class, 'storeConversion']);
Route::post('central/dashboard/inventory/settings/conversions/update', [InventoryExtraController::class, 'updateConversion']);

Route::post('central/dashboard/inventory/settings/conversions/remove', [InventoryExtraController::class, 'removeConversion']);






// ---------------------------------




// 1.4: inventory - settings - conversions - ingredients - store - update - remove
Route::post('central/dashboard/inventory/settings/conversions/ingredients/store', [InventoryExtraController::class, 'storeConversionIngredient']);

Route::post('central/dashboard/inventory/settings/conversions/ingredients/update', [InventoryExtraController::class, 'updateConversionIngredient']);

Route::post('central/dashboard/inventory/settings/conversions/ingredients/remove', [InventoryExtraController::class, 'removeConversionIngredient']);















// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ---------------------------- DOER - SYNC --------------------------- **







// 1: sync - inventory
Route::post('central/sync/inventory', [SyncController::class, 'syncInventory']);







// ---------------------------------






// 2: sync - profile
Route::post('central/sync/profile', [SyncController::class, 'syncProfile']);






