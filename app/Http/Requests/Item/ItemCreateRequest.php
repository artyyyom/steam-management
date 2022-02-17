<?php

namespace App\Http\Requests\Item;

use App\Http\Dtos\ItemCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function getDto(): ItemCreateDto
    {
        return new ItemCreateDto(
            $this->get('title'),
            $this->get('price'),
            $this->get('count'),
            $this->get('category_id')
        );
    }
}
