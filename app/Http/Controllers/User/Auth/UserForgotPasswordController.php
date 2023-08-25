<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Auth\UserForgotPasswordAction;
use App\Http\Requests\User\Auth\UserForgotPasswordRequest;

class UserForgotPasswordController extends Controller
{
    /**
     * @param UserForgotPasswordRequest $request
     * @return mixed
     */
    public function handle(UserForgotPasswordRequest $request)
    {
        $data = resolve(UserForgotPasswordAction::class)->setRequest($request)->handle();
        return $data;
    }
}
