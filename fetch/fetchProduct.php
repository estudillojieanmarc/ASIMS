<?php
require 'connection.php';

// SEARCH ITEM INFO
if(isset($_POST["search"])){
    $itemBarcode = $_POST['itemBarcode'];
    $qry = "SELECT item_stock FROM inventory WHERE item_barcode = :itemBarcode";
    $statement=$pdo->prepare($qry);
    $statement->execute(
      array(
          'itemBarcode' => $_POST["itemBarcode"],
      )
    );    
    $count = $statement->rowCount();
    if($count > 0){
      $qry = "SELECT item_stock FROM inventory WHERE item_barcode = :itemBarcode";
      $statement=$pdo->prepare($qry);
      $statement->execute(
        array(
            'itemBarcode' => $_POST["itemBarcode"],
        )
      );
      $data = [];
      $stock = $statement->fetch(PDO::FETCH_ASSOC);
      if($stock['item_stock'] == 0){
        echo "No Stock";
      }else{
        $qry = "SELECT * FROM inventory WHERE item_barcode = :itemBarcode"; 
        $statement=$pdo->prepare($qry);
        $statement->execute([':itemBarcode' => $itemBarcode]);
        $fetchItem = $statement->fetchAll(PDO::FETCH_OBJ);
        $count = $statement->rowCount();
          if($count > 0 ){
              echo json_encode($fetchItem);
          }else{
            echo "Failed";
          }
      }
    }else{
      echo "Barcode Not Exist";
    }
}
?>