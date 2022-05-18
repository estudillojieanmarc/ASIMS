<?php
require 'connection.php';
// DELETING INVENTORY 
    if(isset($_POST["deleteInventory"])){
        $deleteInventory = $_POST['deleteInventory'];
        $qry = "DELETE FROM inventory WHERE id = $deleteInventory";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DELETING INVENTORY 


// DELETING CATEGORY 
    if(isset($_POST["removeCategory"])){
        $removeCategory = $_POST['removeCategory'];
        $qry = "DELETE FROM categoryname WHERE cat_id = $removeCategory";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DELETING CATEGORY 


// DELETING BRAND 
    if(isset($_POST["removeBrand"])){
        $removeBrand = $_POST['removeBrand'];
        $qry = "DELETE FROM brandname WHERE brand_id = $removeBrand";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DELETING BRAND 


// DELETING EMAIL 
    if(isset($_POST["archiveEmail"])){
        $archiveEmail = $_POST['archiveEmail'];
        $qry = "UPDATE email SET is_deleted = 1 WHERE id = $archiveEmail";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DELETING EMAIL 





// DELETE TASK
    if(isset($_POST["deleteTask"])){
        $deleteTask = $_POST['deleteTask'];
        $qry = "DELETE FROM todo WHERE id = $deleteTask";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DELETE TASK




// REMOVING ALL SELECTED INVENTORY
    if(isset($_POST['removeInventory'])){
        foreach($_POST['removeInventory'] as $inventoryId){
            $qry = "DELETE FROM inventory WHERE id = $inventoryId";
            $statement=$pdo->prepare($qry);
            $statement->execute();
            if($statement){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
// REMOVING ALL SELECTED INVENTORY




// REMOVING ALL SELECTED CATEGORY
    if(isset($_POST['deleteCategory'])){
        foreach($_POST['deleteCategory'] as $categoryId){
            $qry = "DELETE FROM categoryname WHERE cat_id = $categoryId";
            $statement=$pdo->prepare($qry);
            $statement->execute();
            if($statement){
                $qry = "UPDATE Inventory SET item_category = 1 WHERE item_category = $categoryId";
                $statement = $pdo->prepare($qry);
                if($statement->execute()){
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                echo 0;
            }
        }
    }
// REMOVING ALL SELECTED CATEGORY




// REMOVING ALL SELECTED BRAND
    if(isset($_POST['deleteBrand'])){
        foreach($_POST['deleteBrand'] as $brandId){
            $qry = "DELETE FROM brandname WHERE brand_id = $brandId";
            $statement=$pdo->prepare($qry);
            $statement->execute();
            if($statement){
                $qry = "UPDATE Inventory SET item_brand = 1 WHERE item_brand = $brandId";
                $statement = $pdo->prepare($qry);
                if($statement->execute()){
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                echo 0;
            }
        }
    }
// REMOVING ALL SELECTED BRAND




// REMOVING ALL SELECTED SALES
    if(isset($_POST['deleteSaleR'])){
        foreach($_POST['deleteSaleR'] as $deleteSaleR){
            $qry = "DELETE FROM sales WHERE receipt_no = '$deleteSaleR'";
            $statement=$pdo->prepare($qry);
            $statement->execute();
            if($statement){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
// REMOVING ALL SELECTED SALES






// DEACTIVATE EMPLOYEES
    if(isset($_POST['deactivateEmployees'])){
        $deactivateEmployees = $_POST['deactivateEmployees'];
        $qry = "UPDATE employees SET is_active = 0 WHERE emp_id = $deactivateEmployees";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DEACTIVATE EMPLOYEES




// ACTIVATE THE EMPLOYEEES
if(isset($_POST['activateEmployees'])){
    $activateEmployees = $_POST['activateEmployees'];
    $qry = "UPDATE employees SET is_active = 1 WHERE emp_id = $activateEmployees";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    if($statement){
        echo 1;
    }else{
        echo 0;
    }
}
// ACTIVATE THE EMPLOYEEES





// ACTIVATE THE EMPLOYEEES
if(isset($_POST['deleteEmployees'])){
    $deleteEmployees = $_POST['deleteEmployees'];
    $qry = "DELETE FROM employees WHERE emp_id = $deleteEmployees";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    if($statement){
        echo 1;
    }else{
        echo 0;
    }
}
// ACTIVATE THE EMPLOYEEES





?>