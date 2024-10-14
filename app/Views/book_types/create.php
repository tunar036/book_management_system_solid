<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitab Növü Əlavə Et</title>
</head>
<body>
    <h1>Yeni Kitab Növü Əlavə Et</h1>
    
    <form method="POST" action="add_book_type.php">
        <label for="name">Kitab Növünün Adı:</label>
        <input type="text" name="name" id="name" required placeholder="Kitab Növünün adı">
        <button type="submit">Əlavə Et</button>
    </form>

    <p><a href="index.php">Geri qayıt</a></p>
</body>
</html>
