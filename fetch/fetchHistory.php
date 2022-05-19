<?php
require 'connection.php';
error_reporting(0);

// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM history";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  $inventory = $statement->fetchAll(PDO::FETCH_OBJ);
  $count = $statement->rowCount();
  $pageno = ceil($count / 20);
    for($i=1;$i<=$pageno;$i++){
      echo "
        <li class='nav-item'><a class='btn btn-sm btn-dark shadow border-dark px-3' style='border-radius:50%; margin:0 1px;' href='#' paginationStock='$i' id='paginationStock'>$i</a></li>
      ";
    }
}
// PAGE LIMIT FUNCTION


// INVENTORY TABLE CONTENT
if(isset($_POST["getHistory"])){
    $limit = 20;
    if(isset($_POST["setPage"])){
      $pageno = $_POST["pageNumber"];
      $start = ($pageno * $limit) - $limit;
    }else{
      $start = 0;
    }
    $qry = "SELECT * FROM history ORDER BY set_on DESC LIMIT $start,$limit";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $History = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count > 0){
      foreach($History as $totalHistory){
              $n++;
              $newDate = date('F d, Y | h:i A',strtotime($totalHistory->set_on));
              echo"
              <tr class='bg-light'>            
              <td>$n</td>
              <td>$totalHistory->history</td>
              <td>$newDate</td>
              </tr>
              ";
      }
    }else{
      echo "
      <tr style='height:20rem'>
            <td style='width:1px'></td>
            <td style='width:4rem'></td>
            <td class='alert alert-light text-center mt-5 fs-4 text-danger'>NO ITEMS AVAILABLE</td>
            <td style='width:7rem'></td>
      </tr>
     ";
    }
}
// END INVENTORY TABLE CONTENT

?>