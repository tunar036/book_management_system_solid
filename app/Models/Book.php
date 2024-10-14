<?php

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private BookType $type;

    public function __construct(string $title, string $author, BookType $type)
    {
        $this->title = $title;
        $this->author = $author;
        $this->type = $type;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getType(): BookType
    {
        return $this->type;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
