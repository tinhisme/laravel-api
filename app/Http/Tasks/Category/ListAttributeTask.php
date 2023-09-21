<?php

namespace App\Http\Tasks\Category;

use App\Models\Attribute;
use App\Models\AttributeType;

class ListAttributeTask
{
    public function handle($request)
    {
        $categoryId = $request['category_id'];
        $parentNodes = Attribute::where('category_id', $categoryId)->get();

        $data = [];

        foreach ($parentNodes as $parentNode) {
            $parentNodeData = self::buildTree($parentNode);
            $data[] = $parentNodeData;
        }
        return $data;
    }
    
    function buildTree($parentNode, $isParentNode = true) {
        $attributeIds = [];
        
        if ($isParentNode && $parentNode->isRoot()) {
            $attributeTypeValues = $parentNode->attribute_type_id;
            foreach ($attributeTypeValues as $attributeTypeValue) {
                $attribute = AttributeType::where('id', $attributeTypeValue)->first();
                if ($attribute) {
                    $attributeIds[] = $attribute->name;
                }
            }
        }

        $data = [
            'id' => $parentNode->id,
            'name' => $parentNode->name,
            'children' => [],
        ];

        if ($isParentNode) {
            $data['attribute_type'] = $attributeIds;
        }

        $children = $parentNode->descendants;

        foreach ($children as $child) {
            $childData = self::buildTree($child, false);

            $data['children'][] = $childData;
        }

        return $data;
    }
}
