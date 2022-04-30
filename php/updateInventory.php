<?php
    require 'connection.php';
    session_start();
    $target_dir = "C:/xampp/htdocs/ASIMS/assets/inventory/";
    $target_file = $target_dir . basename($_FILES["updateItemImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    include('connection.php');
    $updateItemID = $_POST["updateItemID"];
    $updateItemImage = $_FILES["updateItemImage"]["name"];
    $updateItemName = $_POST["updateItemName"];
    $updateItemCode = $_POST["updateItemCode"];
    $updateItemDescription = $_POST["updateItemDescription"];
    $updateItemBrand = $_POST["updateItemBrand"];
    $updateItemCategory = $_POST["updateItemCategory"];
    $updateItemStock = $_POST["updateItemStock"];
    $updateItemPrice = $_POST["updateItemPrice"];

    if(!empty($_FILES["updateItemImage"]["name"])){
        if(isset($_POST["updateButton"])) {
            $check = getimagesize($_FILES["updateItemImage"]["name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
    }
     // Check file size
     if ($_FILES["updateItemImage"]["size"] > 500000) 
     {
         echo "Sorry, the file is too large.";
         $uploadOk = 0;
         exit();  
     }
     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
     {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
         exit();  
     }
     else {
        if (move_uploaded_file($_FILES["updateItemImage"]["tmp_name"], $target_file)) {
                    $qry = "SELECT item_image FROM inventory WHERE id = $updateItemID";
                    $statement=$pdo->prepare($qry);
                    $statement->execute();
                    $fetchImage = $statement->fetch(PDO::FETCH_OBJ);
                    foreach($fetchImage as $resultImage)
                    {
                            unlink("C:/xampp/htdocs/ASIMS/assets/inventory/".$resultImage);
                    }
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $qry = "UPDATE inventory SET item_name = :updateItemName , item_barcode = :updateItemCode, item_image = :updateItemImage,
                item_description = :updateItemDescription, item_stock = :updateItemStock, item_brand = :updateItemBrand, 
                item_category =  :updateItemCategory, item_price = :updateItemPrice WHERE id = $updateItemID";
                $statement = $pdo->prepare($qry);
                if($statement->execute([':updateItemName' => $updateItemName, ':updateItemCode' => $updateItemCode, 
                ':updateItemImage' => $updateItemImage, ':updateItemDescription' => $updateItemDescription, ':updateItemStock' => $updateItemStock, 
                ':updateItemBrand' => $updateItemBrand, ':updateItemCategory' => $updateItemCategory, 
                ':updateItemPrice' => $updateItemPrice])){
                    echo 1;
                }else{
                    echo 0;
                }
            }
            }
        }
        else{
            $qry = "UPDATE inventory SET item_name = :updateItemName , item_barcode = :updateItemCode,
            item_description = :updateItemDescription, item_stock = :updateItemStock, item_brand = :updateItemBrand, 
            item_category =  :updateItemCategory, item_price = :updateItemPrice WHERE id = $updateItemID";
            $statement = $pdo->prepare($qry);
            if($statement->execute([':updateItemName' => $updateItemName, ':updateItemCode' => $updateItemCode, 
            ':updateItemDescription' => $updateItemDescription, ':updateItemStock' => $updateItemStock, 
            ':updateItemBrand' => $updateItemBrand, ':updateItemCategory' => $updateItemCategory, 
            ':updateItemPrice' => $updateItemPrice])){
                echo 1;
            }else{
                echo 0;
            }
}
?>