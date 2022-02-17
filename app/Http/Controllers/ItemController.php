<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\ItemCreateRequest;
use App\Http\Requests\Item\ItemDeleteRequest;
use App\Http\Requests\Item\ItemUpdateRequest;
use App\Http\Resources\ItemResource;
use App\Http\Services\ItemService;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->getItems();

        return ItemResource::collection($items);

    }

    public function show(Request $request, Item $item)
    {
        return new ItemResource($item);
    }

    public function store(ItemCreateRequest $request)
    {
        $item = $this->itemService->store($request->getDto());

        return new ItemResource($item);
    }

    public function update(ItemUpdateRequest $request)
    {
        $item = $this->itemService->update($request->getDto());

        return new ItemResource($item);
    }

    public function destroy(ItemDeleteRequest $request)
    {
        $item = $this->itemService->destroy($request->get('id'));

        return (new ItemResource($item));
    }

    public function getItemsByCategory($categoryId)
    {
        $items = $this->itemService->getItemsByCategory($categoryId);

        return ItemResource::collection($items);
    }
}
