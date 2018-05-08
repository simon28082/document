<?php

use Illuminate\Support\Facades\Route;
use CrCms\Foundation\App\Http\Middleware\BackstageManagement;

Route::prefix('api/v1')->namespace('CrCms\Document\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->middleware([BackstageManagement::class])->namespace('Manage')->group(function(){

//        Route::get('models/{model}/documents','DocumentController@index')->name('document.documents.index');
//        Route::get('models/{model}/documents')
        Route::resource('models/{model}/documents', 'DocumentController')->names([
            'index' => 'document.documents.index',
            'store' => 'document.documents.store',
            'update' => 'document.documents.update',
            'destroy' => 'document.documents.destroy',
            'create' => 'document.documents.create',
            'edit' => 'document.documents.edit'
        ])->except(['show']);

        Route::get('fields/{fieldType}/settings','FieldController@getFieldSettings')->name('document.fields.settings');
        Route::get('fields/default-build-in','FieldController@getBuildInFields')->name('document.fields.build-in-fields');

        Route::apiResource('models','ModelController')->names([
            'index' => 'document.models.index',
            'store' => 'document.models.store',
            'update' => 'document.models.update',
            'destroy' => 'document.models.destroy',
        ])->except(['show']);
    });
});
