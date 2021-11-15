<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['web','auth:sanctum', 'verified'])
->name('admin.')
->prefix('/admin')->group(function () {

    Route::get('/', [Jiny\Admin\Http\Controllers\Admin::class,"index"]);

    // 모듈관리
    Route::resource('modules',\Jiny\Admin\Http\Controllers\Modules::class);

    //회원관리
    Route::prefix('/users')->name('users.')->group(function () {
        Route::resource('list',\Jiny\Admin\Http\Controllers\UserListController::class);
        Route::resource('role',\Jiny\Admin\Http\Controllers\UserRoleController::class);
        Route::resource('list.profile', \Jiny\Admin\Http\Controllers\UserProfileController::class);

        Route::get('/', [\Jiny\Admin\Http\Controllers\UserController::class,"index"]);
    });




});


