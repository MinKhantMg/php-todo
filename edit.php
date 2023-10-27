<?php

require 'config.php';

if($_POST)
{
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $statement = $pdo->prepare("UPDATE todos SET title= '$title', description = '$desc' WHERE id= $id");
    $result = $statement->execute();
    if($result)
    {
        header('location: index.php');
    }
}
else 
{
    $statement = $pdo->prepare("SELECT * FROM todos WHERE id =".$_GET['id']);
    $statement->execute();
    $result = $statement->fetchAll();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT TODO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3" style="width:500px">
        <h2>Edit New Todo</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control mb-3" 
                value="<?php echo $result[0]['title']?>" required>
                <label for="">Description</label>
                <textarea name="description" class="form-control mb-3"><?php echo $result[0]['description'] ?>
                </textarea>
                <input type="submit" class="btn btn-primary" value="SUBMIT">
                <a href="index.php" class="btn btn-secondary">BACK</a>
            </div>
        </form>
    </div>
</body>
</html>