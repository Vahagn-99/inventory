<?php

namespace App\Http\Controllers\Api;

use App\Exports\InventoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExportExelRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\ImportExelRequest;
use App\Http\Requests\InventoryRequest;
use App\Http\Requests\SectionRequest;
use App\Http\Resources\InventoryResource;
use App\Imports\InventoryImport;
use App\Models\Inventory;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Maatwebsite\Excel\Excel as ExelType;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InventoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function import(ImportExelRequest $request): JsonResponse
    {
        Excel::import(
            new InventoryImport
            , $request->validated('file')
            , 'public'
            , ExelType::XLSX);

        return response()->json(['status' => 'success']);
    }

    public function export(ExportExelRequest $request): BinaryFileResponse
    {
        $filename = 'exports_inventories_' . now()->format('Y_m_d_H_i_s') . '_.xlsx';
        return Excel::download(
            new InventoryExport($request->validated('ids')),
            $filename,
            ExelType::XLSX
        );
    }


    public function index(FilterRequest $request): AnonymousResourceCollection
    {
        $inventories = Inventory::filter($request->filter())
            ->orderByDesc('id')
            ->get();
        return InventoryResource::collection($inventories);
    }

    public function update(InventoryRequest $request, Inventory $inventory): JsonResponse
    {
        $inventory->update($request->validated());
        return response()->json('updated', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory): JsonResponse
    {
        $inventory->delete();
        return response()->json('deleted', 204);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryRequest $request): JsonResponse
    {
        Inventory::query()->create($request->validated());
        return response()->json('created');
    }
}
