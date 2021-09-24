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
        return "basarili"; die();
    }
    return "hata";
    }
}
