<?php

namespace App\Http\Dtos;

final class SteamUpdatePriceDto {

    private $itemId;

    public function __construct(int $itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }

}
