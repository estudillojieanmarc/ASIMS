<?php
require 'connection.php';
    $qry = "SELECT * FROM categoryname";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchCategory = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
        echo json_encode($fetchCategory);
    }else{
        echo 0;
    }
?>