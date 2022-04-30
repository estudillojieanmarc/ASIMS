<?php
require 'connection.php';
error_reporting(0);
if(isset($_POST["getCategory"])){
    $qry = "SELECT * FROM categoryname ORDER BY cat_id ASC LIMIT 15";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $category = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
      foreach($category as $totalCategory){
              $n++;
              echo "
              <tr class='bg-light'>
              <td style='width:0.4rem;'>
              <input class='form-check-input checkCategory' type='checkbox' value='$totalCategory->cat_id'>
              </td>       
              <td style='width:1rem;'>$n</td>
              <td>$totalCategory->category</td>
              <td style='width:11rem;'>
                <button type='button' onclick=updateCategory('$totalCategory->cat_id') class='btn btn-secondary px-3'>Edit</button>
                <button type='button' onclick=deleteCategory('$totalCategory->cat_id') class='btn btn-danger'>Delete</button>
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