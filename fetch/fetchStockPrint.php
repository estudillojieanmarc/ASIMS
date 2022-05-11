<?php
require 'connection.php';
error_reporting(0);

// PAGE LIMIT FUNCTION
if(isset($_POST["getStock"])){
    $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
    b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price, c.brand_id, c.brand 
    FROM categoryname a, inventory b, brandname c WHERE a.cat_id = b.item_category AND c.brand_id = b.item_brand 
    AND b.item_stock > 0 ORDER BY b.item_stock ASC";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $inventory = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
      foreach($inventory as $totalInventory){
              $n++;
              echo"
              <tr class='bg-light'>            
              <td>$n</td>
              <td>$totalInventory->item_barcode</td>
              <td>$totalInventory->item_name</td>
              <td>$totalInventory->category</td>
              <td>$totalInventory->brand</td>
              <td>$totalInventory->item_stock</td>
              </tr>
              ";
      }
    }else{
      echo "
      <tr style='height:20rem'>
            <td style='width:1px'></td>
            <td style='width:4rem'></td>
            <td style='width:7rem'></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO ITEMS WERE STORED</td>
            <td style='width:7rem'></td>
            <td style='width:1px'></td>
      </tr>
     ";
    }
}
// END INVENTORY TABLE CONTENT
?>