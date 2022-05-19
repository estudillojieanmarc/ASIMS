<?php
        require 'connection.php';
        // NAME FROM THE FORM 
        session_start();
        $brandName = $_POST['brandName'];

        // CHECK IF THE ITEM IS ALREADY EXIST
        $sql = "SELECT * FROM brandname WHERE brand = :brandName";
        $statement=$pdo->prepare($sql);
        $statement->execute(
            array(
                'brandName' => $_POST["brandName"],
            )
        );
        $count = $statement->rowCount();
        if($count > 0 ){
            echo "Sorry, The brand are already exist";
            exit(); 
        }else{
            $sql = "INSERT INTO brandname (brand) VALUES (?)";
            $pdo->prepare($sql)->execute([$brandName]);
            if($pdo){
                $sql7 = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has add brand $brandName to our system', now())";
                $statement=$pdo->prepare($sql7);
                $statement->execute();
                if($statement){
                    echo "Added Successfully";
                    exit();  
                }else{
                    echo "Sorry, Failed";
                    exit();
                }
            }else{
                echo "Sorry, Failed";
                exit();  
                } 
        }
?>