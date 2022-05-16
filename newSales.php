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
                        <input type="text" class="border-0 text-center text-white pt-1" disabled style="background:transparent; text-transform:uppercase; font-size:15px;" id="fetchFullname">
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
      <div class="container-fluid">
        <div class="row pt-5">
              <!-- START OF RIGHT UI -->
                <div class="col-12">
                  <div class="card border-0">
                        <div class="container">
                        <form id="addSalesForm">
                        <h4 class="pt-4 text-center">NEW SALES REPORT</h4>     
                          <div class="row mt-1 px-5">
                              <div class="row g-2 mb-2 mt-2 px-5">
                                  <div class="col-6">
                                      <label class="form-label">Receipt Number:</label>
                                      <input type="text" class="form-control text-center shadow border-2" id="receipNo" name="receipNo" placeholder="Enter Receipt Number">
                                  </div>
                                  <div class="col-6">
                                      <label class="form-label">Purchased On:</label>
                                      <input type="date" class="form-control text-center text-center shadow border-2" id="purchasedOn" name="purchasedOn" placeholder="Customer Name">
                                  </div>
                              </div>
                              <div class="row px-5">
                                <div class="col g-2 px-5 text-center">
                                    <label class="form-label text-center">Customer Name:</label>
                                    <input class="form-control text-center shadow border-2" type="text" id="customerName" name="customerName" placeholder="Enter Customer Name">
                                </div>
                              </div>
                              <div class="row mt-4">
                                <div class="col-8">
                                    <h5 class="pt-4 text-start">ITEM PURCHASED</h5>
                                </div> 
                                <div class="col-4 pt-4 ms-auto text-end">
                                    <button type="button" id="addRows" class="btn btn-sm btn-primary text-end"><i class="fa-solid fa-plus"></i> Add rows</button>
                                </div>
                              </div>                              
                              <table class="table table-sm text-center align-middle" id="purchasedList">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Barcode</th>
                                      <th>Product</th>
                                      <th>Price ₱</th>
                                      <th>Stock</th>
                                      <th style="width:8rem;">Quantity</th>
                                      <th>Total</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr id="row">
                                      <td>1<input type="hidden" class="itemId form-control form-control-sm text-center" name="itemId"></td>
                                      <td style="width:10rem;">  
                                        <div class="input-group text-center">
                                          <input type="text" class="form-control form-control-sm text-center itemBarcode" name="itemBarcode" placeholder="Item Barcode">
                                          <button class="btn btn-outline-secondary btn-sm searchBcode" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                      </td>
                                      <td class="name"></td>
                                      <td class="price"></td>
                                      <td class="stock"></td>
                                      <td class="px-4"><input type="number" value="0" min="0" name="itemQty" class="form-control text-center form-control-sm quantity"></td>
                                      <td name="total" class="total"></td>
                                      <td><button name="removeR" id="'+i+'" type="button" class="btn btn-danger btn-sm removeRows">Remove</button></td></td>
                                    </tr>
                                  </tbody>
                              </table>
                              <div class="row mt-2 mb-5 px-5">
                                  <button type="button" class="btn btn-dark py-2" id="addSalesButton">SUBMIT</button>
                                  </form>
                              </div>
                          </div>  
                        </form>
                  </div>   
                </div>   
              <!-- END OF RIGHT UI -->
        </div>
      </div>
    </div>
  <!-- END MAIN BAR -->
  </div>
<!-- CONTENT -->


    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/logout.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="function/addSales.js"></script>
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