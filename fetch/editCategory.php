<?php
require 'connection.php';
    $categoryId = $_POST['categoryId'];
    $qry = "SELECT * FROM categoryname WHERE cat_id = $categoryId";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchCategory = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchCategory);
?>