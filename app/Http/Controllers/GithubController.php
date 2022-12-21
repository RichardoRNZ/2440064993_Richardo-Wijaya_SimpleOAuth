<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    //
    public function directToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function GithubDirectHandler()
    {
        try {
            //code...
            $user = Socialite::driver('github')->user();
            $find = User::where('social_id', $user->getId())->first();
            if($find)
            {
                Auth::login($find);
                return redirect()->route('home');

            }
            else
            {
                // dd($user);

                $newUser = User::create([
                    'name' => $user->name,
                    // 'username' => $user->nickname,
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
