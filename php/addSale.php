<?php
        require 'connection.php';
        session_start();
        $itemId = $_POST["itemId"];
        $customerName = $_POST["customerName"];
        $purchasedOn = $_POST["purchasedOn"];
        $receipNo = $_POST["receipNo"];
        $itemQty = $_POST["itemQty"];
        $totalSales = $_POST["totalSales"];
                // CHECK THE RECEIPT NO.
                $sql = "SELECT receipt_no FROM sales WHERE receipt_no = :receipNo";
                $statement=$pdo->prepare($sql);
                $statement->execute(array('receipNo' => $_POST["receipNo"]));
                $count = $statement->rowCount();
                if($count > 0 ){
                        echo "Sorry, Receipt number are already exist";
                        exit(0); 
                }else{
                foreach($itemId as $index => $productId){
                        $f_productId = $productId;
                        $f_total = $totalSales[$index];
                        $f_itemQty = $itemQty[$index];
        
                        $qry = "INSERT INTO sales (receipt_no, purchased, item_id, customers, quantity, total_sales) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                        $statement=$pdo->prepare($qry);
                        $statement->execute([$receipNo, $purchasedOn, $f_productId, $customerName, $f_itemQty, $f_total]);
                        
                        $qry2 = "UPDATE inventory SET item_stock = item_stock - :f_itemQty WHERE id = :f_productId";
                        $statement = $pdo->prepare($qry2);
                        $statement->execute([':f_itemQty' => $f_itemQty, ':f_productId' => $f_productId]);
                        }
                        if($qry && $qry2){
                                $sql = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has add sales at our system', now())";
                                $statement=$pdo->prepare($sql);
                                $statement->execute();
                                if($statement){
                                    echo 1;
                                    exit(0);
                                }else{
                                    echo 0;
                                    exit(0);
                                }
                           }else{
                                echo "error";
                                exit(0);
                           }
                }