<?php
require 'connection.php';
if(isset($_POST['itemBarcode'])){
    $itemBarcode = $_POST['itemBarcode'];
    $qry = "SELECT * FROM `inventory` WHERE item_barcode = $itemBarcode ORDER BY item_barcode"; 
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchItem = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchItem);
}
?>