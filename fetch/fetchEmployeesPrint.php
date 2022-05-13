<?php
require 'connection.php';
error_reporting(0);
if(isset($_POST["getEmployees"])){
    $qry = "SELECT * FROM employees WHERE is_active = 1";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $employees = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
      foreach($employees as $totalEmployees){
              $n++;
              echo "
              <tr class='bg-light'>
                <td>$n</td>
                <td>$totalEmployees->fullname</td>
                <td>$totalEmployees->position</td>
                <td>$totalEmployees->email_address</td>
                <td>$totalEmployees->PhoneNumber</td>
              </tr>
              ";
      }
    }else{
      echo "
      <tr style='height:20rem'>
            <td style='width:0.1px'></td>
            <td style='width:0.1px'></td>
            <td style='width:100rem' class='alert alert-light text-center mt-5 fs-4 text-danger'>NO EMPLOYEES FOUND</td>
            <td style='width:0.1px'></td>
            <td style='width:0.1px'></td>
      </tr>
     ";
    }
}




?>