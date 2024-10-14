<?php

class BookController
{
    private BookRepositoryInterface $bookRepo;
    private BookTypeRepositoryInterface $bookTypeRepo;

    public function __construct(BookRepositoryInterface $bookRepo, BookTypeRepositoryInterface $bookTypeRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->bookTypeRepo = $bookTypeRepo;
    }

    public function index(): void
    {
        $books = $this->bookRepo->all();
        // var_dump($this->bookRepo);
        // var_dump($this->bookTypeRepo);
        $bookTypes = $this->bookTypeRepo->all();
        include __DIR__ . '/../Views/books/index.php';
    }

    public function save(): void
    {
        if (isset($_POST['title'], $_POST['author'], $_POST['type'])) {
            $title = trim($_POST['title']);
            $author = trim($_POST['author']);
            $typeId = intval($_POST['type']);
            $bookTypes = $this->bookTypeRepo->all();
            $selectedype = null;
            foreach ($bookTypes as $type) {
                if ($type->getId() === $typeId) {
                    $selectedype = $type;
                    break;
                }
            }

            if ($selectedype) {
                $book = new Book($title, $author, $selectedype);
                $this->bookRepo->save($book);
                header('Location: index.php');
                exit();
            }
        }
    }
}
