<?php
require 'connection.php';
    $brandID = $_POST['brandID'];
    $qry = "SELECT * FROM brandname WHERE brand_id = $brandID";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchBrand = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchBrand);
?>