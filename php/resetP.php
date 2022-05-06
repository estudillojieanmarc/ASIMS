<?php
require 'connection.php';
session_start();

$email = $_POST['email'];
$token = $_POST['token'];
$newPassword = $_POST['newPassword'];
    if(!empty($token)){
        if(!empty($email) && !empty($newPassword)){
            $sql = "SELECT token FROM employees WHERE token = :token";
            $statement=$pdo->prepare($sql);
            $statement->execute(array(':token' => $_POST["token"]));
            $count = $statement->rowCount();
            if($count > 0){
                $sql = "UPDATE employees SET password = :newPassword WHERE token = :token LIMIT 1";
                $statement=$pdo->prepare($sql);
                if($statement->execute([':newPassword' => $newPassword, ':token' => $token])){
                    echo "Your password has changed";
                }else{
                    echo "Sorry, Your password has not change";
                }
            }else{
                echo "sorry the token is invalid";
            }
        }else{
            echo "all fields are mandatory";
        }
    }else{
        echo "No token Available";
    }
?>