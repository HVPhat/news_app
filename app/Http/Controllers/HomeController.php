<?php

namespace news_app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }    
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user'=>$user]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function login(Request $request)
    {
        $arr=[
        'email' => $request->email,
        'password' => $request->password,
        'is_admin' => 1
        ];
        $credentials = $request->only('email', 'password');
        $remember = $request->remeber;
        if($request->remember!=null)
            if (Auth::attempt($arr, true)) {
                // Authentication passed...
                //return $request->remember!=null;
                return redirect()->route('dashboard');
            }
            else{
                var_dump($arr);
                return 'Dang nhap that bai';
            }
        else
            if (Auth::attempt($arr)) {
                // Authentication passed...
                //return $arr;
                return redirect()->route('dashboard');
            }
            else{
                var_dump($arr);
                return 'Dang nhap that bai';
            }
    }
}
