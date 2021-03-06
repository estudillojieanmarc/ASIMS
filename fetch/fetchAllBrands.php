<?php
require 'connection.php';

error_reporting(0);


// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM brandname";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  $brand = $statement->fetchAll(PDO::FETCH_OBJ);
  $count = $statement->rowCount();
  $pageno = ceil($count / 20);
    for($i=1;$i<=$pageno;$i++){
      echo "
        <li class='nav-item'><a class='btn btn-sm btn-dark px-3' style='border-radius:50%; margin:0 1px;' href='#' page='$i' id='page'>$i</a></li>
      ";
    }
}
// PAGE LIMIT FUNCTION


if(isset($_POST["getBrand"])){
    $limit = 20;
    if(isset($_POST["setPage"])){
      $pageno = $_POST["pageNumber"];
      $start = ($pageno * $limit) - $limit;
    }else{
      $start = 0;
    }
    $qry = "SELECT * FROM brandname WHERE brand_id != 1 ORDER BY brand_id ASC LIMIT $start,$limit";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $brand = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
    foreach($brand as $totalBrand){
            $n++;
            echo "
            <tr class='bg-light brandRows'>
            <td style='width:0.4rem;'>
            <input class='form-check-input checkBrand' type='checkbox' value='$totalBrand->brand_id'>
            </td> 
            <td style='width:1rem;'>$n</td>
            <td>$totalBrand->brand</td>
            <td style='width:5rem;'>
              <button type='button' onclick=updateBrand('$totalBrand->brand_id') class='btn btn-secondary px-3'>Edit</button>
            </td>
            </tr>
            ";
    }
    }else{
      echo "
      <tr style='height:20rem'>
            <td></td>
            <td></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO BRAND STORED</td>
            <td></td>
            <td></td>
            </tr>
     ";
    }
}
?>