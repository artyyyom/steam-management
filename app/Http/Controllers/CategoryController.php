<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryDeleteRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $items = $this->categoryService->getCategories();

        return CategoryResource::collection($items);
    }

    public function store(CategoryCreateRequest $request)
    {
        $item = $this->categoryService->store($request->getDto());

        return (new CategoryResource($item))
            ->response()->setStatusCode(200);
    }

    public function update(CategoryUpdateRequest $request)
    {
        $category = $this->categoryService->update($request->getDto());

        return (new CategoryResource($category))
            ->response()->setStatusCode(200);
    }

    public function destroy(CategoryDeleteRequest $request)
    {
        $category = $this->categoryService->destroy($request->get('id'));
        return (new CategoryResource($category))
            ->response()->setStatusCode(200);
    }
}
