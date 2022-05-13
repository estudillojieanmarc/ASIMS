<?php
require 'connection.php';
session_start();
error_reporting(0);


// FOR ACTIVE EMPLOYEES UI
if(isset($_POST["getEmployees"])){
$sql = "SELECT position FROM employees WHERE emp_id = '$_SESSION[emp_id]'";
$statement=$pdo->prepare($sql);
$statement->execute();
$position = $statement->fetch(PDO::FETCH_OBJ);
foreach ($position as $myPosition){
    if($myPosition == 'Administrator' || $myPosition == 'Owner'){ // THIS IS FOR THE ADMINISTRATOR AND OWNER UI
        $qry = "SELECT * FROM employees WHERE is_active = 1 AND emp_id != '$_SESSION[emp_id]'";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $Employees = $statement->fetchAll(PDO::FETCH_OBJ);
        $count = $statement->rowCount();
        if($count > 0){
            foreach($Employees as $totalEmployees){
                    $n++;
                    echo"
                    <tr class='bg-light'>            
                    <td>$n</td>
                    <td>$totalEmployees->fullname</td>
                    <td>$totalEmployees->position</td>
                    <td>$totalEmployees->email_address</td>
                    <td>$totalEmployees->PhoneNumber</td>
                    <td>
                        <button type='button' onclick=updateEmployees('$totalEmployees->emp_id') class='btn btn-sm btn-secondary px-3'>View</button>
                        <button type='button' onclick=inactiveEmployees('$totalEmployees->emp_id') class='btn btn-sm btn-danger'>Inactive</button>
                    </td>
                    </tr>
                    ";
            }
        }else{
            echo "
            <tr style='height:20rem'>
                <td></td>
                <td></td>
                <td></td>
                <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO EMPLOYEES FOUND</td>
                <td></td>
                <td></td>
            </tr>
        ";
        }
    }else{ // THIS IS FOR THE NON ADMINISTRATOR AND OWNER UI
            $qry = "SELECT * FROM employees WHERE is_active = 1 AND emp_id != $_SESSION[emp_id]";
            $statement=$pdo->prepare($qry);
            $statement->execute();
            $Employees = $statement->fetchAll(PDO::FETCH_OBJ);
            $count = $statement->rowCount();
            if($count > 0){
                foreach($Employees as $totalEmployees){
                        $n++;
                        echo"
                        <tr class='bg-light'>            
                        <td>$n</td>
                        <td>$totalEmployees->fullname</td>
                        <td>$totalEmployees->position</td>
                        <td>$totalEmployees->email_address</td>
                        <td>$totalEmployees->PhoneNumber</td>
                        <td>
                        <button type='button' onclick=viewEmployees('$totalEmployees->emp_id') class='btn btn-sm btn-secondary px-3'>View</button>
                        </td>
                        </tr>
                        ";
                }
            }else{
                echo "
                <tr style='height:20rem'>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO EMPLOYEES FOUND</td>
                    <td></td>
                    <td</td>
                </tr>
            ";
            }
    }
}
}

// FOR ADD BUTTON 
if(isset($_POST['getButton'])){
    $sql = "SELECT position FROM employees WHERE emp_id = '$_SESSION[emp_id]'";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $position = $statement->fetch(PDO::FETCH_OBJ);
    foreach ($position as $myPosition){
        if($myPosition == 'Administrator' || $myPosition == 'Owner'){ 
            echo "<a href='http://localhost/ASIMS/addEmployee.php' role='button' style='border-radius:4px;' class='btn border-secondary text-dark btn-sm px-4 pt-2'><i class='fa-solid fa-plus'></i> Add</a>";
        }
    }
}
?>