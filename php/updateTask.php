<?php
require 'connection.php';
$updateTaskId = $_POST['updateTaskId'];
$updateTask = $_POST['updateTask'];
$qry = "UPDATE todo SET task = :updateTask WHERE id = $updateTaskId";
$statement = $pdo->prepare($qry);
if($statement->execute([':updateTask' => $updateTask])){
    echo 1;
}else{ 
    echo 0;
}   
?>  