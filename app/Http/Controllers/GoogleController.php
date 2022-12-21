<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function GoogleRedirect()
    {
        try {
            //code...
            $user = Socialite::driver('google')->user();
            $find = User::where('social_id', $user->getId())->first();

            if($find)
            {
                Auth::login($find);
                return redirect()->route('home');

            }
            else
            {
                // dd($user->id);
                $newUser = User::create([
                    'name' => $user->name,
                    // 'username' => $user->email,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                    'password' => bcrypt('12345679'),
                    'picture' => $user->avatar

                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
