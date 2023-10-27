<?php
    require 'config.php';

    $statement = $pdo->prepare("SELECT * FROM todos ORDER BY id DESC");
    $statement->execute();
    $result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3" style="width:800px">
        <h2>Todo Home Page</h2>
        <a href="add.php" class="btn btn-success mb-3">Create New</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    if($result) {
                    foreach($result as $value) {
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    <td><?php echo date("Y-m-d",strtotime($value['created_at'])) ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $value['id'] ?>" class="btn btn-warning">
                            EDIT
                        </a>
                        <a href="delete.php?id=<?php echo $value['id'] ?>" class="btn btn-danger">
                            DELETE
                        </a>
                    </td>
                </tr>
                <?php
                    $i++; 
                    }
                }
                 ?>   
            </tbody>
        </table>
    </div>
</body>
</html>