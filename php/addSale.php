<?php
        require 'connection.php';
        // NAME FROM THE FORM 
        $itemBarcode = $_POST['itemBarcode'];
        $itemQty = $_POST['itemQty'];
        $totalSale = $_POST['totalSale'];

        // CHECK IF THE ITEM IS EXIST
        $qry1 = "SELECT item_barcode FROM inventory WHERE item_barcode = :itemBarcode";
        $statement=$pdo->prepare($qry1);
        $statement->execute(
            array(
                'itemBarcode' => $_POST["itemBarcode"],
            )
        );
        $count = $statement->rowCount();
        if($count > 0 ){
            $qry2 = "SELECT item_stock FROM inventory WHERE item_barcode = :itemBarcode";
            $statement2=$pdo->prepare($qry2);
            $statement2->execute(
                array(
                    'itemBarcode' => $_POST["itemBarcode"],
                )
            );
            $stock = $statement2->fetch(PDO::FETCH_ASSOC);
            $data = [];
            if($stock['item_stock'] == 0){
                echo "Sorry not enough stock";
                exit();
            }else if($stock['item_stock'] < $itemQty){
                echo "Sorry not enough stock";
                exit();
            }else {
                $qry3 = "INSERT INTO sales (item_barcode, quantity, total_sales, purchased) VALUES (?,?,?, NOW())";
                $pdo->prepare($qry3)->execute([$itemBarcode , $itemQty , $totalSale]);
                if($pdo){
                    $qry4 = "UPDATE inventory SET item_stock = item_stock - :itemQty WHERE item_barcode = :itemBarcode";
                    $statement = $pdo->prepare($qry4);
                    if($statement->execute([':itemQty' => $itemQty, 'itemBarcode' => $itemBarcode])){
                        echo 1;
                        exit();  
                    }
                }else{
                    echo 0;
                    exit();  
                } 
            }
        }else{
            echo "Item barcode are not exist";
            exit();  
        }
?>