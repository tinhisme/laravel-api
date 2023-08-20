<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserLogoutController extends Controller
{

    public function handle()
    {
        auth()->logout();

        $response = ['message' => 'User logout successfully'];

        return $response;
    }
}
