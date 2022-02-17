<?php

namespace App\Http\Dtos;

final class ItemCreateDto {

    private $title;
    private $price;
    private $count;
    private $categoryId;

    public function __construct(string $title, int $price, int $count, int $categoryId)
    {
        $this->title = $title;
        $this->price = $price;
        $this->count = $count;
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

}
