<?php

namespace App\Http\Requests\Category;

use App\Http\Dtos\CategoryCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
        ];
    }

    public function getDto(): CategoryCreateDto
    {
        return new CategoryCreateDto(
            $this->get('title'),
        );
    }
}
