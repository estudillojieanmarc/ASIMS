<?php
    require 'connection.php';
    $qry = "SELECT * FROM todo";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchTask = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchTask);
?>