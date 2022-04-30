<?php
require 'connection.php';
$updateCat_id = $_POST['updateCat_id'];
$updateCategory = $_POST['updateCategory'];
$qry = "UPDATE categoryname SET category = :updateCategory WHERE cat_id = $updateCat_id";
$statement = $pdo->prepare($qry);
if($statement->execute([':updateCategory' => $updateCategory])){
    echo 1;
}else{ 
    echo 0;
}   
?>  