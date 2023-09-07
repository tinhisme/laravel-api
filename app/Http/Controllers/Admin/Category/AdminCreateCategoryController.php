<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminCreateCategoryAction;
use App\Http\Requests\Admin\Category\AdminCreateCategoryRequest;

class AdminCreateCategoryController extends Controller
{
    /**
     * @param AdminCreateCategoryRequest $request
     * @return mixed
     */
    public function handle(AdminCreateCategoryRequest $request)
    {
        $data = resolve(AdminCreateCategoryAction::class)->setRequest($request)->handle();
        return $data;
    }
}
