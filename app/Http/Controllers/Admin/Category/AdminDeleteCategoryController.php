<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminDeleteCategoryAction;
use App\Http\Requests\Admin\Category\AdminDeleteCategoryRequest;

class AdminDeleteCategoryController extends Controller
{
    /**
     * @param AdminDeleteCategoryRequest $request
     * @return mixed
     */
    public function __invoke(AdminDeleteCategoryRequest $request)
    {
        $data = resolve(AdminDeleteCategoryAction::class)->setRequest($request)->handle();
        return $data;
    }
}
