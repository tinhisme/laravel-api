<?php

namespace App\Http\Actions\Seller\Auth;

use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Auth\ChangePasswordTask;

class SellerChangePasswordAction extends BaseAction
{
    public function handle()
    {
        return resolve(ChangePasswordTask::class)->handle($this->request);
    }
}
