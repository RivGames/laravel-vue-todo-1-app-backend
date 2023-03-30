<?php

namespace App\Dto\Todo;

class UpdateDto
{
    public function __construct(private readonly string $title,
                                private readonly string $body)
    {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
