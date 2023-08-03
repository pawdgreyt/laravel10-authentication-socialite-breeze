<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GithubController extends Controller
{
    public function redirect(){
        return Socialite::driver('github')->redirect();
    }

    public function callback(){
        try {
            $user = Socialite::driver('github')->user();

            $gitUser = User::updateOrCreate([
                'github_id' => $user->id
            ], [
                'name' => $user->name,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'github_token' => $user->token,
                'auth_type' => 'github',
                'password' => Hash::make(Str::random(10)),
            ]);

            Auth::login($gitUser);

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            \Log::error('Exception during GitHub callback:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
