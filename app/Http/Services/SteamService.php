<?php

namespace App\Http\Services;

use App\Http\Dtos\SteamUpdatePriceDto;
use App\Http\Interfaces\SteamApiManager;
use App\Models\Item;

final class SteamService
{

    private $steamApiManager;

    public function __construct(SteamApiManager $steamApiManager)
    {
        $this->steamApiManager = $steamApiManager;
    }

    /**
     * Get current item price
     * @param SteamUpdatePriceDto $request
     * @return array
     */
    public function getCurrentItemPrice(SteamUpdatePriceDto $request): array
    {
        $item = Item::findOrFail($request->getItemId());

        return $this->steamApiManager->getCurrentItemPrice($item['title']);
    }
}
