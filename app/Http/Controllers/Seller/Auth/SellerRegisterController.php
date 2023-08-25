<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Auth\SellerRegisterAction;
use App\Http\Requests\Seller\Auth\SellerRegisterRequest;

class SellerRegisterController extends Controller
{
    public function handle(SellerRegisterRequest $request)
    {
        $data = resolve(SellerRegisterAction::class)->setRequest($request)->handle();
        return $data;
    }
}
