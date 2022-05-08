<?php
require 'connection.php';
error_reporting(0);

if(isset($_POST["requestAllRows"])){
    sleep(1);
    $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
    b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price, c.brand_id, c.brand FROM categoryname a , 
    inventory b , brandname c WHERE a.cat_id = b.item_category AND b.item_stock = 0  AND  b.item_brand = c.brand_id ORDER BY b.item_stock ASC";
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



if(isset($_POST["requestRows"])){
  sleep(1);
  $limit = $_POST["requestRows"];

  $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
  b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price, c.brand_id, c.brand FROM categoryname a , 
  inventory b , brandname c WHERE a.cat_id = b.item_category AND b.item_stock = 0  AND  b.item_brand = c.brand_id ORDER BY b.item_stock ASC LIMIT $limit";
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