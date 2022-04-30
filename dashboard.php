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
              <li><a href="http://localhost/ASIMS/dashboard.php">Dashboard </a></li>
              <li><a href="http://localhost/ASIMS/inventory.php">Inventory</a></li>
              <li><a href="http://localhost/ASIMS/sales.php">Sales</a></li>
              <li><a href="http://localhost/ASIMS/toDo.php">ToDo</a></li>
              <li><a href="http://localhost/ASIMS/history.php">History</a></li>
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
    <div class="col-10 mt-4">
          <!-- CARDS -->
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Primary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Secondary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
              </div>
              <div class="col-4">
                  <div class="card text-white bg-success mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Success card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- END CARDS -->

    </div>
  <!-- END MAIN BAR -->
  </div>
<!-- CONTENT -->

    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/logout.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c1db67092.js" crossorigin="anonymous"></script>

</body>
</html>