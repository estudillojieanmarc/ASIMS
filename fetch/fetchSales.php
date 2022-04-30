<?php
require 'connection.php';
if(isset($_POST["getSales"])){
    error_reporting(0);
    $qry = "SELECT a.sales_id, a.item_barcode, a.quantity, a.total_sales, a.purchased, 
    b.item_name, b.item_barcode FROM sales a, inventory b WHERE a.item_barcode = b.item_barcode
    ORDER BY a.purchased DESC";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $sales = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
    foreach($sales as $totalSales){
            $n++;
            $newDate = date('F d, Y || h:i:A',strtotime($totalSales->purchased));
            echo "
            <tr>
            <td>$n</td>
            <td>$totalSales->item_barcode</td>
            <td>$totalSales->item_name</td>
            <td>$totalSales->quantity</td>
            <td>₱$totalSales->total_sales.00</td>
            <td>$newDate</td>
            <td style='width:5rem;'>
              <button type='button' onclick=deleteSales('$totalSales->sales_id') class='btn btn-danger'>Delete</button>
            </td>
            </tr>
            ";
    }
    }else{
      echo "
      <tr style='height:20rem' >
            <td></td>
            <td></td>
            <td></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO SALES FOUND</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
  ";
    }
}
?>