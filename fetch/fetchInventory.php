<?php
require 'connection.php';
error_reporting(0);

// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM inventory WHERE item_stock > 0";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  $inventory = $statement->fetchAll(PDO::FETCH_OBJ);
  $count = $statement->rowCount();
  $pageno = ceil($count / 20);
    for($i=1;$i<=$pageno;$i++){
      echo "
        <li class='nav-item'><a class='btn btn-sm btn-dark shadow border-dark px-3' style='border-radius:50%; margin:0 1px;' href='#' paginationStock='$i' id='paginationStock'>$i</a></li>
      ";
    }
}
// PAGE LIMIT FUNCTION


// INVENTORY TABLE CONTENT
if(isset($_POST["getInventory"])){
    $limit = 20;
    if(isset($_POST["setPage"])){
      $pageno = $_POST["pageNumber"];
      $start = ($pageno * $limit) - $limit;
    }else{
      $start = 0;
    }
    $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
    b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price FROM categoryname a , 
    inventory b WHERE a.cat_id = b.item_category AND b.item_stock > 0 ORDER BY b.item_stock ASC LIMIT $start,$limit";
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
              <td style='width:8rem;'>$totalInventory->item_stock</td>
              <td style='width:4rem;'>
                <button type='button' onclick=updateInventory('$totalInventory->id') class='btn btn-secondary px-3'>View</button>
              </td>
              </tr>
              ";
      }
    }else{
      echo "
      <tr style='height:20rem'>
            <td style='width:1px'></td>
            <td style='width:4rem'></td>
            <td style='width:7rem'></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO ITEMS AVAILABLE</td>
            <td style='width:7rem'></td>
            <td style='width:1px'></td>
      </tr>
     ";
    }
}
// END INVENTORY TABLE CONTENT



// ALL CATEGORY REQUEST
if(isset($_POST["Allrequest"])){
  sleep(1);
  $limit = 20;
  if(isset($_POST["setPage"])){
    $pageno = $_POST["pageNumber"];
    $start = ($pageno * $limit) - $limit;
  }else{
    $start = 0;
  }
  $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
  b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price FROM categoryname a , 
  inventory b WHERE a.cat_id = b.item_category AND b.item_stock > 0 ORDER BY b.item_stock ASC LIMIT $start,$limit";
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
            <td style='width:8rem;'>$totalInventory->item_stock</td>
            <td style='width:4rem;'>
              <button type='button' onclick=updateInventory('$totalInventory->id') class='btn btn-secondary px-3'>View</button>
            </td>
            </tr>
            ";
    }
  }else{
    echo "
    <tr style='height:20rem'>
          <td style='width:1px'></td>
          <td style='width:4rem'></td>
          <td style='width:7rem'></td>
          <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO ITEMS AVAILABLE</td>
          <td style='width:7rem'></td>
          <td style='width:1px'></td>
    </tr>
   ";
  }
}
// END CATEGORY REQUEST



// FETCH CATEGORY REQUEST
if(isset($_POST["request"])){
  sleep(1);
  $limit = 20;
  if(isset($_POST["setPage"])){
    $pageno = $_POST["pageNumber"];
    $start = ($pageno * $limit) - $limit;
  }else{
    $start = 0;
  }
  $request = $_POST['request'];
  $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, 
  b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price FROM categoryname a , 
  inventory b WHERE a.cat_id = b.item_category AND b.item_stock > 0 AND a.cat_id = $request ORDER BY b.item_stock ASC LIMIT $start,$limit";
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
            <td style='width:8rem;'>$totalInventory->item_stock</td>
            <td style='width:4rem;'>
              <button type='button' onclick=updateInventory('$totalInventory->id') class='btn btn-secondary px-3'>View</button>
            </td>
            </tr>
            ";
    }
  }else{
    echo "
    <tr style='height:20rem'>
          <td style='width:1px'></td>
          <td style='width:4rem'></td>
          <td style='width:7rem'></td>
          <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO RECORDS FOUND</td>
          <td style='width:7rem'></td>
          <td style='width:1px'></td>
    </tr>
   ";
  }
}
// END CATEGORY REQUEST
