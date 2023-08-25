<?php

namespace App\Http\Actions\Admin\Auth;

use App\Models\Role;
use App\Http\Tasks\Auth\LoginTask;
use App\Http\Shared\Actions\BaseAction;

class AdminLoginAction extends BaseAction
{
    /**
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public function handle()
    {
        return resolve(LoginTask::class)->handle($this->request, Role::ADMIN);
    }
}
