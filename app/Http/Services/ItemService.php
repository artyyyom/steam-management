<?php

namespace App\Http\Services;

use App\Http\Dtos\ItemCreateDto;
use App\Http\Dtos\ItemUpdateDto;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

final class ItemService
{

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return Item::all();
    }

    /**
     * @param ItemCreateDto $request
     * @return Item
     */
    public function store(ItemCreateDto $request): Item
    {
        $item = new Item();
        $item->title = $request->getTitle();
        $item->price = $request->getPrice();
        $item->count = $request->getCount() * 100;
        $item->category_id = $request->getCategoryId();

        $item->save();

        return $item;
    }

    /**
     * @param ItemUpdateDto $request
     * @return Item
     */
    public function update(ItemUpdateDto $request): Item
    {
        $item = Item::find($request->getId());
        $item->title = $request->getTitle();
        $item->price = $request->getPrice();
        $item->count = $request->getCount();
        $item->category_id = $request->getCategoryId();

        $item->save();

        return $item;
    }

    /**
     * @param $id
     * @return Item
     */
    public function destroy($id): Item
    {
        $item = Item::find($id);
        $item->delete();
        return $item;
    }

    /**
     * @param $categoryId
     * @return Collection
     */
    public function getItemsByCategory($categoryId): Collection
    {
        $items = collect();
        if (Category::where('id', $categoryId)->exists()) {
            $items = Item::where('category_id', $categoryId)->get();
        }

        return $items;
    }
}
