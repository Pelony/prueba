<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request){
        //Validacion
        $this->validate($request,['name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:password',]);
    }
}
