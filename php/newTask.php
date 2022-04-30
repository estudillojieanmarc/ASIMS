<?php   
        require 'connection.php';
        session_start();
        $task = $_POST['task'];
        $admin = $_SESSION['fullname'];
        $qry = 'INSERT INTO todo (sender, task , submit) VALUES (?, ?, now())';
        $statement = $pdo->prepare($qry)->execute([$admin, $task]);
        if($statement){
            echo 1;
        }else{
            echo 0;
        }   
?>