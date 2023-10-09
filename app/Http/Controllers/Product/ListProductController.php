<?php

namespace App\Http\Controllers\Product;

use Illuminate\Routing\Controller;
use App\Http\Actions\Product\ListProductAction;
use App\Http\Requests\Product\ListProductRequest;

class ListProductController extends Controller
{
    /**
     * @param ListProductRequest $request
     * @return mixed
     */
    public function __invoke(ListProductRequest $request)
    {
        $data = resolve(ListProductAction::class)->setRequest($request)->handle();
        return $data;
    }
}
