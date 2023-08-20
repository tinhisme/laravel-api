<?php

namespace App\Http\Actions\Seller\Auth;

use App\Models\Role;
use App\Http\Tasks\Auth\LoginTask;
use App\Http\Shared\Actions\BaseAction;

class SellerLoginAction extends BaseAction
{
    /**
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public function handle()
    {
        return resolve(LoginTask::class)->handle($this->request, Role::SELLER);
    }
}
