<?php
require 'connection.php';

    function generate_salt($len) {
        $urs = md5(uniqid(mt_rand(), true));
        $b64String = base64_encode($urs);
        $mb64String = str_replace('+', '.', $b64String);
        return substr($mb64String, 0, $len);
    }

    function encrypt_password($password) {
        $hashFormat = "$2y$10$";
        $saltLength = 22;
        $salt = generate_salt($saltLength);
        return crypt($password, $hashFormat.$salt);
    }
    session_start();
    $addFullname = $_POST['addFullname'];
    $addPosition = $_POST['addPosition'];
    $addNumber = $_POST['addNumber'];
    $addEmail = $_POST['addEmail'];
    $addUsername = $_POST['addUsername'];
    $addPassword = $_POST['addPassword'];
    $randomToken = md5(rand());

    // CHECK IF THE USER IS EXIST
    $sql1 = "SELECT fullname FROM employees WHERE fullname = :addFullname"; 
    $statement1=$pdo->prepare($sql1);
    $statement1->execute(
        array(
            'addFullname' => $_POST["addFullname"]
        )
    );
    $count1 = $statement1->rowCount();
    if($count1 > 0 ){
        echo "Sorry, The user is already exist";
        exit();
    }

    // CHECK IF THE EMAIL IS ALREADY TAKEN
    $sql2 = "SELECT email_address FROM employees WHERE email_address = :addEmail"; 
    $statement2=$pdo->prepare($sql2);
    $statement2->execute(
        array(
            'addEmail' => $_POST["addEmail"],
        )
    );
    $count2 = $statement2->rowCount();
    if($count2 > 0 ){
        echo "Sorry, The email is already taken";
        exit();
    }

    // CHECK IF THE PHONE IS ALREADY TAKEN
    $sql3 = "SELECT PhoneNumber FROM employees WHERE PhoneNumber = :addNumber"; 
    $statement3=$pdo->prepare($sql3);
    $statement3->execute(
        array(
            'addNumber' => $_POST["addNumber"],
        )
    );
    $count3 = $statement3->rowCount();
    if($count3 > 0 ){
        echo "Sorry, The phone is already taken";
        exit();
    }
  

    // CHECK IF THE USERNAME IS ALREADY TAKEN
    $sql4= "SELECT username FROM employees WHERE username = :addUsername"; 
    $statement4=$pdo->prepare($sql4);
    $statement4->execute(
        array(
            'addUsername' => $_POST["addUsername"],
        )
    );
    $count4= $statement4->rowCount();
    if($count4> 0 ){
        echo "Sorry, The username is already taken";
        exit();
    }
    
    // IF GOOD INSERT ALL
    else{
        
        // HASH FORMAT
        $sql6 = "INSERT INTO employees (fullname, position, email_address, PhoneNumber, username, password, image, is_active , token) VALUES (?,?,?,?,?,?,'default.png', 1, '$randomToken')";
        $pdo->prepare($sql6)->execute([$addFullname, $addPosition, $addEmail, $addNumber, $addUsername, encrypt_password($addPassword)]);
        if($pdo){
            $sql7 = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has added $addFullname to our system', now())";
            $statement=$pdo->prepare($sql7);
            $statement->execute();
            if($statement){
                echo 1;
                exit();  
            }else{
                echo 0;
                exit();
            }
        }else{
            echo 0;
            exit();  
        } 
    }

  
?>