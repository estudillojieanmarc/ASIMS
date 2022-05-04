<?php
    session_start();
    require 'connection.php';
    if(isset($_POST["getSales"])){
        $qry = "SELECT SUM(total_sales) AS totalSales FROM sales";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $fetchSales = $statement->fetch(PDO::FETCH_OBJ);
          foreach($fetchSales as $totalSales){
            if($totalSales > 0){
              echo json_encode($totalSales) ;
            }else{
              echo 0;
            }
          }
    }
?>