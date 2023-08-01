<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Auth\AdminLoginAction;
use App\Http\Requests\Admin\Auth\AdminLoginRequest;

class AdminLoginController extends Controller
{
    /**
     * @param AdminLoginRequest $request
     * @return mixed
     */
    public function handle(AdminLoginRequest $request)
    {
        $data = resolve(AdminLoginAction::class)->setRequest($request)->handle();
        return $data;
        // return LoginResource::make($data);
    }
}
