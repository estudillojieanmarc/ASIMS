<!DOCTYPE html>
<html lang="en" id="sessionEmployees">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/asims.css" rel="stylesheet">
    <link href="css/newStyle.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/img/red.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <title>A&S Motor Parts</title>
</head>
<body>
  
<!-- FUNCTION FOR SESSION -->
  <?php
      require_once "./php/connection.php";
      session_start();
      if(!isset($_SESSION["emp_id"])){
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
                        <img src="./assets/img/logo.png" style="width:25rem;">
                        <input type="text" class="info border-0 text-center text-white pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:15px; margin-top: -30px;" id="fetchFullname">
                        <input type="text" class="info border-0 text-center text-white pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:14px;" id="fetchPosition">
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
              <div class="container-fluid">
                <h4 class="pt-5">A&S MOTORSHOP ACTIVITY LOGS <i class="fa-solid fa-coins px-1"></i></h4>
                <div class="row pt-3">
                  <div class="col-8 d-flex">
                    <a href="#" style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4 pt-2" type="button"> <i class="fa-solid fa-print"></i> Print</a>
                    <button id="createExcel" name="createExcel" style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4 mx-1" type="button" data-bs-toggle="modal" data-bs-target="#addSales"><i class="fa-solid fa-file-excel"></i>  Excel</button>
                    <a href="http://localhost/ASIMS/history.php" role="button" style="border-radius:4px;" class="btn border-secondary text-dark px-4 btn-sm pt-2 "> <i class="fa-solid fa-rotate"></i> Refresh</a>
                  </div>
                  <div class="col-4 ms-auto">
                    <form class="d-flex">
                      <input class="form-control" type="search" placeholder="Search" id="myInput" aria-label="Search">
                      <button style="border-radius:4px;" class="btn border-dark border-1" type="submit" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                  </div>
                </div>
              <div class="row mt-2">
              <div class="card pt-3 bg-light border-2">
                <div class="table-responsive" id="showSalesTable">
                <table id="salesTable" class="table align-middle text-center table-borderless table-striped shadow table-hover">
                  <thead class="align-middle">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Activity</th>
                      <th scope="col">On</th>
                    </tr>
                  </thead>
                  <tbody id="showHistory"><!-- HISTORY DATA --></tbody>
                </table>
                </div>
                </div> 
                <div class="row">
                <div class="col-12">
                    <ul class="pagination mt-1 float-end" id="pageno"></ul></div>
                </div>
            </div>
              </div>
              </div>
          </div>
  <!-- END MAIN BAR -->

  </div>
<!-- CONTENT -->

    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/logoutt.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="function/history.js"></script>
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