<?php
    session_start();
    require 'connection.php';
    if(isset($_POST["getTask"])){
        $qry = "SELECT count(*) FROM todo ORDER BY id"; 
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $fetchTask = $statement->fetch(PDO::FETCH_OBJ);
        foreach($fetchTask as $totalTask){
          echo json_encode($totalTask);
        }
    }
?>