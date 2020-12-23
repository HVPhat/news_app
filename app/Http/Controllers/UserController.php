<?php

namespace news_app\Http\Controllers;

use news_app\Http\Requests\UserFormSubmitRequest;
use Illuminate\Http\Request;
use news_app\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$user=Auth::user();
        $users=User::all();
        return view('user\user_table', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user\add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormSubmitRequest $request)
    {
        //
        /*$validation = $request->validate([
            'name'=>'required',
            'email'=>'required | unique:users,email',
            'password'=>'required',
            'phone'=>'required | min:11',
        ]);*/
        $validation=$request->all();
        $user=User::create($validation);
        return redirect()->route('user.index');
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
        //
        $user=User::find($id);
        return view('user\edit_user',$user);
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
        //
        $user=User::find($id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        $user->password=bcrypt($request['password']);
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \news_app\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        return $user;
        /*$user=User::find($user->id);
        $user->delete();
        return redirect()->route('user.index');*/
    }

    public function DanhSachBaiViet($id)
    {
        $dsBaiViet = User::find($id)->DsBaiViet;
        return view('user\bai_viet_cua_user_table',['dsBaiViet'=>$dsBaiViet]);
    }

}
