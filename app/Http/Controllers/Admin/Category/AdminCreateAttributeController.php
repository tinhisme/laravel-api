<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminCreateAttributeAction;
use App\Http\Requests\Admin\Category\AdminCreateAttributeRequest;

class AdminCreateAttributeController extends Controller
{
    /**
     * @param AdminCreateAttributeRequest $request
     * @return mixed
     */
    public function __invoke(AdminCreateAttributeRequest $request)
    {
        $data = resolve(AdminCreateAttributeAction::class)->setRequest($request)->handle();
        return $data;
    }
}
