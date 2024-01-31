<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        //Validacion
        $this->validate($request,['name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:password',]);

        $data = $request->all();

        $user = $this->create($data);

        
    }
    
}
