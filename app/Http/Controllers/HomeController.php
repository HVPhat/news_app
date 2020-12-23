<?php

namespace news_app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use news_app\Http\Requests\LoginFormRequest;
use news_app\User;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;


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
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->remeber;
        /*if($request->remember!=null)
            if (Auth::attempt($arr, true)) {
                // Authentication passed...
                //return $request->remember!=null;
                return redirect()->route('dashboard');
            }
            else{
                var_dump($arr);
                return 'Dang nhap that bai';
            }
        else*/
            if (Auth::attempt($credentials,$request->remeber)) {
                // Authentication passed...
                //return $arr;
                if(Auth::user()->is_admin)
                    return redirect()->route('dashboard');
                else{
                    Auth::logout();
                    $errors = new MessageBag(['login' => ["You don't have permission to login"]]);
                    return redirect()->route('login')->withErrors($errors);
                }
            }
            $errors = new MessageBag(['login' => ['Email and/or password invalid.']]);
            return redirect()->route('login')->withErrors($errors);
    }
}
