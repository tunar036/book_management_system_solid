<?php

require_once __DIR__.'/../app/Models/Book.php';
require_once __DIR__.'/../app/Models/BookType.php';
require_once __DIR__ . '/../app/Interfaces/BookTypeRepositoryInterface.php';
require_once __DIR__ . '/../app/Interfaces/BookRepositoryInterface.php';
require_once __DIR__ . '/../app/Repositories/FileBookTypeRepository.php';

require_once __DIR__ . '/../app/Repositories/FileBookRepository.php';
require_once __DIR__ . '/../app/Controllers/BookController.php';

$bookRepoPath = __DIR__.'/../data/books.json';
$bookTypeRepoPath = __DIR__.'/../data/book_types.json';

$bookRepo = new FileBookRepository($bookRepoPath);
$bookTypeRepo = new FileBookTypeRepository($bookTypeRepoPath);

$bookController = new BookController($bookRepo,$bookTypeRepo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $bookController->save();
}else{
    $bookController->index();
}