<?php

namespace App\Exports;

use App\Models\Inventory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InventoryExport implements FromCollection, ShouldAutoSize, WithHeadings
{

    public function __construct(readonly private array $ids)
    {
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Inventory::query()->find($this->ids);
    }

    public function headings(): array
    {
        return [
            "id",
            "Բնութագիրը",
            "հաշվապ․ կոդ",
            "Արժեքը",
            "հաշվառման  hերթական համարը",
            "Հապավում",
            "Շահագործմ․ հանձնման ամսաթիվը",
            "Պատասխանատու",
            "Կատեգորյիաի ID",
            "Գլխամասի ID",
            "Գռարման ստեղծման ասմաթիվը",
            "Գռարման վերագրման ասմաթիվը",
        ];
    }
}
