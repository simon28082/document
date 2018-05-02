<?php

use Illuminate\Support\Facades\Route;
use CrCms\Foundation\App\Http\Middleware\BackstageManagement;

Route::prefix('api/v1')->namespace('CrCms\Category\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->middleware([BackstageManagement::class])->namespace('Manage')->group(function(){

        Route::resource('documents', 'DocumentController')->names([
            'index' => 'document.documents.index',
            'store' => 'document.documents.store',
            'update' => 'document.documents.update',
            'destroy' => 'document.documents.destroy',
            'create' => 'document.documents.create',
            'edit' => 'document.documents.edit'
        ])->except(['show']);
    });
});
