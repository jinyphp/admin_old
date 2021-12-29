<?php

namespace Jiny\Admin\Http\Controllers\Jiny;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\Table\Http\Controllers\ResourceController;
class ModulesController extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        //$this->actions['table'] = "jiny_modules"; // 테이블 정보
        //$this->actions['paging'] = 10; // 페이지 기본값
        //$this->actions['view_list'] = "jinyadmin::jiny.modules.list";
        //$this->actions['view_form'] = "jinyadmin::jiny.modules.form";
    }



}
