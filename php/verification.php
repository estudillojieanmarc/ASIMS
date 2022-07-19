<?php

    session_start();

    $code = rand(100000,999999);

    $email = $_SESSION['email_address'];

    $loginCode = "Hello user, Use this verification code to login: ".$code; 

    $_SESSION["sessionCode"] = $code;

    require 'D:/xampp/htdocs/ASIMS/PHPMailer/src/Exception.php';
    require 'D:/xampp/htdocs/ASIMS/PHPMailer/src/POP3.php';
    require 'D:/xampp/htdocs/ASIMS/PHPMailer/src/SMTP.php';
    require 'D:/xampp/htdocs/ASIMS/PHPMailer/src/OAuthTokenProvider.php';
    require 'D:/xampp/htdocs/ASIMS/PHPMailer/src/OAuth.php';
    require 'D:/xampp/htdocs/ASIMS/PHPMailer/src/PHPMailer.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "ssl://smtp.gmail.com"; 
    $mail->Port = 465;
    $mail->SMTPAuth = true;              
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAutoTLS = false; 
    $mail->Username = "asmotorparts.noreply@gmail.com"; 
    $mail->Password = "kkswfndwdizxpmuz";
    $mail->setFrom('asmotorparts.noreply@gmail.com', 'A&S MOTORPARTS');
    $mail->addAddress($email);
    $mail->Subject = 'Verification Code';
    $mail->Body = $loginCode;
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


    $mail->smtpClose();
?>


<script>
    localStorage.setItem('code', <?php echo $code;?>)
</script>