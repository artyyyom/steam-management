<?php

namespace App\Http\Services\Steam;

use App\Http\Interfaces\SteamApiManager;

final class SteamApiMyService implements SteamApiManager {

    public function getCurrentItemPrice(string $title): array
    {
        $item = json_decode(file_get_contents("http://steamcommunity.com/market/priceoverview/?appid=730&currency=3&market_hash_name=StatTrak%E2%84%A2 M4A1-S | Hyper Beast (Minimal Wear)"));
        return $item ?? [];
    }
}
