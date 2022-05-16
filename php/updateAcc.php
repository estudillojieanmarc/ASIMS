<?php
    require 'connection.php';
    session_start();
    $target_dir = "C:/xampp/htdocs/ASIMS/assets/employees/";
    $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    include('connection.php');
    $fullname = $_POST["fullname"];
    $profilePicture = $_FILES["profilePicture"]["name"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(!empty($_FILES["profilePicture"]["name"])){
        if(isset($_POST["updateButton"])) {
            $check = getimagesize($_FILES["profilePicture"]["name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
    }
     // Check file size
     if ($_FILES["profilePicture"]["size"] > 500000) 
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
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                    $qry = "SELECT image FROM employees WHERE emp_id = $_SESSION[emp_id]";
                    $statement=$pdo->prepare($qry);
                    $statement->execute();
                    $fetchImage = $statement->fetch(PDO::FETCH_OBJ);
                    foreach($fetchImage as $resultImage)
                    {
                            unlink("C:/xampp/htdocs/ASIMS/assets/employees/".$resultImage);
                    }
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $qry = "UPDATE employees SET fullname = :fullname , email_address = :email, PhoneNumber = :PhoneNumber,
                username = :username, password = :password, image = :profilePicture WHERE emp_id = $_SESSION[emp_id]";
                $statement = $pdo->prepare($qry);
                if($statement->execute([':fullname' => $fullname, ':email' => $email, ':PhoneNumber' => $PhoneNumber,
                ':username' => $username, ':password' => $password, 
                ':profilePicture' => $profilePicture])){
                    echo 1;
                }else{
                    echo 0;
                }
            }
            }
        }
        else{
            $qry = "UPDATE employees SET fullname = :fullname, email_address = :email, PhoneNumber = :PhoneNumber,
            username = :username, password = :password  WHERE emp_id = $_SESSION[emp_id]";
            $statement = $pdo->prepare($qry);
            if($statement->execute([':fullname' => $fullname, ':email' => $email, 'PhoneNumber' => $PhoneNumber,
            ':username' => $username, ':password' => $password])){
                echo 1;
            }else{
                echo 0;
            }
}
?>