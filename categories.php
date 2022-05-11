<!DOCTYPE html>
<html lang="en" >
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
            <!-- <li><a href="http://localhost/ASIMS/history.php"><i class="fa-solid fa-clock-rotate-left"></i> History</a></li> -->
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
        <h4 class="pt-5">STOCK CATEGORIES <i class="fa-solid fa-code-branch px-1"></i></h4>
        <ul class="nav nav-tabs my-4">
            <li class="nav-item">
                <a class="nav-link" href="/ASIMS/Inventory.php">Stocks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ASIMS/noStock.php">No Stock</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/ASIMS/categories.php">&nbsp;&nbsp;Categories&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ASIMS/brands.php">Brands</a>
            </li>      
            </ul>
          <div class="row pt-3">
            <div class="col-8 d-flex">
              <button style="border-radius:4px;" class="btn border-secondary text-dark btn-sm px-4" type="button" data-bs-toggle="modal" data-bs-target="#addInventory"><i class="fa-solid fa-plus"></i> Add Category</button>
              <button style="border-radius:4px;" class="btn border-secondary text-dark btn-sm mx-1 px-4"  type="button" id="deleteAllCategory"><i class="fa-solid fa-trash-can"></i> Delete</button>
              <a href="http://localhost/ASIMS/categories.php" role="button" style="border-radius:4px;" class="btn border-secondary text-dark px-4 btn-sm pt-2"> <i class="fa-solid fa-rotate"></i> Refresh</a>

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
          <table class="table align-middle shadow text-center table-bordered shadow table-striped rounded table-hover">
            <thead class="align-middle">
                <tr>
                <th style="width:7rem;">Select All <input class='form-check-input mx-1' type='checkbox' id='checkAllCategory'></th>
                <th>#</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="showCategory"><!-- INVENTORY DATA --></tbody>
          </table>
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
          <!-- ADD CATEGORY -->
            <div class="modal fade" id="addInventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-10">
                      <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    </div>
                    <div class="col-2">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  </div>
                    <div class="row mt-4 mb-2">
                        <form id="addCategoryForm">                  
                          <div class="mb-3">
                            <input type="text" class="form-control fs-5 fw-light" name="category" id="category" placeholder="Enter Category here">
                          </div>
                      </div>
                        <div class="row mx-4">
                            <button type="button" class="btn btn-primary" id="addCategoryButton">Submit</button>
                        </form>
                    </div>          
                  </div>            
                </div>
              </div>
            </div>
            </div>
          <!-- END ADD CATEGORY -->

          <!-- UPDATE CATEGORY -->
           <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-10">
                      <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    </div>
                    <div class="col-2">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  </div>
                    <div class="row mt-4 mb-2">
                        <form id="updateCategoryForm">                  
                          <div class="mb-3">
                            <input type="hidden" class="form-control" name="updateCat_id" id="updateCat_id">
                            <input type="text" class="form-control fs-5 fw-light" name="updateCategory" id="updateCategory">
                          </div>
                      </div>
                        <div class="row mx-4">
                            <button type="button" class="btn btn-primary " id="updateCategoryButton">Save Changes</button>
                        </form>
                    </div>          
                  </div>            
                </div>
              </div>
            </div>
            </div>
          <!-- END UPDATE CATEGORY -->

<!-- END MODAL -->
    
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/logout.js"></script>
    <script src="function/category.js"></script>
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