<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/img/red.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./css/verification.css">
    <title>A&S Motor Parts</title>
</head>

<body>
 
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
        require 'connection.php';


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
            $sql = "INSERT INTO history (history, set_on) VALUES ('Mr/Ms. $_SESSION[fullname] has enter to our system', now())";
            $statement=$pdo->prepare($sql);
            $statement->execute();
            // "Email send, Check your mail box"
        }else{
            echo "Mailer Error: " . $mail->ErrorInfo;
        }


        $mail->smtpClose();
    ?>
    <div class="container d-flex justify-content-center align-items-center">
        <form id="codeForm">
    	<div class="card text-center">
    		<div class="card-header p-5">
    			<img src="./assets/img/verimg.png">
    			<h5 class="mb-2">OTP VERIFICATION</h5>
    			<div>
    				<small>Code has been send to your email</small>
    			</div>
    		</div>
        <div class="mt-2">
            <input type="text" name="userCode" id="userCode"class="w-100 m-1 text-center form-control rounded" maxlength="6">
        </div>
        <div class="mt-3 mb-5 ">
            <button id="codeSubmit" class="btn btn-success px-4 verify-btn">Submit</button>
        </div>
    	</div>
    </div>
    </form>



    <script>
        localStorage.setItem('code', <?php echo $code;?>)
    </script> 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/verification.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>