<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

   public function login(Request $request) {



        $email = $request->email;
        $password = $request->password;
        $user = User::find($email);
        $type ="admin";
        $t=NULL;
        
    if (Auth::attempt(['email' => $email, 'password'=>$password ,'type' => $type]))
        {
            return redirect('pages/dashboard');
        }

    else if (Auth::attempt(['email' => $email, 'password'=>$password ,'type' => $t])) {

         return redirect('pages/welcome');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
