<?php

namespace App\Http\Requests;

use App\Http\Dtos\SteamUpdatePriceDto;
use Illuminate\Foundation\Http\FormRequest;

class GetCurrentItemPriceRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'itemId' => 'required|integer',
        ];
    }

    public function getDto(): SteamUpdatePriceDto
    {
        return new SteamUpdatePriceDto(
            $this->get('itemId'),
        );

    }

}
