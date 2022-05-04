<?php
require 'connection.php';
    $categoryID = $_POST['categoryID'];
    $qry = "SELECT * FROM categoryname WHERE cat_id = $categoryID";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchCategory = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchCategory);
?>