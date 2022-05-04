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



// DELETING SALES 
    if(isset($_POST["deleteSales"])){
        $deleteSales = $_POST['deleteSales'];
        $qry = "DELETE FROM sales WHERE sales_id = $deleteSales";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        if($statement){
            echo 1;
        }else{
            echo 0;
        }
    }
// DELETING SALES 



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
                echo 1;
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
                echo 1;
            }else{
                echo 0;
            }
        }
    }
// REMOVING ALL SELECTED BRAND




// REMOVING ALL SELECTED SALES
if(isset($_POST['deleteSale'])){
    foreach($_POST['deleteSale'] as $deleteSale){
        $qry = "DELETE FROM sales WHERE sales_id = $deleteSale";
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

?>