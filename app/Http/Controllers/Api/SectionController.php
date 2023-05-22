<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request): AnonymousResourceCollection
    {

        return SectionResource::collection(Section::filter($request->filter())->orderByDesc('id')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request): JsonResponse
    {
        Section::query()->create($request->validated());
        return response()->json('created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section): SectionResource
    {
        return new SectionResource($section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, Section $section): JsonResponse
    {
        $section->update($request->validated());
        return response()->json('updated', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section): JsonResponse
    {
        $section->delete();
        return response()->json('deleted', 204);
    }
}
