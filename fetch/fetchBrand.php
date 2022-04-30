<?php
require 'connection.php';
    $qry = "SELECT * FROM brandname";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchBrand = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchBrand);
?>