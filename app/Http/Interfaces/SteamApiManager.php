<?php

namespace App\Http\Interfaces;

interface SteamApiManager {
    public function getCurrentItemPrice(string $title): array;
}
