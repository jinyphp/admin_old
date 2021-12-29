<?php

namespace Jiny\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class JinyAdminServiceProvider extends ServiceProvider
{
    private $package = "jinyadmin";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Blade::component(\Jiny\Admin\View\Components\Tree::class, "admin-tree");
    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('LiveTreeJson', \Jiny\Admin\Http\Livewire\LiveTreeJson::class);

            //Livewire::component('Admin-SiteMenu-Items', \Jiny\Admin\Http\Livewire\Site\MenuItemsWire::class);
            //Livewire::component('Admin-SiteMenu-Code', \Jiny\Admin\Http\Livewire\Site\MenuCodeWire::class);

            // 404 페이지 추가 popup
            Livewire::component('AddPopupPage', \Jiny\Admin\Http\Livewire\AddPopupPage::class);
        });

    }

}
