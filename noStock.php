<!DOCTYPE html>
<html lang="en" >
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
            <h4 class="pt-5">A&S MOTORSHOP NO STOCK <i class="fa-solid fa-boxes-stacked px-1"></i></h4>
            <ul class="nav nav-tabs my-4">
              <li class="nav-item">
                  <a class="nav-link" href="/ASIMS/inventory.php">Stocks</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="/ASIMS/noStock.php">&nbsp;&nbsp;No Stock&nbsp;&nbsp;</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/ASIMS/categories.php">Categories</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/ASIMS/brands.php">Brands</a>
              </li>      
              </ul>
            <div class="row pt-3">
              <div class="col-8 d-flex">
              <div class="col-2">
                  <select class="form-select border-secondary text-dark" name="itemRows" id="itemRows">
                  <option selected value='All'>All Rows</option>
                  <option value='25'>25 Rows</option>
                  <option value='50'>50 Rows</option>
                  <option value='75'>50 Rows</option>
                  <option value='100'>100 Rows</option>
                  </select>                   
              </div>
              <a href="/ASIMS/php/noStockprint.php" style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4 mx-1 pt-2" type="button"> <i class="fa-solid fa-print"></i> Print</a>
              <a href="/ASIMS/fetch/noStockExcel.php" style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4 pt-2" type="button"> <i class="fa-solid fa-file-excel"></i>  Excel</a>
              <button style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4 mx-1" type="button" id="deleteAll"><i class="fa-solid fa-trash-can"></i> Delete</button>
              <a href="http://localhost/ASIMS/noStock.php" role="button" style="border-radius:4px;" class="btn border-secondary text-dark px-4 btn-sm pt-2"> <i class="fa-solid fa-rotate"></i> Refresh</a>
              <div class="col-2 mx-1">
                <select class="form-select border-secondary text-dark"  name="allItemCategory" id="allItemCategory"><!-- CATEGORY --></select>                   
                </div>
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
            <div class="table-responsive" id="showNoInventoryTable">
            <table class="table align-middle text-center table-borderless table-striped shadow rounded table-hover">
                <thead class="align-middle">
                <tr>
                  <th style="width:7rem;">Select All <input class='form-check-input mx-1' type='checkbox' id='checkAllItem'></th>
                  <th scope="col">#</th>
                  <th scope="col">Item Code</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="showNoStock"><!-- INVENTORY DATA --></tbody>
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

<!-- MODAL -->
    <!-- UPDATE INVENTORY  -->
        <div class="modal fade" id="updateInventoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">        
            <div class="modal-body">
            <div class="row">
                <div class="col-11">
                <h4 class="modal-title mb-3" id="exampleModalLabel">STOCK DETAILS</h4>
                </div>
                <div class="col-1">
                <button type="button" class="btn-close py-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                <div class="col-5">
                    <img class="img-fluid rounded-start" style="width: 100%; height: 100%;" src="" id="updateImage">
                </div>

                <div class="col-7">
                    <div class="card-body">
                    <div class="row my-3">
                        <form id="updateInventoryForm"> 
                        <div class="row g-2">
                            <div class="col-4">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 py-2 text-secondary">Update image</label>
                            </div>
                            </div>
                            <input class="form-control"  type="hidden" name="updateItemID" id="updateItemID">
                            <div class="col-8">
                            <div class="mb-3">
                                <input class="form-control"  type="file" name="updateItemImage" id="updateItemImage">
                            </div>
                            </div>
                        </div>                 
                        <div class="row g-2">
                            <div class="col-7">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 text-secondary">Item Name</label>
                                <input type="text" class="form-control" name="updateItemName" id="updateItemName">
                            </div>
                            </div>
                            <div class="col-5">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 text-secondary">Item Code</label>
                                <input type="text" class="form-control" name="updateItemCode" id="updateItemCode">
                            </div>
                            </div>
                        </div>            
                        <div class="mb-3">
                            <label for="formFile" class="form-label px-1 text-secondary">Item Description</label>
                            <textarea type="text" style="height:100px; resize:none;" name="updateItemDescription" class="form-control" id="updateItemDescription"></textarea>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 text-secondary">Item Brand</label>
                                <select class="form-select" aria-label="Default select example" name="updateItemBrand" id="updateItemBrand"><!-- BRAND --></select>                   
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 text-secondary">Item Category</label>
                                <select class="form-select" name="updateItemCategory" id="updateItemCategory"><!-- CATEGORY --></select>                   
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 text-secondary">Item Stock</label>
                                <input type="number" min="0" class="form-control" id="updateItemStock" name="updateItemStock">
                            </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label px-1 text-secondary">Item Price</label>
                                <input type="text" class="form-control" name="updateItemPrice" id="updateItemPrice">
                            </div>
                            </div>
                        </div>    
                    <div class="row">
                        <div class="col-5 ms-auto">
                        <button type="button" id="updateButton" nmae="updateButton" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    <!-- UPDATE INVENTORY  -->
<!-- MODAL -->
    
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/logout.js"></script>
    <script src="function/noInventory.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      $('.sub-menu ul').hide();
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("200");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    </script>
</body>
</html>