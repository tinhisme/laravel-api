<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Auth\UserChangePasswordAction;
use App\Http\Requests\User\Auth\UserChangePasswordRequest;

class UserChangePasswordController extends Controller
{
    /**
     * @param UserChangePasswordRequest $request
     * @return mixed
     */
    public function __invoke(UserChangePasswordRequest $request)
    {
        $data = resolve(UserChangePasswordAction::class)->setRequest($request)->handle();
        return $data;
    }
}
