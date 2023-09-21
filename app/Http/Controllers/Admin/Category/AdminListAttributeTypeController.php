<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminListAttributeTypeAction;
use App\Http\Requests\Admin\Category\AdminListAttributeTypeRequest;


class AdminListAttributeTypeController extends Controller
{
    /**
     * @param AdminListAttributeTypeRequest $request
     * @return mixed
     */
    public function handle(AdminListAttributeTypeRequest $request)
    {
        $data = resolve(AdminListAttributeTypeAction::class)->setRequest($request)->handle();
        return $data;
    }
}
