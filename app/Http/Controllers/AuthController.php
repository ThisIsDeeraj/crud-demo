<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }
    public function registerPage()
    {
        return view('register');
    }



    public function registerUser(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
            ]
        );

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        return redirect()->route('login-page');
    }


    public function loginUser(Request $request)
    {
        // returns true or false 
        $isLoggedIn =  Auth::attempt(['email' => $request->email, 'password' => $request->password]);
       
       
        if ($isLoggedIn) {
                return redirect()->route('user-dashboard');
        } else {
            return "invalid credentials";
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login-page');
    }
}
