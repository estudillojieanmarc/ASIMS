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
                $username = $row['username'];
                $fullname = $row['fullname'];
                $token = $row['token'];
                
                $resetLink = "Hi, $fullname. Click here to reset password 
                http://localhost/ASIMS/resetPassword-With-Email-Ajax-PHP/resetPassword.php?token=$token"; 
                
                require 'C:/xampp/htdocs/ASIMS/php/PHPMailer.php';

                $mail= new PHPMailer;
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPSecure='tls';
                $mail->SMTPAuth=true;
                $mail->Username='';
                $mail->Password='';
                $mail->setFrom('');
                $mail->addAddress($emailAddress);
                $mail->isHtml(true);
                $mail->Subject='Reset Password';
                $mail->Body = ($resetLink);
                $mail->SMTPOptions=array('ssl'=>array(
                        'verify_peer'=>false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>false
                ));
                if($mail->send()){
                    echo "Email send, Check your mail box";
                }else{
                    echo "Sorry, Email has not send";

                }
            }
        }else{
            echo "Email not found";
        }

    }else{
        echo "Email not exist";
    }
?>