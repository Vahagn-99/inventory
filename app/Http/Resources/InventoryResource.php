<?php

namespace App\Http\Resources;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Inventory $inventory */
        $inventory = $this->resource;
        return [
            'id' => $inventory->getKey()
            , 'name' => $inventory->getAttributeValue('name')
            , 'alias' => $inventory->getAttributeValue('alias')
            , 'category_id' => $inventory->getAttributeValue('category_id')
            , 'price' => $inventory->getAttributeValue('price')
            , 'register_number' => $inventory->getAttributeValue('register_number')
            , 'accounting_number' => $inventory->getAttributeValue('accounting_number')
            , 'inventory_date' => $inventory->getAttributeValue('inventory_date')
            , 'responsible_user_signature' => $inventory->getAttributeValue('responsible_user_signature')
            , 'section_id' => $inventory->getAttributeValue('section_id')
        ];
    }
}
