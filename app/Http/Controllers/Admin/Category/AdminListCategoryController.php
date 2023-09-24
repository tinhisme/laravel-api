<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Actions\Admin\Category\AdminListCategoryAction;
use App\Http\Requests\Admin\Category\AdminListCategoryRequest;


class AdminListCategoryController extends Controller
{
    /**
     * @param AdminListCategoryRequest $request
     * @return mixed
     */
    public function __invoke(AdminListCategoryRequest $request)
    {
        $data = resolve(AdminListCategoryAction::class)->setRequest($request)->handle();
        return $data;
    }
}
