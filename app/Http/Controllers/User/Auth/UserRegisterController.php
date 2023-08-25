<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Auth\UserRegisterAction;
use App\Http\Requests\User\Auth\UserRegisterRequest;

class UserRegisterController extends Controller
{
    public function handle(UserRegisterRequest $request)
    {
        $data = resolve(UserRegisterAction::class)->setRequest($request)->handle();
        return $data;
    }
}
