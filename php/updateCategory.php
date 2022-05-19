<?php
require 'connection.php';
session_start();
$updateCat_id = $_POST['updateCat_id'];
$updateCategory = $_POST['updateCategory'];
$qry = "UPDATE categoryname SET category = :updateCategory WHERE cat_id = $updateCat_id";
$statement = $pdo->prepare($qry);
if($statement->execute([':updateCategory' => $updateCategory])){
    $sql7 = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has update $updateCategory at category to our system', now())";
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