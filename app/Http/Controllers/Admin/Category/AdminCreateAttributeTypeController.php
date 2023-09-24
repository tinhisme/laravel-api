<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminCreateAttributeTypeAction;
use App\Http\Requests\Admin\Category\AdminCreateAttributeTypeRequest;

class AdminCreateAttributeTypeController extends Controller
{
    /**
     * @param AdminCreateAttributeTypeRequest $request
     * @return mixed
     */
    public function __invoke(AdminCreateAttributeTypeRequest $request)
    {
        $data = resolve(AdminCreateAttributeTypeAction::class)->setRequest($request)->handle();
        return $data;
    }
}
