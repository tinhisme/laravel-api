<?php

namespace App\Http\Actions\Seller\Auth;

use App\Repositories\SellerRepository;
use Illuminate\Support\Facades\Lang;
use App\Http\Shared\Actions\BaseAction;
use App\Exceptions\AuthenticateException;
use App\Http\Tasks\Auth\ResetPasswordTask;

class SellerResetPasswordAction extends BaseAction
{
    public function handle()
    {
        return resolve(ResetPasswordTask::class)->handle($this->request);
    }
}
