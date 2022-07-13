<!DOCTYPE html>
<html lang="en" id="sessionEmployees">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/asims.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/img/red.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <title>A&S Motor Parts</title>
</head>
<body>
  
<!-- FUNCTION FOR SESSION -->
  <?php
      require_once "./php/connection.php";
      session_start();
      if(!isset($_SESSION["emp_id"]) && !isset($_SESSION["fullname"])){
          header("location: http://localhost/ASIMS/login.html");
      }
  ?>
<!-- FUNCTION FOR SESSION -->

<!-- NAV BAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i style="font-size:18px;" class="fa-solid fa-user text-light"></i>
          </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Settings</a> </li>
              <li><a class="dropdown-item" href="http://localhost/ASIMS/manageAccount.php">Manage Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><input  class="dropdown-item" type="button" value="Logout" id="logout"></li>
            </ul>
          </li>
      </div>
    </div>
  </nav>
<!-- NAV BAR -->

<!-- CONTENT -->
  <div class="row">
  <!-- SIDE BAR -->
    <div div class="col-2">
        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="sidebar-header">
              <div class="userContent">
                  <div class="userProfile">
                        <img src="./assets/img/red.png">
                        <input type="text" class="border-0 text-white text-center pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:15px;" id="fetchFullname">
                        <input type="text" class="border-0 text-center text-white pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:14px;" id="fetchPosition">
                  </div>
              </div>
            </div>
            <div class="sidebar-body">
              <ul>                
                <li class='sub-menu'><a href='#settings'><i class="fa-solid fa-folder"></i> Reports<div class='fa fa-caret-down right pt-1'></div></a>
                    <ul>
                    <li><a href="http://localhost/ASIMS/dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                    <li><a href="http://localhost/ASIMS/employees.php"><i class="fa-solid fa-user-group"></i> Employees</a></li>
                    </ul>
                </li>  
                <li class='sub-menu'><a href='#settings'><i class="fa-solid fa-boxes-stacked"></i> Inventory<div class='fa fa-caret-down right pt-1'></div></a>
                    <ul>
                        <li><a href="http://localhost/ASIMS/inventory.php"><i class="fa-solid fa-file"></i> Stock Report</a></li>
                        <li><a href="http://localhost/ASIMS/Addinventory.php"><i class="fa-solid fa-plus"></i> Add Stock</a></li>
                    </ul>
                </li>  
                <li class='sub-menu'><a href='#settings'><i class="fa-solid fa-coins"></i> Sales<div class='fa fa-caret-down right pt-1'></div></a>
                    <ul>
                        <li><a href="http://localhost/ASIMS/sales.php"><i class="fa-solid fa-file"></i> Sales Report</a></li>
                        <li><a href="http://localhost/ASIMS/newSales.php"><i class="fa-solid fa-plus"></i> Add Sales</a></li>
                    </ul>
                </li>             
                <li><a href="http://localhost/ASIMS/toDo.php"><i class="fa-solid fa-list-check"></i> To Do  <span class="badge bg-danger text-white mx-1" id="todoQty"> 0</span></a></li>
                <li><a href="http://localhost/ASIMS/history.php"><i class="fa-solid fa-clock-rotate-left"></i> History</a></li>
              </ul>
            </div>   
            <div class="sidebar-footer">
                <p class="text-center" id="dateDisplay"></p>
                <p class="text-center" style="letter-spacing:1px; font-size:15px;" id="clockDisplay"></p>
                <p class="text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout?"></p>
            </div>
          </div>
      </div>
  <!-- END SIDE BAR -->

  <!-- MAIN BAR -->
    <div class="col-10">
        <div class="container">
          <h4 class="pt-5">A&S MOTORSHOP EMPLOYEES <i class="fa-solid fa-users"></i></h4>
            <ul class="nav nav-tabs my-4 ">
              <li class="nav-item">
                  <a class="nav-link active" href="#">&nbsp;&nbsp;Active&nbsp;&nbsp;</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/ASIMS/inactive.php">Inactive</a>
              </li>
            </ul>
                <div class="row pt-3">
                    <div class="col-8 d-flex">
                        <a href="/ASIMS/php/employeesPrint.php" style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4 mx-1 pt-2" type="button"> <i class="fa-solid fa-print"></i> Print</a>
                        <button name="createExcel" id="createExcel" style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4" type="button"><i class="fa-solid fa-file-excel"></i> Excel</button>
                        <a href="http://localhost/ASIMS/employees.php" role="button" style="border-radius:4px;" class="btn mx-1 border-secondary text-dark px-4 btn-sm pt-2"> <i class="fa-solid fa-rotate"></i> Refresh</a>
                        <div class="d-flex" id="addEmployee"></div>
                    </div>
                    <div class="col-4 ms-auto">
                        <form class="d-flex">
                        <input style="border-radius:4px;" class="form-control border-secondary" type="search" placeholder="Search" id="myInput" aria-label="Search">
                        <button style="border-radius:4px;" class="btn border-dark border-1" type="submit" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row mt-2 px-2">
                    <div class="card pt-3 bg-light border-2">
                        <div class="table-responsive" id="showInventoryTable">
                            <table class="table align-middle text-center table-borderless table-striped table-hover shadow" id="stockTable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody id="showEmployees"><!-- INVENTORY DATA --></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- END MAIN BAR -->
  </div>
<!-- CONTENT -->

