<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminUpdateCategoryAction;
use App\Http\Requests\Admin\Category\AdminUpdateCategoryRequest;

class AdminUpdateCategoryController extends Controller
{
    /**
     * @param AdminUpdateCategoryRequest $request
     * @return mixed
     */
    public function __invoke(AdminUpdateCategoryRequest $request)
    {
        $data = resolve(AdminUpdateCategoryAction::class)->setRequest($request)->handle();
        return $data;
    }
}
