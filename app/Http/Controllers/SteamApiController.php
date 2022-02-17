<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCurrentItemPriceRequest;
use App\Http\Services\SteamService;

class SteamApiController extends Controller
{
    private $steamService;

    public function __construct(SteamService $steamService)
    {
        $this->steamService = $steamService;
    }

    public function getCurrentItemPrice(GetCurrentItemPriceRequest $request)
    {

        $item = $this->steamService->getCurrentItemPrice($request->getDto());

        return response()->json($item);
    }
}
