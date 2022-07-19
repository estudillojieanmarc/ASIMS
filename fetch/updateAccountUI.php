<?php
require 'connection.php';
session_start();
error_reporting(0);


// FOR ACTIVE EMPLOYEES UI
if(isset($_POST["getUpdateUi"])){
$sql = "SELECT position FROM employees WHERE emp_id = '$_SESSION[emp_id]'";
$statement=$pdo->prepare($sql);
$statement->execute();
$position = $statement->fetch(PDO::FETCH_OBJ);
foreach ($position as $myPosition){
    if($myPosition == 'Administrator' || $myPosition == 'Owner'){ // THIS IS FOR THE ADMINISTRATOR AND OWNER UI
        echo"
        <div class='card border-0'>
            <div class='container'>
            <form id='updateAccount'>
            <div class='row'>
                <div class='row text-center mb-2'>                                
                    <div class='col-7'>
                            <img class='img-thumbnail border-0 text-center' style='height:200px; clip-path:circle();' id='profilePicture' src=''>
                    </div>
                    <div class='col-5 pt-5'>
                            <div class='row pt-5'>
                                <label class='form-label pt-4'>Update Picture</label>
                                <input class='form-control mb-2' type='file' name='profilePicture'>
                            </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-7'>
                        <label class='form-label'>Fullname</label>
                        <input  type='text' class='form-control mb-2 shadow border-2' id='fullname' name='fullname'>
                    </div>
                    <div class='col-5'>
                        <label class='form-label'>Position</label>
                        <select id='position' name='position' class='form-select mb-2 shadow border-2'>
                            <option value='Administrator'>Administrator</option>
                            <option value='Cashier'>Cashier</option>
                            <option value='Owner'>Owner</option>
                            <option value='Mechanic'>Mechanic</option>
                        </select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-8'>
                        <label class='form-label'>Email Address:</label>
                        <input class='form-control mb-2 shadow border-2' type='text' id='email' name='email'>
                    </div>
                    <div class='col-4'>
                        <label class='form-label'>Phone Number:</label>
                        <input class='form-control mb-2 shadow border-2' type='text' id='PhoneNumber' name='PhoneNumber'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <label class='form-label'>Username:</label>
                        <input type='text' class='form-control mb-2 shadow border-2' id='username' name='username'>
                    </div>
                    <div class='col-6'>
                        <label class='form-label'>Password:</label>
                        <input type='password' class='form-control mb-4 shadow border-2' id='password' name='password'>
                    </div>
                </div>
                <div class='mb-3'>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' onclick='seePassword()'
                            id='flexCheckIndeterminate'>
                        <label class='form-check-label text-dark' for='flexCheckIndeterminate'>Show Password</label>
                    </div>
                </div>
                <div class='row mt-2 px-5'>
                    <button type='button' class='btn py-2 rounded-pill text-white' id='updateButton' style='background-color:#800000 !important;'>Save Changes</button>
                </form>
                </div>
            </div>  
            </form>
        </div> 
        ";
    }else{ // THIS IS FOR THE NON ADMINISTRATOR AND OWNER UI
        echo"
        <div class='card border-0'>
            <div class='container'>
            <form id='updateAccount'>
            <div class='row'>
                <div class='row text-center mb-2'>                                
                    <div class='col-12'>
                            <img class='img-thumbnail border-0 text-center' style='height:200px; clip-path:circle();' id='profilePicture' src=''>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-5'>
                            <label class='form-label'>Profile Picture</label>
                            <input class='form-control mb-2' type='file' name='profilePicture'>
                    </div>
                    <div class='col-7'>
                        <label class='form-label'>Fullname</label>
                        <input  type='text' class='form-control mb-2 shadow border-2' id='fullname' name='fullname'>
                    </div>
                    <!-- <div class='col-5'>
                        <label class='form-label'>Position</label>
                        <input readonly type='text' class='form-control mb-2 shadow border-2' id='position' name='position'>
                    </div> -->
                </div>
                <div class='row'>
                    <div class='col-8'>
                        <label class='form-label'>Email Address:</label>
                        <input class='form-control mb-2 shadow border-2' type='text' id='email' name='email'>
                    </div>
                    <div class='col-4'>
                        <label class='form-label'>Phone Number:</label>
                        <input class='form-control mb-2 shadow border-2' type='text' id='PhoneNumber' name='PhoneNumber'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <label class='form-label'>Username:</label>
                        <input type='text' class='form-control mb-2 shadow border-2' id='username' name='username'>
                    </div>
                    <div class='col-6'>
                        <label class='form-label'>Password:</label>
                        <input type='password' class='form-control mb-4 shadow border-2' id='password' name='password'>
                    </div>
                </div>
                <div class='mb-3'>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' onclick='seePassword()'
                            id='flexCheckIndeterminate'>
                        <label class='form-check-label text-dark' for='flexCheckIndeterminate'>Show Password</label>
                    </div>
                </div>
                <div class='row mt-2 px-5'>
                    <button type='button' class='btn py-2 rounded-pill' id='updateButton' style='background-color:#800000 !important;'>Save Changes</button>
                </form>
                </div>
            </div>  
            </form>
        </div> 
        ";
    }
}
}

// FOR ADD BUTTON 
if(isset($_POST['getButton'])){
    $sql = "SELECT position FROM employees WHERE emp_id = '$_SESSION[emp_id]'";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $position = $statement->fetch(PDO::FETCH_OBJ);
    foreach ($position as $myPosition){
        if($myPosition == 'Administrator' || $myPosition == 'Owner'){ 
            echo "<a href='http://localhost/ASIMS/addEmployee.php' role='button' style='border-radius:4px;' class='btn border-secondary text-dark btn-sm px-4 pt-2'><i class='fa-solid fa-plus'></i> Add</a>";
        }
    }
}
?>