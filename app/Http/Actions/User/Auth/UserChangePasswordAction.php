<?php

namespace App\Http\Actions\User\Auth;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Lang;
use App\Http\Shared\Actions\BaseAction;
use App\Exceptions\AuthenticateException;
use App\Http\Tasks\Auth\ChangePasswordTask;

class UserChangePasswordAction extends BaseAction
{
    public function handle()
    {
        return resolve(ChangePasswordTask::class)->handle($this->request);
    }
}
