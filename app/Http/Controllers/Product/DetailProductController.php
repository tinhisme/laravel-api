<?php

namespace App\Http\Controllers\Product;

use Illuminate\Routing\Controller;
use App\Http\Actions\Product\DetailProductAction;
use App\Http\Requests\Product\DetailProductRequest;

class DetailProductController extends Controller
{
    /**
     * @param DetailProductRequest $request
     * @return mixed
     */
    public function __invoke(DetailProductRequest $request)
    {
        $data = resolve(DetailProductAction::class)->setRequest($request)->handle();
        return $data;
    }
}
