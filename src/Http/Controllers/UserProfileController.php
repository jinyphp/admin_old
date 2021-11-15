<?php

namespace Jiny\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Support\Facades\Gate;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(...$id)
    {
        $user = User::find($id[0]);
        $profile = Profile::where('user_id',$id[0])->first();
        if(!$profile) {
            //return "신규";
            return view('jinyadmin::users.profile.create')->with([
                'user'=>$user
            ]);

        } else {
            //dd($profile);
            //return "신규";
            return view('jinyadmin::users.profile.edit')->with([
                'user'=>$user,
                'profile'=>$profile
            ]);
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($id);
        $vaildateData = $request->validate([
            'phone'=>"max:255"
        ]);
        //
        $vaildateData['user_id'] = $id;
        //dd($vaildateData);

        $profile = Profile::create($vaildateData);
        //$user->roles()->sync($request->roles);

        $request->session()->flush('success',"성공적으로 수정이 되었습니다.");
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ...$id)
    {
        $profile = Profile::findOrFail($id[1]);

        if (!$profile) {
            $request->session()->flash('error', 'You can not edit this user');
            return redirect(route('admin.users.index'));
        }

        $profile->update($request->except(['_token']));


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
