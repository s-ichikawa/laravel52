<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
use URL;

class LineNotifyController extends Controller
{
    public function index()
    {
        return view('line_notify.index');
    }

    public function redirectToProvider()
    {
        $uri = 'https://notify-bot.line.me/oauth/authorize?' .
            'response_type=code' . '&' .
            'client_id=' . config('services.line_notify.client_id') . '&' .
            'redirect_uri=' . config('services.line_notify.redirect_uri') . '&' .
            'scope=notify' . '&' .
            'state=' . csrf_token() . '&' .
            'response_mode=form_post';
        return redirect($uri);
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('line_notify')->user();

        \Log::debug($user->token);
    }
}
