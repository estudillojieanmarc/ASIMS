<?php
        require 'connection.php';
        // NAME FROM THE FORM 
        $receipNo = $_POST['receipNo'];
        $purchasedOn = $_POST['purchasedOn'];
        $customerName = $_POST['customerName'];
        $itemCode = $_POST['itemCode'];
        $itemQty = $_POST['itemQty'];
        $totalSales = $_POST['totalSales'];


        // CHECK IF THE ITEM IS EXIST
        $qry1 = "SELECT item_barcode FROM inventory WHERE item_barcode = :itemCode";
        $statement=$pdo->prepare($qry1);
        $statement->execute(
            array(
                'itemCode' => $_POST["itemCode"],
            )
        );
        $count = $statement->rowCount();
        if($count > 0 ){
            $qry2 = "SELECT item_stock FROM inventory WHERE item_barcode = :itemCode";
            $statement2=$pdo->prepare($qry2);
            $statement2->execute(
                array(
                    'itemCode' => $_POST["itemCode"],
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
                $qry3 = "INSERT INTO sales (receipt_no, purchased, item_barcode, customers, quantity, total_sales) VALUES (?,?,?,?,?,?)";
                $pdo->prepare($qry3)->execute([$receipNo, $purchasedOn, $itemCode, $customerName, $itemQty , $totalSales]);
                if($pdo){
                    $qry4 = "UPDATE inventory SET item_stock = item_stock - :itemQty WHERE item_barcode = :itemCode";
                    $statement = $pdo->prepare($qry4);
                    if($statement->execute([':itemQty' => $itemQty, 'itemCode' => $itemCode])){
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