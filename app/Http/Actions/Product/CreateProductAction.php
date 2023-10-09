<?php

namespace App\Http\Actions\Product;

use App\Helpers\Common;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Shared\Actions\BaseAction;
use App\Repositories\ProductRepository;
use App\Http\Tasks\Product\CreateProductTask;

class CreateProductAction extends BaseAction
{
    /**
     * @var ProductRepository $productRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->request->all();
        $userId = auth()->user()->id;
        $data['attributes'] = json_encode(json_decode($data['attributes'], true)) ?? null;
        $data['tier_variation'] = json_encode(json_decode($data['tier_variation'], true)) ?? null;
        $data['model_list'] = json_encode(json_decode($data['model_list'], true)) ?? null;
        $data['user_id'] = $userId;

        //create foder save product for user
        $folder = config('common.uploads.folder_products') . $userId . '/';
        $data['list_images'] = Common::uploadMultiImage($data['images'], $folder);
        $data['list_images'] = DB::raw("'{" . implode(",", $data['list_images']) . "}'");
        unset($data['images']);

        $productId = $this->productRepository->insertGetId($data);
        $product = $this->productRepository->find($productId);
        $lastRecord = Common::getNameDateLatestRecord($product);
        return $this->setMessage('create_success', 'product', $lastRecord, $product);
    }
}
