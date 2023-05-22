<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventoryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Inventory|null
     */
    public function model(array $row): Model|Inventory|null
    {
        $inventory = [];
        foreach ($this->handleData() as $localKey => $importedKey) {
            $inventory[$localKey] = $row[$importedKey];
        }
        if ($this->dirty($inventory)) {
            return null;
        }
        $category_id = $this->ensureCategoryExists($inventory["category_id"]);
        $section_id = $this->ensureSectionExists($inventory["section_id"]);
        $inventory["category_id"] = $category_id;
        $inventory["section_id"] = $section_id;
        return Inventory::query()->updateOrCreate($inventory);
    }

    private function handleData(): array
    {
        return [
            'name' => "bnvouthagiry"
            , 'category_id' => "tekhnikayi_tesaky_ev_enthakarvouycy"
            , 'register_number' => "hashvarman_herthakan_hamary"
            , 'accounting_number' => "hashvap_kvod"
            , 'price' => "arzheqy"
            , 'inventory_date' => "shahagvortsm_handznman_amsathivy"
            , "responsible_user_signature" => "pataskha_natvoui_stvoragr"
            , "section_id" => "sekcia"
        ];
    }

    public function ensureCategoryExists(string $name): int
    {
        $category = Category::query()->where('name', 'LIKE', "%" . $name . "%")->first();
        if (!$category) {
            $category = Category::query()->create(['name' => $name]);
        }
        return $category->getKey();
    }

    public function ensureSectionExists($section): ?int
    {
        return Section::query()->find($section)?->getKey();
    }

    public function dirty(array $item): bool
    {
        return !($item['name'] && $item['section_id'] && $item['category_id']);
    }
}
