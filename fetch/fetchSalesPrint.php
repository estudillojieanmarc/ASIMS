<?php
require 'connection.php';

// PAGE LIMIT FUNCTION
if(isset($_POST["getSales"])){
    $limit = 20;
    if(isset($_POST["setPage"])){
      $pageno = $_POST["pageNumber"];
      $start = ($pageno * $limit) - $limit;
    }else{
      $start = 0;
    }
    error_reporting(0);
    $qry = "SELECT a.sales_id, a.receipt_no, a.purchased, a.item_barcode, a.customers, a.method, a.quantity, a.total_sales,
    b.item_name, b.item_barcode FROM sales a, inventory b WHERE a.item_barcode = b.item_barcode
    ORDER BY a.purchased DESC";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $sales = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
    foreach($sales as $totalSales){
            $n++;
            $newDate = date('F d, Y',strtotime($totalSales->purchased));
            echo "
            <tr>
            <td>$n</td>
            <td>$totalSales->item_barcode</td>
            <td>$totalSales->item_name</td>
            <td>$totalSales->quantity</td>
            <td>₱$totalSales->total_sales</td>
            <td>$newDate</td>
            </tr>
            ";
    }
    }else{
      echo "
      <tr class='border:0' style='height:20rem'>
            <td class='border:0'></td>
            <td class='border:0'></td>
            <td class='border:0'></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger border-0'>NO SALES FOUND</td>
            <td class='border:0'></td>
            <td class='border:0'></td>
            </tr>
  ";
    }
}
?>