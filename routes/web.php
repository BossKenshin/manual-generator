<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManualHeadController;
use App\Http\Controllers\ManualInfoController;
use App\Http\Controllers\ManualInfoPicController;

Route::get('/', [\App\Http\Controllers\ManualHeadController::class, 'index']);


Route::resources([
    'categories' => CategoryController::class,
    'manual-heads' => ManualHeadController::class,
    'manual-infos' => ManualInfoController::class,
    'manual-info-pics' => ManualInfoPicController::class,
]);
