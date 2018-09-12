<?php

use Illuminate\Support\Facades\Route;
use CrCms\Foundation\App\Http\Middleware\BackstageManagement;
Route::prefix('api/{version}/document')->namespace('CrCms\Document\Http\Controllers\Api')->group(function () {
    Route::apiResource('defaults', 'DispatcherController')->only( ['index', 'create', 'store', 'update', 'edit', 'destroy']);
    Route::apiResource('contents','ContentController');
});
