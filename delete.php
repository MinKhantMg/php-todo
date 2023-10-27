<?php

require 'config.php';

$statement = $pdo->prepare('DELETE FROM todos where id='.$_GET['id']);
$statement->execute();

header('location: index.php');