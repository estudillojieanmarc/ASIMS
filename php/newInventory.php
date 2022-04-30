<?php
        require 'connection.php';
        // NAME FROM THE FORM 
        $itemName = $_POST['itemName'];
        $itemCode = $_POST['itemCode'];
        $itemImage = $_FILES['itemImage']['name'];
        $itemDescription = $_POST['itemDescription'];
        $itemStock = $_POST['itemStock'];
        $itemBrand = $_POST['itemBrand'];
        $itemCategory = $_POST['itemCategory'];
        $itemPrice = $_POST['itemPrice'];
      
            // CHECK IF THE ITEM IS ALREADY EXIST
            $sql = "SELECT * FROM inventory WHERE item_name = :itemName || item_barcode = :itemCode";
            $statement=$pdo->prepare($sql);
            $statement->execute(
                array(
                    'itemName' => $_POST["itemName"],
                    'itemCode' => $_POST["itemCode"]
                )
            );
            $count = $statement->rowCount();
            if($count > 0 ){
                echo "Sorry, The item are already exist";
                exit(); 
            }else{
            // FUNCTION FOR UPLOADING IMAGE
            $target_dir = "/xampp/htdocs/ASIMS/assets/inventory/";
            $target_file = $target_dir . basename($_FILES["itemImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["itemImage"]["tmp_name"]);
    
            // CHECKING THE IMAGE
            if($check !== false) {
                $uploadOk = 1;
            }else {
              echo "File is not an image.";
              exit();  
              $uploadOk = 0;
            }
            // CHECKING THE FILE SIZE
            if($_FILES["itemImage"]["size"] > 500000) {
              echo "Sorry, the file is too large.";
              exit();  
              $uploadOk = 0;
            }
            // ALLOW FILE FORMATS
            elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              exit();  
              $uploadOk = 0;
            }
            // CHECK IF $uploadOk is set to 0 by an error
            elseif($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
              exit();  
            }
            else {
                $sql = "INSERT INTO inventory (item_name, item_barcode, item_image, item_description, item_stock,  item_brand, item_category, item_price) VALUES (?,?,?,?,?,?,?,?)";
                $pdo->prepare($sql)->execute([$itemName, $itemCode, $itemImage, $itemDescription, $itemStock, $itemBrand, $itemCategory, $itemPrice]);
                if($pdo){
                    move_uploaded_file($_FILES["itemImage"]["tmp_name"],$target_file);
                    echo "added Successfully";
                    exit();  
                }else{
                    echo "Sorry, failed";
                    exit();  
                    } 
                }
            }
?>