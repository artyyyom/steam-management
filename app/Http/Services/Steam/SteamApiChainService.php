<?php

namespace App\Http\Services\Steam;

use App\Http\Interfaces\SteamApiManager;

final class SteamApiChainService implements SteamApiManager
{
    private $services;

    public function __construct(...$services)
    {
        $this->services = $services;
    }

    /**
     * Call steam api in chain of responsibility
     *
     * @param string $title
     * @return array
     */
    public function getCurrentItemPrice(string $title): array
    {
        $item = [];

        foreach($this->services as $service) {
            $item = $service->getCurrentItemPrice($title);
        }

        return $item ?? [];
    }
}
