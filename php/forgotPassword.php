<?php
require 'connection.php';
session_start();

    if (isset($_POST['emailAddress'])){

        $emailAddress = strip_tags($_POST['emailAddress']);
        $sql = $pdo->prepare("SELECT * FROM employees WHERE email_address = :emailAddress");
        $sql->execute(array(':emailAddress'=>$_POST['emailAddress']));
        $row=$sql->fetch(PDO::FETCH_ASSOC);

        if($sql->rowCount() > 0){
            if($emailAddress == $row['email_address']){
                // TABLE ROWS FROM THE DATABASE
                $username = $row['username'];
                $fullname = $row['fullname'];
                $email = $row['email_address'];

                // POST NEW PARAMETER
                $randomToken = md5(rand());
                $emailAddress = strip_tags($_POST['emailAddress']);

                $qry = "UPDATE employees SET token = :randomToken WHERE email_address = :emailAddress";
                $statement = $pdo->prepare($qry);
                if($statement->execute([':randomToken' => $randomToken, 'emailAddress' => $emailAddress])){
                    $resetLink = "Hi, $fullname. Click this link to proceed to reset password page:
                    http://localhost/ASIMS/resetPassword.php?token=$randomToken&email=$emailAddress"; 
            
                    require 'C:/xampp/htdocs/ASIMS/PHPMailer/src/Exception.php';
                    require 'C:/xampp/htdocs/ASIMS/PHPMailer/src/POP3.php';
                    require 'C:/xampp/htdocs/ASIMS/PHPMailer/src/SMTP.php';
                    require 'C:/xampp/htdocs/ASIMS/PHPMailer/src/OAuthTokenProvider.php';
                    require 'C:/xampp/htdocs/ASIMS/PHPMailer/src/OAuth.php';
                    require 'C:/xampp/htdocs/ASIMS/PHPMailer/src/PHPMailer.php';
            
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->isSMTP();
                    $mail->Mailer = "smtp";
                    $mail->Host = "ssl://smtp.gmail.com"; 
                    $mail->Port = 465;
                    $mail->SMTPAuth = true;              
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAutoTLS = false; 
                    $mail->Username = "asmotorparts.noreply@gmail.com"; 
                    $mail->Password = "ASMotorparts123";
                    $mail->setFrom('asmotorparts.noreply@gmail.com', 'A&S MOTORPARTS');
                    $mail->addAddress($emailAddress);
                    $mail->Subject = 'Reset Password';
                    $mail->Body = ($resetLink);
                    $mail->WordWrap = 50;
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                    );
                    if($mail->send()){
                        // "Email send, Check your mail box"
                        echo 1;
                    }else{
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                }else{ 
                    echo 0;
                }   
            }
        }else{
            // EMAIL NOT FOUND
            echo 2; 
        }

    }else{
        // EMAIL NOT EXIST
        echo 3;
    }


?>