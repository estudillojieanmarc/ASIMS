<?php
require 'connection.php';
    $qry = "SELECT * FROM categoryname";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchCategory = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchCategory);
?>