<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminCreateAttributeValueAction;
use App\Http\Requests\Admin\Category\AdminCreateAttributeValueRequest;

class AdminCreateAttributeValueController extends Controller
{
    /**
     * @param AdminCreateAttributeValueRequest $request
     * @return mixed
     */
    public function __invoke(AdminCreateAttributeValueRequest $request)
    {
        $data = resolve(AdminCreateAttributeValueAction::class)->setRequest($request)->handle();
        return $data;
    }
}
