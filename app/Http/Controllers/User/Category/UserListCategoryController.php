<?php

namespace App\Http\Controllers\User\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\User\Category\UserListCategoryAction;
use App\Http\Requests\User\Category\UserListCategoryRequest;


class UserListCategoryController extends Controller
{
    /**
     * @param UserListCategoryRequest $request
     * @return mixed
     */
    public function handle(UserListCategoryRequest $request)
    {
        $data = resolve(UserListCategoryAction::class)->setRequest($request)->handle();
        return $data;
    }
}
