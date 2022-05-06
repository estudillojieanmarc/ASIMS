<?php
require 'connection.php';
error_reporting(0);

// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM inventory WHERE item_stock = 0";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  $inventory = $statement->fetchAll(PDO::FETCH_OBJ);
  $count = $statement->rowCount();
  $pageno = ceil($count / 20);
    for($i=1;$i<=$pageno;$i++){
      echo "
        <li class='nav-item'><a class='btn btn-sm btn-dark px-3' style='border-radius:50%; margin:0 1px;' href='#' paginationNoStock='$i' id='paginationNoStock'>$i</a></li>
      ";
    }
}
// PAGE LIMIT FUNCTION


if(isset($_POST["getNoStock"])){
    $limit = 20;
    if(isset($_POST["setPage"])){
      $pageno = $_POST["pageNumber"];
      $start = ($pageno * $limit) - $limit;
    }else{
      $start = 0;
    }
    $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
    b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price, c.brand_id, c.brand FROM categoryname a , 
    inventory b , brandname c WHERE a.cat_id = b.item_category AND b.item_stock = 0  AND  b.item_brand = c.brand_id ORDER BY b.item_stock ASC LIMIT $start,$limit";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $inventory = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
      foreach($inventory as $totalInventory){
              $n++;
              echo "
              <tr class='bg-light'>
              <td style='width:0.1rem;'>
                <input class='form-check-input checkItem' type='checkbox' value='$totalInventory->id'>
              </td>              
              <td style='width:3rem;'>$n</td>
              <td style='width:12rem;'>$totalInventory->item_barcode</td>
              <td>$totalInventory->item_name</td>
              <td style='width:10rem;'>$totalInventory->category</td>
              <td style='width:10rem;'>$totalInventory->brand</td>
              <td style='width:6rem;'>
                <button type='button' onclick=updateInventory('$totalInventory->id') class='btn btn-secondary px-3'>View</button>
              </td>
              </tr>
              ";
      }
    }else{
      echo "
      <tr style='height:20rem'>
            <td></td>
            <td></td>
            <td></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>ALL ITEMS HAVE STOCK</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
     ";
    }
}
?>