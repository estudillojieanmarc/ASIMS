<?php
require 'connection.php';
error_reporting(0);
if(isset($_POST["getNoStock"])){
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
                <td>$n</td>
                <td>$totalInventory->item_barcode</td>
                <td>$totalInventory->item_name</td>
                <td>$totalInventory->item_description</td>
                <td>$totalInventory->item_price</td>
                <td>$totalInventory->category</td>
                <td>$totalInventory->brand</td>
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