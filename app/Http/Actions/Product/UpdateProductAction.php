<?php

namespace App\Http\Actions\Product;

use App\Helpers\Common;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Shared\Actions\BaseAction;
use App\Repositories\ProductRepository;
use App\Http\Tasks\Product\CreateProductTask;

class UpdateProductAction extends BaseAction
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

        if(!empty($data['attributes'])){
            $data['attributes'] = json_encode(json_decode($data['attributes'], true));
        }

        if(!empty($data['tier_variation'])){
            $data['tier_variation'] = json_encode(json_decode($data['tier_variation'], true));
        }

        if(!empty($data['model_list'])){
            $data['model_list'] = json_encode(json_decode($data['model_list'], true));
        }

        if(!empty($data['images'])){
            $folder = config('common.uploads.folder_products') . $userId . '/';
            $data['list_images'] = Common::uploadMultiImage($data['images'], $folder);
            $data['list_images'] = DB::raw("'{" . implode(",", $data['list_images']) . "}'");
            unset($data['images']);
        }

        $this->productRepository->upsert([$data], true, ['id'], ['name']);
        $latestRecord = resolve(Product::class)->getLatestRecord();
        return $this->setMessage(
            'update_success',
            'product',
            Common::getNameDateLatestRecord($latestRecord)
        );
    }
}
