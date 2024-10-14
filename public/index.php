<?php

require_once __DIR__.'/../app/Models/Book.php';
require_once __DIR__.'/../app/Models/BookType.php';
require_once __DIR__ . '/../app/Interfaces/BookTypeRepositoryInterface.php';
require_once __DIR__ . '/../app/Interfaces/BookRepositoryInterface.php';
require_once __DIR__ . '/../app/Repositories/FileBookTypeRepository.php';

require_once __DIR__ . '/../app/Repositories/FileBookRepository.php';
require_once __DIR__ . '/../app/Controllers/BookController.php';
require_once __DIR__ . '/../app/Config/Config.php';


$config = new Config();
$bookRepoPath = $config->get('BOOK_REPOSITORY_PATH');
$bookTypeRepoPath = $config->get('BOOK_TYPE_REPOSITORY_PATH');

$bookRepo = new FileBookRepository($bookRepoPath);
$bookTypeRepo = new FileBookTypeRepository($bookTypeRepoPath);

$bookController = new BookController($bookRepo,$bookTypeRepo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $bookController->save();
}else{
    $bookController->index();
}