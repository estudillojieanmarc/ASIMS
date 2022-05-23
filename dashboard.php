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
          <!-- CARDS -->
            <div class="container mt-4">
              <div class="row">
                <div class="col-3">
                  <div class="card bg-dark shadow" style="width: 16rem; height:7rem; border-radius:10px;">
                      <div class="card-body py-4">
                          <div class="row">
                              <div class="col-5 text-start px-4">
                                  <i style="font-size:2.5rem;" class="fa-solid fa-coins pt-3 text-light"></i>
                              </div>   
                              <div class="col-7 text-start pt-2 text-center" style="line-height:11px;">
                                  <p class="card-text text-light pt-2 fs-5 fw-bold">₱<span id="totalSales">100</span></p>
                                  <p class="card-text text-light"><a class="text-light" style="text-decoration:none;" href="http://localhost/ASIMS/sales.php">TOTAL SALES</a></p>
                              </div>   
                          </div>   
                      </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="card bg-dark shadow " style="width: 16rem; height:7rem; border-radius:10px;">
                      <div class="card-body py-4" >
                          <div class="row">
                              <div class="col-5 text-start px-4">
                                  <i style="font-size:2.5rem;" class="fa-solid fa-boxes-stacked pt-3 text-light"></i>
                              </div>   
                              <div class="col-7 text-start pt-2 text-center" style="line-height:11px;">
                                  <p class="card-text text-light pt-2 fs-5 fw-bold" id="totalStocks"></p>
                                  <p class="card-text text-light"><a class="text-white" style="text-decoration:none;" href="http://localhost/ASIMS/inventory.php">TOTAL STOCKS</a></p>                               
                              </div>   
                          </div>   
                      </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="card bg-dark shadow " style="width: 16rem; height:7rem; border-radius:10px;">
                      <div class="card-body py-4" >
                          <div class="row">
                              <div class="col-5 text-start px-4">
                                  <i style="font-size:2.5rem;" class="fa-solid fa-cart-flatbed pt-3 text-light"></i>
                              </div>   
                              <div class="col-7 text-start pt-2 text-center" style="line-height:11px;">
                                  <p class="card-text text-light pt-2 fs-5 fw-bold" id="totalNoStocks"></p>
                                  <p class="card-text text-light"><a class="text-white text-center" style="text-decoration:none;" href="http://localhost/ASIMS/noStock.php">NO STOCKS</a></p> 
                              </div>   
                          </div>   
                      </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="card bg-dark shadow " style="width: 16rem; height:7rem; border-radius:10px;">
                      <div class="card-body py-4" >
                          <div class="row">
                              <div class="col-5 text-start px-4">
                                  <i style="font-size:2.5rem;" class="fa-solid fa-list-check pt-3 text-light"></i>
                              </div>   
                              <div class="col-7 text-start pt-2 text-center" style="line-height:11px;">
                                  <p class="card-text text-light pt-2 fs-5 fw-bold" id="totalTask"></p>
                                  <p class="card-text text-light"><a class="text-white" style="text-decoration:none;" href="http://localhost/ASIMS/toDo.php">PENDING TASK</a></p> 
                              </div>   
                          </div>   
                      </div>
                  </div>
                </div>
                
            </div>
          <!-- END CARDS -->
          <!-- CHART -->
          <div class="mb-3 mt-2 border-2 shadow">
            <div class="card p-4" style="border-radius:20px;">
              <H4>SALES REPORT <i class="fa-solid fa-comment-dollar"></i></H4>
              <canvas id="myChart"></canvas>
            </div>
          </div>
          <!-- CHART -->
    </div>
  <!-- END MAIN BAR -->
  </div>
<!-- CONTENT -->

    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="function/dashboards.js"></script>
    <script src="function/logout.js"></script>
    <script src="function/fetchIdentity.js"></script>
    <script src="function/dateTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c1db67092.js" crossorigin="anonymous"></script>
    <script>
      $('.sub-menu ul').hide();
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("200");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    </script>
    <!-- FUNCTION FOR CHART -->
        <?php
        require 'connection.php';
        $sql = "SELECT purchased as purchasedOn, SUM(total_sales) AS totalSales FROM sales GROUP BY purchasedOn";
        $statement=$pdo->prepare($sql);
        $statement->execute();
        $sales = $statement->fetchAll(PDO::FETCH_OBJ);
        foreach($sales as $data)
        {
          $amount[] = $data->totalSales;
          $newDate[] = date('F d, Y',strtotime($data->purchasedOn));
        }
        ?>
        <script>
          const labels = <?php echo json_encode($newDate, true); ?>;
          console.log(labels);
          const data = {
            labels: labels,
            datasets: [{
              label: 'A&S SALES REPORT',
              data: <?php echo json_encode($amount, true); ?>,
              backgroundColor: [
                'rgba(18,	52,	86, 0.5 )',
              ],
              borderColor: [
                'rgba(18,	52,	86)',
              ],
              borderWidth: 1
            }]
          };
          const config = {
            type: 'bar',
            data: data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
          };
            var myChart = new Chart(document.getElementById('myChart'),config);
        </script>
    <!-- FUNCTION FOR CHART -->

</body>
</html>

