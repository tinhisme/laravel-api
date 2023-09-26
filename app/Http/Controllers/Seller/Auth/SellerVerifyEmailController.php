<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Auth\SellerVerifyEmailAction;
use App\Http\Requests\Seller\Auth\SellerVerifyEmailRequest;

class SellerVerifyEmailController extends Controller
{
    public function __invoke(SellerVerifyEmailRequest $request)
    {
        $data = resolve(SellerVerifyEmailAction::class)->setRequest($request)->handle();
        return $data;
    }
}
