<?php
require 'connection.php';

// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM sales";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  $sales = $statement->fetchAll(PDO::FETCH_OBJ);
  $count = $statement->rowCount();
  $pageno = ceil($count / 20);
    for($i=1;$i<=$pageno;$i++){
      echo "
        <li class='nav-item'><a class='btn btn-sm btn-dark px-3' style='border-radius:50%; margin:0 1px;' href='#' page='$i' id='page'>$i</a></li>
      ";
    }
}
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
    ORDER BY a.purchased DESC LIMIT $start,$limit";
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
            <td style='width:0.1rem;'>
                <input class='form-check-input checkSale' type='checkbox' value='$totalSales->sales_id'>
              </td> 
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
      <tr style='height:20rem' >
            <td style='width:1rem'></td>
            <td style='width:1rem'></td>
            <td style='width:1rem'></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO SALES FOUND</td>
            <td style='width:1rem'></td>
            <td style='width:1rem'></td>
            <td style='width:1rem'></td>
            </tr>
  ";
    }
}
?>