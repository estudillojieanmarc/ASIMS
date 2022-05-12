<?php
require 'connection.php';
    $employeeId = $_POST['employeeId'];
    $qry = "SELECT * FROM employees WHERE emp_id = $employeeId";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchEmployees = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($fetchEmployees);
?>