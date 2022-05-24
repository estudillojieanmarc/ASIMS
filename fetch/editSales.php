<?php
require 'connection.php';
    $editSale = $_POST['editSale'];
    $qry = "SELECT a.sales_id, a.receipt_no, a.purchased, a.item_id, a.customers, a.quantity, a.total_sales, b.id, b.item_name 
    FROM sales a, inventory b WHERE a.item_id = b.id AND a.sales_id = $editSale";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchSales = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchSales);
?>