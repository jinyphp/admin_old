<?php

namespace Jiny\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        /*
        $cssToInlineStyles = new CssToInlineStyles();
        $html = file_get_contents(resource_path('views')."/zabbix/forms-ul.html");
        $css = file_get_contents( public_path("css/blue-theme.css") );
        // output
        $body = $cssToInlineStyles->convert($html,$css);
        return $body;
        */

        /*
        if (Gate::denies('logged-in')) {
            dd("no access");
        }

        if (Gate::allows('is-admin')) {
            //$users = User::all();

        }
        */

        $users = User::paginate(5);
        return view('jinyadmin::users.lists.index')
            ->with([
                'users'=>$users
            ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $cssToInlineStyles = new CssToInlineStyles();
        $html = "<div class='card'>a</div>";//file_get_contents("https://infohojin1.cafe24.com/jinyui/pages/pricing1");
        $css = ".card {background:white; width:100px;}";// file_get_contents("../public/https://infohojin1.cafe24.com/css/app.css");

        // output
        $body = $cssToInlineStyles->convert(
            $html,
            $css
        );

        return $body;
        */

        return view('jinyadmin::users.lists.create',[
            'roles'=>Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vaildateData = $request->validate([
            'name'=>"required|max:255",
            'email'=> "required|max:255|unique:users",
            'password'=>"required|min:8|max:255"
        ]);

        // dd($request);
        //$user = User::create($request->except(['_token','roles']));
        $user = User::create($vaildateData);
        $user->roles()->sync($request->roles);

        $request->session()->flush('success',"성공적으로 추가되었습니다.");

        return redirect(route('admin.users.list.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('jinyadmin::users.lists.edit',[
            'roles'=>Role::all(),
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            $request->session()->flash('error', 'You can not edit this user');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token','roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flush('success',"성공적으로 수정되었습니다.");

        return redirect(route('admin.users.list.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);
        $request->session()->flush('success',"성공적으로 삭제되었습니다.");
        return redirect(route('admin.users.list.index'));
    }
}
