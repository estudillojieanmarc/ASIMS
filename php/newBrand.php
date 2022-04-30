<?php
        require 'connection.php';
        // NAME FROM THE FORM 
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
                echo "Added Successfully";
                exit();  
            }else{
                echo "Sorry, Failed";
                exit();  
                } 
        }
?>