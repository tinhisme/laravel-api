<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SellerLogoutController extends Controller
{

    public function handle()
    {
        auth()->logout();

        $response = ['message' => 'Seller logout successfully'];

        return $response;
    }
}
