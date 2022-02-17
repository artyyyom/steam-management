<?php

namespace App\Http\Dtos;

final class ItemUpdateDto
{

    private $id;
    private $title;
    private $price;
    private $count;
    private $categoryId;

    public function __construct(int $id, string $title, int $price, int $count, int $categoryId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->count = $count;
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
