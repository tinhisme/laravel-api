<?php

namespace App\Http\Actions\Admin\Category;

use App\Helpers\Common;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use App\Http\Shared\Actions\BaseAction;
use App\Repositories\AttributeRepository;

class AdminCreateAttributeAction extends BaseAction
{
    /**
     * @var AttributeRepository $attributeRepository
     */
    protected $attributeRepository;

    /**
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->request->all();
        $dataInsert = Common::getDataInsert($data, false);

        if(!empty($data['attribute_type_ids'])){
            $dataInsert['attribute_type_id'] =  DB::raw("'{" . implode(",", $data['attribute_type_ids']) . "}'");
            unset($dataInsert['attribute_type_ids']);
        }

        $attribute = new Attribute($dataInsert);

        if(!empty($data['parent_id'])){
            $parentId = $data['parent_id'];
            $parentAttribute = Attribute::find($parentId);
            $parentAttribute->appendNode($attribute);
        }

        $attribute->save();
        $attribute = $this->attributeRepository->findWhereIn('id', [$attribute->id]);
        return $this->setMessage('create_success', 'attribute', null, $attribute);
    }   
}
