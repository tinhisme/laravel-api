<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Auth\SellerChangePasswordAction;
use App\Http\Requests\Seller\Auth\SellerChangePasswordRequest;

class SellerChangePasswordController extends Controller
{
    /**
     * @param SellerChangePasswordRequest $request
     * @return mixed
     */
    public function __invoke(SellerChangePasswordRequest $request)
    {
        $data = resolve(SellerChangePasswordAction::class)->setRequest($request)->handle();
        return $data;
    }
}