<!-- MODAL -->
      <!-- VIEW MODAL -->
         <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">                 
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-2 ms-auto"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>                            
                            </div>
                            <!-- START OF MODAL BODY -->
                            <div class="card mb-3 border-0" style="max-width: 540px;">
                                <div class="row mx-auto">                                    
                                    <img style="width:200px;" src="" id="profilePicture" class="img-fluid">                                                                    
                                </div>
                                <div class="row">                                    
                                    <div class="card-body text-center" style="line-height:10px;">
                                        <h5 id="fullname" class="card-title fw-bold"></h5>
                                        <p class="card-text"><small id="position"></small></p>
                                        <p class="card-text"><small id="emailAddress"></small></p>
                                        <p class="card-text"><small id="phoneNumber"></small></p>
                                    </div>
                                </div>
                            </div>
                            <!-- START OF MODAL BODY -->
                        </div>
                    </div>
                </div>
            </div>
      <!-- VIEW MODAL -->

      <!-- UPDATE MODAL -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row g-0">
                            <div class="col-11">
                                <h5 class="modal-title" id="exampleModalLabel">Update Employees</h5>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <form id="updateForm">
                                <div class="row mb-3 g-2">
                                    <input type="hidden" name="UemployeeId" id="UemployeeId" >
                                    <img src="" class="rounded mx-auto d-block mt-4" id="UprofilePicture" style="width:200px; clip-path:circle();">
                                    <div class="col-7">
                                        <label class="form-label text-muted px-2">Update Picture</label>
                                        <input class="form-control border-2 shadow" type="file" name="UprofilePicture" style="border-radius:16px">
                                    </div>
                                    <div class="col-5">
                                        <label class="form-label text-muted px-2">Username</label>
                                        <input type="text" class="form-control border-2 shadow" style="border-radius:16px" name="Uusername" id="Uusername">
                                    </div>
                                </div>
                                <div class="row mb-3 g-2">
                                    <div class="col-8">
                                        <label class="form-label text-muted px-2">Fullname</label>
                                        <input type="text" class="form-control border-2 shadow" style="border-radius:16px" name="Ufullname" id="Ufullname">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label text-muted px-2">Position</label>
                                        <select name="Uposition" id="Uposition" style="border-radius:16px" class="form-select form-select border-2 shadow">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Cashier">Cashier</option>
                                            <option value="Owner">Owner</option>
                                            <option value="Mechanic">Mechanic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2 g-2">
                                    <div class="col-4">
                                        <label for="exampleInputEmail1" class="form-label text-muted px-2">Phone Number</label>
                                        <input type="text" class="form-control border-2 shadow" style="border-radius:16px" name="UphoneNumber" id="UphoneNumber">
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label text-muted px-2">Email Address</label>
                                        <input type="text" class="form-control border-2 shadow" style="border-radius:16px" name="UemailAddress" id="UemailAddress">
                                    </div>
                                </div>             
                            </form>
                        </div>
                        <div class="row g-0">
                            <div class="col-4 ms-auto">
                                <button type="button" id="updateButton" class="btn btn-dark">Save changes</button>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
      <!-- UPDATE MODAL -->

      <!-- ADD MODAL -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-11">
                                <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row mb-4">
                        <form id="addEmployeeForm">
                            <div class="row g-1 mb-3">
                                <div class="col-8">
                                    <label class="form-label px-2">Fullname:</label>
                                    <input type="text" id="addFullname" name="addFullname" class="form-control border-2 shadow" style="border-radius:16px;" placeholder="Enter Fullname Here">
                                </div>
                                <div class="col-4">
                                    <label class="form-label px-2">Position:</label>
                                    <select id="addPosition" name="addPosition" class="form-select form-select border-2 shadow text-muted" style="border-radius:16px;" aria-label=".form-select-lg example">
                                        <option value="" selected>Choose Here</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Cashier">Cashier</option>
                                        <option value="Owner">Owner</option>
                                        <option value="Mechanic">Mechanic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-1 mb-3">
                                <div class="col-4">
                                    <label class="form-label px-2">Phone Number:</label>
                                    <input id="addNumber" name="addNumber" type="text" class="form-control border-2 shadow" style="border-radius:16px;" placeholder="Enter Number Here">
                                </div>
                                <div class="col-8">
                                    <label class="form-label px-2">Email address:</label>
                                    <input id="addEmail" name="addEmail" type="text" class="form-control border-2 shadow" style="border-radius:16px;" placeholder="Enter Email Address Here">
                                </div>
                            </div>
                            <div class="row g-1 mb-2">
                                <div class="col-6">
                                    <label class="form-label px-2">Username:</label>
                                    <input id="addUsername" name="addUsername" type="text" class="form-control border-2 shadow" style="border-radius:16px;" placeholder="Enter Username Here">
                                </div>
                                <div class="col-6">
                                    <label class="form-label px-2">Password <small class="text-muted">(default)</small></label>
                                    <input id="addPassword" name="addPassword" type="text" class="form-control text-muted border-2 shadow" style="border-radius:16px; background-color:transparent;" value="default123" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 ms-auto">
                                <button id="addEmployeeButton" type="button" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      <!-- ADD MODAL -->


<!-- MODAL -->

    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/employees.js"></script>
    <script src="function/logoutt.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c1db67092.js" crossorigin="anonymous"></script>
    <script>
      $('.sub-menu ul').hide();
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("200");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    </script>
</body>
</html>