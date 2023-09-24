<?php

namespace App\Http\Actions\User\Category;

use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Category\ListCategoryTask;

class UserListCategoryAction extends BaseAction
{
    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        return resolve(ListCategoryTask::class)->handle();
    }   
}