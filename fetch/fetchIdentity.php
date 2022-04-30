<?php
    session_start();
    require 'connection.php';
    if(isset($_POST["getFullname"])){
        $qry = "SELECT * FROM employees WHERE fullname = '$_SESSION[fullname]'";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $fetchName = $statement->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($fetchName);
    }
?>