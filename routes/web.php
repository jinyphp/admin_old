<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::middleware(['web','auth:sanctum', 'verified'])
->name('admin.')
->prefix('/admin')->group(function () {

    Route::get('/', [Jiny\Admin\Http\Controllers\Admin::class,"index"]);

    // 모듈관리
    Route::resource('modules',\Jiny\Admin\Http\Controllers\Modules::class);

    //회원관리
    Route::prefix('/users')->name('users.')->group(function () {


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


## 라라벨 관리
Route::middleware(['web','auth:sanctum', 'verified'])
->name('admin.')
->prefix('/admin/laravel')->group(function () {
    ## 마이그레이션 관리
    Route::resource('migrations', \Jiny\Admin\Http\Controllers\Laravel\MigrationController::class);

});





## Jiny Admin
Route::middleware(['web','auth:sanctum', 'verified'])
->name('admin.jiny.')
->prefix('/admin/jiny')->group(function () {
    Route::resource('actions',\Jiny\Admin\Http\Controllers\Jiny\ActionController::class);
    Route::resource('modules',\Jiny\Admin\Http\Controllers\Jiny\ModulesController::class);
    Route::resource('route',\Jiny\Admin\Http\Controllers\Jiny\RouteController::class);
});



if(!function_exists("jinyRoute")) {
    function jinyRoute($uri) {
        $row = DB::table('jiny_route')
        ->where('enable',true)
        ->where('route',$_SERVER['PATH_INFO'])->first();
        return $row;
    }
}


function jinyRouteParser($type)
{
    if($type == "view") {
        Route::get($_SERVER['PATH_INFO'],[
            Jiny\Pages\Http\Controllers\PageView::class,
            "index"
        ]);
    } else if($type == "markdown") {
        Route::get($_SERVER['PATH_INFO'],[
            Jiny\Pages\Http\Controllers\MarkdownView::class,
            "index"
        ]);
    } else if($type == "post") {
        Route::get($_SERVER['PATH_INFO'],[
            Jiny\Pages\Http\Controllers\PostView::class,
            "index"
        ]);
    } else if($type == "table") {
    } else if($type == "form") {
    }
}
/**
 *
 */
// 페이지 라우트 검사.
if(isset($_SERVER['PATH_INFO'])) {
    if($row = jinyRoute($_SERVER['PATH_INFO'])) {
        $uris = explode('/', $_SERVER['PATH_INFO']);

        //livewire 통신은 제외
        if($uris[1] != "livewire") {
            Route::middleware(['web'])
                ->name( str_replace("/",".",$_SERVER['PATH_INFO']).".")
                ->group(function () use ($row){

                    $type = parserKey($row->type);
                    jinyRouteParser($type);

                });

        }
    } else {
        //jiny_route 미등록
        // actions 폴더 검사
        $path = resource_path('actions');

        $filename = str_replace("/","_",$_SERVER['PATH_INFO']).".json";
        $filename = ltrim($filename,"_");
        //dd($path.DIRECTORY_SEPARATOR.$filename);
        if(file_exists($path.DIRECTORY_SEPARATOR.$filename)) {
            $json = file_get_contents($path.DIRECTORY_SEPARATOR.$filename);
            $actions = json_decode($json,true);

            if(isset($actions['view_content'])) {
                // static view
                Route::middleware(['web'])
                ->name( str_replace("/",".",$_SERVER['PATH_INFO']).".")
                ->group(function () use ($row){
                    jinyRouteParser("view");
                });

            } else if(isset($actions['post_table'])) {
                // post
                Route::middleware(['web'])
                ->name( str_replace("/",".",$_SERVER['PATH_INFO']).".")
                ->group(function () use ($row){
                    jinyRouteParser("post");
                });
            } else if(isset($actions['view_markdown'])) {
                // post
                Route::middleware(['web'])
                ->name( str_replace("/",".",$_SERVER['PATH_INFO']).".")
                ->group(function () use ($row){
                    jinyRouteParser("markdown");
                });
            }


        }

    }
}



// smart 404 Page
Route::fallback(function () {
    return view("jinyadmin::errors.404");
})->middleware('web');
