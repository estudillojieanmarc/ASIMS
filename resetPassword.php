<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <title>A&S Motor Parts</title>
</head>

<body>
    
<div class="bg-color pt-5">
<div class="motor-vector-container pt-3"> 
    
    <img src="assets/img/red.png">
    <img src="assets/img/green.png">

        <!-- FORM -->
        <div class="row form px-3">
            <form id="resetForm">
                <h4 class="text-center text-dark pb-1 mt-4">Reset Password</h4>
                <p class="text-center text-dark pb-2">Please, enter your new password</p>

                <div class="mb-3">
                    <input type="hidden" class="form-control bg-light" id="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>">
                    <input type="hidden" class="form-control" id="token" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="conNewPassword" name="conNewPassword" placeholder="Confirm Password">
                </div>
                <div class="mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" onclick="seePassword()">
                        <label class="form-check-label text-dark">Show Password</label>
                    </div>               
                </div>
                <div class="row mx-4 mt-4 mb-3">
                    <button type="button" class="btn btn-dark" id="resetButton">Save Changes</button>
                </div>
                <div class="mb-1">
                    <a class="nav-link text-center text-dark" href="http://localhost/ASIMS/login.html">Login Page</a>
                </div>  
            </form>
        </div>
        <!-- FORM --></div>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/reset.js"></script>
</body>

</html>