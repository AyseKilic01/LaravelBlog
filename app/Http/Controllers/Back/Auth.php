<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth as AuthL;

class Auth extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }
    public function  loginPost(Request $request){
    if(AuthL::attempt(['mail'=>$request->mail,'password'=>$request->password])){
        return redirect()->route('index'); die();
    }
    return redirect()->route('login')->withErrors('Oops yanlış olan bir şeyler var...');
    }

    public function logout(){
        AuthL::logout();
        return redirect()->route('login');
    }
}
