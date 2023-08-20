<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Auth\SellerLoginAction;
use App\Http\Requests\Seller\Auth\SellerLoginRequest;

class SellerLoginController extends Controller
{
    /**
     * @param SellerLoginRequest $request
     * @return mixed
     */
    public function handle(SellerLoginRequest $request)
    {
        $data = resolve(SellerLoginAction::class)->setRequest($request)->handle();
        return $data;
    }
}
