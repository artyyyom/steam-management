<?php

namespace App\Http\Dtos;

final class CategoryCreateDto {

    private $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


}
