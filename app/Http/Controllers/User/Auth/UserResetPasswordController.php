<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Auth\UserResetPasswordAction;
use App\Http\Requests\User\Auth\UserResetPasswordRequest;

class UserResetPasswordController extends Controller
{
    /**
     * @param UserResetPasswordRequest $request
     * @return mixed
     */
    public function handle(UserResetPasswordRequest $request)
    {
        $data = resolve(UserResetPasswordAction::class)->setRequest($request)->handle();
        return $data;
    }
}
