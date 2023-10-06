<?php

namespace App\Http\Actions\Category;

use App\Helpers\Common;
use App\Http\Shared\Actions\BaseAction;
use App\Repositories\AttributeValueRepository;

class CreateAttributeValueAction extends BaseAction
{
    /**
     * @var AttributeValueRepository $attributeValueRepository
     */
    protected $attributeValueRepository;

    /**
     * @param AttributeValueRepository $attributeValueRepository
     */
    public function __construct(AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeValueRepository = $attributeValueRepository;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->request->all();
        foreach ($data['data'] as $value) {
            $dataInsert[] = [
                'name' => $value['name'],
                'attribute_id' => $value['attribute_id'],

            ];
        }

        $this->attributeValueRepository->insert($dataInsert, false);
        $arrIdInsert = Common::getArrIDInsert($this->request);
        $attribute_values = $this->attributeValueRepository->findWhereIn('id', $arrIdInsert);
        $lastRecord = Common::getNameDateLatestRecord($attribute_values[0]);
        return $this->setMessage('create_success', 'attribute_value', $lastRecord, $attribute_values);
    }
}
