<!DOCTYPE html>
<html lang="en" id="sessionEmployees">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/asims.css" rel="stylesheet">
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
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Manage Account</a></li>
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
   <div class="col-2">
      <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="sidebar-header">
            <div class="userContent">
                <div class="userProfile">
                      <img src="./assets/img/red.png">
                      <input type="text" class="border-0 text-center text-white pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:15px;" id="fetchFullname">
                      <input type="text" class="border-0 text-center text-white pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:14px;" id="fetchPosition">
                </div>
            </div>
          </div>
          <div class="sidebar-body">
            <ul>
              <li><a href="http://localhost/ASIMS/dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
              <li><a href="http://localhost/ASIMS/inventory.php"><i class="fa-solid fa-boxes-stacked"></i> Inventory</a></li>
              <li><a href="http://localhost/ASIMS/sales.php"><i class="fa-solid fa-coins"></i> Sales</a></li>
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
                <h4 class="pt-5">A&S MOTORSHOP SALES <i class="fa-solid fa-coins px-1"></i></h4>
                <ul class="nav nav-tabs my-4">
                  <li class="nav-item">
                      <a class="nav-link active" href="#">&nbsp;&nbsp;Daily&nbsp;&nbsp;</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Weekly</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Monthly</a>
                  </li>      
                  </ul>
                <div class="row pt-3">
                  <div class="col-8 d-flex">
                    <button class="btn btn-dark px-5 mx-1" type="button" id="printAll">Print All</button>
                    <button class="btn btn-danger px-5" type="button" id="deleteAllSales">Delete</button>
                    <button class="btn btn-primary px-5 mx-1" type="button" data-bs-toggle="modal" data-bs-target="#addSales">Add Sale</button>
                  </div>
                  <div class="col-4 ms-auto">
                    <form class="d-flex">
                      <input class="form-control" type="search" placeholder="Search" id="myInput" aria-label="Search">
                      <button class="btn btn-success" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              <div class="row mt-1">
                <table id="salesTable" class="table align-middle text-center table-bordered table-striped shadow table-hover">
                  <thead class="align-middle">
                    <tr>
                      <th style="width:7rem;">Select All <input class='form-check-input mx-1' type='checkbox' id='checkAllSales'></th>
                      <th scope="col">#</th>
                      <th scope="col">Item Code</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Total Sale</th>
                      <th scope="col">Purchased On</th>
                    </tr>
                  </thead>
                  <tbody id="showSales"><!-- INVENTORY DATA --></tbody>
                </table>
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

<!-- MODAL -->
  <!-- ADD SALES -->
  <div class="modal fade" id="addSales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row my-2">
              <div class="col-10">
                <h5 class="modal-title" id="exampleModalLabel">New Sale</h5>
              </div>
              <div class="col-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
              <div class="row mt-4">
                  <form id="addSalesForm">   
                    <div class="row mx-2">
                        <div class="mb-3">
                          <input type="text" class="form-control fw-light" id="itemBarcode" name="itemBarcode" placeholder="Item Barcode">
                        </div>
                        <div class="mb-3">
                          <input type="number" class="form-control fw-light" id="itemQty" name="itemQty" min="0" placeholder="Quantity">
                        </div>
                        <div class="mb-3">
                          <input type="text" class="form-control fw-light" id="totalSale" name="totalSale" placeholder="Total Sales">
                        </div>
                    </div>
                    <div class="row mx-5 my-2">
                      <button type="button" class="btn btn-primary" id="addSalesButton">Submit</button>
                      </form>
                    </div>
                  </div>
              </div>
            </div>     
          </div>
        </div>
      </div>
    </div>
  <!-- END ADD SALES -->
<!-- MODAL -->

    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/logout.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="function/sale.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c1db67092.js" crossorigin="anonymous"></script>

</body>
</html>