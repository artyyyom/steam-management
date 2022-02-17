<?php

namespace App\Http\Requests\Item;

use App\Http\Dtos\ItemUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:items,id',
            'title' => 'required|string',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function getDto(): ItemUpdateDto
    {
        return new ItemUpdateDto(
            $this->get('id'),
            $this->get('title'),
            $this->get('price'),
            $this->get('count'),
            $this->get('category_id')
        );
    }
}
