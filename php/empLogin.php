<?php
require 'connection.php';
session_start();
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employees WHERE username = :username AND password = :password";
    $statement=$pdo->prepare($sql);
    $statement->execute(
        array(
            'username' => $_POST["username"],
            'password' => $_POST["password"],
        )
    );
    $count = $statement->rowCount();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row) ){
        $_SESSION["emp_id"] = $row["emp_id"];          
        $_SESSION["fullname"] = $row["fullname"];          
        echo 1;
    }else{
        echo 0;
    }
}
?>