<?php

namespace App\Http\Actions\User\Auth;

use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Auth\ResetPasswordTask;

class UserResetPasswordAction extends BaseAction
{
    public function handle()
    {
        return resolve(ResetPasswordTask::class)->handle($this->request);
    }
}
