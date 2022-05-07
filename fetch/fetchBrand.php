<?php
require 'connection.php';
    $qry = "SELECT * FROM brandname";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchBrand = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
        echo json_encode($fetchBrand);
    }else{
        echo 0;
    }
?>