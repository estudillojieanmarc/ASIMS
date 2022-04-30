<?php
require 'connection.php';
$updatebrand_id = $_POST['updatebrand_id'];
$updateBrand = $_POST['updateBrand'];
$qry = "UPDATE brandname SET brand = :updateBrand WHERE brand_id = $updatebrand_id";
$statement = $pdo->prepare($qry);
if($statement->execute([':updateBrand' => $updateBrand])){
    echo 1;
}else{ 
    echo 0;
}   
?>  