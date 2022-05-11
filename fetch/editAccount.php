<?php
session_start();
require 'connection.php';
if(isset($_POST["manageAccount"])){
    $qry = "SELECT * FROM employees WHERE emp_id = '$_SESSION[emp_id]'";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchName = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchName);
}
?>