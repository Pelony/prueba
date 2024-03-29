<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function index()

    {

        return view('auth.login');

    }   

        

    /**  

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {

        return view('auth.register');

    } 

         

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required'

        ]);

  

        if ($validator->fails()){

            return response()->json([

                    "status" => false,

                    "errors" => $validator->errors()

                ]);

        } else {

            if (Auth::attempt($request->only(["email", "password"]))) {
                return redirect()->route("showAll");
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }

        }

    }

        

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {  

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

            'password_confirmation' => 'required|min:6|same:password',

        ]);

  

        if ($validator->fails()){

            return response()->json([

                    "status" => false,

                    "errors" => $validator->errors()

                ]);

        }

  

        $data = $request->all();

        $user = $this->create($data);

  

        Auth::login($user);

        return redirect()->route("showAll");
        
        
        

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {

        if(Auth::check()){

            return view('dashboard');

        }

    

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

      return User::create([

        'name' => $data['name'],

        'email' => $data['email'],

        'password' => Hash::make($data['password'])

      ]);

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();

    

        return Redirect('login');

    }
}
