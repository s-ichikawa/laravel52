<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class LineNotifyController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('line_notify')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('line_notify')->user();

        \Log::debug($user->token);
    }
}
