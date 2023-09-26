<?php

namespace App\Http\Actions\Seller\Category;

use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Category\ListAttributeTask;

class SellerListAttributeAction extends BaseAction
{
    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        return resolve(ListAttributeTask::class)->handle($this->request);
    }   
}
