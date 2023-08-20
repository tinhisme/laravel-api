<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Auth\SellerResetPasswordAction;
use App\Http\Requests\Seller\Auth\SellerResetPasswordRequest;

class SellerResetPasswordController extends Controller
{
    /**
     * @param SellerResetPasswordRequest $request
     * @return mixed
     */
    public function handle(SellerResetPasswordRequest $request)
    {
        $data = resolve(SellerResetPasswordAction::class)->setRequest($request)->handle();
        return $data;
    }
}
