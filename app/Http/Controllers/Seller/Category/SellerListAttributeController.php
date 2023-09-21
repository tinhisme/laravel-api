<?php

namespace App\Http\Controllers\Seller\Category;

use Illuminate\Routing\Controller;
use App\Http\Actions\Seller\Category\SellerListAttributeAction;
use App\Http\Requests\Seller\Category\SellerListAttributeRequest;


class SellerListAttributeController extends Controller
{
    /**
     * @param SellerListAttributeRequest $request
     * @return mixed
     */
    public function handle(SellerListAttributeRequest $request)
    {
        $data = resolve(SellerListAttributeAction::class)->setRequest($request)->handle();
        return $data;
    }
}
