<?php
require 'connection.php';
session_start();
$updatebrand_id = $_POST['updatebrand_id'];
$updateBrand = $_POST['updateBrand'];
$qry = "UPDATE brandname SET brand = :updateBrand WHERE brand_id = $updatebrand_id";
$statement = $pdo->prepare($qry);
if($statement->execute([':updateBrand' => $updateBrand])){
    $sql7 = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has update $updateBrand at brand to our system', now())";
        $statement=$pdo->prepare($sql7);
        $statement->execute();
        if($statement){
            echo 1;
            exit();  
        }else{
            echo 0;
            exit(); 
        }
}else{ 
    echo 0;
}   
?>  