<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function LoginPage()
    {
        return view('login-register');
    }

    public function Login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email must be filled',
            'password.required' => 'Password must be filled'
        ]);

        $login = [
            'email' => $request->email,
            'password' =>$request->password
        ];

        if(Auth::attempt($login)==true)
        {
            return redirect()->route('home');
        }
        else{
            // return redirect()->back();
           return"<script>alert('Invalid Email Or Password')</script>" . redirect()->back();

        }
    }
    public function LogOut()
    {
        Auth::logout();
        return redirect('login')->with('success','Berhasil Logout');
    }
    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'name.required' => 'Name must be filled',
            'email.required' => 'Email must be filled',
            'email.email' => 'Email not Valid',
            'password.required' => 'Password must be filled'
        ]);

        $register = [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ];

        User::create($register);
        $login = [
            'email' => $request->email,
            'password' =>$request->password
        ];

        if(Auth::attempt($login)==true)
        {
            return redirect()->route('home');
        }
        else{
            // return redirect()->back();
           return"<script>alert('Invalid Email Or Password')</script>" . redirect()->back();

        }
    }

}
