<?php
require 'connection.php';
session_start();
if (isset($_POST['login'])){
    function password_check($password, $existingHash) {
        $hash = crypt($password, $existingHash);
        if($hash === $existingHash){
            return true;
        }
        return false;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = $password;

    $sql = "SELECT * FROM employees WHERE username = :username";
    $statement=$pdo->prepare($sql);
    $statement->execute(
        array(
            'username' => $_POST["username"],
        )
    );
    $count = $statement->rowCount();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row)){
        if($row["is_active"] == 1){
            if($row["password"] = $hash){
                $_SESSION["emp_id"] = $row["emp_id"];          
                $_SESSION["fullname"] = $row["fullname"];          
                $_SESSION["password"] = $row["password"];          
                $_SESSION["email_address"] = $row["email_address"];          
                echo 1;
            }
        }else{
            echo 2;
        }
    }else{
        echo 0;
    }
}
 
?>