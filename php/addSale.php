<?php
        require 'connection.php';
        $receipNo = $_POST["receipNo"];
        $itemBarcode = $_POST["itemBarcode"];
        $itemQty = $_POST["itemQty"];
      
                // CHECK THE RECEIPT NO.
                $sql = "SELECT receipt_no FROM sales WHERE receipt_no = :receipNo";
                $statement=$pdo->prepare($sql);
                $statement->execute(
                    array(
                        'receipNo' => $_POST["receipNo"]
                    )
                );
                $count = $statement->rowCount();
                if($count > 0 ){
                    echo "Sorry, Receipt number are already exist";
                    exit(); 
                }else{
                        $qry = "INSERT INTO sales (receipt_no, purchased, item_id, customers, quantity, total_sales) 
                        VALUES (:receipNo, :purchasedOn, :itemId, :customerName, :itemQty, :totalSales)";
        
                        for($count = 0; $count<count($_POST['itemId']); $count++)
                        {
                        // CHECK THE ITEM STOCK
                        $sql = "SELECT item_stock FROM inventory WHERE item_barcode = :itemBarcode";
                        $statement=$pdo->prepare($sql);
                        $statement->execute(
                        array(
                                'itemBarcode' => $_POST["itemBarcode"],
                        )
                        );
                        $stock = $statement->fetch(PDO::FETCH_ASSOC);
                        $data = [];
                        if($stock['item_stock'] == 0){
                                echo "Sorry not enough stock";
                                exit();
                        }else if($stock['item_stock'] < $_POST['itemQty'][$count]){
                                echo "Sorry not enough stock";
                                exit();
                        }else{
                        $data = array(                                         
                        ':receipNo' => $_POST['receipNo'],
                        ':purchasedOn' => $_POST['purchasedOn'],
                        ':itemId' => $_POST['itemId'][$count],
                        ':customerName' => $_POST['customerName'],
                        ':itemQty' => $_POST['itemQty'][$count],
                        ':totalSales' => $_POST['totalSales'][$count],
                        );
                        $statement = $pdo->prepare($qry);
                        $statement->execute($data);
                        }
                        }
                }
?>