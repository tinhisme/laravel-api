<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Admin\Category\AdminListAttributeAction;
use App\Http\Requests\Admin\Category\AdminListAttributeRequest;


class AdminListAttributeController extends Controller
{
    /**
     * @param AdminListAttributeRequest $request
     * @return mixed
     */
    public function handle(AdminListAttributeRequest $request)
    {
        $data = resolve(AdminListAttributeAction::class)->setRequest($request)->handle();
        return $data;
    }
}
