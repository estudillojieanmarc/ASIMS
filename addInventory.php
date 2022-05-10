<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/asims.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
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
              <li class='sub-menu'><a href='#settings'><i class="fa-solid fa-boxes-stacked"></i> Inventory<div class='fa fa-caret-down right pt-1'></div></a>
                  <ul>
                  <li><a href="http://localhost/ASIMS/inventory.php"><i class="fa-solid fa-file"></i> Stock Report</a></li>
                  <li><a href="http://localhost/ASIMS/Addinventory.php"><i class="fa-solid fa-plus"></i> Add Stock</a></li>
                  </ul>
              </li>  
              <li class='sub-menu'><a href='#settings'><i class="fa-solid fa-coins"></i> Sales<div class='fa fa-caret-down right pt-1'></div></a>
                  <ul>
                      <li><a href="http://localhost/ASIMS/sales.php"><i class="fa-solid fa-file"></i> Sales Report</a></li>
                      <li><a href="http://localhost/ASIMS/sales.php"><i class="fa-solid fa-plus"></i> Add Sales</a></li>
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
          <div class="row pt-4">
                <!-- START OF LEFT UI -->
                  <div class="col-6 pt-4">
                        <img class="img-thumbnail border-0" src="assets/img/Checking.png">
                  </div>
                <!-- END OF LEFT UI -->
                
                <!-- START OF RIGHT UI -->
                  <div class="col-6">
                    <div class="card border-0">
                          <div class="container">
                          <h4 class="pt-5 text-center">NEW INVENTORY</h4>     
                          <div class="row my-2 text-center">
                            <div class="row mt-4 text-center">
                                <form id="addInventoryForm">                  
                                  <div class="row g-2">
                                    <div class="col-7">
                                      <div class="mb-3">
                                        <input type="text" class="form-control border-2" name="itemName" id="itemName" placeholder="Item Name">
                                      </div>
                                    </div>
                                    <div class="col-5">
                                      <div class="mb-3">
                                        <input type="text" class="form-control border-2" name="itemCode" id="itemCode" placeholder="Item Barcode">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col-4">
                                      <div class="mb-2">
                                        <label for="formFile" class="form-label px-3 py-2 text-secondary">Insert image:</label>
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <div class="mb-2">
                                        <input class="form-control border-2"  type="file" name="itemImage" id="itemImage">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <textarea type="text" style="height:100px; resize:none;" name="itemDescription" class="form-control border-2" id="itemDescription" placeholder="Item Description"></textarea>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <select class="form-select border-2"  name="itemBrand" id="itemBrand"></select>                   
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <select class="form-select border-2"  name="itemCategory" id="itemCategory"></select>                   
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <input type="number" class="form-control border-2" id="itemStock" name="itemStock" min="0" placeholder="Stock">
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <input type="text" class="form-control border-2" name="itemPrice" id="itemPrice" placeholder="Price">
                                      </div>
                                    </div>
                                  </div>                  
                                  </div>
                                  <div class="row mt-4 px-5">
                                    <button type="button" class="btn btn-dark py-3" id="addButton">SUBMIT</button>
                                    </form>
                                  </div>
                            </div>
                          </div>  
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
    <script src="function/logout.js"></script>
    <script src="function/inv.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      $('.sub-menu ul').hide();
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    </script>





            








</body>
</html>