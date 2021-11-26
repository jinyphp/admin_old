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

    Route::prefix('/theme')->name('theme.')->group(function () {
        Route::resource('list',\Jiny\Admin\Http\Controllers\Theme\ThemeListController::class);
    });

    /*
    Route::prefix('/site')->name('site.')->group(function () {
        ## 메뉴구조
        //Route::resource('menu',\Jiny\Admin\Http\Controllers\Site\MenuListController::class);
        //return view('jinyadmin::site.menu.index');
        Route::view('menu', 'jinyadmin::site.menu.code');
        //Route::view('menu/items', 'jinyadmin::site.menu.items');
        Route::get('menu/{id}',[\Jiny\Admin\Http\Controllers\Site\MenuItems::class,"index"]);

    });
    */




});


