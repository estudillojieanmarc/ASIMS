<?php
require 'connection.php';
error_reporting(0);
if(isset($_POST["getNoStock"])){
    $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
    b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price FROM categoryname a , 
    inventory b WHERE a.cat_id = b.item_category AND b.item_stock = 0 ORDER BY b.item_stock ASC LIMIT 15";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $inventory = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
      foreach($inventory as $totalInventory){
              $n++;
              echo "
              <tr class='bg-light'>
              <td style='width:0.4rem;'>
                <input class='form-check-input checkItem' type='checkbox' value='$totalInventory->id'>
              </td>              
              <td>$n</td>
              <td>$totalInventory->item_barcode</td>
              <td>$totalInventory->item_name</td>
              <td>$totalInventory->category</td>
              <td>$totalInventory->item_stock</td>
              <td style='width:11rem;'>
                <button type='button' onclick=updateInventory('$totalInventory->id') class='btn btn-secondary px-3'>View</button>
                <button type='button' onclick=DeleteInventory('$totalInventory->id') class='btn btn-danger'>Delete</button>
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
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO DATA FOUND</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
     ";
    }
}
?>