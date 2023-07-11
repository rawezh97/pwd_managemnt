<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerrequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('user_auth.register');
    }

    public function store(registerrequest $request)
    {
        $request->ip() ;
        $request->fullUrlWithQuery(['type' => 'phone']);
        $request->fullUrlWithoutQuery('type');
        $request->isMethod('post') ;
        $request->path() ;
        $request->cookie('laravel_session') ;
        $request->getHost();
        $request->old('username');

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->_token = $request->_token;
        $user->save();

        return redirect('/')->with(['msg' => 'Acount Sucessfully creted']);
        
    }



    public function login()
    {
        return view('user_auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function check(Request $request)
    {
        // $req = $request->except(['_token']);
        // if (Auth::guard('admin')->user()) {
        //     return "welcome for Admin boss";
        // }
        $request_out_token = $request->except(['_token']);
        if (Auth::attempt($request_out_token)) {
            return redirect('/main');
        }
        else{
            return redirect('/login')->with(['msg' => 'Creditional Incoriect !']);
        }
    }
}
