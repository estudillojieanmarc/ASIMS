<?php
        require 'connection.php';
        // NAME FROM THE FORM 
        session_start();
        $category = $_POST['category'];

        // CHECK IF THE ITEM IS ALREADY EXIST
        $sql = "SELECT * FROM categoryname WHERE category = :category";
        $statement=$pdo->prepare($sql);
        $statement->execute(
            array(
                'category' => $_POST["category"],
            )
        );
        $count = $statement->rowCount();
        if($count > 0 ){
            echo "Sorry, The category are already exist";
            exit(); 
        }else{
            $sql = "INSERT INTO categoryname (category) VALUES (?)";
            $pdo->prepare($sql)->execute([$category]);
            if($pdo){
                $sql7 = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has add category $category to our system', now())";
                $statement=$pdo->prepare($sql7);
                $statement->execute();
                if($statement){
                    echo "added Successfully";
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