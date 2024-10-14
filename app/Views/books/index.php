<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitab Siyahısı</title>
</head>
<body>
    <h1>Kitab Siyahısı</h1>
    <ul>
        <?php foreach ($books as $book): ?>
            <li><?php echo htmlspecialchars($book->getTitle()); ?> - <?php echo htmlspecialchars($book->getAuthor()); ?> (<?php echo htmlspecialchars($book->getType()->getName()); ?>)</li>
        <?php endforeach; ?>
    </ul>

    <h2>Yeni Kitab Əlavə Et</h2>
    <form method="POST" action="index.php">
        <input type="text" name="title" required placeholder="Kitabın adı">
        <input type="text" name="author" required placeholder="Müəllifin adı">
        <select name="type" required>
            <option value="">Kitab Növünü Seçin</option>
            <?php foreach ($bookTypes as $type): ?>
                <option value="<?php echo $type->getId(); ?>"><?php echo htmlspecialchars($type->getName()); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Əlavə Et</button>
    </form>

    <h2>Yeni Kitab Növü Əlavə Et</h2>
    <form method="POST" action="add_book_type.php">
        <input type="text" name="name" required placeholder="Kitab Növünün adı">
        <button type="submit">Əlavə Et</button>
    </form>
</body>
</html>
