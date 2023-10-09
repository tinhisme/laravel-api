<?php

namespace App\Http\Controllers\Product;

use Illuminate\Routing\Controller;
use App\Http\Actions\Product\DeleteProductAction;
use App\Http\Requests\Product\DeleteProductRequest;

class DeleteProductController extends Controller
{
    /**
     * @param DeleteProductRequest $request
     * @return mixed
     */
    public function __invoke(DeleteProductRequest $request)
    {
        $data = resolve(DeleteProductAction::class)->setRequest($request)->handle();
        return $data;
    }
}
