<?php

namespace App\Http\Services\Steam;

use Illuminate\Support\Facades\Config;
use SteamApi\SteamApi;
use App\Http\Interfaces\SteamApiManager;

final class SteamApiAlyansService implements SteamApiManager {

    /**
     * Get current steam item price from Steam API
     * @param string $title
     * @return array
     */
    public function getCurrentItemPrice(string $title): array
    {
        $currency = Config::get('constants.currencies.uah');

        $api = new SteamApi();

        $options = [
            'market_hash_name' => $title,
            'currency'         => $currency,
        ];

        $item = $api->getItemPricing(730, $options);

        return $item ?? [];
    }
}
