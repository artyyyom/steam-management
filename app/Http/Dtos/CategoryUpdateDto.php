<?php

namespace App\Http\Dtos;

final class CategoryUpdateDto {

    private $id;
    private $title;

    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
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


}
