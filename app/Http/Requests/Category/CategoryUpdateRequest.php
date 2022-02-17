<?php

namespace App\Http\Requests\Category;

use App\Http\Dtos\CategoryUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:categories,id',
            'title' => 'required|string',
        ];
    }

    public function getDto(): CategoryUpdateDto
    {
        return new CategoryUpdateDto(
            $this->get('id'),
            $this->get('title'),
        );
    }
}
