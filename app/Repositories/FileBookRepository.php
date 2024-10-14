<?php
require_once __DIR__.'/AbstractBookRepository.php';

class FileBookRepository implements BookRepositoryInterface
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function all(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = json_decode(file_get_contents($this->filePath), true);
        $books = [];
        if ($data === null) {
            return [];
        }
        foreach ($data as $bookData) {
            $bookType = new BookType($bookData['type']);
            $bookType->setId($bookData['type_id']);
            $book = new Book($bookData['title'], $bookData['author'], $bookType);
            $book->setId($bookData['id']);
            $books[] = $book;
        }
        return $books;
    }

    public function save(Book $book): void
    {
        $books = json_decode(file_get_contents($this->filePath)) ?? [];
        $book->setId(count($books) + 1);
        $books[] = [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'type' => $book->getType()->getName(),
            'type_id' => $book->getType()->getId(),
        ];
        file_put_contents($this->filePath, json_encode($books, JSON_PRETTY_PRINT));
    }
}
