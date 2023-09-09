<?php

namespace App\Http\Controllers\Seller\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Category\SellerListCategoryAction;
use App\Http\Requests\Seller\Category\SellerListCategoryRequest;


class SellerListCategoryController extends Controller
{
    /**
     * @param SellerListCategoryRequest $request
     * @return mixed
     */
    public function handle(SellerListCategoryRequest $request)
    {
        $data = resolve(SellerListCategoryAction::class)->setRequest($request)->handle();
        return $data;
    }
}
