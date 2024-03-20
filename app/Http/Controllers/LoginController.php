<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = [];

        if($request->isMethod("POST")){
            //$data = $request->all();
            $login = $request->input("email");
            $password = $request->input("password");
            $credentials = ['email'=> $login, 'password' => $password];

            //Se entrar nesse if o usuario iniciou o login
            if(Auth::attempt($credentials)){
                return redirect()->route('dashboard');
            } else{
                $request->session()->flash("err", "Usuario/Senha invalido");
                return redirect()->route("login");
            }
        }

        return view("login.login", $data);
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
