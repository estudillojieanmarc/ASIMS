<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/ASIMS/css/bootstrap.css" rel="stylesheet">
    <link href="/ASIMS/css/asims.css" rel="stylesheet">
    <link href="/ASIMS/css/noStockPrint.css" rel="stylesheet" media="print">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <title>A&S Motor Parts</title>
</head>
<body>

<div>
    <div class="col-12">
        <div class="container-fluid">
            <div class="row">
                    <h4 class="pt-5 text-center mb-5">A&S MOTORSHOP EMPLOYEES</h4>
            </div>
             <div class="row mt-2 px-5">
                <table class="table align-middle text-center table-bordered">
                    <thead class="align-middle">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Position</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone Number</th>
                        </tr>
                    </thead>
                <tbody id="showEmployees"><!-- INVENTORY DATA --></tbody>
                </table>
            </div>
            <div class="row mt-3">
                <div class="col-3 ms-auto">
                    <button onclick="window.print()" type="button" class="btn btn-dark px-5" id="printBtn">Print</button>
                    <a href="http://localhost/ASIMS/employees.php" type="button" class="btn btn-dark px-5">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

    
    <script src="/ASIMS/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            showEmployees();
            function showEmployees(){
                $.ajax({
                    url: "/ASIMS/fetch/fetchEmployeesPrint.php",
                    method: 'POST',
                    data: {getEmployees: 1},
                    success : function(data) {
                        $("#showEmployees").html(data);
                    }
                })
            }
        });
    </script>
</body>
</html>