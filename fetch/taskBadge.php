<?php
    session_start();
    require 'connection.php';
	if (isset($_POST["count_pending"])) {
        $qry = "SELECT count(*) AS countTask FROM todo ORDER BY id"; 
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $fetchTask = $statement->fetch(PDO::FETCH_OBJ);
        foreach($fetchTask as $totalTask){
            echo $totalTask;
        }
    }	
?>