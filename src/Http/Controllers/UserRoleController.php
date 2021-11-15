<?php

namespace Jiny\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);

        return view('jinyadmin::users.roles.index')->with([
            'roles'=>$roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jinyadmin::users.roles.create');
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
            'name'=>"required|max:255"
        ]);

        $user = Role::create($vaildateData);

        $request->session()->flush('success',"성공적으로 추가되었습니다.");
        return redirect(route('admin.users.role.index'));
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
        $role = Role::find($id);
        return view('jinyadmin::users.roles.edit',[
            'role'=>$role
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
        $role = Role::findOrFail($id);

        if (!$role) {
            $request->session()->flash('error', 'You can not edit this');
            return redirect(route('admin.users.role.index'));
        }

        $role->update($request->except(['_token']));

        $request->session()->flush('success',"성공적으로 수정되었습니다.");
        return redirect(route('admin.users.role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Role::destroy($id);
        $request->session()->flush('success',"성공적으로 삭제되었습니다.");
        return redirect(route('admin.users.role.index'));
    }
}
