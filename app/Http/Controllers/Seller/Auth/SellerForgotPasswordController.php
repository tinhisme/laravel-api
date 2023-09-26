<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Auth\SellerForgotPasswordAction;
use App\Http\Requests\Seller\Auth\SellerForgotPasswordRequest;

class SellerForgotPasswordController extends Controller
{
    /**
     * @param SellerForgotPasswordRequest $request
     * @return mixed
     */
    public function __invoke(SellerForgotPasswordRequest $request)
    {
        $data = resolve(SellerForgotPasswordAction::class)->setRequest($request)->handle();
        return $data;
    }
}
