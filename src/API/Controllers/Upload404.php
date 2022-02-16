<?php

namespace Jiny\Admin\API\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Upload404 extends Controller
{
    const UPLOAD = "pages";

    public function __construct()
    {

    }

    public function dropzone(Request $requet)
    {
        $uploaded = [];

        if (!empty($_FILES['file']['name'][0])) {
            foreach ($_FILES['file']['name'] as $pos => $name) {
                $info = pathinfo($name);
                if($info['extension'] == "md") {
                    // markdown upload
                    $uploaded = $this->markdown($pos, $name);
                    $uploaded['info'] = $info;

                } else if($info['extension'] == "htm") {
                    $uploaded = $this->html($pos, $name);
                    $uploaded['info'] = $info;
                } else if($info['extension'] == "jpg" || $info['extension'] == "gif" || $info['extension'] == "png") {
                    $uploaded = $this->image($pos, $name);
                    $uploaded['info'] = $info;

                } else if($info['extension'] == "php") {
                    $uploaded = $this->blade($pos, $name);
                    $uploaded['info'] = $info;

                }
            }
        }

        return response()->json($uploaded);
    }

    private function markdown($pos, $name)
    {
        // 경로 저장소 처리
        $url = parse_url($_POST['_uri']);
        $path = resource_path(self::UPLOAD).$url['path'];
        $path = str_replace("/",DIRECTORY_SEPARATOR,$path);
        if (!is_dir($path)) mkdir($path, 755, true);

        $filename = $path.DIRECTORY_SEPARATOR.$name;
        $source = $_FILES['file']['tmp_name'][$pos];
        if( move_uploaded_file($source, $filename) ){
            $uploaded []= [
                'name' => $name,
                'url' => parse_url($_POST['_uri']),
                'path' => $path
            ];

            $uploaded['file']= $filename;
        }

        // DB 저장, 중복여부 체크
        $row = DB::table("jiny_route")->where('route',$url['path'])->get();
        if($row) {
            // 시간정보 생성
            $forms['created_at'] = date("Y-m-d H:i:s");
            $forms['updated_at'] = date("Y-m-d H:i:s");

            $forms['enable'] = 1;
            $forms['route'] = $url['path'];
            $forms['type'] = "markdown:markdown";
            $forms['path'] = $url['path']."/".$name;

            // 데이터 삽입
            DB::table("jiny_route")->insertGetId($forms);
            $uploaded['forms'] = $forms;
        }


        // 업로드 컨덴츠 정보 등록
        $sectionId = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],
            'type'=>"section",
            'pos'=>1,
            'ref'=>0,
            'level'=>1
        ]);

        $article = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],
            'path'=>$url['path']."/".$name,
            'type'=>"markdown",
            'pos'=>1,
            'ref'=> $sectionId,
            'level'=>2
        ]);

        return $uploaded;
    }

    private function html($pos, $name)
    {
        // 경로 저장소 처리
        $url = parse_url($_POST['_uri']);
        $path = resource_path(self::UPLOAD).$url['path'];
        $path = str_replace("/",DIRECTORY_SEPARATOR,$path);
        if (!is_dir($path)) mkdir($path, 755, true);

        $filename = $path.DIRECTORY_SEPARATOR.$name;
        $source = $_FILES['file']['tmp_name'][$pos];
        if( move_uploaded_file($source, $filename) ){
            $uploaded []= [
                'name' => $name,
                'url' => parse_url($_POST['_uri']),
                'path' => $path
            ];

            $uploaded['file']= $filename;
        }


        // DB 저장, 중복여부 체크
        $row = DB::table("jiny_route")->where('route',$url['path'])->get();
        if($row) {
            // 시간정보 생성
            $forms['created_at'] = date("Y-m-d H:i:s");
            $forms['updated_at'] = date("Y-m-d H:i:s");

            $forms['enable'] = 1;
            $forms['route'] = $url['path'];
            $forms['type'] = "markdown:markdown";
            $forms['path'] = $url['path']."/".$name;

            // 데이터 삽입
            DB::table("jiny_route")->insertGetId($forms);
            $uploaded['forms'] = $forms;
        }

        // 업로드 컨덴츠 정보 등록



        // 업로드 컨덴츠 정보 등록
        $sectionId = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],

            'element'=>"section",
            'pos'=>1,
            'ref'=>0,
            'level'=>1
        ]);

        $article = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],
            'path'=>$url['path']."/".$name,
            'type'=>"html",
            'pos'=>1,
            'ref'=> $sectionId,
            'level'=>2
        ]);


        return $uploaded;
    }

    private function image($pos, $name)
    {
        // 업로드 public 경로
        $upload = public_path('images');

        // 경로 저장소 처리
        $url = parse_url($_POST['_uri']);
        $path = $upload.$url['path'];
        $path = str_replace("/",DIRECTORY_SEPARATOR,$path);
        if (!is_dir($path)) mkdir($path, 755, true);

        $filename = $path.DIRECTORY_SEPARATOR.$name;
        $source = $_FILES['file']['tmp_name'][$pos];
        if( move_uploaded_file($source, $filename) ){
            $uploaded []= [
                'name' => $name,
                'url' => parse_url($_POST['_uri']),
                'path' => $path
            ];

            $uploaded['file']= $filename;
        }


        // DB 저장, 중복여부 체크
        $row = DB::table("jiny_route")->where('route',$url['path'])->get();
        if($row) {
            // 시간정보 생성
            $forms['created_at'] = date("Y-m-d H:i:s");
            $forms['updated_at'] = date("Y-m-d H:i:s");

            $forms['enable'] = 1;
            $forms['route'] = $url['path'];
            $forms['type'] = "markdown:markdown";
            $forms['path'] = $url['path']."/".$name;

            // 데이터 삽입
            DB::table("jiny_route")->insertGetId($forms);
            $uploaded['forms'] = $forms;
        }


        // 업로드 컨덴츠 정보 등록
        $sectionId = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],
            'type'=>"section",
            'pos'=>1,
            'ref'=>0,
            'level'=>1
        ]);

        $article = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],
            'path'=>$url['path']."/".$name,
            'type'=>"image",
            'pos'=>1,
            'ref'=> $sectionId,
            'level'=>2
        ]);


        return $uploaded;
    }

    private function blade($pos, $name)
    {
        // 경로 저장소 처리
        $url = parse_url($_POST['_uri']);
        $path = resource_path("views/".self::UPLOAD).$url['path'];
        $path = str_replace("/",DIRECTORY_SEPARATOR,$path);
        if (!is_dir($path)) mkdir($path, 755, true);

        $filename = $path.DIRECTORY_SEPARATOR.$name;
        $source = $_FILES['file']['tmp_name'][$pos];
        if( move_uploaded_file($source, $filename) ){
            $uploaded []= [
                'name' => $name,
                'url' => parse_url($_POST['_uri']),
                'path' => $path
            ];

            $uploaded['file']= $filename;
        }


        // DB 저장, 중복여부 체크
        $row = DB::table("jiny_route")->where('route',$url['path'])->get();
        if($row) {
            // 시간정보 생성
            $forms['created_at'] = date("Y-m-d H:i:s");
            $forms['updated_at'] = date("Y-m-d H:i:s");

            $forms['enable'] = 1;
            $forms['route'] = $url['path'];
            $forms['type'] = "markdown:markdown";
            $forms['path'] = $url['path']."/".$name;

            // 데이터 삽입
            DB::table("jiny_route")->insertGetId($forms);
            $uploaded['forms'] = $forms;
        }




        // 업로드 컨덴츠 정보 등록
        $sectionId = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],

            'element'=>"section",
            'pos'=>1,
            'ref'=>0,
            'level'=>1
        ]);

        $article = DB::table("jiny_pages_content")->insertGetId([
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'enable'=>1,
            'route'=>$url['path'],
            'path'=>$url['path']."/".$name,
            'type'=>"blade",
            'pos'=>1,
            'ref'=> $sectionId,
            'level'=>2
        ]);

        return $uploaded;
    }





}
