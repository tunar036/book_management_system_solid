<?php

require_once __DIR__ . '/../app/Models/BookType.php';
require_once __DIR__ . '/../app/Interfaces/BookTypeRepositoryInterface.php';
require_once __DIR__ . '/../app/Repositories/FileBookTypeRepository.php';
require_once __DIR__ . '/../app/Config/Config.php';

// Fayl yolu
$bookTypeFilePath = __DIR__ . '/../data/book_types.json';

$config = new Config();

$bookTypeRepo = new FileBookTypeRepository($config);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
        $bookType = new BookType($name);
        $bookTypeRepo->save($bookType);
        header('Location: index.php');
        exit();
    }
}

header('Location: index.php');
exit();
