<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Auth\UserVerifyEmailAction;
use App\Http\Requests\User\Auth\UserVerifyEmailRequest;

class UserVerifyEmailController extends Controller
{
    public function handle(UserVerifyEmailRequest $request)
    {
        $data = resolve(UserVerifyEmailAction::class)->setRequest($request)->handle();
        return $data;
    }
}
