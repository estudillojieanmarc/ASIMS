<?php   
        require 'connection.php';
        session_start();
        $task = $_POST['task'];
        $admin = $_SESSION['fullname'];
        $qry = 'INSERT INTO todo (sender, task , submit) VALUES (?, ?, now())';
        $statement = $pdo->prepare($qry)->execute([$admin, $task]);
        if($statement){
            $sql7 = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has add task to our system', now())";
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
        }   
?>