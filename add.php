<?php
require 'config.php';

if($_POST)
{
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $statement = $pdo->prepare("INSERT INTO todos (title,description) 
                                VALUES (:title,:description)");
    $result = $statement->execute([
        ':title'=> $title,
        ':description' => $desc
    ]);
    if($result)
    {
        header("location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE TODO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3" style="width:500px">
        <h2>Create New Todo</h2>
        <div class="form-group">
                <form action="add.php" method="post">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control mb-3" required>
                <label for="">Description</label>
                <textarea name="description" class="form-control mb-3"></textarea>
                <input type="submit" class="btn btn-primary" value="SUBMIT">
                <a href="index.php" class="btn btn-secondary">BACK</a>
            </form>
        </div>
    </div>
</body>
</html>