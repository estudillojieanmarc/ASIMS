<?php
require 'connection.php';
error_reporting(0);
if(isset($_POST["getTask"])){
    $qry = "SELECT * FROM todo ORDER BY submit DESC";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $task = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
        foreach($task as $totalTask){
                $newDate = date('F d, Y || h:i:A',strtotime($totalTask->submit));
                echo "
                    <div class='card my-2 border-0'>
                        <p class='card-header shadow bg-light rounded'>Submit On: $newDate</p>
                        <div class='card-body bg-light rounded shadow'>
                            <h5 class='card-title'>From: $totalTask->sender</h5>
                            <p class='card-text px-2 my-2'>$totalTask->task</p>
                            <div class='row mt-3'>
                                <div class='col-2 ms-auto'>
                                    <button type='button' onclick=editTask('$totalTask->id') class='btn btn-secondary px-3'>Edit</button>
                                    <button type='button' onclick=deleteTask('$totalTask->id') class='btn btn-danger px-3'>Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
        }
    }else{
        echo "
            <div class='row mt-5 pt-4'>
                <div class='alert alert-light text-center mt-5 fs-4 text-danger' role='alert'>
                   NO TASK FOUND
                </div>
            </div>
        ";
    }
}
?>