<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Routing\Controller;

class AdminLogoutController extends Controller
{

    public function handle()
    {
        auth()->logout();

        $response = ['message' => 'User logout successfully'];

        return $response;
    }
}
