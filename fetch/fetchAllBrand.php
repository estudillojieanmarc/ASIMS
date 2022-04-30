<?php
require 'connection.php';
error_reporting(0);
if(isset($_POST["getBrand"])){
    $qry = "SELECT * FROM brandname ORDER BY brand_id ASC LIMIT 15";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $brand = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
    foreach($brand as $totalBrand){
            $n++;
            echo "
            <tr class='bg-light'>
            <td style='width:0.4rem;'>
            <input class='form-check-input checkBrand' type='checkbox' value='$totalBrand->brand_id'>
            </td> 
            <td style='width:1rem;'>$n</td>
            <td>$totalBrand->brand</td>
            <td style='width:11rem;'>
              <button type='button' onclick=updateBrand('$totalBrand->brand_id') class='btn btn-secondary px-3'>Edit</button>
              <button type='button' onclick=deleteBrand('$totalBrand->brand_id') class='btn btn-danger'>Delete</button>
            </td>
            </tr>
            ";
    }
    }else{
      echo "
      <tr>
            <td></td>
            <td></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO CATEGORY FOUND</td>
            <td></td>
            <td></td>
            </tr>
     ";
    }
}
?>