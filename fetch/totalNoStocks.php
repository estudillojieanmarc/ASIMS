<?php
    session_start();
    require 'connection.php';
    if(isset($_POST["getNoStocks"])){
        $qry = "SELECT count(*) FROM inventory WHERE item_stock = 0 ORDER BY id"; 
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $fetchStock = $statement->fetch(PDO::FETCH_OBJ);
        foreach($fetchStock as $totalStock){
          echo json_encode($totalStock) ;
        }
    }
?>