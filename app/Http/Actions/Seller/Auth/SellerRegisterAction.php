<?php

namespace App\Http\Actions\Seller\Auth;

use App\Models\Role;
use App\Http\Tasks\Auth\RegisterTask;
use App\Http\Shared\Actions\BaseAction;

class SellerRegisterAction extends BaseAction
{
    /**
     * handle
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function handle()
    {
        return resolve(RegisterTask::class)->handle($this->request, Role::SELLER);
    }
}
