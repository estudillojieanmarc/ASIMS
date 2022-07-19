<?php
require 'connection.php';
if(isset($_POST['itemBarcode'])){
    session_start();
    $itemBarcode = $_POST['itemBarcode'];
    $qry = "SELECT * FROM `employees` WHERE password = $_SESSION[password]"; 
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchPassword = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchPassword);
}
?>