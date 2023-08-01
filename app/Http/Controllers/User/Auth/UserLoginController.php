<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Auth\UserLoginAction;
use App\Http\Requests\User\Auth\UserLoginRequest;

class UserLoginController extends Controller
{
    /**
     * @param UserLoginRequest $request
     * @return mixed
     */
    public function handle(UserLoginRequest $request)
    {
        $data = resolve(UserLoginAction::class)->setRequest($request)->handle();
        return $data;
    }
}
