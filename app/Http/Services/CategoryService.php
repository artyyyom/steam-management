<?php

namespace App\Http\Services;

use App\Http\Dtos\CategoryCreateDto;
use App\Http\Dtos\CategoryUpdateDto;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final class CategoryService
{
    /**
     * @return Category
     */
    public function getCategories(): Collection
    {
        return Category::all();
    }

    /**
     * @param CategoryCreateDto $request
     * @return Category
     */
    public function store(CategoryCreateDto $request): Category
    {
        $category = new Category();
        $category->title = $request->getTitle();

        $category->save();

        return $category;
    }

    /**
     * @param CategoryUpdateDto $request
     * @return Category
     */
    public function update(CategoryUpdateDto $request): Category
    {
        $category = Category::find($request->getId());
        $category->title = $request->getTitle();

        $category->save();

        return $category;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function destroy(int $id): Category
    {
        $category = Category::find($id);
        $category->delete();
        return $category;
    }

}
