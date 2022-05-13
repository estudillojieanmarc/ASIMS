<?php
    require 'connection.php';
    session_start();
    $target_dir = "C:/xampp/htdocs/ASIMS/assets/employees/";
    $target_file = $target_dir . basename($_FILES["UprofilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    include('connection.php');
    $UprofilePicture = $_FILES["UprofilePicture"]["name"];
    $UemployeeId = $_POST["UemployeeId"];
    $Uusername = $_POST["Uusername"];
    $Ufullname = $_POST["Ufullname"];
    $Uposition = $_POST["Uposition"];
    $UphoneNumber = $_POST["UphoneNumber"];
    $UemailAddress = $_POST["UemailAddress"];

    if(!empty($_FILES["UprofilePicture"]["name"])){
        if(isset($_POST["updateButton"])) {
            $check = getimagesize($_FILES["UprofilePicture"]["name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
    }
     // Check file size
     if ($_FILES["UprofilePicture"]["size"] > 500000) 
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
        if (move_uploaded_file($_FILES["UprofilePicture"]["tmp_name"], $target_file)) {
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $qry = "UPDATE employees SET fullname = :Ufullname ,position = :Uposition ,email_address = :UemailAddress ,PhoneNumber = :UphoneNumber ,username = :Uusername, image = :UprofilePicture WHERE emp_id = :UemployeeId";
                $statement = $pdo->prepare($qry);
                if($statement->execute([':UemployeeId' => $UemployeeId, ':Ufullname' => $Ufullname, ':Uposition' => $Uposition, 
                ':UemailAddress' => $UemailAddress, ':Uusername' => $Uusername, ':UphoneNumber' => $UphoneNumber, 
                ':UprofilePicture' => $UprofilePicture])){
                    echo 1;
                }else{
                    echo 0;
                }
            }
            }
        }
        else{
            $qry = "UPDATE employees SET fullname = :Ufullname ,position = :Uposition ,email_address = :UemailAddress ,PhoneNumber = :UphoneNumber ,username = :Uusername WHERE emp_id = :UemployeeId";
            $statement = $pdo->prepare($qry);
            if($statement->execute([':UemployeeId' => $UemployeeId ,':Ufullname' => $Ufullname, ':Uposition' => $Uposition, 
            ':UemailAddress' => $UemailAddress, ':Uusername' => $Uusername, ':UphoneNumber' => $UphoneNumber])){
                echo 1;
            }else{
                echo 0;
            }
}
?>