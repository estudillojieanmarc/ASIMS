<?php

    require 'connection.php';
    if(isset($_POST['highlight'])){
        $qry = "SELECT item_stock FROM inventory";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $stock = $statement->fetchAll(PDO::FETCH_OBJ);
        $data = [];
        if($stock['item_stock'] == 0){
            echo 'red';
            exit();
        }else if($stock['item_stock'] >= 1){
            echo 'orange';
            exit();
        }else if($stock['item_stock'] >= 5){
            echo 'green';
            exit();
        }else if($stock['item_stock'] >= 10){
            echo 'white';
            exit();
        }
    }


?>