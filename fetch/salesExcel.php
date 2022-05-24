<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=SalesReport.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
    error_reporting(0);
 
    require 'connection.php';
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>Number</th>
					<th>Item Name</th>
					<th>Receipt Number</th>
					<th>Customers</th>
					<th>Total Sales</th>
					<th>Quantity</th>
					<th>Purchased On</th>
				</tr>
			<tbody>
	";
    $qry = "SELECT a.sales_id, a.receipt_no, a.purchased, a.item_id, a.customers, a.quantity, a.total_sales, b.id, b.item_name FROM sales a, inventory b WHERE a.item_id = b.id ORDER BY a.purchased DESC";
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchSales = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count>0){
        foreach($fetchSales as $totalSales){
            $n++;
            $newDate = date('F d, Y',strtotime($totalSales->purchased));
            $output .= "
            <tr>
              <td>$n</td>
              <td>$totalSales->item_name</td>
              <td>$totalSales->receipt_no</td>
              <td>$totalSales->customers</td>
              <td>$totalSales->total_sales</td>
              <td>$totalSales->quantity</td>
              <td>$newDate</td>
            </tr>
            ";
        }
    }
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>
