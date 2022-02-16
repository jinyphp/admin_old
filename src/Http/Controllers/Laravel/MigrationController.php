<?php

namespace Jiny\Admin\Http\Controllers\Laravel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\Table\Http\Controllers\ResourceController;
class MigrationController extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "migrations"; // 테이블 정보

        $this->actions['paging'] = 50; // 페이지 기본값

        $this->actions['view_main'] = "jinyadmin::laravel.migration.main";
        $this->actions['view_title'] = "jinyadmin::laravel.migration.title";
        //$this->actions['view_filter'] = "jinyadmin::laravel.migration.filter";
        $this->actions['view_list'] = "jinyadmin::laravel.migration.list";
        $this->actions['view_form'] = "jinyadmin::laravel.migration.form";


        // 메뉴 설정
        $user = Auth::user();
        if(isset($user->menu)) {
            ## 사용자 지정메뉴 우선설정
            xMenu()->setPath($user->menu);
        } else {
            xMenu()->setPath("menus/7.json");
        }
    }

    /**
     * Livewire 동작후 실행되는 메서드ed
     */
    ## 목록 데이터 fetch후 호출 됩니다.
    public function hookIndexed($wire, $rows)
    {

        $this->wire->_rows = [];
        foreach ($rows as $item) {
            $id = $item->id;
            $arr = explode("_",$item->migration);

            // 일자 추출
            $this->wire->_rows[$id]['date'] = $arr[0]."_".$arr[1]."_".$arr[2]."_".$arr[3];

            // 타입
            $this->wire->_rows[$id]['type'] = $arr[4];

            // 테이블명 추출
            $this->wire->_rows[$id]['table'] = "";
            for ($i=5;$i<count($arr)-1; $i++) {
                $this->wire->_rows[$id]['table'] .= $arr[$i]."_";
            }
            $this->wire->_rows[$id]['table'] = rtrim($this->wire->_rows[$id]['table'],"_");

        }

        return $rows;
    }



    ## 선택항목 삭제 후킹
    public function hookCheckDeleted($selected)
    {

        foreach($selected as $id) {
            if($this->wire->_rows[$id]['type'] == "create") {
                // 테이블 삭제
                $tablename = $this->wire->_rows[$id]['table'];
                Schema::dropIfExists($tablename);
            } else {
                // 필드 삭제
            }

        }
    }

}
