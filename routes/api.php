<?php

use Illuminate\Support\Facades\Route;
use CrCms\Foundation\App\Http\Middleware\BackstageManagement;
Route::prefix('api/v1/document')->namespace('CrCms\Document\Http\Controllers\Api')->middleware('api')->group(function () {
    Route::apiResource('contents', 'ContentController')->only( ['index', 'create', 'store', 'update', 'edit', 'destroy']);
    //Route::apiResource('defaults', 'DefaultController');
    Route::apiResource('defaults', 'DispatcherController');
});
