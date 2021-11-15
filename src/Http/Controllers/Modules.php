<?php

namespace Jiny\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class Modules extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin) {
            return view('jinyadmin::modules');
        } else {
            return "관리자만 접속할 수 있습니다.";
        }


    }


}
